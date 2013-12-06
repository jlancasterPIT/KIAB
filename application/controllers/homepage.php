<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		$page = "index";

		$this->load->library('loadclientconfig');

		$data['clientConfig'] = $this->loadclientconfig->loadConfig();
		$data['page'] = $page;

		$data['clientTestimonials'] = $this->db->get('clientTestimonials');
		$data['imgRotater'] = $this->db->get('clientImgRotater');

		$this->load->view('header.php', $data);
		$this->load->view('homepage.php', $data);
		$this->load->view('footer.php', $data);
	}
}
