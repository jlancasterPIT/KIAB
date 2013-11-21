<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class ReservationsIntegration {
  	
  	public function createReservation($reservationArray) {
		$CI =& get_instance();
		$CI->load->database();

		/**
		 * Example Reservation Array
		 * $reservationArray = array(
         *      'dropOffDate' => $dropOffDate,
         *      'pickUpDate' => $pickUpDate,
         *      'vaccineRecordLocation' => $vaccineRecordLocation,
         *      'dogName' => $dogName,
         *      'dogAge' => $dogAge,
         *      'dogBreed' => $dogBreed,
         *      'listOfAllergies' => $listOfAllergies,
         *      'listOfMedications' => $listOfMedications,
         *      'listOfFleaTreatment' => $listOfFleaTreatment,
         *      'feedingRequirements' => $feedingRequirements,
         *      'hasTreats' => $hasTreats,
         *      'hasWalks' => $hasWalks,
         *      'hasDogPark' => $hasDogPark,
         *      'hasPlayTime' => $hasPlayTime,
         *      'clientName' => $clientName,
         *      'clientPhoneNumber' => $clientPhoneNumber,
         *      'clientEmail' => $clientEmail
         * 	);
         *
         **/

		$CI->db->insert('reservations', $reservationArray);
  	}

  	public function sendReminderEmails($clientDomain) {
  		$this->db->select('clientName, clientEmail, dogName, dropOffDate');
		$this->db->from('reservations');
  		$this->db->where('dropOffDate BETWEEN ' . date("Y-m-d") . ' AND ' . date("Y-m-d", strtotime("today +7 days")));

		$query = $this->db->get();

		foreach ($query->result() as $row)
		{
			$message = 
			"Hello ".$row->clientName.",
			
			This is just a reminder that you are supposed to drop off ". $row->dogName ." on ".$row->dropOffDate."!

			We look forward to seeing you then!

			Double Hydrant Bed and Biscuits";

			$message = wordwrap($message, 70, "\r\n");

			$subject = 'You have a reservation!';
			
			$headers = 'From: reservations@'.$clientDomain.'' . "\r\n" .
			    'Reply-To: reservations@'.$clientDomain.'' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			mail($row->clientEmail, $subject, $message, $headers);
		}
  	}

  	public function sendAdminWeeklyReport($clientContactEmail) {
  		$this->db->select('clientName, clientEmail, dogName, dropOffDate');
		$this->db->from('reservations');
  		$this->db->where('dropOffDate BETWEEN ' . date("Y-m-d") . ' AND ' . date("Y-m-d", strtotime("today +7 days")));

		$query = $this->db->get();

		$message = "Below is a listing of all your reservations for this week!\r\n";

		foreach ($query->result() as $row)
		{
			$message .= "Dog Name: ". $row->dogName ." on ".$row->dropOffDate."\r\n";
		}

		$message .= "Thank you again for choosing KIAB from Jeremy Lancaster Consulting!\r\nIf you have any questions or concerns please contact jeremy@jeremylancasterconsulting.com\r\n";

		$message = wordwrap($message, 70, "\r\n");

		$subject = 'You have reservations this week!';
		
		$headers = 'From: webmaster@jeremylancasterconsulting.com' . "\r\n" .
		    'Reply-To: webmaster@jeremylancasterconsulting.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		mail($clientContactEmail, $subject, $message, $headers);
  }

