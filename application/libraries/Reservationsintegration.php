<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	include APPPATH.'third_party/fpdf/fpdf.php';

	class Reservationsintegration {
  	
	  	public function createReservation($reservationArray) {
			$CI =& get_instance();

			$CI->load->library('email');

			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;

			// $CI->email->initialize($config);

			// $CI->email->from('webmaster@doublehydrant.com', 'Double Hydrant');
			// $CI->email->to('deb@doublehydrant.com');
			// $CI->email->cc('jeremy@jeremylancasterconsulting.com');

			// $CI->email->subject('New Reservation');
			// $CI->email->message('You have a new reservation! Attached is the details in PDF form!');

			// $CI->email->attach($reservationArray['pdfLink']);

			// $CI->email->send();

			$CI->load->database();

			$hasSpace = $this->checkReservationDaysForSpace($reservationArray['dropOffDate'], $reservationArray['pickUpDate']);
			if($hasSpace) {
				$data = $CI->db->insert('reservations', $reservationArray);
				$lastInsertID = $CI->db->insert_id();
				
				$p = new DatePeriod(
				    new DateTime(date("Y-m-d", strtotime($reservationArray['dropOffDate']))),
				    new DateInterval('P1D'),
				    new DateTime(date("Y-m-d", strtotime($reservationArray['pickUpDate'])))
				);
			
				foreach(iterator_to_array($p) as $dates) {				
					$query = "INSERT INTO reservationsDay (`reservationsID`, `reservationsDay`) VALUES ('".$lastInsertID."','".$dates->format("Y-m-d")."')";
					$CI->db->query($query);
				}

				$query = "INSERT INTO reservationsDay (`reservationsID`, `reservationsDay`) VALUES ('".$lastInsertID."','".$reservationArray['pickUpDate']."')";
				$CI->db->query($query);
						
				return $CI->db->insert('reservations', $reservationArray);
			} else {
				return false;
			}
	  	}

	  	public function sendReminderEmails($clientDomain) {
			$CI =& get_instance();
	        $CI->load->database();

	  		$CI->db->select('clientName, clientEmail, dogName, dropOffDate');
			$CI->db->from('reservations');
	  		$CI->db->where('dropOffDate BETWEEN ' . date("Y-m-d") . ' AND ' . date("Y-m-d", strtotime("today +7 days")));

			$query = $CI->db->get();

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
			$CI =& get_instance();
            $CI->load->database();

	  		$CI->db->select('clientName, clientEmail, dogName, dropOffDate');
			$CI->db->from('reservations');
	  		$CI->db->where('dropOffDate BETWEEN ' . date("Y-m-d") . ' AND ' . date("Y-m-d", strtotime("today +7 days")));

			$query = $CI->db->get();

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

		public function getAllReservations($from = NULL, $to = NULL) {
			$CI =& get_instance();
            $CI->load->database();

            // Fix this so that it works with the new reservation table
			$CI->db->select('*');
			$CI->db->from('reservations');
			if($from != NULL && $to != NULL) {
				$CI->db->where('dropOffDate BETWEEN "' . date("Y-m-d", strtotime($from)) . '" AND "' . date("Y-m-d", strtotime($to)) . '" OR pickUpDate BETWEEN "' . date("Y-m-d", strtotime($from)) . '" AND "' . date("Y-m-d", strtotime($to)) . '"');
			}

			$query = $CI->db->get();

			return $query->result();
		}

		public function getTodaysDropOffs() {
			$CI =& get_instance();
            $CI->load->database();

            // Fix this so that it works with the new reservation table
			$CI->db->select('*');
			$CI->db->from('reservations');
			$CI->db->where('dropOffDate BETWEEN "' . date("Y-m-d", strtotime("today")) . '" AND "' . date("Y-m-d", strtotime("today")) . '"');

			$query = $CI->db->get();

			return $query->result();
		}

		public function getTodaysPickups() {
			$CI =& get_instance();
            $CI->load->database();

            // Fix this so that it works with the new reservation table
			$CI->db->select('*');
			$CI->db->from('reservations');
			$CI->db->where('pickUpDate BETWEEN "' . date("Y-m-d", strtotime("today")) . '" AND "' . date("Y-m-d", strtotime("today")) . '"');

			$query = $CI->db->get();

			return $query->result();
		}

		public function getAllReservationByID($id = NULL) {
			$CI =& get_instance();
            $CI->load->database();

            // Fix this so that it works with the new reservation table
			$CI->db->select('*');
			$CI->db->from('reservations');
			if($id > 0) {
				$CI->db->where('id = "'.$id.'"');
			}

			$query = $CI->db->get();

			return $query->result();
		}

		public function getAllClients() {
			$CI =& get_instance();
            $CI->load->database();

            // Fix this so that it works with the new reservation table
			$CI->db->select('*');
			$CI->db->from('reservations');
			$CI->db->group_by('clientName');

			$query = $CI->db->get();

			return $query->result();
		}

		public function getAllDogs() {
			$CI =& get_instance();
            $CI->load->database();

            // Fix this so that it works with the new reservation table
			$CI->db->select('*');
			$CI->db->from('reservations');
			$CI->db->group_by('dogName');

			$query = $CI->db->get();

			return $query->result();
		}

		public function checkReservationDaysForSpace($start = NULL, $end = NULL) {
			$CI =& get_instance();
			$CI->load->database();

			$p = new DatePeriod(
			    new DateTime(date("Y-m-d", strtotime($start))),
			    new DateInterval('P1D'),
			    new DateTime(date("Y-m-d", strtotime($end)))
			);

			$dateArray = array();

			foreach(iterator_to_array($p) as $dates) {				
				$CI->db->select('*');
				$CI->db->from('reservationsDay');
				$CI->db->where('reservationsDay = "'.$dates->format("Y-m-d").'"');
				
				$row = $CI->db->get();
				$dateArray[$dates->format("Y-m-d")] = $row->num_rows();			
			}

			$row = $CI->db->query("select value from clientConfig where `key` = 'number_of_runs'");
			$clientConfig = $row->row(0);
			$number_of_runs = $clientConfig->value;
			foreach($dateArray as $date => $numberOfReservations) {
				if($numberOfReservations >= $number_of_runs) {
					return false;
				}
			}

			return true;
		}
	}

