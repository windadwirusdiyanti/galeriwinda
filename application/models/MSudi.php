<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue, $userid = null)
    {
        if ($userid !== null) {
            $this->db->where('user_id', $userid);
        }
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $query= $this->db->get($tabel);
        return $query->result();
    }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }

    function register($username,$Password,$Email, $nama_lengkap, $Alamat)
	{
		$data_user = array(
			'username'=>$username,
			'Password'=>password_hash($Password,PASSWORD_DEFAULT),
			'Email'=>$Email,
			'nama_lengkap'=>$nama_lengkap,
			'Alamat'=>$Alamat
		);
		$this->db->insert('user',$data_user);
	}
 
	function login_user($username,$Password)
	{
        $query = $this->db->get_where('user',array('username'=>$username));
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            if (password_verify($Password, $data_user->Password)) {
                $this->session->set_userdata('username',$username);
				$this->session->set_userdata('nama_lengkap',$data_user->nama_lengkap);
				$this->session->set_userdata('is_login',TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
	}
	
    function cek_login()
    {
       
    }

    public function hitung_like($fotoid, $userid = null)
    {
        $this->db->where('foto_id', $fotoid);
        if ($userid !== null) {
            $this->db->where('user_id', $userid); // Tambahkan kondisi untuk memeriksa user tertentu jika $userid tidak null
        }
        $query = $this->db->get('likefoto');
        return $query->num_rows();
    }

     // Fungsi untuk mengambil komentar berdasarkan foto_id
     public function getKomentarByFotoId($fotoid) {
        $this->db->where('foto_id', $fotoid);
        $query = $this->db->get('komentarfoto');
        return $query->result();
    }
    

}