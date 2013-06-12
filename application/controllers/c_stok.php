<?php
/*
    File        :   Account.php
    Tipe        :   CI Controller
    Author      :   Fajrie R Aradea      
    Keterangan  :   Manage daftar rekening
*/

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_stok extends CI_Controller {
    
    function __construct() 
    {
        parent::__construct();
		
        $this->data=null;
		$this->load->database();
		$this->load->library('session');        
 		$this->load->helper('url');
        $this->load->model('m_stok');
        // Cek otoritas disini
    }    
    
    	public function index()
	{
        // Cek otoritas disini
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $stk_res=$this->m_stok->get_stok_header_lists();
        $this->data['total_records'] = $stk_res['total_records'];
        $this->data['stk_headers'] = $stk_res['query_result'];
        $this->load->view('stok/stok_list', $this->data);	

	} 
    
    function stok_available($nomor_stok)
    {
        return $this->m_stok->stok_available($nomor_stok);
    }
    
    
    public function add_new()
    {

        $this->load->library('form_validation');
        if ($this->input->post('simpan')) 
        {
            if ($this->m_stok->add_stok()) 
            {
                redirect('c_stok');
                return true;
            }
        }
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];               
        $this->load->view('stok/stok', $this->data);	
    }
    
     public function edit()
    {
        
        // cek otoritas disini
        $stk_nomor = $_GET['stk'];
        $this->load->library('form_validation');
        if ($this->input->post('simpan')) 
        {
            if ($this->m_stok->edit_stok()) 
            {
                redirect('c_stok');
                return true;
            }
        }
        $this->data['rvh'] = $this->m_stok->get_stok_header_info($stk_nomor);
        if (! $this->data['rvh']) 
        {
                redirect('c_stok');
                return true;            
        }
        $this->load->view('stok/stok_edit', $this->data);	
    }    
    
    public function ajax_delete_stok()
    {
		if (! $this->input->is_ajax_request()) die(true);

        // Cek otoritas disini
        $stk_nomor = $_GET['stk'];
        $aRet = array('result' => false,  'message' => 'Data gagal dihapus', 'newdata' => '', 'target' =>'');        
        $result = $this->m_stok->delete_stok($stk_nomor);
        $aRet['message'] = $result['message'];
        if ($result['result'] > 0) 
        {
    		$aRet['result'] = true;
    		$aRet['message'] = 'Stok berhasil dihapus';
            $aRet['target'] = preg_replace('~[!"#\$%&/\(\)=\?\*\+\'-\.,;:_]~', '', $stk_nomor);                              
        }
        echo json_encode($aRet);                                                
    }      
    
}
    
?>