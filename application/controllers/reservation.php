<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservation extends CI_Controller {

	public function index()
	{
		$page = "reservation";
		$this->load->library('loadclientconfig');
		$data['clientConfig'] = $this->loadclientconfig->loadConfig();
		$data['page'] = $page;
		$this->load->view('header.php', $data);
		
		if(isset($_POST['dropoff'])) {

			$hasTreats   = "0";
			$hasWalks    = "0";
			$hasDogPark  = "0";
			$hasPlayTime = "0";

			if(isset($_POST['treats'])) {
				$hasTreats = "1";
			}

			if(isset($_POST['walks'])) {
				$hasWalks = "1";
			}

			if(isset($_POST['dogparks'])) {
				$hasDogPark = "1";
			}

			if(isset($_POST['playtime'])) {
				$hasPlayTime = "1";
			}

			$reservationArray = array(
				'dropOffDate' => date("Y-m-d", strtotime($_POST['dropoff'])),
		        	'pickUpDate' => date("Y-m-d", strtotime($_POST['pickup'])),
		         	'vaccineRecordLocation' => '',
		         	'dogName' => $_POST['dogName'],
		         	'dogAge' => $_POST['dogAge'],
		         	'dogBreed' => $_POST['dogBreed'],
		         	'listOfAllergies' => $_POST['allergyText'],
		         	'listOfMedications' => $_POST['medicationText'],
		         	'listOfFleaTreatment' => $_POST['fleaText'],
		         	'feedingRequirements' => $_POST['foodText'],
		         	'hasTreats' => $hasTreats,
		         	'hasWalks' => $hasWalks,
		         	'hasDogPark' => $hasDogPark,
		         	'hasPlayTime' => $hasPlayTime,
		         	'clientName' => $_POST['yourName'],
		         	'clientPhoneNumber' => $_POST['yourPhone'],
		         	'clientEmail' => $_POST['yourEmail']	
			);

			$this->load->library('reservationsintegration');
			$this->reservationsintegration->createReservation($reservationArray);

			$data['reservationarray'] = $reservationArray;

			$this->load->view('confirm_reservation.php', $data);
		} else {
			$this->load->view('reservation_new.php', $data);
		}
		
		$this->load->view('footer.php', $data);
	}
}
