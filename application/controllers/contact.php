<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$page = "contactus";

		$this->load->library('loadclientconfig');

		$data['clientConfig'] = $this->loadclientconfig->loadConfig();
		$data['page'] = $page;

		$this->load->view('header.php', $data);
		$this->load->view('contact.php', $data);
		$this->load->view('footer.php', $data);
	}
}
