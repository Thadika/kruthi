
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class loginm extends CI_Model
{

	function logout()
 	{
 	 $this->load->driver('cache');
    $this->session->sess_destroy();
    $this->cache->clean();
    ob_clean(); 
	redirect(BASE);
 	}
	
	function islogin()
	{
		if(!$this->session->userdata('logged_in') && $this->session->userdata('logged_in')!=1001 ){
			redirect(BASE);
			
		}
	}
	
	function checklogin()
	{
	  	$email 		= $this->input->post("email");
        $password 	= $this->input->post("password");

        $password    = md5($password);
        
      	$this->db->select('id, email , name, password');
		$this->db->from('login');
		$this->db->where('email',$email);
		$query 			= $this->db->get();

	    $numberOfRow 	= $query->num_rows();
	    if($numberOfRow==1){
	    	$query 		= $query->row();
		$userName		= $query->name;
		$userEmail		= $query->email;
		$userPassword	= $query->password;

		if($password==$userPassword  && $email==$userEmail){
		
				$newdata 	= array(
				'logUser'  	=> $userName,
        		'logemail'  => $userEmail,
				'logged_in' => 1001
			);
				$this->session->set_userdata($newdata);
					return 'success';
			
		}else{
			
			return 'err';
		}
	    }
		
	
	}
		
}
