<?php
/*
    File        :   Payment_Voucher.php
    Tipe        :   CI Controller
    Author      :   Fajrie R Aradea      
    Keterangan  :   Manage Pengeluaran Kas/Bank
*/

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_voucher extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
		
        $this->data=null;
		$this->load->database();
		$this->load->library('session');        
 		$this->load->helper('url');
        $this->load->model('payment_voucher_model');
        // Cek otoritas disini
    }     
     
	public function index()
	{
        // Cek otoritas disini
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $rv_res=$this->payment_voucher_model->get_payment_header_lists();
        $this->data['total_records'] = $rv_res['total_records'];
        $this->data['rv_headers'] = $rv_res['query_result'];
        $this->load->view('finance/pvh_list', $this->data);	
	}
    
    
    public function voucher_available($nomor_voucher)
    {
        return $this->payment_voucher_model->voucher_available($nomor_voucher);    
    }
        
    public function add_new()
    {

        // cek otoritas disini
        
        $this->load->library('form_validation');
        if ($this->input->post('simpan')) 
        {
            if ($this->payment_voucher_model->add_new_voucher()) 
            {
                redirect('payment_voucher');
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
        $this->load->view('finance/pvh', $this->data);
        	
    }
    
    public function edit()
    {
        
        // cek otoritas disini
        $this->load->library('form_validation');
        if ($this->input->post('simpan')) 
        {
            $rv_nomor = $this->input->post('PV_Nomor');
            if ($this->payment_voucher_model->edit_voucher()) 
            {
                redirect('payment_voucher');
                return true;
            }
        }
        else
        {
            if (! isset($_GET['rv'])) redirect('payment_voucher');
            $rv_nomor = $_GET['rv'];            
        }
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];        
        $this->load->model('account_model'); 
        $flag=array(0 => 1, 1 => 2);
        $this->data['pvh'] = $this->payment_voucher_model->get_payment_header_info($rv_nomor);
        if (! $this->data['pvh']) 
        {
            redirect('payment_voucher');
            return true;            
        }
        $this->data['account_list'] = $this->account_model->get_account_for_option(1, $flag, false, $this->data['pvh']['PV_Account_Number']);
        $this->load->model('unit_model'); 
        $this->data['unit_list'] = $this->unit_model->get_unit_for_option($this->data['pvh']['PV_Unit_Code']);
        $this->load->model('identitas_model'); 
        $this->data['identitas_list'] = $this->identitas_model->get_identitas_for_option($this->data['pvh']['PV_Identitas']);        
        $this->load->model('project_model'); 
        $this->data['project_list'] = $this->project_model->get_project_for_option($this->data['pvh']['PV_Project_Contract_Number']);        
        $this->data['rvds'] = $this->payment_voucher_model->get_payment_detail_by_voucher($rv_nomor);        
        $this->load->view('finance/pvh_edit', $this->data);	
    }    
        
    public function ajax_delete_voucher()
    {
		if (! $this->input->is_ajax_request()) die(true);

        // Cek otoritas disini
        $rv_nomor = $_GET['rv'];
        $aRet = array('result' => false,  'message' => 'Data gagal dihapus', 'newdata' => '', 'target' =>'');        
        $result = $this->payment_voucher_model->delete_voucher($rv_nomor);
        $aRet['message'] = $result['message'];
        if ($result['result'] > 0) 
        {
    		$aRet['result'] = true;
    		$aRet['message'] = 'Voucher berhasil dihapus';
            $aRet['target'] = preg_replace('~[!"#\$%&/\(\)=\?\*\+\'-\.,;:_]~', '', $rv_nomor);                              
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
        $aRet['newdata'] = $this->load->view('finance/pvh_add_row', $this->data, true);	
         echo json_encode($aRet);
    }
    
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */