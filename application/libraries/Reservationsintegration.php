<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	include APPPATH.'third_party/fpdf/fpdf.php';

	class Reservationsintegration {
  	
	  	public function createReservation($reservationArray) {
			$pdf = new FPDF();
			$pdf->AddPage();

			$pdf->Image('/var/sites/doublehydrant/img/logo.png', 10, 10, 50);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(100, 10);
			$pdf->Cell(40,10,'Double Hydrant Bed N Biscuits');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(90, 20);
			$pdf->Cell(40,10,'142 Airport Road, Mt. Pleasant, PA 15666');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(120, 30);
			$pdf->Cell(40,10,'724-757-0855');

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 60);
			$pdf->Cell(40,10,'Owner Name:');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 60);
			$pdf->Cell(40,10,$reservationArray['clientName']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 70);
			$pdf->Cell(40,10,'Owner Phone Number:');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(80, 70);
			$pdf->Cell(50,10,$reservationArray['clientPhoneNumber']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 80);
			$pdf->Cell(40,10,'Owner Email:');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 80);
			$pdf->Cell(50,10,$reservationArray['clientEmail']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 90);
			$pdf->Cell(40,10,'Drop Off Date:');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 90);
			$pdf->Cell(50,10,$reservationArray['dropOffDate']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 100);
			$pdf->Cell(40,10,'Pick Up Date:');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 100);
			$pdf->Cell(50,10,$reservationArray['pickUpDate']);
			
			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 110);
			$pdf->Cell(40,10,'Number of Dogs:');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(70, 110);
			$pdf->Cell(50,10,$reservationArray['numOfDogs']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 120);
			$pdf->Cell(40,10,'Board them together:');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(70, 120);
			$pdf->Cell(70,10,$reservationArray['boardTogether']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 130);
			$pdf->Cell(40,10,'Dog Name(s):');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 130);
			$pdf->Cell(50,10,$reservationArray['dogName']);			

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 140);
			$pdf->Cell(40,10,'Dog Age(s):');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 140);
			$pdf->Cell(50,10,$reservationArray['dogAge']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 150);
			$pdf->Cell(40,10,'Dog Breed(s):');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 150);
			$pdf->Cell(50,10,$reservationArray['dogBreed']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 160);
			$pdf->Cell(40,10,'List of Allergies:');
			
			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(70, 160);
			$pdf->Cell(50,10,$reservationArray['listOfAllergies']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 170);
			$pdf->Cell(40,10,'List Of Medications');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(70, 170);
			$pdf->Cell(50,10,$reservationArray['listOfMedications']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 180);
			$pdf->Cell(40,10,'Flea Medication:');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(70, 180);
			$pdf->Cell(50,10,$reservationArray['listOfFleaTreatment']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 190);
			$pdf->Cell(40,10,'Feeding Requirements:');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(80, 190);
			$pdf->Cell(50,10,$reservationArray['feedingRequirements']);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 200);
			$pdf->Cell(40,10,'Treats');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 200);

			if($reservationArray['hasTreats']==1) {
				$treats = "Yes";
			} else {
				$treats = "No";
			}

			if($reservationArray['hasWalks']==1) {
				$walks = "Yes";
			} else {
				$walks = "No";
			}

			if($reservationArray['hasDogPark']==1) {
				$dogpark = "Yes";
			} else {
				$dogpark = "No";
			}

			if($reservationArray['hasPlayTime']==1) {
				$playtime = "Yes";
			} else {
				$playtime = "No";
			}

			$pdf->Cell(50,10,$treats);
			
			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 210);
			$pdf->Cell(40,10,'Walks');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 210);
			$pdf->Cell(50,10,$walks);
			
			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 220);
			$pdf->Cell(40,10,'Dog Park');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 220);
			$pdf->Cell(50,10,$dogpark);
			
			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 230);
			$pdf->Cell(40,10,'Play Time');

			$pdf->SetFont('Times', '', 16);
			$pdf->SetXY(50, 230);
			$pdf->Cell(50,10,$playtime);

			$pdf->SetFont('Times', 'B', 16);
			$pdf->AddPage();
			$pdf->SetXY(10, 10);
			$pdf->Cell(40,10,'Report Card');

			$pdf->AddPage();
			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetXY(10, 10);
			$pdf->Cell(40,10,'Vaccinne Upload');
			$pdf->Image('/var/sites/doublehydrant/'.$reservationArray['vaccineRecordLocation'],5,20,200);

			$filename = md5(time().time()).'.pdf';
			$pdf->Output('/var/sites/doublehydrant/reservation_pdfs/'.$filename, 'F');
			
			$reservationArray['pdfLink'] = '/var/sites/doublehydrant/reservation_pdfs/'.$filename;
			$CI =& get_instance();

			$CI->load->library('email');

			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;

			$CI->email->initialize($config);

			$CI->email->from('webmaster@doublehydrant.com', 'Double Hydrant');
			$CI->email->to('deb@doublehydrant.com');
			$CI->email->cc('jeremy@jeremylancasterconsulting.com');

			$CI->email->subject('New Reservation');
			$CI->email->message('You have a new reservation! Attached is the details in PDF form!');

			$CI->email->attach($reservationArray['pdfLink']);

			$CI->email->send();

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
				$CI->db->where('dropOffDate BETWEEN "' . date("Y-m-d", strtotime($from)) . '" AND "' . date("Y-m-d", strtotime($to)) . '"');
			}

			$query = $CI->db->get();

			return $query->result();
		}
	}

