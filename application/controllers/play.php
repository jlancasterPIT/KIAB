<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Play extends CI_Controller {

	public function index()
	{
		$page = "meettheteam";
		
		$this->load->library('loadclientconfig');

		$data['clientConfig'] = $this->loadclientconfig->loadConfig();
		$data['page'] = $page;

		$this->load->view('header.php', $data);
		$this->load->view('play.php', $data);
		$this->load->view('footer.php', $data);
	}
}
