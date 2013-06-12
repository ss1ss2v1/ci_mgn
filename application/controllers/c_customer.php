<?php
/*
    File        :   Account.php
    Tipe        :   CI Controller
    Author      :   Fajrie R Aradea      
    Keterangan  :   Manage daftar rekening
*/

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_customer extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
		
        $this->data=null;
		$this->load->database();
		$this->load->library('session');        
 		$this->load->helper('url');
        $this->load->model('m_customer');
        // Cek otoritas disini
    }     
     
	public function index()
	{
        // Cek otoritas disini
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $cs_res=$this->m_customer->get_customer_header_lists();
        $this->data['total_records'] = $cs_res['total_records'];
        $this->data['cs_headers'] = $cs_res['query_result'];
        $this->load->view('customer/cs_list', $this->data);	

	}
    
    function customer_available($nomor_customer)
    {
        return $this->m_customer->customer_available($nomor_customer);
    }
    
 
    
    public function add_new()
    {

        // cek otoritas disini
        
        $this->load->library('form_validation');
        if ($this->input->post('simpan')) 
        {
            if ($this->m_customer->add_customer()) 
            {
                redirect('c_customer');
                return true;
            }
        }
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $this->load->model('account_model'); 
        $flag=array(0 => 1, 1 => 2);
        $this->data['account_list'] = $this->account_model->get_account_for_option(1, $flag, false);
        $this->load->model('unit_model'); 
        $this->data['unit_list'] = $this->unit_model->get_unit_for_option();        
        $this->load->model('identitas_model'); 
        $this->data['identitas_list'] = $this->identitas_model->get_identitas_for_option();        
        $this->load->model('project_model'); 
        $this->data['project_list'] = $this->project_model->get_project_for_option();        
        $this->load->view('customer/cs', $this->data);	
    }
    
    public function edit()
    {
        
        // cek otoritas disini
        $rv_nomor = $_GET['cs'];
        $this->load->library('form_validation');
        if ($this->input->post('simpan')) 
        {
            if ($this->m_customer->edit_customer()) 
            {
                redirect('c_customer');
                return true;
            }
        }
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $this->load->model('account_model'); 
        $flag=array(0 => 1, 1 => 2);
        $this->data['rvh'] = $this->m_customer->get_customer_header_info($rv_nomor);
        if (! $this->data['rvh']) 
        {
                redirect('c_customer');
                return true;            
        }
        $this->load->view('customer/cs_edit', $this->data);	
    }    
    
     public function view()
    {
    
        // cek otoritas disini
        $rv_nomor = $_GET['cs'];
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $this->data['rvh'] = $this->m_customer->get_customer_header_info($rv_nomor);
        if (! $this->data['rvh']) 
        {
                redirect('c_customer');
                return true;            
        }
        $this->data['rvds'] = $this->m_customer->get_customer_transaksi_by_kode_customer($rv_nomor);
        $this->load->view('customer/cs_trans', $this->data);	
    }    
    
    public function history()
    {
    
        // cek otoritas disini
        $rv_nomor = $_GET['cs'];
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $this->data['rvh'] = $this->m_customer->get_customer_header_info($rv_nomor);
        if (! $this->data['rvh']) 
        {
                redirect('c_customer');
                return true;            
        }
        $this->data['rvds'] = $this->m_customer->get_customer_historis_by_kode_customer($rv_nomor);
        $this->load->view('customer/cs_historis', $this->data);	
    }    
    
    public function account()
    {
    
        // cek otoritas disini
        $rv_nomor = $_GET['cs'];
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $this->data['rvh'] = $this->m_customer->get_customer_header_info($rv_nomor);
        if (! $this->data['rvh']) 
        {
                redirect('c_customer');
                return true;            
        }
        $this->data['rvds'] = $this->m_customer->get_customer_account_by_kode_customer($rv_nomor);
        $this->load->view('customer/cs_akun', $this->data);	
    }    
    
        
    public function ajax_delete_customer()
    {
		if (! $this->input->is_ajax_request()) die(true);

        // Cek otoritas disini
        $cs_nomor = $_GET['cs'];
        $aRet = array('result' => false,  'message' => 'Data gagal dihapus', 'newdata' => '', 'target' =>'');        
        $result = $this->m_customer->delete_customer($cs_nomor);
        $aRet['message'] = $result['message'];
        if ($result['result'] > 0) 
        {
    		$aRet['result'] = true;
    		$aRet['message'] = 'Pelanggan berhasil dihapus';
            $aRet['target'] = preg_replace('~[!"#\$%&/\(\)=\?\*\+\'-\.,;:_]~', '', $cs_nomor);                              
        }
        echo json_encode($aRet);                                                
    }      
    
    
    public function ajax_request_new_row()
    {
        $n = $_GET['n'];
        $aRet = array('result' => false,  'message' => 'Data gagal dihapus', 'newdata' => '', 'target' =>'');        
        $aRet['result'] = true;
        $this->data['row']= $n + 1;
        $this->load->model('account_model'); 
        $this->load->model('project_model'); 
        $this->load->model('identitas_model'); 
        $this->load->model('unit_model'); 
        $this->data['account_list'] = $this->account_model->get_account_for_option();                         
        $this->data['unit_list'] = $this->unit_model->get_unit_for_option();
        $this->data['identitas_list'] = $this->identitas_model->get_identitas_for_option();
        $this->data['project_list'] = $this->project_model->get_project_for_option();                             
        $aRet['message'] = 'baris baru';
        $aRet['newdata'] = $this->load->view('finance/rvh_add_row', $this->data, true);	
         echo json_encode($aRet);
    }
    
    
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */
?>