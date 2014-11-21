<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		$page = "index";
		$data['page'] = $page;

		$this->load->library('cmsspotsintegration');
		$this->load->library('loadclientconfig');

		$data['cms_spots'] = $this->cmsspotsintegration->loadCmsSpots('homepage');
		$data['clientConfig'] = $this->loadclientconfig->loadConfig();
		$data['clientTestimonials'] = $this->db->get('clientTestimonials');
		$data['imgRotater'] = $this->db->get('clientImgRotater');

		$this->load->view($data['clientConfig']['domain'].'/header.php', $data);
		$this->load->view($data['clientConfig']['domain'].'/homepage.php', $data);
		$this->load->view($data['clientConfig']['domain'].'/footer.php', $data);
	}
}
