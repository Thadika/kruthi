<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class loginc extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		global $data;
		$this->load->helper('url');
	}

	public function index()
	{
		  if (isset($this->session->userdata['logged_in'])){
       			 redirect(BASE.'welcome');
    	  }
    	   $this->load->view('login');
	}
	
	public function checklogin()
	{
		$this->load->model('loginm');
		$result=$this->loginm->checklogin();
		if($result=='success'){
			redirect(BASE.'welcome');
		}else{
			$data = array(
		    'err1' => 'please check your username and password',
		    
		);

			$this->load->view('login',$data);
		}
		
	}
	
	public function logout()
	{
		
		$this->load->model('loginm');
		$this->loginm->logout();
	}
	
}