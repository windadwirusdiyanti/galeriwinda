<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
	}
 
	public function index()
	{
		$this->load->view('VRegister');
	}
 
	public function proses()
	{
		// $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|is_unique[tb_user.username]');
		// $this->form_validation->set_rules('Password', 'Password','trim|required|min_length[1]|max_length[255]');
		// $this->form_validation->set_rules('Email', 'Email','trim|required|min_length[1]|max_length[255]');
        // $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap','trim|required|min_length[1]|max_length[255]');
        // $this->form_validation->set_rules('Alamat', 'Alamat','trim|required|min_length[1]|max_length[255]');
		// if ($this->form_validation->run()==true)
	   	// {
		// 	$username = $this->input->post('username');
		// 	$Password = $this->input->post('Password');
		// 	$Email = $this->input->post('Email');
        //     $nama_lengkap = $this->input->post('nama_lengkap');
        //     $Alamat = $this->input->post('Alamat');
		// 	$this->MSudi->register($username,$Password,$Email,$nama_lengkap,$Alamat);
		// 	$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
		// 	redirect('login');
		// }
		// else
		// {
		// 	$this->session->set_flashdata('error', validation_errors());
		// 	redirect('register');
		// }

		$add['username'] = $this->input->post('username');
		$add['Password'] = $this->input->post('Password');
		$add['Email'] = $this->input->post('Email');
		$add['nama_lengkap'] = $this->input->post('nama_lengkap');
		$add['Alamat'] = $this->input->post('Alamat');
		$this->MSudi->AddData('user', $add);
		redirect('login');
	}
}