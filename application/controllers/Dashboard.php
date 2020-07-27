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
		$this->load->view('template/media', $data);
	}
}
 
 /* End of file Dashboard.php */
 /* Location: ./application/controllers/Dashboard.php */
