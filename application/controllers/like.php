<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
	}

    public function likeFoto($fotoid) {
        // Check if user is logged in
        $userid = $this->session->userdata('userid');
        $fotoid = $this->uri->segment('3');
        $alreadyLiked = $this->MSudi->hitung_like($fotoid, $userid); // Memeriksa apakah user sudah menyukai foto tersebut sebelumnya
        
        date_default_timezone_set("Asia/Bangkok");
    
        if ($alreadyLiked == 0) {
            // Jika user belum menyukai foto tersebut, tambahkan like
            $add['like_id'] = '';
            $add['foto_id'] = $fotoid;
            $add['user_id'] = $userid;
            $add['tanggal_like'] = date('Y-m-d');
    
            // Panggil fungsi tambahKomentar dari model
            $this->MSudi->AddData('likefoto', $add);
    
            // Redirect to the homepage or any other desired page
            redirect('Welcome');
        } else {
            // Jika user telah menyukai foto tersebut sebelumnya, hapus like (unlike)
            $this->MSudi->DeleteData('likefoto', 'foto_id', $fotoid, $userid);
    
            // Redirect to the homepage or any other desired page
            redirect('Welcome');
        }
    }
    
}