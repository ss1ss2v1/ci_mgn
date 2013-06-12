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

class M_customer extends CI_Model
{
	public function __construct() {
	   
		$this->load->database();  
        
	}
    
	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}

   
    function customer_available($nomor_customer)
    {
        $result = $this->db->query('SELECT COUNT(*) AS total_row FROM ar_customers WHERE Customer_Kode="'.$nomor_customer.'"');
        $res = $result->row_array();
        if ($res['total_row']>0) {
            $this->form_validation->set_message('customer_available', 'Kode Customer sudah digunakan');
            return false;
        }
        return true;                
    }
    
 
    function get_customer_header_lists($filter=false, $type=false, $flag=false, $order_by=false, $exclude_id=false, $offset=0, $limit=20, $for_link_only=true)
    {
        if (!$order_by) {$order_by=' ORDER BY Customer_Nomor_Record DESC';}        
        $where = ' WHERE 1=1 AND Customer_Is_Active=1 ';                
        $limit = ' LIMIT '. (($offset==0) ? $limit : $offset.','.$limit);
        $select = 'SELECT COUNT(*) AS total_records FROM ar_customers ' . $where;
        $result = $this->db->query($select);        
        $res = $result->row_array();
        $total_record = $res['total_records'];

        $select = 'SELECT * FROM ar_customers ' . $where . $order_by . $limit;
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return array('total_records' => 0, 'query_result' => false);        
        return array('total_records' => $total_record, 'query_result' => $result->result_array());
    }
    
    
   
   function get_customer_header_info($rv_nomor)
    {
        if (! $rv_nomor) return false;
        $select = 'SELECT * FROM ar_customers WHERE ar_customers.Customer_Kode="' . $rv_nomor . '"';
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return false;        
        return $result->row_array();        
    }
    
    function add_customer()
    {
		$validation_rules = array(
			array('field' => 'Customer_Kode', 'label' => 'Kode Customer', 'rules' => 'required|callback_customer_available'),
			array('field' => 'Customer_Perusahaan', 'label' => 'Customer Perusahaan', 'rules' => 'required|max_length[20]'),
            array('field' => 'Customer_Kontak', 'label' => 'Customer Kontak', 'rules' => 'max_length[20]'),
            array('field' => 'Customer_Alamat', 'label' => 'Customer Alamat', 'rules' => 'max_length[20]'),
            array('field' => 'Customer_Kota', 'label' => 'Customer Kota', 'rules' => 'max_length[20]'),
            array('field' => 'Customer_Kode_Pos', 'label' => 'Customer Kode Pos', 'rules' => 'max_length[20]'),
            array('field' => 'Customer_Email', 'label' => 'Customer Email', 'rules' => 'max_length[20]|valid_email'),
            array('field' => 'Customer_Telepon_1', 'label' => 'Customer Telepon 1', 'rules' => 'max_length[20]'),
            array('field' => 'Customer_Telepon_2', 'label' => 'Customer Telepon 2', 'rules' => 'max_length[20]'),
            array('field' => 'Customer_Fax', 'label' => 'Customer Fax', 'rules' => 'max_length[20]'),
            array('field' => 'Customer_NPWP', 'label' => 'Customer NPWP', 'rules' => 'max_length[20]'),
            array('field' => 'Customer_Alamat_Pajak', 'label' => 'Customer Alamat Pajak', 'rules' => 'max_length[20]'),
            
            
            
		);
        
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $sql_insert = array(
    			'Customer_Kode' => $this->input->post('Customer_Kode'),
                'Customer_Perusahaan' => $this->input->post('Customer_Perusahaan'),
                'Customer_Kontak' => $this->input->post('Customer_Kontak'),
                'Customer_Alamat' => $this->input->post('Customer_Alamat'),
                'Customer_Kota' => $this->input->post('Customer_Kota'),
                'Customer_Kode_Pos' => $this->input->post('Customer_Kode_Pos'),
                'Customer_Email' => $this->input->post('Customer_Email'),
                'Customer_Telepon_1' => $this->input->post('Customer_Telepon_1'),
                'Customer_Telepon_2' => $this->input->post('Customer_Telepon_2'),
                'Customer_Fax' => $this->input->post('Customer_Fax'),
                'Customer_Pakai_Pajak' => $this->input->post('Customer_Pakai_Pajak'),
                'Customer_NPWP' => $this->input->post('Customer_NPWP'),
                'Customer_PKP' => $this->input->post('Customer_PKP'),
                'Customer_Alamat_Pajak' => $this->input->post('Customer_Alamat_Pajak'),
                'Customer_Tanggal_PKP' => $this->input->post('Customer_Tanggal_PKP')
            );
            $this->db->insert('ar_customers', $sql_insert);      
            return true;               
        }
        else
        {
		  $this->data['message'] = validation_errors('<span class="error_msg">', '</span></br>');            
        }        
        return false;                       
    }
    
    function edit_customer()
    {
		$validation_rules = array(
			         	array('field' => 'Customer_Perusahaan', 'label' => 'Customer Perusahaan', 'rules' => 'required'),
                        
		);
        
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
             $sql_update = array(
    			'Customer_Kode' => $this->input->post('Customer_Kode'),
                'Customer_Perusahaan' => $this->input->post('Customer_Perusahaan'),
                'Customer_Kontak' => $this->input->post('Customer_Kontak'),
                'Customer_Alamat' => $this->input->post('Customer_Alamat'),
                'Customer_Kota' => $this->input->post('Customer_Kota'),
                'Customer_Kode_Pos' => $this->input->post('Customer_Kode_Pos'),
                'Customer_Email' => $this->input->post('Customer_Email'),
                'Customer_Telepon_1' => $this->input->post('Customer_Telepon_1'),
                'Customer_Telepon_2' => $this->input->post('Customer_Telepon_2'),
                'Customer_Fax' => $this->input->post('Customer_Fax'),
                'Customer_Pakai_Pajak' => $this->input->post('Customer_Pakai_Pajak'),
                'Customer_NPWP' => $this->input->post('Customer_NPWP'),
                'Customer_PKP' => $this->input->post('Customer_PKP'),
                'Customer_Alamat_Pajak' => $this->input->post('Customer_Alamat_Pajak'),
                'Customer_Tanggal_PKP' => $this->input->post('Customer_Tanggal_PKP')
            );
            $this->db->where('Customer_Kode', $this->input->post('Customer_Kode'));                  
            $this->db->update('ar_customers', $sql_update);                     
            return true;               
        }
        else
        {
		  $this->data['message'] = validation_errors('<span class="error_msg">', '</span></br>');            
        }        
        return false;                       
    }   
    
    function delete_customer($cs_nomor)
    {
        $aRet_ = array('result' => 0, 'message' => '');        
        $this->db->trans_start();
        // hitung data awal
        $count = $this->db->count_all('ar_customers');

        // Hapus data 
        $this->db->where('Customer_Kode', $cs_nomor);            
        $this->db->delete('ar_customers');
        
        // hitung data sekarang
        $new_count = $this->db->count_all('ar_customers');      

        $this->db->trans_complete();
        $aRet_['result'] =$count - $new_count; 
        return $aRet_;               
    }    
    
    
    function get_customer_transaksi_by_kode_customer($rv_nomor=false)
    {
        if (!$rv_nomor) return false;
        $select = 'SELECT ar_customer_transaksi.* FROM ar_customer_transaksi WHERE ar_customer_transaksi.Kode_Customer="'. $rv_nomor . '" ORDER BY Tanggal_Transaksi';
        $result = $this->db->query($select);        
        return $result->result_array();
    }      
    
    function get_customer_historis_by_kode_customer($rv_nomor=false)
    {
        if (!$rv_nomor) return false;
        $select = 'SELECT ar_customer_historis.* FROM ar_customer_historis WHERE ar_customer_historis.Kode_Customer="'. $rv_nomor . '" ORDER BY Nomor_Record';
        $result = $this->db->query($select);        
        return $result->result_array();
    }      
    
    function get_customer_account_by_kode_customer($rv_nomor=false)
    {
        if (!$rv_nomor) return false;
        $select = 'SELECT ar_customer_accounts.* FROM ar_customer_accounts WHERE ar_customer_accounts.Kode_Customer="'. $rv_nomor . '" ORDER BY Kode_Customer';
        $result = $this->db->query($select);        
        return $result->result_array();
    }      
 
}



/* End of file flexi_auth_model.php */
/* Location: ./application/controllers/flexi_auth_model.php */
?>