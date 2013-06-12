<?php

/**
 * @author Fajrie R Aradea
 * @copyright 2013
 */


?>

<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: Bisfren Ad Model
*
*/

Class M_stok extends CI_Model
{
    public function __construct(){
        
        $this->load->database();
    }
    
    public function &__get($key){
        
        $CI =& get_instance();
        return $CI->$key; 
    }
    
    public function get_stok_header_lists($filter=false, $type=false, $flag=false, $order_by=false, $exclude_id=false, $offset=0, $limit=20, $for_link_only=true){
        
        if(! $order_by) {$order_by='ORDER BY STK_Kode_Stok DESC';}       
       // $where = ' WHERE 1=1 AND Customer_Is_Active=1 ';                
        $limit = ' LIMIT '. (($offset==0) ? $limit : $offset.','.$limit);
        $select = 'SELECT COUNT(*) AS total_records FROM tb_stok ' ;
        $result = $this->db->query($select);        
        $res = $result->row_array();
        $total_record = $res['total_records'];

        $select = 'SELECT * FROM tb_stok '. $order_by . $limit;
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return array('total_records' => 0, 'query_result' => false);        
        return array('total_records' => $total_record, 'query_result' => $result->result_array());
    }
    
    function stok_available($nomor_stok)
    {
        $result = $this->db->query('SELECT COUNT(*) AS total_row FROM tb_stok WHERE STK_Kode_Stok="'.$nomor_stok.'"');
        $res = $result->row_array();
        if ($res['total_row']>0) {
            $this->form_validation->set_message('stok_available', 'Kode Stok sudah digunakan');
            return false;
        }
        return true;                
    }
    
     function get_stok_header_info($stk_nomor)
    {
        if (! $stk_nomor) return false;
        $select = 'SELECT * FROM tb_stok WHERE tb_stok.STK_Kode_Stok="' . $stk_nomor . '"';
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return false;        
        return $result->row_array();        
    }
    
    function add_stok()
    {
		$validation_rules = array(
			array('field' => 'STK_Kode_Stok', 'label' => 'STK Kode Stok', 'rules' => 'required|callback_stok_available'),  
            array('field' => 'STK_Nama_Stok', 'label' => 'STK Nama Stok', 'rules' => 'max_length[20]'),  
           	array('field' => 'STK_Deskripsi', 'label' => 'STK Deskripsi', 'rules' => 'max_length[20]'), 
           	array('field' => 'STK_Satuan', 'label' => 'STK Satuan', 'rules' => 'max_length[20]'),  
           	array('field' => 'STK_Kelompok_Stok', 'label' => 'STK Kelompok Stok', 'rules' => 'max_length[20]'),  
           	array('field' => 'STK_Kode_Kategori', 'label' => 'STK Kode Kategori', 'rules' => 'max_length[20]'),  
           	array('field' => 'STK_Minimum_Order', 'label' => 'STK Minimum Order', 'rules' => 'max_length[20]'),  
           	array('field' => 'STK_Waktu_Pengiriman', 'label' => 'STK Waktu Pengiriman', 'rules' => 'max_length[20]'),  
           	array('field' => 'STK_Jam_Pengerjaan', 'label' => 'STK Jam Pengerjaan', 'rules' => 'max_length[20]'),  
           	array('field' => 'STK_Jumlah_Tenaga_Kerja', 'label' => 'STK Jumlah Tenaga Kerja', 'rules' => 'max_length[20]'),  
           	array('field' => 'STK_Kode_Stok_Induk', 'label' => 'STK Kode Stok Induk', 'rules' => 'max_length[20]')  
		);
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $sql_insert = array(
    			'STK_Kode_Stok' => $this->input->post('STK_Kode_Stok'),
                'STK_Nama_Stok' => $this->input->post('STK_Nama_Stok'),
                'STK_Deskripsi' => $this->input->post('STK_Deskripsi'),
                'STK_Satuan' => $this->input->post('STK_Satuan'),
                'STK_Kelompok_Stok' => $this->input->post('STK_Kelompok_Stok'),
                'STK_Kode_Kategori' => $this->input->post('STK_Kode_Kategori'),
                'STK_Minimum_Order' => $this->input->post('STK_Minimum_Order'),
                'STK_Waktu_Pengiriman' => $this->input->post('STK_Waktu_Pengiriman'),
                'STK_Jam_Pengerjaan' => $this->input->post('STK_Jam_Pengerjann'),
                'STK_Jumlah_Tenaga_Kerja' => $this->input->post('STK_Jumlah_Tenaga_Kerja'),
                'STK_Kode_Stok_Induk' => $this->input->post('STK_Kode_Stok_Induk')
            );
            $this->db->insert('tb_stok', $sql_insert);      
            return true;               
        }
        else
        {
		  $this->data['message'] = validation_errors('<span class="error_msg">', '</span></br>');            
        }        
        return false;                       
    }
    
    function edit_stok()
    {
    
             $sql_update = array(
                'STK_Nama_Stok' => $this->input->post('STK_Nama_Stok'),
                'STK_Deskripsi' => $this->input->post('STK_Deskripsi'),
                'STK_Satuan' => $this->input->post('STK_Satuan'),
                'STK_Kelompok_Stok' => $this->input->post('STK_Kelompok_Stok'),
                'STK_Kode_Kategori' => $this->input->post('STK_Kode_Kategori'),
                'STK_Minimum_Order' => $this->input->post('STK_Minimum_Order'),
                'STK_Waktu_Pengiriman' => $this->input->post('STK_Waktu_Pengiriman'),
                'STK_Jam_Pengerjaan' => $this->input->post('STK_Jam_Pengerjaan'),
                'STK_Jumlah_Tenaga_Kerja' => $this->input->post('STK_Jumlah_Tenaga_Kerja'),
                'STK_Kode_Stok_Induk' => $this->input->post('STK_Kode_Stok_Induk'),
                
            );
            $this->db->where('STK_Kode_Stok', $this->input->post('STK_Kode_Stok'));                  
            $this->db->update('tb_stok', $sql_update);                     
            return true;               
        
                              
    }   
    
    function delete_stok($stk_nomor)
    {
        $aRet_ = array('result' => 0, 'message' => '');        
        $this->db->trans_start();
        // hitung data awal
        $count = $this->db->count_all('tb_stok');

        // Hapus data 
        $this->db->where('STK_Kode_Stok', $stk_nomor);            
        $this->db->delete('tb_stok');
        
        // hitung data sekarang
        $new_count = $this->db->count_all('tb_stok');      

        $this->db->trans_complete();
        $aRet_['result'] =$count - $new_count; 
        return $aRet_;               
    }    
}
?>