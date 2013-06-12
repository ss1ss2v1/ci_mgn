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

class Receipt_voucher_model extends CI_Model
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
        return $this->db->count_all('fin_receipt_voucher');
    } 
    
    function voucher_available($nomor_voucher)
    {
        $result = $this->db->query('SELECT COUNT(*) AS total_row FROM fin_receipt_voucher WHERE RV_Nomor="'.$nomor_voucher.'"');
        $res = $result->row_array();
        if ($res['total_row']>0) {
            $this->form_validation->set_message('voucher_available', 'Nomor voucher sudah digunakan');
            return false;
        }
        return true;                
    }
    
    function get_receipt_header_lists($filter=false, $type=false, $flag=false, $order_by=false, $exclude_id=false, $offset=0, $limit=20, $for_link_only=true)
    {
        if (!$order_by) {$order_by=' ORDER BY RV_Nomor_Record DESC';}        
        $where = ' WHERE 1=1 AND RV_Record_Is_Active=1 ';                
        $limit = ' LIMIT '. (($offset==0) ? $limit : $offset.','.$limit);
        $select = 'SELECT COUNT(*) AS total_records FROM fin_receipt_voucher ' . $where;
        $result = $this->db->query($select);        
        $res = $result->row_array();
        $total_record = $res['total_records'];

        $select = 'SELECT * FROM fin_receipt_voucher ' . $where . $order_by . $limit;
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return array('total_records' => 0, 'query_result' => false);        
        return array('total_records' => $total_record, 'query_result' => $result->result_array());
    }
    
    function get_receipt_header_info($rv_nomor)
    {
        if (! $rv_nomor) return false;
        $select = 'SELECT * FROM fin_receipt_voucher WHERE fin_receipt_voucher.RV_Nomor="' . $rv_nomor . '"';
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return false;        
        return $result->row_array();        
    }
    
    function add_new_voucher()
    {
		$validation_rules = array(
			array('field' => 'RV_Nomor', 'label' => 'Nomor voucher', 'rules' => 'required|callback_voucher_available'),
			array('field' => 'RV_Tanggal', 'label' => 'Tanggal voucher', 'rules' => 'required'),
			array('field' => 'RV_Identitas', 'label' => 'Pembayar', 'rules' => 'required|min_length[3]|max_length[20]'),
			array('field' => 'RV_Keterangan', 'label' => 'Keterangan', 'rules' => 'required|min_length[5]|max_length[100]'),
		);
        
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $ip_address = $this->input->ip_address();
            $now = date('Y-m-d H:i:s', time());
            $unit=explode(' - ', $this->input->post('RV_Unit_Code'));
            $rcv_type=explode(' - ', $this->input->post('RV_Receipt_Type'));
            $account=explode(' - ', $this->input->post('RV_Account_Number'));
            $dari=explode(' - ', $this->input->post('RV_Dari'));
            $identitas=str_replace('-', '.', $this->input->post('RV_Identitas'));
            $project=str_replace('-', '.', $this->input->post('RV_Project_Contract_Number'));
            $sql_insert = array(
    			'RV_Nomor' => $this->input->post('RV_Nomor'),
                'RV_Tanggal' => $this->input->post('RV_Tanggal'),
                'RV_Periode' => date('Ym', strtotime($this->input->post('RV_Tanggal'))),
                'RV_Referensi' => $this->input->post('RV_Referensi'),
                'RV_Unit_Code' => $unit[0],
                'RV_Identitas' => $identitas,
                'RV_Account_Number' => $account[0],
                'RV_Dari' => $this->input->post('RV_Nama_Identitas'),
                'RV_Receipt_Type' => $rcv_type[0],
                'RV_Keterangan' => $this->input->post('RV_Keterangan'),
                'RV_Project_Contract_Number' => $project,
                'RV_Total_Rupiah' => 0,
                'RV_Total_Asing' => 0,
                'RV_Transaction_Rate' => 1,
                'RV_Tax_Rate' => 1,
                'RV_Currency_ID' => 'IDR',
                'Created_By' => 'System',
                'Created_Date' => $now,
                'Creator_Ip' => $ip_address
            );
            $this->db->trans_start();
            $this->db->insert('fin_receipt_voucher', $sql_insert);      
            $account_id = $this->db->insert_id();
            $this->load->model('identitas_model');
            $this->identitas_model->check_and_add_new_identitas($identitas, str_replace('-','.',$this->input->post('RV_Nama_Identitas')));
            if ($project != '') {
                $this->load->model('project_model');
                $this->project_model->check_and_add_new_project($project, str_replace('-','.',$this->input->post('RV_Project_Name')));
            }
            $this->save_detail_voucher( $this->input->post('RV_Nomor'));
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
			array('field' => 'RV_Tanggal', 'label' => 'Tanggal voucher', 'rules' => 'required'),
			array('field' => 'RV_Identitas', 'label' => 'Pembayar', 'rules' => 'required|min_length[3]|max_length[20]'),
			array('field' => 'RV_Keterangan', 'label' => 'Keterangan', 'rules' => 'required|min_length[5]|max_length[100]'),
		);
        
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $ip_address = $this->input->ip_address();
            $now = date('Y-m-d H:i:s', time());
            $unit=explode(' - ', $this->input->post('RV_Unit_Code'));
            $rcv_type=explode(' - ', $this->input->post('RV_Receipt_Type'));
            $account=explode(' - ', $this->input->post('RV_Account_Number'));
            $dari=explode(' - ', $this->input->post('RV_Dari'));
            $identitas=str_replace('-', '.', $this->input->post('RV_Identitas'));
            $project=str_replace('-', '.', $this->input->post('RV_Project_Contract_Number'));
            $sql_update = array(
                'RV_Tanggal' => $this->input->post('RV_Tanggal'),
                'RV_Periode' => date('Ym', strtotime($this->input->post('RV_Tanggal'))),
                'RV_Referensi' => $this->input->post('RV_Referensi'),
                'RV_Unit_Code' => $unit[0],
                'RV_Identitas' => $identitas,
                'RV_Account_Number' => $account[0],
                'RV_Dari' => $this->input->post('RV_Nama_Identitas'),
                'RV_Receipt_Type' => $rcv_type[0],
                'RV_Keterangan' => $this->input->post('RV_Keterangan'),
                'RV_Project_Contract_Number' => $project,
                'RV_Total_Rupiah' => 0,
                'RV_Total_Asing' => 0,
                'RV_Transaction_Rate' => 1,
                'RV_Tax_Rate' => 1,
                'RV_Currency_ID' => 'IDR',
                'Last_Modified_By' => 'System',
                'Last_Modified_Date' => $now,
                'Last_Modified_Ip' => $ip_address
            );
            $this->db->trans_start();
            $this->db->where('RV_Nomor', $this->input->post('RV_Nomor'));                  
            $this->db->update('fin_receipt_voucher', $sql_update);      
            $this->load->model('identitas_model');
            $this->identitas_model->check_and_add_new_identitas($identitas, str_replace('-','.',$this->input->post('RV_Nama_Identitas')));
            if ($project != '') {
                $this->load->model('project_model');
                $this->project_model->check_and_add_new_project($project, str_replace('-','.',$this->input->post('RV_Project_Name')));
            }
            $this->save_detail_voucher( $this->input->post('RV_Nomor'));
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
        
        $this->db->where('RVD_Nomor_Voucher', $rv_nomor);            
        $this->db->delete('fin_receipt_voucher_d');
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
            			'RVD_Nomor_Voucher' => $rv_nomor,
                        'RVD_Nomor_Urut' => $urut,
                        'RVD_Unit_Code_Lawan' => $unit[$no],
                        'RVD_Nomor_Referensi' => $referensi[$no],
                        'RVD_Identitas_Lawan' => $identitas[$no],
                        'RVD_Project_Contract_Number_Lawan' => $project[$no],
                        'RVD_Nomor_Rekening_Lawan' => $account[$no],
                        'RVD_Keterangan' => $keterangan[$no],
                        'RVD_Rupiah' => $nominal_rp
                    );
                    $this->db->insert('fin_receipt_voucher_d', $sql_insert);     
                    $total_rupiah +=  $nominal_rp;
               }
            }
            $sql_update = array('RV_Total_Rupiah' => $total_rupiah);
            $this->db->where('RV_Nomor', $rv_nomor);
            $this->db->update('fin_receipt_voucher', $sql_update);
        }
        return true;                       
    }
        
    function delete_voucher($rv_nomor)
    {
        $aRet_ = array('result' => 0, 'message' => '');        
        $this->db->trans_start();
        $count = $this->db->count_all('fin_receipt_voucher');
        $this->db->where('RV_Nomor', $rv_nomor);            
        $this->db->delete('fin_receipt_voucher');
        $new_count = $this->db->count_all('fin_receipt_voucher');
        if (($count - $new_count) > 0) 
        {        
            $this->db->where('RVD_Nomor_Voucher', $rv_nomor);            
            $this->db->delete('fin_receipt_voucher_d');
            $this->db->trans_complete();            
        }
        else $this->db->trans_rollback();
        $aRet_['result'] = $count - $new_count; 
        return $aRet_;               
    }  
    
    function get_receipt_detail_by_voucher($rv_nomor=false)
    {
        if (!$rv_nomor) return false;
        $select = 'SELECT fin_receipt_voucher_d.*, account.Account_Name, gl_identitas.ID_Description, gl_projects.Description AS PD_Description, gl_profit_centers.Unit_Name 
            FROM fin_receipt_voucher_d 
            LEFT JOIN gl_identitas ON (fin_receipt_voucher_d.RVD_Identitas_Lawan = gl_identitas.Identitas) 
            LEFT JOIN gl_projects ON (fin_receipt_voucher_d.RVD_Project_Contract_Number_Lawan = gl_projects.Project_Contract_Number) 
            LEFT JOIN account ON (fin_receipt_voucher_d.RVD_Nomor_Rekening_Lawan = account.Account_Number)
            LEFT JOIN gl_profit_centers ON (fin_receipt_voucher_d.RVD_Unit_Code_Lawan = gl_profit_centers.Unit_Code)
            WHERE fin_receipt_voucher_d.RVD_Nomor_Voucher="'. $rv_nomor . '" ORDER BY RVD_Nomor_Urut';
        $result = $this->db->query($select);        
        return $result->result_array();
    }      
 
}

/* End of file flexi_auth_model.php */
/* Location: ./application/controllers/flexi_auth_model.php */
