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

class M_kategori extends CI_Model
{
	public function __construct() {

		$this->load->database();
	   
	}
    
	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}

   
   
    
 
    function get_kategori_header_lists($filter=false, $type=false, $flag=false, $order_by=false, $exclude_id=false, $offset=0, $limit=20, $for_link_only=true)
    {
        if (!$order_by) {$order_by=' ORDER BY Nama_Kategori DESC';}        
        //$where = ' WHERE 1=1 AND Customer_Is_Active=1 ';                
        $limit = ' LIMIT '. (($offset==0) ? $limit : $offset.','.$limit);
        $select = 'SELECT COUNT(*) AS total_records FROM tb_kategori ' ;
        $result = $this->db->query($select);        
        $res = $result->row_array();
        $total_record = $res['total_records'];

        $select = 'SELECT * FROM tb_kategori ' . $order_by . $limit;
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return array('total_records' => 0, 'query_result' => false);        
        return array('total_records' => $total_record, 'query_result' => $result->result_array());
    }
    
   function get_kategori_header_info($kd_nomor)
    {
        if (! $kd_nomor) return false;
        $select = 'SELECT * FROM tb_kategori WHERE tb_kategori.Kode_Kategori="' . $kd_nomor . '"';
        $result = $this->db->query($select);        
        if ($result->num_rows == 0) return false;        
        return $result->row_array();        
    }
    
     function kategori_available($nomor_kategori)
    {
        $result = $this->db->query('SELECT COUNT(*) AS total_row FROM tb_kategori WHERE Kode_Kategori="'.$nomor_kategori.'"');
        $res = $result->row_array();
        if ($res['total_row']>0) {
            $this->form_validation->set_message('kategori_available', 'Kode Kategori sudah digunakan');
            return false;
        }
        return true;                
    }
    
    function add_kategori()
    {
		$validation_rules = array(
			array('field' => 'Kode_Kategori', 'label' => 'Kode Kategori', 'rules' => 'required|callback_kategori_available'),
          	array('field' => 'Nama_Kategori', 'label' => 'Nama Kategori', 'rules' => 'max_length[20]'),
            array('field' => 'Kelompok_Kategori', 'label' => 'Kelompok Kategori', 'rules' => 'max_length[20]') 
		);
        $this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run())
		{
            $sql_insert = array(
    			'Kode_Kategori' => $this->input->post('Kode_Kategori'),
                'Nama_Kategori' => $this->input->post('Nama_Kategori'),
                'Kelompok_Kategori' => $this->input->post('Kelompok_Kategori')
            );
            $this->db->insert('tb_kategori', $sql_insert);      
            return true;               
        }
        else
        {
		  $this->data['message'] = validation_errors('<span class="error_msg">', '</span></br>');            
        }        
        return false;                       
    }
    
    function edit_kategori()
    {
    
             $sql_update = array(
                'Nama_Kategori' => $this->input->post('Nama_Kategori'),
                'Kelompok_Kategori' => $this->input->post('Kelompok_Kategori')
            );
            $this->db->where('Kode_Kategori', $this->input->post('Kode_Kategori'));                  
            $this->db->update('tb_kategori', $sql_update);                     
            return true;               
        
                              
    }   
    
    function delete_kategori($kd_nomor)
    {
        $aRet_ = array('result' => 0, 'message' => '');        
        $this->db->trans_start();
        // hitung data awal
        $count = $this->db->count_all('tb_kategori');

        // Hapus data 
        $this->db->where('Kode_Kategori', $kd_nomor);            
        $this->db->delete('tb_kategori');
        
        // hitung data sekarang
        $new_count = $this->db->count_all('tb_kategori');      

        $this->db->trans_complete();
        $aRet_['result'] =$count - $new_count; 
        return $aRet_;               
    }    

}

/* End of file flexi_auth_model.php */
/* Location: ./application/controllers/flexi_auth_model.php */
