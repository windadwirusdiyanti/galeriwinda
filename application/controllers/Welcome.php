<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public $input;
	public $MSudi;
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
	}

	public function index()
	{
		if ($this->session->userdata('userid')){
			$data['DataFoto'] = $this->MSudi->GetData('foto');
		
			$data['content']='Beranda';
			$this->load->view('welcome_message',$data);
        }else{
            redirect(site_url('LandingPage'));
        }

	
	}


	public function album()
	{
		if ($this->session->userdata('userid')){
			$this->load->model('MSudi');
	
			$data['DataAlbum'] = $this->MSudi->GetData('album');
			$data['content']='album/album';
			$this->load->view('welcome_message',$data);
        }else{
            redirect(site_url('LandingPage'));
        }
	}

	public function AlbumInsert()
	{
		$this->load->model('MSudi');

		$add['album_id'] = $this->input->post('album_id');
		$add['nama_album'] = $this->input->post('nama_album');
		$add['deskripsi'] = $this->input->post('deskripsi');
		$add['tanggal_dibuat'] = date("Y-m-d");
		$add['user_id'] = $this->session->userdata('userid');
			
		$this->MSudi->AddData('album', $add);

		redirect(site_url('Welcome/foto'));
	
	}

	public function AlbumUpdate()
	{
		$album_id = $this->input->post('album_id');
		$update['nama_album'] = $this->input->post('nama_album');
		$update['deskripsi'] = $this->input->post('deskripsi');
		$update['tanggal_dibuat'] = $this->input->post('tanggal_dibuat');
		$update['user_id'] = $this->input->post('user_id');
		
		$this->MSudi->UpdateData('album','album_id', $album_id, $update);

		redirect(site_url('Welcome/album'));
	}

	public function AlbumDelete()
	{
		$this->load->model('MSudi');
		
		$album_id = $this->uri->segment(3);
		$this->MSudi->DeleteData('album','album_id', $album_id);
		redirect(site_url('Welcome/album'));
	

	}
	public function foto()
	{
		if ($this->session->userdata('userid')){
			$this->load->model('MSudi');
	
			$data['DataFoto'] = $this->MSudi->GetData('foto');
			$data['content']='album/foto';
			$this->load->view('welcome_message',$data);
        }else{
            redirect(site_url('LandingPage'));
        }

		
	
	}
	public function FotoInsert()
	{
		$config['file_name']          = time();
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '|jpg|png|jpeg|svg';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('lokasi_file')) {
			$uploadData = $this->upload->data();
			$this->load->model('MSudi');

			$add['judul_foto'] = $this->input->post('judul_foto');
			$add['deskripsi_foto'] = $this->input->post('deskripsi_foto');
			$add['tanggal_unggah'] = date("Y-m-d");
			$add['lokasi_file'] = $uploadData['file_name'];
			$add['user_id'] = $this->session->userdata('userid');

			$this->MSudi->AddData('foto', $add);

			redirect(site_url('Welcome/foto'));


		} else {
			$error = array('error' => $this->upload->display_errors());
			// Tambahkan log atau tangani kesalahan sesuai kebutuhan aplikasi Anda
			print_r($error);
		}
		
		
	}

	/**
	 * Upload Photo 
	 * @param array $data 
	 * @return void
	 */
	// protected function uploadPhoto(array &$data) 
	// {
	// 	$config['upload_path']          = './uploads/';
	// 	$config['allowed_types']        = '|jpg|png|jpeg|svg';

	// 	$this->load->library('upload', $config);

	// 	if (isset($_FILES['lokasi_file'])) {
	// 		if ($this->upload->do_upload('lokasi_file')) {
	// 			$uploadData = $this->upload->data();
	// 			$data['lokasi_file'] = $uploadData['file_name'];
	// 		}
	// 	}
	// }

	public function FotoUpdate($judul_foto)
	{
		$update['judul_foto'] = $this->input->post('judul_foto');
		$update['deskripsi_foto'] = $this->input->post('deskripsi_foto');
		$update['tanggal_unggah'] = $this->input->post('tanggal_unggah');

		

		

		$this->MSudi->UpdateData('foto', 'judul_foto', $judul_foto, $update);

		redirect(site_url('Welcome/foto'));
	}
	
	public function FotoDelete($foto_id)
	{
		$this->load->model('MSudi');
		
		$foto_id = $this->uri->segment(3);
		$this->MSudi->DeleteData('foto','foto_id', $foto_id);
		redirect(site_url('Welcome/foto'));
	

	}


	public function likePhoto($foto_id)
	{
		$this->load->model('MSudi');
		
		// Mengambil jumlah like berdasarkan foto_id
		$data['jumlah_like'] = $this->MSudi->countLikes($foto_id);
		
		$data['content'] = 'foto/like';
		$this->load->view('beranda', $data); // Ganti 'welcome_message' dengan nama views Anda
	}


	public function logout() {
        // Hapus semua data sesi
        $this->session->sess_destroy();

        // Redirect ke halaman login atau halaman lain yang sesuai
        redirect('login'); // Ganti 'login' dengan URL halaman login Anda
    }

}