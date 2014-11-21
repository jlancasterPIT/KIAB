<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Play extends CI_Controller {

	public function index()
	{
		$page = "meettheteam";
		
		$this->load->library('loadclientconfig');

		$data['clientConfig'] = $this->loadclientconfig->loadConfig();
		$data['page'] = $page;

		$this->load->view($data['clientConfig']['domain'].'/header.php', $data);
		$this->load->view($data['clientConfig']['domain'].'/play.php', $data);
		$this->load->view($data['clientConfig']['domain'].'/footer.php', $data);
	}
}
