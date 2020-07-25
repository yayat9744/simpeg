<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
		if (!$this->session->userdata('nip')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['session'] = $this->session->all_userdata();
		$data['tampilan'] = 'dashboard';
		$data['suma'] = $this->M_dashboard->sumdarahA();
		$data['countAdmin'] = $this->M_dashboard->countAdmin();
		//	$this->load->model('M_dashboard');
		// $this->M_dashboard->hitungJumlahPendonor($data['total_pendonor']);
		//$data['total_pendonor'] = $this->m_dashboard->hitungJumlahPendonor();
		$this->load->view('template/media', $data);
	}
}
 
 /* End of file Dashboard.php */
 /* Location: ./application/controllers/Dashboard.php */
