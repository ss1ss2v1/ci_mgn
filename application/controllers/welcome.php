<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
		
        $this->data=null;
		$this->load->database();
 		$this->load->helper('url');
 		$this->load->helper('form');
        $this->load->model('account_model');
    }     
         
	public function index()
	{
    	$this->load->helper('url');
    	$this->load->view('welcome_message');	
	}

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */