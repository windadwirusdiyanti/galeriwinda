<?php
	class MLogin extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function GoLogin($username,$password)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			
			$query = $this->db->get();
			
			if($query -> num_rows() == 1)
			{
				$row = $query->row(); 

				$this->load->library('session');

				$this->session->set_userdata('nik',$row->nik);
				$this->session->set_userdata('Login','Aktif');

				
    			return $row->nik;
			}
			else
			{
				return false;
			}
		}

	}
?>