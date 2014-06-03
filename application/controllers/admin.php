<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(E_ERROR); 

class Admin extends CI_Controller {

	private function daysBetween($from, $to) {
		$your_date = strtotime($from);
		$now = strtotime($to);
		$datediff = $now - $your_date;
		return floor($datediff/(60*60*24));
	}

	public function kennelkam() {
		$loggedIn = $this->session->userdata('loggedIn');
		
		if($loggedIn) {
			$this->load->library('loadclientconfig');

			$clientConfig = $this->loadclientconfig->loadConfig();

			$data = array(
					'username' => $this->session->userdata('username'),
					'title' => $clientConfig['title'],
					'homeActive' => '',
					'mycontent' => '',
					'faqActive' => '',
					'kennelKamActive' => 'active'
				);

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/kennelkam.html');
			$this->load->view('admin/admin-footer.html');
		} else {
			$this->load->helper('url');
			redirect('/admin/login/', 'refresh');
		}
	}

	public function viewreservation() {
		$loggedIn = $this->session->userdata('loggedIn');
				
		if($loggedIn) {
			$get = $this->input->get();
			$id = $get['id'];

			$this->load->library('reservationsintegration');
			$this->load->library('loadclientconfig');

			$reservation = $this->reservationsintegration->getAllReservationByID($id);

			$clientConfig = $this->loadclientconfig->loadConfig();

			$data = array(
					'username' => $this->session->userdata('username'),
					'title' => $clientConfig['title'],
					'reservation' => $reservation[0],
					'homeActive' => 'active',
					'mycontent' => '',
					'faqActive' => ''
				);

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/viewreservation.php');
			$this->load->view('admin/admin-footer.html');
		} else {
			$this->load->helper('url');
			redirect('/admin/login/', 'refresh');
		}
	}

	public function faq() {
		$loggedIn = $this->session->userdata('loggedIn');
		
		if($loggedIn) {
			$this->load->library('loadclientconfig');

			$clientConfig = $this->loadclientconfig->loadConfig();

			$data = array(
					'username' => $this->session->userdata('username'),
					'title' => $clientConfig['title'],
					'faqlist' => $this->db->get('faq'),
					'homeActive' => '',
					'mycontent' => '',
					'faqActive' => 'active'
				);

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/faq.html');
			$this->load->view('admin/admin-footer.html');
		} else {
			$this->load->helper('url');
			redirect('/admin/login/', 'refresh');
		}
	}

	public function index()
	{
		$loggedIn = $this->session->userdata('loggedIn');
		
		if($loggedIn) {
			$this->load->library('reservationsintegration');
			$this->load->library('loadclientconfig');

			$clientConfig = $this->loadclientconfig->loadConfig();

			$start = date("Y-m-d", strtotime("first day of this year"));
			$end   = date("Y-m-d", strtotime("first day of next year"));
			$reservations = $this->reservationsintegration->getAllReservations($start, $end);

			$grandTotal = 0;
			$grandDays  = 0;

			foreach ( $reservations as $reservation ) {
				$numOfDays = $this->daysBetween($reservation->dropOffDate, $reservation->pickUpDate);
				
				if($reservation->boardTogether == '1' && $reservation->numOfDogs > 1) {
					if($reservation->numOfDogs == '2') {
						$cost = $numOfDays*$clientConfig['price_pernight_onerun'];
					} else if($reservation->numOfDogs == '3') {
						$cost = $numOfDays*$clientConfig['price_pernight_onerun'];
						$ecost = $numOfDays*$clientConfig['price_pernight'];
					} else if($reservation->numOfDogs == '4') {
						$cost = $numOfDays*$clientConfig['price_pernight_onerun'];
						$cost = $cost*2;
					}
				} else {
					$cost = $numOfDays*$clientConfig['price_pernight'];
				}
				
				$grandTotal += $cost;
				$grandDays += $numOfDays;
			}

			$today = date("Y-m-d", strtotime("today"));			
			$todaysReservations = $this->reservationsintegration->getAllReservations($today, $today);

			$data = array(
					'username' => $this->session->userdata('username'),
					'title' => $clientConfig['title'],
					'clientConfig' => $clientConfig,
					'numberOfReservationsToday' => count($todaysReservations),
					'reservationsThisMonth' => count($this->reservationsintegration->getAllReservations(date("Y")."-".date("m")."-01", date("Y-m-d", strtotime("last day of this month")))),
					'reservationsThisYear' => count($reservations),
					'revenueThisYear' => number_format($grandTotal, 2),
					'revenueDays' => $grandDays,
					'homeActive' => 'active',
					'mycontent' => ''
				);

			$data['reservations'] = $reservations;
			
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

			
			$this->load->library('loadclientconfig');

			$data['clientConfig'] = $this->loadclientconfig->loadConfig();

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/companydetails.html', $data);
			$this->load->view('admin/admin-footer.html');
		}
	}

	public function ownerlookup() {
		$loggedIn = $this->session->userdata('loggedIn');

		if($loggedIn) {
			$data = array(
					'username' => $this->session->userdata('username'),
					'reporting' => 'active',
					'homeActive' => ''
					);

			$this->load->library('reservationsintegration');
			$reservations = $this->reservationsintegration->getAllClients();
			
			$this->load->library('loadclientconfig');

			$data['clientConfig'] = $this->loadclientconfig->loadConfig();
			$data['reservations'] = $reservations;

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/ownerlookup.html', $data);
			$this->load->view('admin/admin-footer.html');
		}
	}

	public function doglookup() {
		$loggedIn = $this->session->userdata('loggedIn');

		if($loggedIn) {
			$data = array(
					'username' => $this->session->userdata('username'),
					'reporting' => 'active',
					'homeActive' => ''
					);

			$this->load->library('reservationsintegration');
			$reservations = $this->reservationsintegration->getAllDogs();
			
			$this->load->library('loadclientconfig');

			$data['clientConfig'] = $this->loadclientconfig->loadConfig();
			$data['reservations'] = $reservations;

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/doglookup.html', $data);
			$this->load->view('admin/admin-footer.html');
		}
	}

	public function revenuereports() {
		$loggedIn = $this->session->userdata('loggedIn');

		if($loggedIn) {
			$data = array(
					'username' => $this->session->userdata('username'),
					'reporting' => 'active',
					'homeActive' => ''
					);

			$this->load->library('reservationsintegration');
			$this->load->library('loadclientconfig');

			$data['clientConfig'] = $this->loadclientconfig->loadConfig();
			$clientConfig = $data['clientConfig'];

			$monthNames = array("", "January", "Feburary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			
			for($i=1;$i<=12;$i++) {
				$start = date("Y")."-".$i."-1";
				$end   = date("Y")."-".$i."-31";
				$reservations = $this->reservationsintegration->getAllReservations($start, $end);

				$grandTotal = 0;
				$grandDays  = 0;

				foreach ( $reservations as $reservation ) {
					$numOfDays = abs($this->daysBetween($reservation->dropOffDate, $reservation->pickUpDate));
					
					if($reservation->boardTogether == '1' && $reservation->numOfDogs > 1) {
						if($reservation->numOfDogs == '2') {
							$cost = $numOfDays*$clientConfig['price_pernight_onerun'];
						} else if($reservation->numOfDogs == '3') {
							$cost = $numOfDays*$clientConfig['price_pernight_onerun'];
							$ecost = $numOfDays*$clientConfig['price_pernight'];
						} else if($reservation->numOfDogs == '4') {
							$cost = $numOfDays*$clientConfig['price_pernight_onerun'];
							$cost = $cost*2;
						}
					} else {
						$cost = $numOfDays*$clientConfig['price_pernight'];
					}
					
					$grandTotal += $cost;
					$grandDays += $numOfDays;
				}

				$monthTotals[$monthNames[$i]] = array('days'=>$grandDays, 'total'=>$grandTotal);
			}
						
			$data['monthTotals'] = $monthTotals;

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/revenuereports.html', $data);
			$this->load->view('admin/admin-footer.html');
		}
	}

	public function deleteclient() {
		$this->load->helper('url');
		$id = $_GET['id'];
		$this->db->delete('clientTestimonials', array('id' => $id)); 
		$this->session->set_flashdata('message', 'Record Deleted');
		redirect('/admin/clienttest');
	}

	public function deletepicture() {
		$this->load->helper('url');
		$id = $_GET['id'];
		$this->db->delete('clientImgRotater', array('id' => $id)); 
		$this->session->set_flashdata('message', 'Image Deleted');
		redirect('/admin/imagerotater');	
	}

	public function addimagerotation() {
		$this->load->helper('url');
		$this->load->database();

		unset($_POST['add_picture']);

		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["pictureLocation"]["name"]);
		$extension = end($temp);
		
		if (in_array($extension, $allowedExts))
		{
			$filename = md5($_POST['name'].time()).".".$extension;
			if(move_uploaded_file($_FILES["pictureLocation"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/img/".$filename)) {
				$insert['imagePath'] = "/img/".$filename;
				$this->db->insert('clientImgRotater', $insert);
				$this->session->set_flashdata('message', 'Homepage Image Rotation Photo Added!');
				redirect('/admin/imagerotater');
			}
		}
	}

	public function imagerotater() {
		$loggedIn = $this->session->userdata('loggedIn');

		if($loggedIn) {
			$data = array(
					'username' => $this->session->userdata('username'),
					'mycontent' => 'active',
					'homeActive' => ''
					);

			
			$this->load->library('loadclientconfig');

			$data['clientConfig'] = $this->loadclientconfig->loadConfig();

			$data['clientImageRotater'] = $this->db->get('clientImgRotater');

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/imagerotater.html', $data);
			$this->load->view('admin/admin-footer.html');
		}
	}

	public function clienttest() {
		$loggedIn = $this->session->userdata('loggedIn');

		if($loggedIn) {
			$data = array(
					'username' => $this->session->userdata('username'),
					'mycontent' => 'active',
					'homeActive' => ''
					);

			
			$this->load->library('loadclientconfig');

			$data['clientConfig'] = $this->loadclientconfig->loadConfig();

			$data['clientTestimonials'] = $this->db->get('clientTestimonials');

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/clienttest.html', $data);
			$this->load->view('admin/admin-footer.html');
		}	
	}

	public function cmsspots() {
		$loggedIn = $this->session->userdata('loggedIn');

		if($loggedIn) {
			$data = array(
					'username' => $this->session->userdata('username'),
					'mycontent' => 'active',
					'homeActive' => ''
					);

			
			$this->load->library('loadclientconfig');

			$data['clientConfig'] = $this->loadclientconfig->loadConfig();

			$data['clientTestimonials'] = $this->db->get('cms_spots');

			$this->load->view('admin/admin-header.php', $data);
			$this->load->view('admin/cms_spots.php', $data);
			$this->load->view('admin/admin-footer.html');
		}	
	}

	public function addclient() {
		$this->load->helper('url');
		$this->load->database();

		unset($_POST['add_testimonial']);

		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["pictureLocation"]["name"]);
		$extension = end($temp);
		
		if (in_array($extension, $allowedExts))
		{
			$filename = md5($_POST['name'].time()).".".$extension;
			if(move_uploaded_file($_FILES["pictureLocation"]["tmp_name"], "/var/www/img/".$filename)) {
				$insert['name'] = $_POST['name'];
				$insert['text'] = $_POST['text'];
				$insert['pictureLocation'] = "/img/".$filename;
				$this->db->insert('clientTestimonials', $insert);
				$this->session->set_flashdata('message', 'Client Testimonial Added!');
				redirect('/admin/clienttest');
			}
		}
	}

	public function updatecompany() {
		$this->load->helper('url');
		unset($_GET['update_company']);

		foreach($_GET as $key => $value) {
			$data = array(
               'value' => $value
            );

			$this->db->where('key', $key);
			$this->db->update('clientConfig', $data);
		}

		redirect('/admin/companydetails', 'refresh');
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