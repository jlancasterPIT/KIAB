<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {

	public function index()
	{
		$page = "aboutus";
		$data['page'] = $page;

		$this->load->library('cmsspotsintegration');
		$data['cms_spots'] = $this->cmsspotsintegration->loadCmsSpots('about_us');

		$this->load->library('loadclientconfig');
		$data['clientConfig'] = $this->loadclientconfig->loadConfig();

		$this->load->view('header.php', $data);
		$this->load->view('aboutus.php', $data);
		$this->load->view('footer.php', $data);
	}
}
