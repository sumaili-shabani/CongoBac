<?php 
class mail extends CI_Controller
{

	public function __construct()
	{
	  parent::__construct();
	  $this->load->library('form_validation');
	  $this->load->library('encrypt');
	  $this->load->model('crud_model'); 
	  $this->load->model('login_model');
	}


	public function index(){
		$data["title"] = "connexion au système";  
		$this->load->view('backend/apprenant/contact', $data);
	}
	public function accueil(){
		echo("bonjour dans le codeigner");
	}

	
	/* ========================  End Define variables ======================== */

	//Send mail function
	function send_mail($to,$subject,$message,$headers){
		if(mail($to,$subject,$message,$headers)){

			$this->session->set_flashdata('message', 'félicitation votre message a été bien envoyer');
  			 redirect('Home/sms_sender_conact');
		} else {
			$this->session->set_flashdata('message2', 'Erreur veillez vérifier les infoemations');
  			 redirect('Home/sms_sender_conact');
		}
	}

	//Check e-mail validation
	function check_email($email){
		if(!@eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
			return false;
		} else {
			return true;
		}
	}

    function envoie(){

    	$name 	 = $this->input->post('name');
		$mail 	 = $this->input->post('mail');
		$website = "white-fondation.org";
		$comment = $this->input->post('comment');

		$code=str_shuffle(substr("+6@-?[K89ZTY\J0-T9*h#+/@THSBJ98461700221VPEHI?S&8!}\|", 0,5));

    	$to =$this->input->post('mail');;
		$subject = "Envoie de message au formulaire de contact";
		$headers= "MIME Version 1.0\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";
		$headers .= "From: no-reply@whitefondationafrica.com" . "\r\n" ."Reply-to: sumailiroger681@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();

		 $message = '
			<html>
			<head>
			  <title>Mail from '. $name .'</title>
			</head>
			<body>
			  <table style="width: 500px; font-family: arial; font-size: 14px;" border="1">
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">Name:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">'. $name .'</td>
				</tr>
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">E-mail:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">'. $mail .'</td>
				</tr>
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">Website:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">'. $website .'</td>
				</tr>
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">Comment:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">'. $comment .'</td>
				</tr>
			  </table>
			</body>
			</html>
			';
		
		$txt ='votre code de récupération au compte'.$website.' est:  '.$code;

		// mail($to,$subject,$txt,$headers);
		
		if(mail($to,$subject,$txt,$headers) > 0){

  			 $this->session->set_flashdata('message2', 'Erreur veillez vérifier les infoemations');
  			 redirect('Home/sms_sender_conact');
		} else {
			$this->session->set_flashdata('message', 'félicitation votre message a été bien envoyer');
  			 redirect('Home/sms_sender_conact');
		}
		$this->send_mail($to,$subject,$txt,$headers);

		

		// $to = "infowhite@gmail.com";
		// 	$subject = ' ' . $name;
		// 	$message = '
		// 	<html>
		// 	<head>
		// 	  <title>Mail from '. $name .'</title>
		// 	</head>
		// 	<body>
		// 	  <table style="width: 500px; font-family: arial; font-size: 14px;" border="1">
		// 		<tr style="height: 32px;">
		// 		  <th align="right" style="width:150px; padding-right:5px;">Name:</th>
		// 		  <td align="left" style="padding-left:5px; line-height: 20px;">'. $name .'</td>
		// 		</tr>
		// 		<tr style="height: 32px;">
		// 		  <th align="right" style="width:150px; padding-right:5px;">E-mail:</th>
		// 		  <td align="left" style="padding-left:5px; line-height: 20px;">'. $mail .'</td>
		// 		</tr>
		// 		<tr style="height: 32px;">
		// 		  <th align="right" style="width:150px; padding-right:5px;">Website:</th>
		// 		  <td align="left" style="padding-left:5px; line-height: 20px;">'. $website .'</td>
		// 		</tr>
		// 		<tr style="height: 32px;">
		// 		  <th align="right" style="width:150px; padding-right:5px;">Comment:</th>
		// 		  <td align="left" style="padding-left:5px; line-height: 20px;">'. $comment .'</td>
		// 		</tr>
		// 	  </table>
		// 	</body>
		// 	</html>
		// 	';

		// 	$headers  = 'MIME-Version: 1.0' . "\r\n";
		// 	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		// 	$headers .= 'From: ' . $mail . "\r\n";

		// 	mb_send_mail(to, subject, message)

		// 	$this->send_mail($to,$subject,$message,$headers);

		

	}

	



}




 ?>



 ?>