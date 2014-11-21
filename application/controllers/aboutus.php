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

		$this->load->view($data['clientConfig']['domain'].'/header.php', $data);
		$this->load->view($data['clientConfig']['domain'].'/aboutus.php', $data);
		$this->load->view($data['clientConfig']['domain'].'/footer.php', $data);
	}
}
