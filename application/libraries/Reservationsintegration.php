<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Reservationsintegration {
  	
  	public function createReservation($reservationArray) {
		$CI =& get_instance();
		$CI->load->database();
		return $CI->db->insert('reservations', $reservationArray);
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

		$CI->db->select('*');
		$CI->db->from('reservations');
		if($from != NULL && $to != NULL) {
			$CI->db->where('dropOffDate BETWEEN ' . date("Y-m-d", strtotime($from)) . ' AND ' . date("Y-m-d", strtotime($to));
		}

		$query = $CI->db->get();

		foreach ($query->result() as $row) {
			$data[] = $row;
		}

		return $data;
	}
}

