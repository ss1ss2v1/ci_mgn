<?php

/**
 * @author Fajrie R Aradea
 * @copyright 2013
 */



?>

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: Bisfren Ad Model
*
*/

class Payment_voucher_model extends CI_Model
{
	public function __construct() {

		$this->load->database();
	   
	}
    
	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}

    function count_all()
    {
        return $this->db->count_all('fin_payment_voucher');
    } 
    
    function voucher_available($nomor_voucher)
    {
        $result = $this->db->query('SELECT COUNT(*) AS total_row FROM fin_payment_voucher WHERE PV_Nomor="'.$nomor_voucher.'"');
        $res = $result->row_array();
        if ($res['total_row']>0) {
            $this->form_validation->set_message('voucher_available', 'Nomor voucher sudah digunakan');
            return false;
        }
        return true;                
    }
    
    function get_payment_header_lists($filter=false, $type=false, $flag=false, $order_by=false, $exclude_id=false, $offset=0, $limit=20, $for_link_only=true)
    {
        if (!$order_by) {$order_by=' ORDER BY PV_Nomor_Record DESC';}        
        $where = ' WHERE 1=1 AND PV_Record_Is_Active=1 ';                
        $limit = ' LIMIT '. (($offset==0) ? $limit : $offset.','.$limit);
        $select = 'SELECT COUNT(*) AS total_records FROM fin_payment_voucher ' . $where;
        $result = $this->db->query($select);        
        $res = $result->row_array();
        $total_record = $res['total_records'];

        $select = 'SELECT * FROM fin_payment_voucher ' . $where . $order_by . $limit;
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return array('total_records' => 0, 'query_result' => false);        
        return array('total_records' => $total_record, 'query_result' => $result->result_array());
    }
    
    function get_payment_header_info($rv_nomor)
    {
        if (! $rv_nomor) return false;
        $select = 'SELECT * FROM fin_payment_voucher WHERE fin_payment_voucher.PV_Nomor="' . $rv_nomor . '"';
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return false;        
        return $result->row_array();        
    }
    
    function add_new_voucher()
    {
		$validation_rules = array(
			array('field' => 'PV_Nomor', 'label' => 'Nomor voucher', 'rules' => 'required|callback_voucher_available'),
			array('field' => 'PV_Tanggal', 'label' => 'Tanggal voucher', 'rules' => 'required'),
			array('field' => 'PV_Identitas', 'label' => 'Pembayar', 'rules' => 'required|min_length[3]|max_length[20]'),
			array('field' => 'PV_Keterangan', 'label' => 'Keterangan', 'rules' => 'required|min_length[5]|max_length[100]'),
		);
        
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $ip_address = $this->input->ip_address();
            $now = date('Y-m-d H:i:s', time());
            $unit=explode(' - ', $this->input->post('PV_Unit_Code'));
            $rcv_type=explode(' - ', $this->input->post('PV_Payment_Type'));
            $account=explode(' - ', $this->input->post('PV_Account_Number'));
            $dari=explode(' - ', $this->input->post('PV_Dari'));
            $identitas=str_replace('-', '.', $this->input->post('PV_Identitas'));
            $project=str_replace('-', '.', $this->input->post('PV_Project_Contract_Number'));
            $sql_insert = array(
    			'PV_Nomor' => $this->input->post('PV_Nomor'),
                'PV_Tanggal' => $this->input->post('PV_Tanggal'),
                'PV_Periode' => date('Ym', strtotime($this->input->post('PV_Tanggal'))),
                'PV_Referensi' => $this->input->post('PV_Referensi'),
                'PV_Unit_Code' => $unit[0],
                'PV_Identitas' => $identitas,
                'PV_Account_Number' => $account[0],
                'PV_Kepada' => $this->input->post('PV_Nama_Identitas'),
                'PV_Payment_Type' => $rcv_type[0],
                'PV_Keterangan' => $this->input->post('PV_Keterangan'),
                'PV_Project_Contract_Number' => $project,
                'PV_Total_Rupiah' => 0,
                'PV_Total_Asing' => 0,
                'PV_Transaction_Rate' => 1,
                'PV_Tax_Rate' => 1,
                'PV_Currency_ID' => 'IDR',
                'Created_By' => 'System',
                'Created_Date' => $now,
                'Creator_Ip' => $ip_address
            );
            $this->db->trans_start();
            $this->db->insert('fin_payment_voucher', $sql_insert);      
            $account_id = $this->db->insert_id();
            $this->load->model('identitas_model');
            $this->identitas_model->check_and_add_new_identitas($identitas, str_replace('-','.',$this->input->post('PV_Nama_Identitas')));
            if ($project != '') {
                $this->load->model('project_model');
                $this->project_model->check_and_add_new_project($project, str_replace('-','.',$this->input->post('PV_Project_Name')));
            }
            $this->save_detail_voucher( $this->input->post('PV_Nomor'));
            $this->db->trans_complete(); 
            return true;               
        }
        else
        {
		  $this->data['message'] = validation_errors('<span class="error_msg">', '</span></br>');            
        }        
        return false;                       
    }
    
    function edit_voucher()
    {
		$validation_rules = array(
			array('field' => 'PV_Tanggal', 'label' => 'Tanggal voucher', 'rules' => 'required'),
			array('field' => 'PV_Identitas', 'label' => 'Pembayar', 'rules' => 'required|min_length[3]|max_length[20]'),
			array('field' => 'PV_Keterangan', 'label' => 'Keterangan', 'rules' => 'required|min_length[5]|max_length[100]'),
		);
        
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $ip_address = $this->input->ip_address();
            $now = date('Y-m-d H:i:s', time());
            $unit=explode(' - ', $this->input->post('PV_Unit_Code'));
            $rcv_type=explode(' - ', $this->input->post('PV_Payment_Type'));
            $account=explode(' - ', $this->input->post('PV_Account_Number'));
            $dari=explode(' - ', $this->input->post('PV_Dari'));
            $identitas=str_replace('-', '.', $this->input->post('PV_Identitas'));
            $project=str_replace('-', '.', $this->input->post('PV_Project_Contract_Number'));
            $sql_update = array(
                'PV_Tanggal' => $this->input->post('PV_Tanggal'),
                'PV_Periode' => date('Ym', strtotime($this->input->post('PV_Tanggal'))),
                'PV_Referensi' => $this->input->post('PV_Referensi'),
                'PV_Unit_Code' => $unit[0],
                'PV_Identitas' => $identitas,
                'PV_Account_Number' => $account[0],
                'PV_Kepada' => $this->input->post('PV_Nama_Identitas'),
                'PV_Payment_Type' => $rcv_type[0],
                'PV_Keterangan' => $this->input->post('PV_Keterangan'),
                'PV_Project_Contract_Number' => $project,
                'PV_Total_Rupiah' => 0,
                'PV_Total_Asing' => 0,
                'PV_Transaction_Rate' => 1,
                'PV_Tax_Rate' => 1,
                'PV_Currency_ID' => 'IDR',
                'Last_Modified_By' => 'System',
                'Last_Modified_Date' => $now,
                'Last_Modified_Ip' => $ip_address
            );
            $this->db->trans_start();
            $this->db->where('PV_Nomor', $this->input->post('PV_Nomor'));                  
            $this->db->update('fin_payment_voucher', $sql_update);      
            $this->load->model('identitas_model');
            $this->identitas_model->check_and_add_new_identitas($identitas, str_replace('-','.',$this->input->post('PV_Nama_Identitas')));
            if ($project != '') {
                $this->load->model('project_model');
                $this->project_model->check_and_add_new_project($project, str_replace('-','.',$this->input->post('PV_Project_Name')));
            }
            $this->save_detail_voucher( $this->input->post('PV_Nomor'));
            $this->db->trans_complete(); 
            return true;               
        }
        else
        {
		  $this->data['message'] = validation_errors('<span class="error_msg">', '</span></br>');            
        }        
        return false;                       
    }   

    function account_exist($account_number)
    {
        $result = $this->db->query('SELECT COUNT(*) AS total_row FROM account WHERE Account_Number="'.$account_number.'"');
        $res = $result->row_array();
        return (($res['total_row'] > 0) ? true : false); 
    }
    
    function unit_exist($unit_code)
    {
        $result = $this->db->query('SELECT COUNT(*) AS total_row FROM gl_profit_centers WHERE Unit_Code="'.$unit_code.'"');
        $res = $result->row_array();
        return (($res['total_row'] > 0) ? true : false); 
    }
    
    function save_detail_voucher($rv_nomor)
    {
        
        $this->db->where('PVD_Nomor_Voucher', $rv_nomor);            
        $this->db->delete('fin_payment_voucher_d');
        $total_rupiah=0;
        if ($this->input->post('no_urut'))
        {
            $no_urut=$this->input->post("no_urut");
            $referensi =$this->input->post("referensi");
            $account =$this->input->post("account");
            $project =$this->input->post("project");
            $unit =$this->input->post("unit");
            $identitas =$this->input->post("identitas");
            $keterangan =$this->input->post("keterangan");
            $rupiah =$this->input->post("rupiah");
            foreach ($no_urut as $no => $urut)
            {
                $nominal_rp = (float)str_replace(',','', $rupiah[$no]);
                $acc_exist = $this->account_exist($account[$no]);
                if (! $this->unit_exist($unit[$no])) $unit[$no]='00'; // set default unit jika unit tidak dikenal                
                if ($nominal_rp > 0 && $acc_exist)
                {
                    $sql_insert = array(
            			'PVD_Nomor_Voucher' => $rv_nomor,
                        'PVD_Nomor_Urut' => $urut,
                        'PVD_Unit_Code_Lawan' => $unit[$no],
                        'PVD_Nomor_Referensi' => $referensi[$no],
                        'PVD_Identitas_Lawan' => $identitas[$no],
                        'PVD_Project_Contract_Number_Lawan' => $project[$no],
                        'PVD_Nomor_Rekening_Lawan' => $account[$no],
                        'PVD_Keterangan' => $keterangan[$no],
                        'PVD_Rupiah' => $nominal_rp
                    );
                    $this->db->insert('fin_payment_voucher_d', $sql_insert);     
                    $total_rupiah +=  $nominal_rp;
               }
            }
            $sql_update = array('PV_Total_Rupiah' => $total_rupiah);
            $this->db->where('PV_Nomor', $rv_nomor);
            $this->db->update('fin_payment_voucher', $sql_update);
        }
        return true;                       
    }
        
    function delete_voucher($rv_nomor)
    {
        $aRet_ = array('result' => 0, 'message' => '');        
        $this->db->trans_start();
        $count = $this->db->count_all('fin_payment_voucher');
        $this->db->where('PV_Nomor', $rv_nomor);            
        $this->db->delete('fin_payment_voucher');
        $new_count = $this->db->count_all('fin_payment_voucher');
        if (($count - $new_count) > 0) 
        {        
            $this->db->where('PVD_Nomor_Voucher', $rv_nomor);            
            $this->db->delete('fin_payment_voucher_d');
            $this->db->trans_complete();            
        }
        else $this->db->trans_rollback();
        $aRet_['result'] = $count - $new_count; 
        return $aRet_;               
    }  
    
    function get_payment_detail_by_voucher($rv_nomor=false)
    {
        if (!$rv_nomor) return false;
        $select = 'SELECT fin_payment_voucher_d.*, account.Account_Name, gl_identitas.ID_Description, gl_projects.Description AS PD_Description, gl_profit_centers.Unit_Name 
            FROM fin_payment_voucher_d 
            LEFT JOIN gl_identitas ON (fin_payment_voucher_d.PVD_Identitas_Lawan = gl_identitas.Identitas) 
            LEFT JOIN gl_projects ON (fin_payment_voucher_d.PVD_Project_Contract_Number_Lawan = gl_projects.Project_Contract_Number) 
            LEFT JOIN account ON (fin_payment_voucher_d.PVD_Nomor_Rekening_Lawan = account.Account_Number)
            LEFT JOIN gl_profit_centers ON (fin_payment_voucher_d.PVD_Unit_Code_Lawan = gl_profit_centers.Unit_Code)
            WHERE fin_payment_voucher_d.PVD_Nomor_Voucher="'. $rv_nomor . '" ORDER BY PVD_Nomor_Urut';
        $result = $this->db->query($select);        
        return $result->result_array();
    }      
 
}

?>
/* End of file flexi_auth_model.php */
/* Location: ./application/controllers/flexi_auth_model.php */
