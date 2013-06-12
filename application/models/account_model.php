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

class Account_model extends CI_Model
{
	public function __construct() {

		$this->load->database();
	   
	}
    
	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}

    Public function count_all()
    {
        return $this->db->count_all('accounts');
    } 

    function get_account_tipe_list()
    {
        $select = 'SELECT * FROM account_type ORDER BY Account_Type';
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return false;        
        return $result->result_array();        
    }
    
    function get_account_lists($type=false, $flag=false, $detail_only=false, $order_by=false, $exclude_id=false, $offset=0, $limit=20, $for_link_only=true)
    {

        
        if (! $type) { $type=''; }
        else
        {
            if (is_array($type)) $type = implode(',', $type);
            else $type = $type;            
            $type = ' AND account.Account_Type IN ('.$type.')';    
        }
        
        if (! $flag) { $flag=''; }
        else
        {
            if (is_array($flag)) $flag = implode(',', $flag);
            else $flag = $flag;            
            $flag = ' AND Account_Flag IN ('.$flag.')';    
        }        
        
        if (! $detail_only) 
        {
            $group=''; 
        }
        else
        {
            $group = ' AND Account_Is_Group = 0';    
        }
        
        if (!$order_by) {$order_by='';}
        
        $where = ' WHERE 1=1 AND Account_Is_Active=1 ' . $flag . $type . $group ;                
        $limit = ' LIMIT '. (($offset==0) ? $limit : $offset.','.$limit);
        $select = 'SELECT COUNT(*) AS total_records FROM account ' . $where;
        $result = $this->db->query($select);        
        $res = $result->row_array();
        $total_record = $res['total_records'];

        $select = 'SELECT Account_Number, Account_Name, account.Account_Type, account_type.Account_Type_Name, Account_Is_Group, Account_Level, Account_Flag, Account_Currency, Account_Reconcialable FROM account  
                     INNER JOIN account_type ON (account.Account_Type=account_type.Account_Type) ' . $where . $order_by . $limit;
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return array('total_records' => 0, 'query_result' => false);        
        return array('total_records' => $total_record, 'query_result' => $result->result_array());
    }
    
    function get_account_for_option($type=false, $flag=false, $detail_only=true, $selected_account=false)
    {
        if (! $type) { $type=''; }
        else
        {
            if (is_array($type)) $type = implode(',', $type);
            else $type = $type;            
            $type = ' AND Account_Type IN ('.$type.')';    
        }                
        if (! $flag) { $flag=''; }
        else
        {
            if (is_array($flag)) $flag = implode(',', $flag);
            else $flag = $flag;            
            $flag = ' AND Account_Flag IN ('.$flag.')';    
        }
        if (! $detail_only) { $group=''; } else { $group = ' AND Account_Is_Group = 0'; }        
        $where = ' WHERE 1=1 AND Account_Is_Active=1 ' . $flag . $type . $group ;                
        $select = 'SELECT Account_Number, Account_Name FROM account ' . $where;
        $result = $this->db->query($select);        
        $ret_='';
        if ($result->num_rows > 0) 
        {
            foreach ($result->result_array() as $res)
            {
                $ret_ .= '<option ' . (($selected_account != $res['Account_Number']) ? '' : 'selected' ) . ' values="'.$res['Account_Number'].'" >'.$res['Account_Number'].' - '.$res['Account_Name'].'</option>';
            }
        }
        return $ret_;        
                
    }
    
    function get_account_info($account_number=false)
    {
        if (! $account_number) return false;
        $select = 'SELECT account.*, account_type.Account_Type_Name FROM account  
                     INNER JOIN account_type ON (account.Account_Type=account_type.Account_Type) WHERE account.Account_Number="' . $account_number . '"';
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return false;        
        return $result->row_array();        
    }
    
    function add_new_account()
    {
        $this->load->library('form_validation');
		$validation_rules = array(
			array('field' => 'account_number', 'label' => 'Nomor Rekening', 'rules' => 'required|callback_account_available'),
			array('field' => 'account_name', 'label' => 'Nama Rekening', 'rules' => 'required|max_length[80]|min_length[3]'),
		);
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $ip_address = $this->input->ip_address();
            $now = date('Y-m-d H:i:s', time());
            $sql_insert = array(
    			'Account_Number' => $this->input->post('account_number'),
                'Account_Name' => $this->input->post('account_name'),
                'Account_Type' => $this->input->post('account_type'),
                'Account_Is_Group' => 0,
                'Account_Level' => 2,
                'Account_Parent' => $this->input->post('account_type'),
                'Created_By' => 'System',
                'Created_Date' => $now,
                'Creator_Ip' => $ip_address
            );
            $this->db->trans_start();
            $this->db->insert('account', $sql_insert);      
            $account_id = $this->db->insert_id();
            $this->db->trans_complete();
            return true;               
        }
        else
        {
		  $this->data['message'] = validation_errors('<span class="error_msg">', '</span></br>');            
        }        
        return false;                       
    }
    
    function edit_account()
    {
        $this->load->library('form_validation');
		$validation_rules = array(
			array('field' => 'account_name', 'label' => 'Nama Rekening', 'rules' => 'required|max_length[80]|min_length[3]')
		);
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $ip_address = $this->input->ip_address();
            $now = date('Y-m-d H:i:s', time());
            $sql_insert = array(
                'Account_Name' => $this->input->post('account_name'),
                'Account_Type' => $this->input->post('account_type'),
                'Last_Updated_By' => 'System',
                'Last_Updated_Date' => $now,
                'Last_Updated_Ip' => $ip_address
            );
            $this->db->trans_start();
            $this->db->where('Account_Number', $this->input->post('account_number'));            
            $this->db->update('account', $sql_insert);      
            $this->db->trans_complete();
            return true;               
        }
        else
        {
		  $this->data['message'] = validation_errors('<span class="error_msg">', '</span></br>');
          //die('disini');            
        }        
        return false;                       
    }
    
    function delete_account($account_number)
    {
        $aRet_ = array('result' => 0, 'message' => 'Rekening memiliki transaksi/saldo');        
        $count = $this->db->where('Account_Number', $account_number)->count_all('account_mutasi');
        if ($count > 0) return $aRet_;
        $count = $this->db->where('Account_Number', $account_number)->count_all('account_mutasi_identitas');
        if ($count > 0) return $aRet_;
        $count = $this->db->where('Account_Number', $account_number)->count_all('account_mutasi_project');
        if ($count > 0) return $aRet_;
        $count = $this->db->where('Account_Number', $account_number)->count_all('account_mutasi_unit');
        if ($count > 0) return $aRet_;

        $count = $this->db->where('PVD_Nomor_Rekening_Lawan', $account_number)->count_all('fin_payment_voucher_d');
        if ($count > 0) {$aRet_['message']='Rekening digunakan pada voucher pengeluaran kas/bank'; return $aRet_;}
        $count = $this->db->where('PV_Account_Number', $account_number)->count_all('fin_payment_voucher');
        if ($count > 0) {$aRet_['message']='Rekening digunakan pada voucher pengeluaran kas/bank'; return $aRet_;}

        $count = $this->db->where('RVD_Nomor_Rekening_Lawan', $account_number)->count_all('fin_receipt_voucher_d');
        if ($count > 0) {$aRet_['message']='Rekening digunakan pada voucher penerimaan kas/bank'; return $aRet_;}
        $count = $this->db->where('RV_Account_Number', $account_number)->count_all('fin_receipt_voucher');
        if ($count > 0) {$aRet_['message']='Rekening digunakan pada voucher penerimaan kas/bank'; return $aRet_;}

        $count = $this->db->where('JD_Account_Number', $account_number)->count_all('gl_jurnal_detail');
        if ($count > 0) {$aRet_['message']='Rekening digunakan pada voucher jurnal'; return $aRet_;}
        $count = $this->db->where('Jurnal_Account_Number', $account_number)->count_all('gl_jurnal');
        if ($count > 0) {$aRet_['message']='Rekening digunakan pada voucher jurnal'; return $aRet_;}
        
        $this->db->trans_start();
        $count = $this->db->count_all('account');
        $this->db->where('Account_Number', $account_number);            
        $this->db->delete('account');
        $new_count = $this->db->count_all('account');      
        $this->db->trans_complete();
        $aRet_['result'] =$count - $new_count; 
        return $aRet_;               
    }    
}

/* End of file flexi_auth_model.php */
/* Location: ./application/controllers/flexi_auth_model.php */
