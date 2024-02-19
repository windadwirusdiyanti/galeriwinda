<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
		function __construct(){
		  parent::__construct();
		  $this->load->model('MUser');
		  $this->load->model('MSudi');
		}
	  
	  
		// login
		function index(){
		  $this->load->view('VLogin');
		}
		function authenticate(){
		  $user     = $this->input->post('User',TRUE);
		  $password = $this->input->post('Password',TRUE);
		  $validate = $this->MUser->validate($user,$password);
		  if($validate->num_rows() > 0){
			  $data   = $validate->row_array();
			  $userid = $data['user_id'];
			  $name   = $data['username'];
			  $email  = $data['Email'];
			  $sesdata = array(
				  'userid'    => $userid,
				  'username'  => $name,
				  'email'     => $email,
				  'logged_in' => TRUE
			  );
			  $this->session->set_userdata($sesdata);
				  redirect('Welcome');
		  }else{
			  echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Please try again
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  </div>');
			  redirect('Login');
		  }
		}
		// end login
	  
	  
	  
		// register
		function register()
		{
		  $this->load->view('auth/VRegister');
		}
		function registerNewUser()
		{
			  $this->load->library('form_validation');
			  $this->form_validation->set_rules('Password', 'Password', 'required');
			  $this->form_validation->set_rules('ConfirmPassword', 'Confirm Password', 'required|matches[Password]');
			  if ($this->form_validation->run() == FALSE)
			  {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Passwords must match
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('Login/register');
			  } 
		  else {
				  $add = [
			  'Username'  => $this->input->post('Username'),
			  'Email'     => $this->input->post('Email'),
			  'Password'  => $this->input->post('Password'),
			  'Level'     => 'peminjam'
			];
			$this->MSudi->addData('user', $add);
			
				  redirect(site_url('Login'));
			  }
		}
		// end register
	  
	  
	  
		function logout(){
			$this->session->sess_destroy();
			redirect('Login');
		} 






// 	function __construct()
// 	{
// 		parent::__construct();
// 		$this->load->model('MLogin');
// 	}

// 	public function index()
// 	{
// 		if (isset($_POST['btn_login']))
// 		{
// 			$username = $_POST['username'];
// 			$password = $_POST['Password'];
// 			$this->load->model('MLogin');
// 			$notif = $this->MLogin->GoLogin($username,$password);
				
// 			if($notif)
// 			{
// 				$this->load->library('session');
// 				$this->session->set_userdata('Login',$notif);
// 				redirect(site_url('Welcome'));
// 			}			
// 			else
// 			{
// 				$this->load->library('session');
// 				$this->session->unset_userdata('Login');
// 				redirect(site_url('Login'));
// 			}
// 		}
// 		$this->load->view('VLogin');
// 	}
}
?>