<?php 

/**
 * 
 */
class cours extends CI_Controller
{
	
	public function __construct()
	{
	  parent::__construct();
	  $this->load->library('form_validation');
	  $this->load->library('encrypt');
	  $this->load->model('crud_model'); 
	  $this->load->model('login_model'); 
	}

	function index(){
		$data['title']="les cours en lignes";
		$this->load->view('backend/cours/home', $data);
	}

	function contact(){
		$data['title']="Contactez-nous";
		$this->load->view('backend/cours/contact', $data);
	}

	function projet(){
		$data['title']="Nos meilleurs projets";
		$this->load->view('backend/cours/projet', $data);
	}

	function service(){
		$data['title']="Nos services de white-fondation";
		$this->load->view('backend/cours/service', $data);
	}

	function chat_admin($param1, $param2){
		$data['title']="Discution instantané";
		$data['id_user']= $param1;
		$data['id_recever']= $param2;
		$this->load->view('backend/cours/chat', $data);
	}

	function chat_local_view($param1, $param2){
		$data['title']="Discution instantané";
		$data['id_user']= $param1;
		$data['id_recever']= $param2;

		$code = substr(md5(rand(100000000, 200000000)), 0, 10);

		if ($this->input->post('Message_text') !='') {
			$donne = array(  
	           'id_user'          =>     $param1,  
	           'id_recever'       =>     $param2,
	           'message'          =>     $this->input->post('Message_text'),
	           'code'			  =>	 $code
		    ); 

			$this->crud_model->insert_message($donne);
			redirect('cours/chat_admin/'.$param1.'/'.$param2);
		}
		else{
			redirect('cours/chat_admin/'.$param1.'/'.$param2);
		}
		
		
	}
	

	function view($param1='', $param2='', $param3=''){
		if ($param1=='show') {

			$data['idcours']= $param2;
			$data['title']="les cours en lignes";
			$this->load->view('backend/cours/showcours', $data);
			# code...
		}
		elseif ($param1=='detail_lesson') {

			$data['code']= $param2;
			$data['title']="Détail de la leçon";
			$this->load->view('backend/cours/detail_lesson', $data);
			# code...
		}
		elseif ($param1=='display_delete') {

			$this->db->where('id', $param2);
			$this->db->delete('notification');
			$this->notification();
			# code...
		}
		elseif ($param1=='ajout_favori') {

			$id;
			if($this->session->userdata('id')) {
			    $id=$this->session->userdata('id');
				$cours = $this->db->get_where('favories', array(
					    	'idcours'	=>	$param2,
					    	'id_user'	=>	$id
					    ));
		       
		        if ($cours->num_rows() > 0) {
		        	# code...
		        }
		        else{
		        	$donne = array(  
		               'id_user'          =>     $id,  
			           'idcours'          =>     $param2 
		        	); 
		        	$this->crud_model->add_favory($donne);
		        }

		        
			}
			elseif($this->session->userdata('admin_login')) {
			  $id=$this->session->userdata('admin_login');
			    $cours = $this->db->get_where('favories', array(
					    	'idcours'	=>	$param2,
					    	'id_user'	=>	$id
					    ));
		       
		        if ($cours->num_rows() > 0) {
		        	# code...
		        }
		        else{
		        	$donne = array(  
		               'id_user'          =>     $id,  
			           'idcours'          =>     $param2 
		        	); 
		        	$this->crud_model->add_favory($donne);
		        }

			}
			elseif($this->session->userdata('instuctor_login')) {

			    $id=$this->session->userdata('instuctor_login');
			    $cours = $this->db->get_where('favories', array(
					    	'idcours'	=>	$param2,
					    	'id_user'	=>	$id
					    ));
		       
		        if ($cours->num_rows() > 0) {
		        	# code...
		        }
		        else{
		        	$donne = array(  
		               'id_user'          =>     $id,  
			           'idcours'          =>     $param2 
		        	); 
		        	$this->crud_model->add_favory($donne);
		        }
			    

			}
			else{
			  $id=0;
			}

			$donne = array(  
	               'id_user'          =>     $id,  
		           'idcours'          =>     $param2 
	        ); 

	        $this->db->where('idcours', $param2);
	        $cours= $this->db->get('favories');
	        if ($cours->num_rows() > 0) {
	        	# code...
	        }
	        else{
	        	$this->crud_model->add_favory($donne);
	        }


			
			
			$data['idcours']= $param2;
			$data['title']="les cours en lignes";
			$this->load->view('backend/cours/showcours', $data);
			# code...
		}
	}

	function notification(){
		$data['title']="les notifications";
		$this->load->view('backend/cours/notification', $data);
	}


	function operation_contact(){

	      	$insert_data = array(  
	           'name'          =>     $this->input->post('name'),  
	           'subject'       =>     $this->input->post("subject"),
	           'email'         =>     $this->input->post("email"),  
	           'message'       =>     $this->input->post("message")  
	           
		  	);  
	       
	      	$requete=$this->crud_model->insert_contact($insert_data);

	        $website = "whitefondation@gmail.com";

	        $to 	 =	$website;
	        $name    = $this->input->post('name');
	        $subject = $this->input->post('subject');
	        $message2 = $this->input->post('message');

	        $message = 'Bonjour, je suis'.$name.' mon sujet est '.$subject.', '.$message2;
	         

	        $headers= "MIME Version 1.0\r\n";
	        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
	        $headers .= "From: no-reply@whitefondation.com" . "\r\n" ."Reply-to: sumailiroger681@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();

	        mail($to,$subject,$message,$headers);

	        if(mail($to,$subject,$message,$headers) > 0){
                echo("Nous vous répondrons dans un instant");
	        } 
            else {
                echo("échec lors de l'envoie de message!!!!!!!!!!!!");
            }
	      
      }


}





 ?>