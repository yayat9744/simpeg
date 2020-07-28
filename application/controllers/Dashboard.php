<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
		$this->load->model('m_pegawai');
		if (!$this->session->userdata('nip')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['session'] = $this->session->all_userdata();
		$data['tampilan'] = 'dashboard';
		$this->load->view('template/media', $data);
	}
	public function profil()
	{
		$data['session'] = $this->session->all_userdata();
		$nip = $this->session->userdata('nip');
		$data['dt_pegawai'] = $this->m_pegawai->get_data_detail($nip);
		$data['tampilan'] = 'profil';
		$this->load->view('template/media', $data);
	}
}
 
 /* End of file Dashboard.php */
 /* Location: ./application/controllers/Dashboard.php */
