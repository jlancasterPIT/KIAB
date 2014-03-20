<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meettheteam extends CI_Controller {

	public function index()
	{
		$page = "meettheteam";
		$data['page'] = $page;

		$this->load->library('cmsspotsintegration');
		$data['cms_spots'] = $this->cmsspotsintegration->loadCmsSpots('meet_the_team');

		$this->load->library('loadclientconfig');
		$data['clientConfig'] = $this->loadclientconfig->loadConfig();
		
		$this->load->view('header.php', $data);
		$this->load->view('meettheteam.php', $data);
		$this->load->view('footer.php', $data);
	}
}
