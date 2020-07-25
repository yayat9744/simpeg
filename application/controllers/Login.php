<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('content/login');
	}
	public function cek_login()
	{
		$nip = $this->input->post('nip');
		$password = md5($this->input->post('password'));
		$cekuser = $this->m_login->cek_nip($nip);
		if ($cekuser > 0) {
			$cekpassword = $this->m_login->cek_password($password, $nip);
			if ($cekpassword > 0) {
				$session = $this->m_login->get_data_login($nip);
				var_dump($session);
				// die;
				$this->session->set_userdata($session);
				redirect('dashboard');
			} else {
				redirect('login');
			}
		} else {
			redirect('login');
		}
	}
	public function logout()
	{
		session_destroy();
		redirect('login');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
