<?php
/*
    File        :   Account.php
    Tipe        :   CI Controller
    Author      :   Fajrie R Aradea      
    Keterangan  :   Manage daftar rekening
*/

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
		
        $this->data=null;
		$this->load->database();
		$this->load->library('session');        
 		$this->load->helper('url');
        $this->load->model('account_model');
        // Cek otoritas disini
    }     
     
	public function index()
	{
        // Cek otoritas disini
        $this->data['account_type'] = $this->account_model->get_account_tipe_list();        
        $this->load->view('gl/account_list', $this->data);	
	}
    
    public function ajax_get_acc_list()
    {
		if (! $this->input->is_ajax_request()) die(true);
        $acc_type = $_GET['t'];
        $aRet = array('result' => false,  'message' => '', 'newform' => '');
        // Cek otoritas disini
        $acc_data=$this->account_model->get_account_lists($acc_type,false,true);
        $this->data['account']=$acc_data['query_result']; 
        $this->data['account_type']=$acc_type; 
        $aRet['result'] = true;
        $aRet['message'] = $this->load->view('gl/account_detail', $this->data, true);
        echo json_encode($aRet);                        
    }
    
    public function ajax_add_request()
    {
		if (! $this->input->is_ajax_request()) die(true);
        $acc_type = $_GET['t'];
        $aRet = array('result' => false,  'message' => '', 'newform' => '');
        // Cek otoritas disini
        $this->data['with_script']=true; 
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
 		$this->load->helper('form');
        $this->data['account_type']=$acc_type;
        $aRet['result'] = true;
        $aRet['message'] = $this->load->view('gl/account_add_request', $this->data, true);
        echo json_encode($aRet);                                
    }
    
    public function ajax_add_account()
    {
		if (! $this->input->is_ajax_request()) die(true);
        $aRet = array('result' => false,  'message' => '', 'newdata' => '');
        $this->data['account_type'] = $this->input->post('account_type');
        // Cek otoritas disini
        if ($this->account_model->add_new_account()) 
        {
            $new_account=$this->account_model->get_account_info($this->input->post('account_number'));
            if ($new_account != false)
            {
                $aRet['newdata'] = '<li id="acc_'.str_replace('.','',$new_account['Account_Number']).'">  
                    <ul class="acc_detail_row">
                        <li class="tb_col" style="width:14px"><img src="'.base_url().'includes/icons/cross_10.png" title="Hapus rekening" onclick="f_delete_account('.$new_account['Account_Type'].',\''.$new_account['Account_Number'].'\')" /></li>
                        <li class="tb_col" style="width:14px"><img src="'.base_url().'includes/icons/edit_10.png" title="Ubah rekening" onclick="f_edit_account('.$new_account['Account_Type'].',\''.$new_account['Account_Number'].'\')" /></li>
                        <li class="tb_col" style="width:100px">'.$new_account['Account_Number'].'</li>
                        <li class="tb_col" style="width:260px">'.$new_account['Account_Name'].'</li>
                    </ul>
                </li>';         
            }
            else
            {
                 $aRet['newdata'] = $this->input->post('account_number');
            }
            $aRet['result'] = true;
        }
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
 		$this->load->helper('form');
        $this->data['with_script']=false; 
        $aRet['message'] = $this->load->view('gl/account_add_request', $this->data, true);
        echo json_encode($aRet);                                
        
    }
    
    public function account_available($account_number)
    {
        $result = $this->db->query('SELECT COUNT(*) AS total_row FROM account WHERE Account_Number="'.$account_number.'"');
        $res = $result->row_array();
        if ($res['total_row']>0) {
            $this->form_validation->set_message('account_available', 'Nomor rekening sudah digunakan');
            return false;
        }
        return true;        
    }
    
    public function ajax_edit_request()
    {
		if (! $this->input->is_ajax_request()) die(true);
        $acc_type = $_GET['t'];
        $acc_number = $_GET['s'];
        $aRet = array('result' => false,  'message' => '', 'newform' => '');
        // Cek otoritas disini
        $this->data['with_script']=true; 
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
 		$this->load->helper('form');
        $account_info=$this->account_model->get_account_info($acc_number);
        if ($account_info != false) 
        {       
            $this->data['account_type']=$acc_type;
            $this->data['account_number']=$acc_number;
            $this->data['account_name']=$account_info['Account_Name'];
            $aRet['result'] = true;
            $aRet['message'] = $this->load->view('gl/account_edit_request', $this->data, true);
        }
        echo json_encode($aRet);                                
    }       
    
    public function ajax_edit_account()
    {
		if (! $this->input->is_ajax_request()) die(true);
        $aRet = array('result' => false,  'message' => '', 'newdata' => '', 'target' =>'');
        $this->data['account_type'] = $this->input->post('account_type');
        // Cek otoritas disini
        if ($this->account_model->edit_account()) 
        {
            $account_info=$this->account_model->get_account_info($this->input->post('account_number'));
            if ($account_info != false)
            {
                $aRet['newdata'] = '<ul class="acc_detail_row">
                        <li class="tb_col" style="width:14px"><img src="'.base_url().'includes/icons/cross_10.png" title="Hapus rekening" onclick="f_delete_account('.$account_info['Account_Type'].',\''.$account_info['Account_Number'].'\')" /></li>
                        <li class="tb_col" style="width:14px"><img src="'.base_url().'includes/icons/edit_10.png" title="Ubah rekening" onclick="f_edit_account('.$account_info['Account_Type'].',\''.$account_info['Account_Number'].'\')" /></li>
                        <li class="tb_col" style="width:100px">'.$account_info['Account_Number'].'</li>
                        <li class="tb_col" style="width:260px">'.$account_info['Account_Name'].'</li>
                    </ul>';  
                $aRet['target']=str_replace('.','',$account_info['Account_Number']);      
            }
            else
            {
                 $aRet['newdata'] = $this->input->post('account_number');
            }
            $aRet['result'] = true;
        }
        else
        {
            $this->data['account_number']=$this->input->post('account_number');
            $this->data['account_name']=$this->input->post('account_name');            
        }
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
 		$this->load->helper('form');
        $this->data['with_script']=false; 
        $aRet['message'] = $this->load->view('gl/account_edit_request', $this->data, true);
        echo json_encode($aRet);                                
        
    }    
    
    public function ajax_delete_request()
    {
		if (! $this->input->is_ajax_request()) die(true);
        $acc_type = $_GET['t'];
        $acc_number = $_GET['s'];
        $aRet = array('result' => false,  'message' => '', 'newdata' => '', 'target' =>'');
        // Cek otoritas disini
        $this->data['with_script']=true; 
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
 		$this->load->helper('form');
        $account_info=$this->account_model->get_account_info($acc_number);
        if ($account_info != false) 
        {       
            $this->data['account'] = $account_info;
            $aRet['result'] = true;
            $aRet['message'] = $this->load->view('gl/account_delete_request', $this->data, true);
        }
        echo json_encode($aRet);                                
    }
    
    public function ajax_delete_account()
    {
		if (! $this->input->is_ajax_request()) die(true);
        $acc_type = $this->input->post('account_type');
        $acc_number = $this->input->post('account_number');
        $aRet = array('result' => false,  'message' => 'Data gagal dihapus', 'newdata' => '', 'target' =>'');
        // Cek otoritas disini
        
        $result = $this->account_model->delete_account($acc_number);
        $aRet['message'] = $result['message'];
        if ($result['result'] > 0) 
        {
    		$aRet['result'] = true;
    		$aRet['message'] = 'Rekening berhasil dihapus';
            $aRet['target']=str_replace('.','',$acc_number );                              
        }
        echo json_encode($aRet);                                                
    }      
    
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */