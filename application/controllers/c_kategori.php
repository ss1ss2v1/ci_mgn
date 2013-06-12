<?php
/*
    File        :   Account.php
    Tipe        :   CI Controller
    Author      :   Fajrie R Aradea      
    Keterangan  :   Manage daftar rekening
*/

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_kategori extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
		
        $this->data=null;
		$this->load->database();
		$this->load->library('session');        
 		$this->load->helper('url');
        $this->load->model('m_kategori');
        // Cek otoritas disini
    }     
     
	public function index()
	{
        // Cek otoritas disini
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $cs_res=$this->m_kategori->get_kategori_header_lists();
        $this->data['total_records'] = $cs_res['total_records'];
        $this->data['kd_headers'] = $cs_res['query_result'];
        $this->load->view('kategori/kd_list', $this->data);	
	}
    
    function kategori_available($nomor_kategori)
    {
        return $this->m_kategori->kategori_available($nomor_kategori);
    }
    
    public function add_new()
    {

        $this->load->library('form_validation');
        if ($this->input->post('simpan')) 
        {
            if ($this->m_kategori->add_kategori()) 
            {
                redirect('c_kategori');
                return true;
            }
        }
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];               
        $this->load->view('kategori/kd', $this->data);	
    }
    
    public function edit()
    {
        
        // cek otoritas disini
        $kd_nomor = $_GET['kd'];
        $this->load->library('form_validation');
        if ($this->input->post('simpan')) 
        {
            if ($this->m_kategori->edit_kategori()) 
            {
                redirect('c_kategori');
                return true;
            }
        }
        $this->data['rvh'] = $this->m_kategori->get_kategori_header_info($kd_nomor);
        if (! $this->data['rvh']) 
        {
                redirect('c_kategori');
                return true;            
        }
        $this->load->view('kategori/kd_edit', $this->data);	
    }    
    
        
    public function ajax_delete_kategori()
    {
		if (! $this->input->is_ajax_request()) die(true);

        // Cek otoritas disini
        $kd_nomor = $_GET['kd'];
        $aRet = array('result' => false,  'message' => 'Data gagal dihapus', 'newdata' => '', 'target' =>'');        
        $result = $this->m_kategori->delete_kategori($kd_nomor);
        $aRet['message'] = $result['message'];
        if ($result['result'] > 0) 
        {
    		$aRet['result'] = true;
    		$aRet['message'] = 'Kode Kategori berhasil dihapus';
            $aRet['target'] = preg_replace('~[!"#\$%&/\(\)=\?\*\+\'-\.,;:_]~', '', $kd_nomor);                              
        }
        echo json_encode($aRet);                                                
    }      
    
    public function ajax_request_new_row()
    {
        $n = $_GET['n'];
        $aRet = array('result' => false,  'message' => 'Data gagal dihapus', 'newdata' => '', 'target' =>'');        
        $aRet['result'] = true;
        $this->data['row']= $n + 1;                           
        $aRet['message'] = 'baris baru';
        $aRet['newdata'] = $this->load->view('kategori/kd_add_row', $this->data, true);	
         echo json_encode($aRet);
    }
    
    
    
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */