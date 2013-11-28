<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$loggedIn = $this->session->userdata('loggedIn');
		
		if($loggedIn) {
			$data = array(
					'username' => $this->session->userdata('username'),
					'reservationsThisMonth' => '21',
					'reservationsThisYear' => '28',
					'revenueThisYear' => (28*21),
					'homeActive' => 'active',
					'mycontent' => ''
				);

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/index.html');
			$this->load->view('admin/admin-footer.html');
		} else {
			$this->load->helper('url');
			redirect('/admin/login/', 'refresh');
		}
	}

	public function companydetails() {
		$loggedIn = $this->session->userdata('loggedIn');
		if($loggedIn) {
			$data = array(
					'username' => $this->session->userdata('username'),
					'mycontent' => 'active',
					'homeActive' => ''
					);
			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/companydetails.html');
			$this->load->view('admin/admin-footer.html');
		}
	}

	public function login() {
		$this->load->helper('url');
		if(isset($_POST['username'])) {
			$query = $this->db->get_where('userInformation', array('username' => $_POST['username'], 'password'=>md5($_POST['password'])));

			if ($query->num_rows() > 0) {
				$this->session->set_userdata(array('loggedIn'=>true, 'username'=>$_POST['username']));

				redirect('/admin/', 'refresh');
			}

			redirect('/admin/login/', 'refresh');
			
		} else {
			$this->load->view('admin/login.html');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('/admin/login/', 'refresh');
	}

}