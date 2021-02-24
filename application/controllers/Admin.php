<?php 
 /**
 * 
 */

class admin extends CI_Controller
{
	private $token;
	public function __construct()
	{
	  parent::__construct();
	  if(!$this->session->userdata('admin_login'))
      {
      	redirect(base_url().'login');
      }
	  $this->load->library('form_validation');
	  $this->load->library('encrypt');
	  $this->load->model('crud_model'); 
	  $this->load->model('login_model'); 

	  $this->token = "sk_test_51GzgDmLqhFzYb1A3uuqyWgXOqx2Pn5U97fIrCfgQDVdjXEoP088vU8inLAZIsMvGCdFYsu9NBnJXtxbgzMNHppVM00Bu7JZ1Qv";

	}

	function index(){
		$data['title']="mon profile admin";
		$this->load->view('backend/admin/panel', $data);
	}

	function groupe(){
		$data['title']="Création d'un groupe de discution";
		$this->load->view('backend/admin/groupe', $data);
	}

	function news_app(){
		$data['title']="Les nouvelles informations à la une";
		$this->load->view('backend/admin/news_app', $data);
	}

	function map(){
		$data['title']="detection et localisation";
		$this->load->view('backend/admin/map', $data);
	}

	function dashbord(){
		$data['title']="accueil post de travail";
		// $this->load->view('backend/admin/dashbord', $data);


		$this->load->view('backend/admin/province', $data);
	}


	function admin_panel($param1=''){
		$data['id_user']= $param1;
		$data['title']="le profile pour les informations de la creation de compte";
		$this->load->view('backend/admin/admin_panel', $data);
	}

	function admin_panel_plus($param1=''){
		$data['id_user']= $param1;
		$data['title']="photo de profile pour les informations de la creation de compte";
		$this->load->view('backend/admin/admin_panel_plus', $data);
	}

	function admin_panel_account($param1=''){
		$data['id_user']= $param1;
		$data['title']="le profile pour les informations de la creation de compte";
		$this->load->view('backend/admin/admin_panel_account', $data);
	}

	function formation(){
		$data['title']="operation sur les formations";
		$this->load->view('backend/admin/formation', $data);
	}
	function cours(){
		$data['title']="operation sur les cours de la formations";
		$this->load->view('backend/admin/admin_cours', $data);
	}

	function section_cours(){
		$data['title']="opération d'ajout de chapitre pour un cours";
		$this->load->view('backend/admin/admin_section', $data);

	}
	function section_lesson(){
		$data['title']="opération d'ajout des leçons pour les sections";
		$this->load->view('backend/admin/admin_lesson', $data);
	}

	function publication(){
		$data['title']="les publications";
		$this->load->view('backend/admin/publication', $data);
	}

	function evenement(){
		$data['title']="Ajout des évenements dans le calendrier";
		$this->load->view('backend/admin/evenement', $data);
	}

	function detail_users(){
		$data['title']="Détail des utilisateurs";
		$this->load->view('backend/admin/admin_users', $data);
	}

	function statistique(){
		$data['title']="Statistique des nos utilisateurs";
		$this->load->view('backend/admin/admin_statistique', $data);
	}


	function notification($param1=''){
		$data['id_user']= $param1;
		$data['title']="Mes notifications";
		$this->load->view('backend/admin/notification', $data);
	}

	function message($param1=''){
		$data['id_user']= $param1;
		$data['title']="Mes messages";
		$this->load->view('backend/admin/message', $data);
	}

	function favory($param1=''){
		$data['id_user']= $param1;
		$data['title']="Mes cours";
		$this->load->view('backend/admin/favory', $data);
	}

	function calendrier(){
		$data['title']="Calendrier de déroulement des activités";
		$this->load->view('backend/admin/calendrier', $data);
	}

	function service(){
		$data['title']="Nos services offerts";
		$this->load->view('backend/admin/admin_service', $data);
	}

	function projet(){
		$data['title']="Nos projets offerts";
		$this->load->view('backend/admin/admin_projet', $data);
	}

	function chat_admin($param1, $param2){
		$data['title']="Discution instantané";
		$data['id_user']= $param1;
		$data['id_recever']= $param2;
		$data['id_recever2']= $param2;
		$this->load->view('backend/admin/messagerie', $data);
	}

	function chat_admin2($param1, $param2){
		$data['title']="Discution groupe instantané";
		$data['id_user']= $param1;
		$data['code_groupe']= $param2;
		$this->load->view('backend/admin/messagerie_groupe', $data);
	}

	function contact(){
		$data['title']="Nos projets offerts";
		$this->load->view('backend/admin/admin_contact', $data);
	}

	function formateur(){
		$data['title']="Ajout d'un formateur";
		$this->load->view('backend/admin/admin_formateur', $data);
	}

	function detail_formateur(){
		$data['title']="Détail de nos formateurs";
		$this->load->view('backend/admin/admin_detail_formateur', $data);
	}

	function membre(){
		$data['title']="Nos membres";
		$this->load->view('backend/admin/admin_membre', $data);
	}

	function liste_membre(){
		$data['title']="Liste des membres";
		$this->load->view('backend/admin/admin_list_membre', $data);
	}

	function nos_contact(){
		$data['title']="Liste des Contacts";
		$this->load->view('backend/admin/membre', $data);
	}

	function liste_incription(){
		$data['title']="Liste des Contacts";
		$this->load->view('backend/admin/admin_inscription_formation', $data);
	}

	function filter_liste_incription(){
		$data['title']			="liste des projets";
		$data['annee']			= $this->input->post('annee');
		$data['nomformation']	= $this->input->post('nomformation');
		$this->load->view('backend/admin/admin_liste_inscription_formation', $data);
	}

	function projet_plus(){
		$data['title']="Liste des projets ajoutés par les apprenants";
		$this->load->view('backend/admin/admin_liste_projets', $data);
	}

	// les scripts de paiement au comptes stripe
	function stripe(){
		$data['title']="paiement avec stripe";
		$this->load->view('backend/admin/admin_stripe', $data);
	}

	function stripe2(){
		$data['title']="Exercice sur le stripe";
		$this->load->view('backend/admin/stripe', $data);
	}

	function video(){
		$data['title']="live video chat";
		// $this->load->view('backend/admin/video', $data);
	}

	function paiement_apprenant($param1=''){
		$data['id_user']= $param1;
		$data['title']="Liste des aprenants en ordre de paiment";
		$this->load->view('backend/admin/paiement', $data);
	}


	function api(string $operation, array $data=null):stdClass{

		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_URL 				=> "https://api.stripe.com/v1/$operation",
			CURLOPT_RETURNTRANSFER 		=> true,
			CURLOPT_USERPWD 			=> $this->token,
			CURLOPT_HTTPAUTH 			=>	CURLAUTH_BASIC,
			CURLOPT_POSTFIELDS			=>	http_build_query($data)

		]);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);

		return $response;

	}


	function paiment(){
		$data['title']="vérification de paiement";
		$montant = 1000;
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$stripeToken = $this->input->post('stripeToken');

		$data = [
			'source'		=>	$stripeToken,
			'description'	=>	$name,
			'email'			=>	$email
		];
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL) && ! empty($name) && !empty($stripeToken)) {
			// echo('nom:'.$name.' email:'.$email.' token:'.$stripeToken);

			$customer = $this->api('customers', [
				'source'		=>	$stripeToken,
				'description'	=>	$name,
				'email'			=>	$email
			]);

			$charge = $this->api('charges', [
				'amount'	=>	$montant,
				'currency'	=>	'usd',
				'customer'	=>	$customer->id
			]);

			var_dump($charge);
			die('bravo votre paiement a été bien éffectué');
		}
		else{
			echo("erreur désolé!!!!");
		}


	}

	// fin de mes scripts de paiement stripe



	function view_formation($param1='',$param2='',$param3=''){
		if ($param1=='inscription') {

			$annee = date('Y');
			$data= array(
				'iduser'		=>	$this->input->post('iduser'),
				'idformation'	=>	$this->input->post('idformation'),
				'annee'			=>	$annee
			);

			$query = $this->crud_model->inscription_formation($data);
			if ($query > 0) {
				echo("votre inscription a reussie avec succès");
			}
			else{
				echo("erreur suvenue lors de l'inscription!!!!!");
			}
		}

		$data['title']="Formation en ligne";
		$this->load->view('backend/admin/fetch_formation', $data);
	}



	// function student_temoignage($param1=''){
	// 	$data['id_user']= $param1;
	// 	$data['title']="fiche de temoignage";
	// 	$this->load->view('backend/apprenant/student_temoignage', $data);
	// }

	function operation_formateur($param1='', $param2=''){
		  if ($param1=='insertion') {
		  		
		  		$this->form_validation->set_rules('first_name', 'veillez completer le nom', 'required|trim');
	  		  $this->form_validation->set_rules('last_name', 'veillez completer le prenom', 'required|trim');
	  		  $this->form_validation->set_rules('mail_ok', 'veillez vérifier adresse email', 'required|trim|valid_email|is_unique[users.email]');
	  		  $this->form_validation->set_rules('user_password', 'Password', 'required');
	  		  if($this->form_validation->run())
	  		  {
	  			   $verification_key = md5(rand());
	               $encrypted_password = md5($this->input->post("user_password"));
	  			   $data = array(
	  			    'first_name'  			=> $this->input->post('first_name'),
	  			    'last_name'  			=> $this->input->post('last_name'),
	  			    'email'  			    => $this->input->post('mail_ok'),
	  			    'passwords' 			=> $encrypted_password,
	  			    'idrole' 			    => 3,
	  			    'image'                 => $this->upload_image()
	  			   );
	  		   	   $id = $this->crud_model->insert($data);
	  			   if($id > 0)
	  			   {

	  			    $this->session->set_flashdata('message', 'ce compte a été créer avec succès, et surtout bienvenue '.$this->input->post('first_name'));
	  				     redirect('admin/formateur');
	  			   }
	  			   else{
	  			   	$this->session->set_flashdata('message2', 'erreur veillez vérifier les informations requises');
	  				     redirect('admin/formateur');
	  			   }
	  		  }
	  		  else
	  		  {
	  		   redirect('admin/formateur');
	  		  }
		  }

  		  if ($param1=="suppression") {
  		  	$query = $this->crud_model->delete_crud($param2);
  		  	$this->session->set_flashdata('message', 'suppression avec succès');
  		  	redirect('admin/detail_formateur');
  		  }

  		  if ($param1=="suppression_membre") {
  		  	$query = $this->crud_model->delete_member($param2);
  		  	$this->session->set_flashdata('message', 'suppression avec succès');
  		  	redirect('admin/liste_membre');
  		  }

  		  if ($param1=="suppression_apprenant_alaformation") {
  		  	$query = $this->crud_model->delete_apprenant_to_formation($param2);
  		  	$this->session->set_flashdata('message', 'suppression avec succès');
  		  	redirect('admin/liste_incription');
  		  }

	}


	function infomation_par_mail()
     {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
               
                $mail    = $id[$count];
                $website = "whitefondation@gmail.com";

                $to =$id[$count];
                $subject = $this->input->post('sujet');
                $message2 = $this->input->post('message');
                 

                $headers= "MIME Version 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "From: no-reply@whitefondation.com" . "\r\n" ."Reply-to: sumailiroger681@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();

                mail($to,$subject,$message2,$headers);

           }

           if(mail($to,$subject,$message2,$headers) > 0){
                echo("message envoyé avec succès");
           } 
           else {
                echo("échec lors de l'envoie de message!!!!!!!!!!!!");
           }


        }
     }

     function ajout_membre()
     {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
               
                $data = array(
                	'iduser' =>		$id[$count]
                );
                $query = $this->db->insert('membre', $data);
               
           }

           if($query > 0){
                echo("Ajout membre avec succès");
           } 
           else {
                echo("échec lors de l'Enregistrement !!");
           }


        }
     }

	function chat_local_view($param1, $param2){
		$data['title']="Discution instantané";
		$data['id_user']= $param1;
		$data['id_recever']= $param2;

		$code = substr(md5(rand(100000000, 200000000)), 0, 10);

		if ($this->input->post('Message_text') !='') {

			$chat['id_user'] = $param1;
			$chat['id_recever'] = $param2;
			$chat['message'] = $this->input->post('Message_text');
			$chat['code'] = $code;

			$md5 = md5(date('d-m-y H:i:s'));


			
			if($_FILES['user_image']['size'] > 0){

				$chat['fichier'] =	$md5.str_replace(' ', '', $_FILES['user_image']['name']);

             	// $chat['fichier'] = $this->upload_image_chat_envoie();
             	move_uploaded_file($_FILES['user_image']['tmp_name'], 'upload/groupe/fichier/' . $md5.str_replace(' ', '', $_FILES['user_image']['name']));
            }

			$this->crud_model->insert_message($chat);
			
			redirect('admin/chat_admin/'.$param1.'/'.$param2);
		}
		else{
			redirect('admin/chat_admin/'.$param1.'/'.$param2);
		}
		
		
	}


	function chat_local_view_groupe($param1, $param2){
		$data['title']="Discution instantané";
		$data['id_user']= $param1;
		$data['code_groupe']= $param2;

		$code = substr(md5(rand(100000000, 200000000)), 0, 10);

		if ($this->input->post('Message_text') !='') {

			$chat['id_user'] = $param1;
			$chat['code_groupe'] = $param2;
			$chat['message'] = $this->input->post('Message_text');
			if($_FILES['user_image']['size'] > 0){

             	$chat['fichier'] = $this->upload_image_chat_envoie();
            }
			
			$this->crud_model->insert_message_chat_groupe($chat);
			redirect('admin/chat_admin2/'.$param1.'/'.$param2);
		}
		else{
			redirect('admin/chat_admin2/'.$param1.'/'.$param2);
		}
		
		
	}



	function view($param1='', $param2='', $param3=''){
		if ($param1=='show') {

			$data['idcours']= $param2;
			$data['title']="Mes notifications";
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

		elseif ($param1=='display_delete_message') {

			$this->db->query("DELETE FROM messagerie WHERE  idmessage='".$param3."'  ");
			redirect('admin/message/'.$param2);
			# code...
		}

		elseif ($param1=='display_delete_favory') {

			$this->db->query("DELETE FROM favories WHERE  idfovorie='".$param3."'  ");
			redirect('admin/favory/'.$param2);
			# code...
		}
		elseif ($param1=='display_delete_favory_cours') {

			$this->db->query("DELETE FROM favory2 WHERE  idfav='".$param3."'  ");
			redirect('admin/favory/'.$param2);
			# code...
		}
		elseif ($param1=='ajout_favori') {

			$id;
			if($this->session->userdata('id')) {
			    $id=$this->session->userdata('id');
				  $donne = array(  
		               'id_user'          =>     $id,  
			           'idcours'          =>     $param2 
		        ); 

				  $this->crud_model->add_favory($donne);

		        
			}
			elseif($this->session->userdata('admin_login')) {
			  $id=$this->session->userdata('admin_login');
			}
			elseif($this->session->userdata('instuctor_login')) {
			  $id=$this->session->userdata('instuctor_login');
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




	function modification_panel($param1='', $param2='', $param3=''){

		if ($param1="option1") {
			 $data = array(
			    'first_name'  			=> $this->input->post('first_name'),
			    'last_name'  			=> $this->input->post('last_name'),
			    'telephone'  			=> $this->input->post('telephone'),
			    'full_adresse'  		=> $this->input->post('full_adresse'),
			    'biographie'  			=> $this->input->post('biographie'),
			    'date_nais'  			=> $this->input->post('date_nais'),
			    'sexe'  				=> $this->input->post('sexe'),
			    'email'  				=> $this->input->post('mail_ok'), 

			    'facebook'  			=> $this->input->post('facebook'),
			    'linkedin'  			=> $this->input->post('linkedin'),
			    'twitter'  				=> $this->input->post('twitter'),
			    'university'  			=> $this->input->post('university'),
			    'faculte'  				=> $this->input->post('faculte'),
			    'option'  				=> $this->input->post('option')
			);

			   $id_user= $param2;
		   	   $query = $this->crud_model->update_crud($id_user, $data);
		   	   $this->session->set_flashdata('message', 'votre profile a été mis à jour avec succès');
				     redirect('admin');
		}

	}

	function modification_photo($param1=''){

	   $id_user= $param1;
	   $data = array(
		    'image'     => $this->upload_image()
		);
	   $query = $this->crud_model->update_crud($id_user, $data);
	   $this->session->set_flashdata('message', 'modification avec succès');
	   		redirect('admin');
	}

	function modification_account($param1=''){
		   $id_user= $param1;
		   $first_name;

		   $passwords = md5($this->input->post('user_password_ancien'));
		   
		   $users = $this->db->query("SELECT * FROM users WHERE passwords='".$passwords."' AND id='".$id_user."' ");

		   if ($users->num_rows() > 0) {
		   		
		   		foreach ($users->result_array() as $row) {
			   		$first_name = $row['first_name'];
			   		// echo($first_name);
			   		 $nouveau   =  $this->input->post('user_password_nouveau');
			   		 $confirmer =  $this->input->post('user_password_confirmer');
			   		 if ($nouveau == $confirmer) {
			   		 	$new_pass= md5($nouveau);

			   		 	$data = array(
		  			    	'passwords'  => $new_pass
		  			    );

		  		   	   $query = $this->crud_model->update_crud($id_user, $data);
		  		   	   $this->session->set_flashdata('message', 'votre clée de sécurité a été changer avec succès '.$first_name);
		  				     redirect('admin');

	  			     }
	  			     else{
	 
	  			   		$this->session->set_flashdata('message2', 'les deux mot de passe doivent être identiques');
	  			   		redirect('admin');
	  			     }
			   
			    }

		   }
		   else{

		   	  $this->session->set_flashdata('message2', 'information incorecte');
	  		  redirect('admin');

		   }
	   
	}

	// function modification_temoignage($param1=''){

	// 	$data = array(

	// 	    'temoignage1'  			=> $this->input->post('temoignage1'),
	// 	    'temoignage2'  			=> $this->input->post('temoignage2'),
	// 	    'temoignage3'  			=> $this->input->post('temoignage3'),
	// 	    'temoignage4'  		    => $this->input->post('temoignage4'),
	// 	    'temoignage5'  			=> $this->input->post('temoignage5')
	// 	);

	//    $id_user= $param1;
 //   	   $query = $this->crud_model->update_crud($id_user, $data);
 //   	   $this->session->set_flashdata('message', 'modification avec succès');
	// 	     redirect('student/student_temoignage/'.$param1);

	// }

	function upload_image()  
    {  
       if(isset($_FILES["user_image"]))  
       {  
            $extension = explode('.', $_FILES['user_image']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/photo/' . $new_name;  
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
            return $new_name;  
       }  
    } 


    function upload_image_livre()  
    {  
       if(isset($_FILES["user_image"]))  
       {  
            $extension = explode('.', $_FILES['user_image']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/livre/' . $new_name;  
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
            return $new_name;  
       }  
    } 

    function upload_image_chat_envoie()  
    {  
       if(isset($_FILES["user_image"]))  
       {  
            $extension = explode('.', $_FILES['user_image']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/groupe/fichier/' . $new_name;  
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
            return $new_name;  
       }  
    } 


    function upload_image_livre_fichier()  
    {  
       if(isset($_FILES["user_image2"]))  
       {  
            $extension = explode('.', $_FILES['user_image2']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/livre/fichier/' . $new_name;  
            move_uploaded_file($_FILES['user_image2']['tmp_name'], $destination);  
            return $new_name;  
       }  
    } 

    
    // script de formation
    function fetch_formation(){  

           $fetch_data = $this->crud_model->make_datatables_formation();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/formation/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->nomformation, 0,50)).'...';  
                $sub_array[] = nl2br(substr($row->description, 0,50)).'...'; 
                $sub_array[] = $row->prix.' $';
 
                $sub_array[] = '<button type="button" name="update" idformation="'.$row->idformation.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idformation="'.$row->idformation.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_formation(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_formation(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_formation()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_formation($_POST["idformation"]);  
           foreach($data as $row)  
           {  
                $output['nomformation'] = $row->nomformation;  
                $output['description'] = $row->description; 
                $output['prix'] = $row->prix;

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/formation/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      function operation_formation(){

	      $insert_data = array(  
	           'nomformation'          =>     $this->input->post('nomformation'),  
	           'description'           =>     $this->input->post("description"), 
	           'prix'         		   =>     $this->input->post('prix'), 
	           'image'                 =>     $this->upload_image_formation()
		  );  
	       
	      $requete=$this->crud_model->insert_formation($insert_data);
	      echo("Ajout formation avec succès");
	      
      }

      function modification_formation(){

          $user_image = '';  
          if($_FILES["user_image"]["name"] != '')  
          {  
               $user_image = $this->upload_image_formation();  
          }  
          else  
          {  
               $user_image = "13.jpg";  
          }
  
          $updated_data = array(  
               'nomformation'          =>     $this->input->post('nomformation'),  
	           'description'           =>     $this->input->post("description"),
	           'prix'         		   =>     $this->input->post('prix'),   
	           'image'                 =>     $user_image  
          );  

          $this->crud_model->update_formation($this->input->post("idformation"), $updated_data);

          echo("modification avec succès");
      }

      function modification_formation2(){
  
          $updated_data = array(  
               'nomformation'          =>     $this->input->post('nomformation'),  
	           'description'           =>     $this->input->post("description"),
	           'prix'         		   =>     $this->input->post('prix') 
          );  

          $this->crud_model->update_formation($this->input->post("idformation"), $updated_data);

          echo("modification avec succès");
      }


      function supression_formation(){
 
          $this->crud_model->delete_formation($this->input->post("idformation"));

          echo("suppression avec succès");
        
      }


      function upload_image_formation()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/formation/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 

	   function upload_image_groupe()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/groupe/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 

	  // fin script formation

	  // scripts pour les cours
	  function operation_cours(){

	      $insert_data = array( 
	      	   'idformation'           =>     $this->input->post('idformation'),  
	           'nomcours'          	   =>     $this->input->post('nomcours'),  
	           'description'           =>     $this->input->post("description"), 
	           'niveau'          	   =>     $this->input->post('niveau'), 
	           'image'                 =>     $this->upload_image_cours()
		  );  
	       
	      $requete=$this->crud_model->insert_cours($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function fetch_cours(){  

           $fetch_data = $this->crud_model->make_datatables_cours();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/cours/'.$row->image.'" class="img-thumbnail" width="50" height="35" />'; 
                $sub_array[] = nl2br(substr($row->nomcours, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->niveau, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->description, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->nomformation, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->created_at, 0,50)).'...';  
                
 				// $sub_array[] = '<a href="'.base_url().'cours/view/show/'.$row->idcours.'" type="button" name="voir" idcours="'.$row->idcours.'" class="btn btn-secondary btn-xs voir"><i class="fa fa-camera"></i></a>';

                $sub_array[] = '<button type="button" name="update" idcours="'.$row->idcours.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idcours="'.$row->idcours.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_cours(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_cours(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_cours()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_cours($_POST["idcours"]);  
           foreach($data as $row)  
           {  
                $output['nomcours'] = $row->nomcours;  
                $output['description'] = $row->description; 
                $output['idformation'] = $row->idformation;
                $output['niveau'] = $row->niveau;

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/cours/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      } 

      function supression_cours(){
 
          $this->crud_model->delete_cours($this->input->post("idcours"));
          echo("suppression avec succès");
        
      }

      function modification_cours(){

          $user_image = '';  
          if($_FILES["user_image"]["name"] != '')  
          {  
               $user_image = $this->upload_image_cours();  
          }  
          else  
          {  
               $user_image = "13.jpg";  
          }
  
          $updated_data = array(  
               'nomcours'           =>     $this->input->post('nomcours'),
               'idformation'        =>     $this->input->post('idformation'),
               'niveau'          	=>     $this->input->post('niveau'),  
	           'description'        =>     $this->input->post("description"),  
	           'image'              =>     $user_image  
          );  

          $this->crud_model->update_cours($this->input->post("idcours"), $updated_data);
          echo("information mise à jour avec succès");
      }

      function modification_cours2(){
  
          $updated_data = array(  
               'nomcours'           =>     $this->input->post('nomcours'),
               'idformation'        =>     $this->input->post('idformation'),
               'niveau'          	=>     $this->input->post('niveau'),  
	           'description'        =>     $this->input->post("description") 
          );   

          $this->crud_model->update_cours($this->input->post("idcours"), $updated_data);

          echo("information mise à jour avec succès");
      } 


	  function upload_image_cours()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/cours/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 

   // fin de script de cours

	  // debit des scripts sections
	  function fetch_section(){  

           $fetch_data = $this->crud_model->make_datatables_section();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                
                $sub_array[] = nl2br(substr($row->titre, 0,50)).'...';
                $sub_array[] = nl2br(substr($row->nomcours, 0,50)).'...';
                $sub_array[] = nl2br(substr($row->description, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->created_at, 0,50)).'...'; 

                
 
                $sub_array[] = '<button type="button" name="update" idsection="'.$row->idsection.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idsection="'.$row->idsection.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_section(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_section(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);


      }

      function operation_section($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$insert_data = array( 
		      	   'titre'                 =>     $this->input->post('titre'),  
		           'idcours'          	   =>     $this->input->post('idcours')    
			);  
		       
	        $requete=$this->crud_model->insert_section($insert_data);

	        $this->session->set_flashdata('message', 'Enregistrement avec succès');
  				     
	        redirect("cours/view/show/".$param2);
	  	  	# code...
	  	  }
	  	  elseif ($param1=="delete") {
	  	  	$this->crud_model->delete_section($param3);
	  	  	$this->session->set_flashdata('message', 'suppression avec succès');
  				     
	        redirect("cours/view/show/".$param2);
            
	  	  }

	  }

	  function insertion_section(){

	  		$insert_data = array( 
		      	   'titre'                 =>     $this->input->post('titre'),  
		           'idcours'          	   =>     $this->input->post('idcours')    
			);  
		       
	        $requete=$this->crud_model->insert_section($insert_data);
	        echo("le chapitre est ajouté avec succès");
	  }

	  function supression_section(){
 
          $this->crud_model->delete_section($this->input->post("idsection"));
          echo("suppression avec succès");
        
      }

	  function modification_section(){

		$updated_data = array(  
               'titre'              =>     $this->input->post('titre') 
          );   

          $this->crud_model->update_section($this->input->post("idsection"), $updated_data);
          echo("information mise à jour avec succès");
	  }


      function fetch_single_section()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_section($this->input->post("idsection"));  
           foreach($data as $row)  
           {  
                $output['titre']   = $row->titre; 
                $output['idcours'] = $row->idcours;  
           }  
           echo json_encode($output);  
      }  
   
	  // fin de script section 

      //les scripts lesson 

      function fetch_lesson(){  

           $fetch_data = $this->crud_model->make_datatables_lesson();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                
                $sub_array[] = '<img src="'.base_url().'upload/cours/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';

                $sub_array[] = nl2br(substr($row->titre, 0,50)).'...';
                $sub_array[] = nl2br(substr($row->nomcours, 0,50)).'...';
                $sub_array[] = nl2br(substr($row->niveau, 0,50)).'...';
                $sub_array[] = nl2br(substr($row->description, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->nomformation, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->created_at, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->chapitre, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->type_fichier, 0,50)).'...'; 
 
                // $sub_array[] = '<a href="'.base_url().'cours/view/detail_lesson/'.$row->code.'" type="button" name="voir" idlesson="'.$row->idlesson.'" class="btn btn-secondary btn-xs voir"><i class="fa fa-camera"></i></a>';

                $sub_array[] = '<button type="button" name="update" idlesson="'.$row->idlesson.'" titre="'.$row->titre.'" description="'.$row->description.'" type_fichier="'.$row->type_fichier.'" image="'.$row->image.'" idsection="'.$row->idsection.'" fichier="'.$row->fichier.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idlesson="'.$row->idlesson.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_lesson(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_lesson(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);


      }

      function fetch_single_lesson_plus()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_lesson_plus($this->input->post("idsection"));  
           foreach($data as $row)  
           {  
                $output['titre'] 		= $row->titre;  
                $output['description']	= $row->description; 
                $output['idsection'] 	= $row->idsection;
                $output['type_fichier'] = $row->type_fichier;
    
           }

           echo json_encode($output);  
      }

	  function insertion_lesson(){
	  		$code = substr(md5(rand(100000000, 200000000)), 0, 10);
	  		$insert_data = array( 
		      	   'titre'                     =>     $this->input->post('titre'),  
		           'idsection'          	   =>     $this->input->post('idsection'),
		           'titre'          	       =>     $this->input->post('titre'),
		           'description'          	   =>     $this->input->post('description'),
		           'type_fichier'          	   =>     $this->input->post('type_fichier'),
		           'fichier'				   =>	  $this->upload_image_lesson(),
		           'code'				   	   =>	  $code

			);

			
			$message="nouvelle leçon: ".$this->input->post('titre');
			$url ="cours/view/detail_lesson/".$code;

			$this->db->where("idrole", 2);
			$student= $this->db->get("users");
			// foreach ($student->result_array() as $row) {
		  	
			//   	$notification = array( 
		 //      	   'message'                   =>     $message,  
		 //           'id_user'          	   	   =>     $row["id"],
		 //           'url'          	       	   =>     $url
			//     );

			//     $this->db->insert('notification', $notification);
			// }  
		       
	        $requete=$this->crud_model->insert_lesson($insert_data);
	        echo("la leçon a été ajouter avec succès");

	  }

	  function insertion_lesson_sans_video(){
	  		$code = substr(md5(rand(100000000, 200000000)), 0, 10);
	  		$insert_data = array( 
		      	   'titre'                     =>     $this->input->post('titre'),  
		           'idsection'          	   =>     $this->input->post('idsection'),
		           'titre'          	       =>     $this->input->post('titre'),
		           'description'          	   =>     $this->input->post('description'),
		           'type_fichier'          	   =>     $this->input->post('type_fichier'),
		           'fichier'				   =>	  $this->input->post('youtube'),
		           'code'				   	   =>	  $code

			); 

			$message="nouvelle leçon: ".$this->input->post('titre');
			$url ="cours/view/detail_lesson/".$code;

			$this->db->where("idrole", 2);
			$student= $this->db->get("users");
			// foreach ($student->result_array() as $row) {
		  	
			//   	$notification = array( 
		 //      	   'message'                   =>     $message,  
		 //           'id_user'          	   	   =>     $row["id"],
		 //           'url'          	       	   =>     $url
			//     );

			//     $this->db->insert('notification', $notification);
			// }  
		       
	        $requete=$this->crud_model->insert_lesson($insert_data);
	        echo("votre leçon a été ajouter avec succès courage!");

	  }


	  function modification_lesson(){

          $user_image = '';  
          if($_FILES["user_image"]["name"] != '')  
          {  
               $user_image = $this->upload_image_lesson();  
          }  
          else  
          {  
               $user_image = "13.jpg";  
          }
  
          $updated_data = array(  
               'titre'           	=>     $this->input->post('titre'),
               'idsection'          =>     $this->input->post('idsection'),  
	           'description'        =>     $this->input->post("description"), 
	           'type_fichier'       =>     $this->input->post("type_fichier"), 
	           'fichier'            =>     $user_image  
          );  

          $this->crud_model->update_lesson($this->input->post("idlesson"), $updated_data);
          echo("information mise à jour avec succès");
      }

      function modification_lesson_youtube(){

          
  
          $updated_data = array(  
               'titre'           	=>     $this->input->post('titre'),
               'idsection'          =>     $this->input->post('idsection'),  
	           'description'        =>     $this->input->post("description"), 
	           'type_fichier'       =>     $this->input->post("type_fichier"), 
	           'fichier'            =>     $this->input->post("youtube") 
          );  

          $this->crud_model->update_lesson($this->input->post("idlesson"), $updated_data);
          echo("information mise à jour avec succès");
      }

      function modification_lesson2(){
  
           $updated_data = array(  
               'titre'           	=>     $this->input->post('titre'),
               'idsection'          =>     $this->input->post('idsection'),  
	           'description'        =>     $this->input->post("description"), 
	           'type_fichier'       =>     $this->input->post("type_fichier")
            );  

          $this->crud_model->update_lesson($this->input->post("idlesson"), $updated_data);
          echo("information mise à jour avec succès");
      }



	  function upload_image_lesson()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/fichier/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  }

	  function supression_lesson(){
 
          $this->crud_model->delete_lesson($this->input->post("idlesson"));
          echo("suppression avec succès");
        
      } 

	  // fin des scripts leçons

	  // ajout des informations
	  function fetch_information(){  

           $fetch_data = $this->crud_model->make_datatables_information();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/info/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->titre, 0,50)).'...';  
                $sub_array[] = nl2br(substr($row->message, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->created_at, 0,50)).'...';
 
                $sub_array[] = '<button type="button" name="update" idinfo="'.$row->idinfo.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idinfo="'.$row->idinfo.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_information(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_information(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_information()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_information($this->input->post('idinfo'));  
           foreach($data as $row)  
           {  
                $output['titre'] = $row->titre;  
                $output['message'] = $row->message; 

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/info/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      } 

      function operation_information(){

	      $insert_data = array(  
	           'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message"),  
	           'image'          =>     $this->upload_image_information()
		  );  
	       
	      $requete=$this->crud_model->insert_information($insert_data);
	      echo("Ajout publication avec succès avec succès");
	      
      }

      function modification_information(){

          $user_image = '';  
          if($_FILES["user_image"]["name"] != '')  
          {  
               $user_image = $this->upload_image_information();  
          }  
          else  
          {  
               $user_image = "13.jpg";  
          }
  
          $updated_data = array(  
               'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message"),  
	           'image'          =>     $user_image  
          );  

          $this->crud_model->update_information($this->input->post("idinfo"), $updated_data);

          echo("modification avec succès");
      }


      function modification_information2()
      {
  
          $updated_data = array(  
               'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message") 
          );  

          $this->crud_model->update_information($this->input->post("idinfo"), $updated_data);

          echo("modification avec succès");
      }

      function supression_information()
      {
 
          $this->crud_model->delete_information($this->input->post("idinfo"));

          echo("suppression avec succès");
        
      }

      function upload_image_information()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/info/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 

	  // fin information

	  // evenement
	  function fetch_evenement(){  

           $fetch_data = $this->crud_model->make_datatables_evenement();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                  
                $sub_array[] = nl2br(substr($row->message, 0,50)).'...'; 
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->debit_event)), 0, 23));

				$sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->fin_event)), 0, 23));

				$sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23));
 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';

                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_evenement(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_evenement(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_evenement()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_evenement($this->input->post('id'));  
           foreach($data as $row)  
           {  
                $output['debit_event'] = $row->debit_event; 
                $output['fin_event']   = $row->fin_event;  
                $output['message'] = $row->message; 
                
           }  
           echo json_encode($output);  
      } 

      function operation_evenement(){

	      $insert_data = array(  
	           'debit_event'    =>     $this->input->post('debit_event'),
	           'fin_event'      =>     $this->input->post('fin_event'),  
	           'message'        =>     $this->input->post("message")
		  );  
	       
	      $requete=$this->crud_model->insert_evenement($insert_data);
	      echo("Ajout publication avec succès avec succès");
	      
      }


      function modification_evenement()
      {
  
          $updated_data = array(  
               'debit_event'    =>     $this->input->post('debit_event'),
               'fin_event'      =>     $this->input->post('fin_event'),   
	           'message'        =>     $this->input->post("message") 
          );  

          $this->crud_model->update_evenement($this->input->post("id"), $updated_data);

          echo("modification avec succès");
      }

      function modification_membre()
      {
  
          $updated_data = array(  
               'fonction'    =>     $this->input->post('fonction')
          );  

          $this->crud_model->update_membre($this->input->post("idmembre"), $updated_data);

          echo("modification avec succès");

          
      }

      function supression_evenement()
      {
 
          $this->crud_model->delete_evenement($this->input->post("id"));

          echo("suppression avec succès");
        
      }

      function likes($param1='', $param2='', $param3=''){
      	if ($param1=='add_like') {
      		$id_user = $this->session->userdata('admin_login');
      		$idinfo = $param2;
      		$like = $this->db->query("SELECT * FROM likes WHERE idinfo='".$idinfo."' AND id_user='".$id_user."' ");
      		if ($like->num_rows() > 0) {

      			$this->db->query("DELETE FROM likes WHERE idinfo='".$idinfo."' AND id_user='".$id_user."' ");
      			redirect('admin/news_app');
      			# code...
      		}
      		else{

      			 $data['id_user'] = $id_user;
      			 $data['idinfo'] =  $idinfo;

      			 $url;

      			 $this->db->where('id', $id_user);
                 $info_personnel = $this->db->get('users');
                 if ($info_personnel->num_rows() > 0) {
                   foreach ($info_personnel->result_array() as $row) {
                     $first_name2 = $row['first_name'];
                     $last_name2  = $row['last_name'];
                     $idrole 	  = $row['idrole'];

                     if ($idrole==1) {
                     	$url ="notification/publication/".$idinfo;
                     }
                     elseif ($idrole==2) {
                     	$url ="notification/publication/".$idinfo;
                     }
                     else{
                     	$url ="notification/publication/".$idinfo;
                     }

                   }

	      			$message="".$first_name2.' a aimé une publication';
					$admin_ok= $this->db->get("users");
					foreach ($admin_ok->result_array() as $row_ok) {
				  	
					  	$notification = array( 
				      	   'message'                   =>     $message,  
				           'id_user'          	   	   =>     $row_ok["id"],
				           'url'          	       	   =>     $url,
				           'icone'                     =>     "fa fa-thumbs-o-up",
				           'titre'					   =>	  "nouveau j'aime"
					    );

					    $this->db->insert('notification', $notification);
					}



                 }
                 else{

                 }

                
      			$this->db->insert('likes',$data);
      			redirect('admin/news_app');

      		}
      	}
      }

      function commentaire($param1='', $param2='', $param3=''){
      	if ($param1 == 'add_comment') {

  			 $id_user = $this->session->userdata('admin_login');
  			 $url;
  			 $this->db->where('id', $id_user);
             $info_personnel = $this->db->get('users');
             if ($info_personnel->num_rows() > 0) {
               foreach ($info_personnel->result_array() as $row) {
                 $first_name2 = $row['first_name'];
                 $last_name2  = $row['last_name'];
                 $idrole 	  = $row['idrole'];

                 if ($idrole==1) {
                 	$url ="notification/publication/".$param2;
                 }
                 else{
                 	$url ="notification/publication/".$param2;
                 }

               }

      			$message="".$first_name2.' a aimé commenté une publication';
				$admin_ok= $this->db->get("users");
				foreach ($admin_ok->result_array() as $row_ok) {
			  	
				  	$notification = array( 
			      	   'message'                   =>     $message,  
			           'id_user'          	   	   =>     $row_ok["id"],
			           'url'          	       	   =>     $url,
			           'icone'                     =>     "fa fa-comments-o",
			           'titre'					   =>	  "nouveau commentaire"
				    );

				    $this->db->insert('notification', $notification);
				}



             }
             else{

             }

      		// echo("nom :".$nom." id_user:".$id_user." news_id=".$param2);
            $data['idinfo']    = $param2;
            $data['id_user']   = $id_user;
            $data['message']   = $this->input->post('message');
            $this->db->insert('commentaire', $data);
            redirect('admin/news_app');
      		# code...
      	}


      }

      
	  // fin evenement


	   // script des utilisateurs 
    function fetch_users(){  

           $fetch_data = $this->crud_model->make_datatables_users();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->first_name, 0,50)).'...';  
                $sub_array[] = nl2br(substr($row->last_name, 0,50)).'...'; 

                $sub_array[] = nl2br(substr($row->email, 0,50));
 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update"><i class="fa fa-eye"></i></button>';  
                
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_users(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_users(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_users()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_users($this->input->post('id'));  
           foreach($data as $row)  
           {  
                $output['first_name'] = $row->first_name;  
                $output['last_name'] = $row->last_name; 

                $output['email'] = $row->email;
                $output['telephone'] = $row->telephone;
                $output['full_adresse'] = $row->full_adresse;
                $output['biographie'] = $row->biographie;
                $output['date_nais'] = $row->date_nais;
                $output['temoignage1'] = $row->temoignage1;
                $output['temoignage2'] = $row->temoignage2;
                $output['temoignage3'] = $row->temoignage3;
                $output['temoignage4'] = $row->temoignage4;

                $output['temoignage5'] = $row->temoignage5;

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      } 


       function fetch_single_membre()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_membre($this->input->post('id'));  
           foreach($data as $row)  
           {  
                $output['first_name'] = $row->first_name;  
                $output['last_name'] = $row->last_name; 

                $output['email'] = $row->email;
                $output['telephone'] = $row->telephone;
                $output['full_adresse'] = $row->full_adresse;
                $output['biographie'] = $row->biographie;
                $output['date_nais'] = $row->date_nais;
                $output['fonction'] = $row->fonction;
                $output['idmembre'] = $row->idmembre;
                
                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      } 


	  // fin script formation


	  // ajout des service
	  function fetch_service(){  

           $fetch_data = $this->crud_model->make_datatables_service();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/info/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->titre, 0,50)).'...';  
                $sub_array[] = nl2br(substr($row->message, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->created_at, 0,50)).'...';
 
                $sub_array[] = '<button type="button" name="update" idservice="'.$row->idservice.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idservice="'.$row->idservice.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_service(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_service(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_service()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_service($this->input->post('idservice'));  
           foreach($data as $row)  
           {  
                $output['titre'] = $row->titre;  
                $output['message'] = $row->message; 
                $output['icone'] = $row->icone;

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/info/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      } 

      function operation_service(){

	      $insert_data = array(  
	           'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message"),
	           'icone'          =>     $this->input->post("icone"),  
	           'image'          =>     $this->upload_image_information()
		  );  
	       
	      $requete=$this->crud_model->insert_service($insert_data);
	      echo("Ajout publication avec succès avec succès");
	      
      }

      function modification_service(){

          $user_image = '';  
          if($_FILES["user_image"]["name"] != '')  
          {  
               $user_image = $this->upload_image_information();  
          }  
          else  
          {  
               $user_image = "13.jpg";  
          }
  
          $updated_data = array(  
               'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message"),
	           'icone'          =>     $this->input->post("icone"),  
	           'image'          =>     $user_image  
          );  

          $this->crud_model->update_service($this->input->post("idservice"), $updated_data);

          echo("modification avec succès");
      }


      function modification_service2()
      {
  
          $updated_data = array(  
               'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message") 
          );  

          $this->crud_model->update_service($this->input->post("idservice"), $updated_data);

          echo("modification avec succès");
      }

      function supression_service()
      {
 
          $this->crud_model->delete_service($this->input->post("idservice"));

          echo("suppression avec succès");
        
      }


      // ajout des projets
	  function fetch_projet(){  

           $fetch_data = $this->crud_model->make_datatables_projet();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/info/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->titre, 0,50)).'...';  
                $sub_array[] = nl2br(substr($row->message, 0,50)).'...'; 
                $sub_array[] = nl2br(substr($row->created_at, 0,50)).'...';
 
                $sub_array[] = '<button type="button" name="update" idprojet="'.$row->idprojet.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idprojet="'.$row->idprojet.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_projet(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_projet(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_projet()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_projet($this->input->post('idprojet'));  
           foreach($data as $row)  
           {  
                $output['titre'] = $row->titre;  
                $output['message'] = $row->message; 

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/info/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      } 

      function operation_projet(){

	      $insert_data = array(  
	           'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message"),  
	           'image'          =>     $this->upload_image_information()
		  );  
	       
	      $requete=$this->crud_model->insert_projet($insert_data);
	      echo("Ajout publication avec succès avec succès");
	      
      }

      function modification_projet(){

          $user_image = '';  
          if($_FILES["user_image"]["name"] != '')  
          {  
               $user_image = $this->upload_image_information();  
          }  
          else  
          {  
               $user_image = "13.jpg";  
          }
  
          $updated_data = array(  
               'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message"),  
	           'image'          =>     $user_image  
          );  

          $this->crud_model->update_projet($this->input->post("idprojet"), $updated_data);

          echo("modification avec succès");
      }


      function modification_projet2()
      {
  
          $updated_data = array(  
               'titre'          =>     $this->input->post('titre'),  
	           'message'        =>     $this->input->post("message") 
          );  

          $this->crud_model->update_projet($this->input->post("idprojet"), $updated_data);

          echo("modification avec succès");
      }

      function supression_projet()
      {
 
          $this->crud_model->delete_projet($this->input->post("idprojet"));

          echo("suppression avec succès");
        
      }

	  // fin projets


	   // ajout des contacts
	  function fetch_contact(){  

           $fetch_data = $this->crud_model->make_datatables_contact();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();

                $sub_array[] = '
                <input type="checkbox" class="delete_checkbox" value="'.$row->email.'" />
                ';  
                  
                $sub_array[] = nl2br(substr($row->name, 0,20)).'...';  
                $sub_array[] = nl2br(substr($row->subject, 0,20)).'...'; 
                $sub_array[] = $row->email; 
                $sub_array[] = nl2br(substr($row->message, 0,50)).'...';
                $sub_array[] = substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23);;

                $sub_array[] = '<button type="button" name="delete" idcontact="'.$row->idcontact.'" class="btn btn-info btn-xs update"><i class="fa fa-eye"></i></button>'; 
  
                $sub_array[] = '<button type="button" name="delete" idcontact="'.$row->idcontact.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_contact(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_contact(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_contact()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_contact($this->input->post('idcontact'));  
           foreach($data as $row)  
           {  
                $output['name'] = $row->name;  
                $output['message'] = $row->message;
                $output['email'] = $row->email;
                $output['subject'] = $row->subject; 
 
           }  
           echo json_encode($output);  
      } 

      function operation_contact(){

	      $insert_data = array(  
	           'name'          =>     $this->input->post('name'),  
	           'subject'       =>     $this->input->post("subject"),
	           'email'         =>     $this->input->post("email"),  
	           'message'       =>     $this->input->post("message")  
	           
		  );  
	       
	      $requete=$this->crud_model->insert_contact($insert_data);
	      echo("Ajout message  avec succès");
	      
      }

      
      function supression_contact()
      {
 
          $this->crud_model->delete_contact($this->input->post("idcontact"));

          echo("suppression avec succès");
        
      }

	  // fin projets

	   function upload_fichier_projet()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/projet/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       } 

	  } 

	  function upload_fichier_projet2()  
	  {  
	       
	       if(isset($_FILES["user_image2"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image2']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/projet/' . $new_name;  
	            move_uploaded_file($_FILES['user_image2']['tmp_name'], $destination);  
	            return $new_name;  
	       } 
	  } 



      function operation_projet_apprenant($param1='', $param2='', $param3=''){
      	  	
	      if ($param1=="insertion") {
	      	  $iduser = $this->input->post('iduser');
	      	  $annee = date('Y');
	      	  $query = $this->db->query("SELECT * FROM t_projet WHERE iduser='".$iduser."'
	      	   AND annee='".$annee."' ");
	      	  if ($query->num_rows() > 0) {
	      	  	echo("unique projet est admi par année");
	      	  }
	      	  else{

	      	  	$insert_data = array(  
			        'nom'         		   =>     $this->input->post('nom'),  
			        'description'          =>     $this->input->post("description"),  
			        'image'                =>     $this->upload_fichier_projet(),
			        'annee'                =>     $annee,
			        'iduser'         	   =>     $this->input->post('iduser'),
			        'fichier'              =>     $this->upload_fichier_projet2()
				 );
	      	  	$requete=$this->crud_model->insert_my_projet($insert_data);
		      	echo("votre projet a été ajouter avec succès");

	      	  }
	      	 
	      }
	      if ($param1=='lire_plus') {
	      		$data['idprojet']= $param2;
				$data['title']="informations plus plus sur le projet";
				$this->load->view('backend/apprenant/student_lecture_projet', $data);
	      }

	      if ($param1=='modification') {

	      		$idprojet = $this->input->post('idprojet');

	      		$insert_data = array(  
			        'nom'         		   =>     $this->input->post('nom'),  
			        'description'          =>     $this->input->post("description")     
				 );

	      	  	$requete=$this->crud_model->update_projet_apprenant_ok($idprojet, $insert_data);
		      	echo("modification avec succès");
	      }

	      if ($param1=='modification_all') {

	      		$idprojet = $this->input->post('idprojet');

	      		$insert_data = array(  
			        'nom'         		   =>     $this->input->post('nom'),  
			        'description'          =>     $this->input->post("description"),  
			        'image'                =>     $this->upload_fichier_projet(),
			        'fichier'              =>     $this->upload_fichier_projet2()
				 );
	      	  	$requete=$this->crud_model->update_projet_apprenant_ok($idprojet, $insert_data);
		      	echo("modification avec succès");
	      }
	      if ($param1=="suppression") {
	      		$requete=$this->crud_model->delete_projet_apprenant($param2);
		      	echo("suppression avec succès");
		      	redirect('admin/projet_plus');
	      }
	      
      }

      function fetch_single_projet_apprenant()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_projet_apprenant($_POST["idprojet"]);  
           foreach($data as $row)  
           {  
                $output['nom'] = $row->nom;  
                $output['description'] = $row->description; 
                $output['iduser'] = $row->iduser;
                $output['idprojet'] = $row->idprojet;

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/projet/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                } 
                if($row->fichier != '')  
                {  
                     $output['fichier'] = '<iframe src="'.base_url().'upload/projet/'.$row->fichier.'" id="fichier" class="col-lg-12" height="400"></iframe>';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      /*
		les opérations de la bibliothèque numérique ainsi que leur script
		commence maintenant patrona boss
      */
	function province(){
		$data['title']="Ajout des provinces dans le système";
		$this->load->view('backend/admin/province', $data);
	}

	function ville(){
		$data['title']="Ajout des villes et chefs lieu de provinces";
		$data['provinces'] = $this->crud_model->fetch_province(); 
		$this->load->view('backend/admin/ville', $data);
	}

	function university(){
		$data['title']="Ajout d'une université ou institution supérieur";
		$data['provinces'] = $this->crud_model->fetch_province();
		$this->load->view('backend/admin/university', $data);
	}

	function faculty(){
		$data['title']="Ajout d'une faculté ou session dans une université ou institution supérieur";
		$data['provinces'] = $this->crud_model->fetch_province();
		$this->load->view('backend/admin/faculty', $data);
	}

	function departement(){
		$data['title']="Ajout d'une faculté ou session dans une université ou institution supérieur";
		$data['provinces'] = $this->crud_model->fetch_province();
		$this->load->view('backend/admin/departement', $data);
	}

	function livre_book(){
		$data['title']="Ajout des livres dans une faculté ou session dans une université ou institution supérieur";
		$data['provinces'] = $this->crud_model->fetch_province();
		$this->load->view('backend/admin/livre_book', $data);
	}

	function pending_livre_book(){

		$data['title']="Ajout des livres en attente d'activation  dans une université ou institution supérieur";
		$data['provinces'] = $this->crud_model->fetch_province();
		$this->load->view('backend/admin/pending_livre_book', $data);
	}

	function access_livre(){
		$data['title']="Ajout des livres en attente d'activation  dans une université ou institution supérieur";
		$data['users'] = $this->crud_model->fetch_pagination_livre();
		$this->load->view('backend/admin/access_livre', $data);
	}

	

	

	function detail_book_livre(){

		$data['title']="Ajout des livres en attente d'activation  dans une université ou institution supérieur";
		$data['provinces'] = $this->crud_model->fetch_province();
		$this->load->view('backend/admin/detail_book_livre', $data);
	}

	
	// debit des scripts provinces
	  function fetch_province(){  

           $fetch_data = $this->crud_model->make_datatables_province();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = nl2br(substr($row->idp, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nomp, 0,50)).'';
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 

                
 
                $sub_array[] = '<button type="button" name="update" idp="'.$row->idp.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idp="'.$row->idp.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_province(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_province(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);


      }

      function operation_province($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$insert_data = array( 
		      	   'nomp'                 =>     $this->input->post('nomp')    
			);  
		       
	        $requete=$this->crud_model->insert_province($insert_data);

	        echo("Enregistrement avec succès");
  				     
	  	  	# code...
	  	  }
	  	 

	  }

	  function modification_province()  
      {  
           $updated_data = array(  
	            'nomp'    =>     $this->input->post('nomp') 
	        );   

	        $this->crud_model->update_province($this->input->post("idp"), $updated_data);
	        echo("information mise à jour avec succès"); 
      }

      function suppression_province()  
      {  
          $this->crud_model->delete_province($this->input->post("idp"));	     
	      	 echo("suppression avec succès");  
      }  
   

      function fetch_single_province()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_province($this->input->post("idp"));  
           foreach($data as $row)  
           {  
                $output['nomp']   = $row->nomp; 
           }  
           echo json_encode($output);  
      }  
   
	  // fin de script provinces


	  // debit des scripts ville
	  function fetch_ville(){  

           $fetch_data = $this->crud_model->make_datatables_ville();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  

                $sub_array[] = nl2br(substr($row->nomp, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nomv, 0,50)).'';
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 

                
 
                $sub_array[] = '<button type="button" name="update" idv="'.$row->idv.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idv="'.$row->idv.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_ville(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_ville(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);


      }

      function operation_ville($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$insert_data = array( 
		      	   'nomv'                 =>     $this->input->post('nomv'),
		      	   'idp'                 =>     $this->input->post('idp')    
			);  
		       
	        $requete=$this->crud_model->insert_ville($insert_data);

	        echo("Enregistrement avec succès");
  				     
	  	  	# code...
	  	  }
	  	 

	  }

	  function modification_ville()  
      {  
           $updated_data = array(  
	            'nomv'                =>     $this->input->post('nomv'),
		      	'idp'                 =>     $this->input->post('idp') 
	        );   

	        $this->crud_model->update_ville($this->input->post("idv"), $updated_data);
	        echo("information mise à jour avec succès"); 
      }

      function suppression_ville()  
      {  
          $this->crud_model->delete_ville($this->input->post("idv"));	     
	      	 echo("suppression avec succès");  
      }  
   

      function fetch_single_ville()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_ville($this->input->post("idv"));  
           foreach($data as $row)  
           {  
                $output['nomv']   = $row->nomv; 
                $output['idp']    = $row->idp; 
           }  
           echo json_encode($output);  
      }  
   
	  // fin de script province et ville  


	  function fetch_ville_requete(){
	  	  if($this->input->post('idp'))
		  {
		   	echo $this->crud_model->fetch_ville_requete($this->input->post('idp'));
		  }
	  }

	  function fetch_university_requete(){
	  	  if($this->input->post('idv'))
		  {
		   	echo $this->crud_model->fetch_university_requete($this->input->post('idv'));
		  }
	  }

	  function fetch_university_faculte(){
	  	  if($this->input->post('iduniv'))
		  {
		   	echo $this->crud_model->fetch_university_faculte($this->input->post('iduniv'));
		  }
	  }

	  function fetch_university_departement(){
	  	  if($this->input->post('idfac'))
		  {
		   	echo $this->crud_model->fetch_university_departement($this->input->post('idfac'));
		  }
	  }


	  function fetch_operation_formation_departement(){
	  	  if($this->input->post('idformation'))
		  {
		   	echo $this->crud_model->fetch_operation_formation_departement($this->input->post('idformation'));
		  }
	  }

	  function fetch_operation_cours_departement(){
	  	  if($this->input->post('idcours'))
		  {
		   	echo $this->crud_model->fetch_operation_cours_departement($this->input->post('idcours'));
		  }
	  }


	  // debit des scripts université
	  function fetch_university(){  

           $fetch_data = $this->crud_model->make_datatables_university();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = nl2br(substr($row->lien, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nom, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nomp, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nomv, 0,50)).'';
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 

                
 
                $sub_array[] = '<button type="button" name="update" iduniv="'.$row->iduniv.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" iduniv="'.$row->iduniv.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_university(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_university(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);


      }

      function operation_university($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$insert_data = array( 
		      	   'nom'                =>     $this->input->post('nom'),
		      	   'description'        =>     $this->input->post('description'),
		      	   'lien'        		=>     $this->input->post('lien'),
		      	   'idv'                =>     $this->input->post('idv')    
			);  
		       
	        $requete=$this->crud_model->insert_university($insert_data);

	        echo("Enregistrement avec succès");
  				     
	  	  	# code...
	  	  }
	  	 

	  }

	  function modification_university()  
      {  
            $updated_data = array(  
	             'nom'                =>     $this->input->post('nom'),
		      	 'description'        =>     $this->input->post('description'),
		      	 'lien'        		  =>     $this->input->post('lien'),
		      	 'idv'                =>     $this->input->post('idv') 
	        );   

	        $this->crud_model->update_university($this->input->post("iduniv"), $updated_data);
	        echo("information mise à jour avec succès"); 
      }

      function suppression_university()  
      {  
          $this->crud_model->delete_university($this->input->post("iduniv"));	     
	      echo("suppression avec succès");  
      }  
   

      function fetch_single_university()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_university($this->input->post("iduniv"));  
           foreach($data as $row)  
           {  
                $output['nom']   = $row->nom;
                $output['description']   = $row->description;
                $output['lien']   = $row->lien; 
                $output['idv']    = $row->idv; 
           }  
           echo json_encode($output);  
      }  
   
	  // fin de script université  

	  // debit des scripts faculté
	  function fetch_faculty(){  

           $fetch_data = $this->crud_model->make_datatables_faculty();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = nl2br(substr($row->nomfac, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nom, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nomp, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nomv, 0,50)).'';
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 

                
 
                $sub_array[] = '<button type="button" name="update" idfac="'.$row->idfac.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idfac="'.$row->idfac.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_faculty(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_faculty(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);


      }

      function operation_faculty($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$insert_data = array( 
		      	   'nomfac'        =>     $this->input->post('nomfac'),
		      	   'iduniv'        =>     $this->input->post('iduniv')    
			);  
		       
	        $requete=$this->crud_model->insert_faculty($insert_data);

	        echo("Enregistrement avec succès");
  				     
	  	  	# code...
	  	  }
	  	 

	  }

	  function modification_faculty()  
      {  
            $updated_data = array(  
	             'nomfac'        =>     $this->input->post('nomfac'),
		      	 'iduniv'        =>     $this->input->post('iduniv')
	        );   

	        $this->crud_model->update_faculty($this->input->post("idfac"), $updated_data);
	        echo("information mise à jour avec succès"); 
      }

      function suppression_faculty()  
      {  
          $this->crud_model->delete_faculty($this->input->post("idfac"));	     
	      echo("suppression avec succès");  
      }  
   

      function fetch_single_faculty()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_faculty($this->input->post("idfac"));  
           foreach($data as $row)  
           {  
                $output['nomfac']   	 	= $row->nomfac;
                $output['iduniv']  			= $row->iduniv; 
           }  
           echo json_encode($output);  
      }  
   
	  // fin de script faculté 


	  // debit des scripts département
	  function fetch_departement(){  

           $fetch_data = $this->crud_model->make_datatables_departement();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();
                $sub_array[] = nl2br(substr($row->nomdep, 0,50)).'';  
                $sub_array[] = nl2br(substr($row->nomfac, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nom, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nomp, 0,50)).'';
                $sub_array[] = nl2br(substr($row->nomv, 0,50)).'';
                
                $sub_array[] = '<button type="button" name="update" iddep="'.$row->iddep.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" iddep="'.$row->iddep.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_departement(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_departement(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);


      }

      function operation_departement($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$insert_data = array( 
		      	   'nomdep'       =>     $this->input->post('nomdep'),
		      	   'idfac'        =>     $this->input->post('idfac')    
			);  
		       
	        $requete=$this->crud_model->insert_departement($insert_data);

	        echo("Enregistrement avec succès");
  				     
	  	  	# code...
	  	  }
	  	 

	  }

	  function modification_departement()  
      {  
            $updated_data = array(  
	             'nomdep'       =>     $this->input->post('nomdep'),
		      	 'idfac'        =>     $this->input->post('idfac')
	        );   

	        $this->crud_model->update_departement($this->input->post("iddep"), $updated_data);
	        echo("information mise à jour avec succès"); 
      }

      function suppression_departement()  
      {  
          $this->crud_model->delete_departement($this->input->post("iddep"));	     
	      echo("suppression avec succès");  
      }  
   

      function fetch_single_departement()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_departement($this->input->post("iddep"));  
           foreach($data as $row)  
           {  
                $output['nomdep']   	 	= $row->nomdep;
                $output['idfac']  			= $row->idfac; 
           }  
           echo json_encode($output);  
      }  
   
	  // fin de script département  


	  // debit des scripts livres
	  function fetch_book(){  

           $fetch_data = $this->crud_model->make_datatables_book();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();

                $sub_array[] = '<button type="button" name="update" idl="'.$row->idl.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idl="'.$row->idl.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';

                $sub_array[] = '<img src="'.base_url().'upload/livre/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';
                $sub_array[] = nl2br(substr($row->noml, 0,30)).' ...'; 

                $sub_array[] = nl2br(substr($row->auteur, 0,10)).'...';
                 
                $sub_array[] = nl2br(substr($row->descriptionl, 0,10)).'...';
                $sub_array[] = nl2br(substr($row->edition, 0,10)).'';
                $sub_array[] = nl2br(substr($row->nom, 0,15)).'...';
                $sub_array[] = nl2br(substr($row->nomdep, 0,10)).'...';

                // $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->photo.'" class="img-thumbnail" width="50" height="35" />';

                // $sub_array[] = nl2br(substr($row->first_name, 0,10)).'...';

                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 

                  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_book(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_book(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);


      }

      function operation_book($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$data['noml'] = $this->input->post('noml');
	  	  	$data['descriptionl'] = $this->input->post('descriptionl');
	  	  	$data['edition'] = $this->input->post('edition');
	  	  	$data['iddep'] = $this->input->post('iddep');
	  	  	$data['auteur'] = $this->input->post('auteur');
	  	  	$data['id_user'] = $this->session->userdata('admin_login');

	  	  	if($_FILES['user_image']['size'] > 0){

             	$data['image'] = $this->upload_image_livre();
            }
            else{
            	$data['image'] = "logobook.jpg";
            }

            if($_FILES['user_image2']['size'] > 0){

             	$data['fichier'] = $this->upload_image_livre_fichier();
            }

	        $requete=$this->crud_model->insert_book($data);

	        echo("Enregistrement avec succès");
  				     
	  	  	# code...
	  	  }
	  	 

	  }

	  function modification_book()  
      {  
            $data['noml'] = $this->input->post('noml');
	  	  	$data['descriptionl'] = $this->input->post('descriptionl');
	  	  	$data['edition'] = $this->input->post('edition');
	  	  	$data['iddep'] = $this->input->post('iddep');
	  	  	$data['auteur'] = $this->input->post('auteur');
	  	  	$data['id_user'] = $this->session->userdata('admin_login');

	  	  	if($_FILES['user_image']['size'] > 0){

             	$data['image'] = $this->upload_image_livre();
            }
           
            if($_FILES['user_image2']['size'] > 0){

             	$data['fichier'] = $this->upload_image_livre_fichier();
            }

	        $this->crud_model->update_book($this->input->post("idl"), $data);
	        echo("information mise à jour avec succès"); 
      }

      function suppression_book()  
      {  
          $this->crud_model->delete_book($this->input->post("idl"));	     
	      echo("suppression avec succès");  
      }  
   

      function fetch_single_book()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_book($this->input->post("idl"));  
           foreach($data as $row)  
           {  
                $output['noml']   	 	= $row->noml;
                $output['descriptionl'] = $row->descriptionl;
                $output['auteur']   	= $row->auteur;
                $output['edition']  	= $row->edition; 
                $output['iddep']  		= $row->iddep; 

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/livre/'.$row->image.'" class="img-thumbnail" width="100" height="100" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
 
           }  
           echo json_encode($output);  
      }  
   
	  // fin de script département 


	  // scripts pour les livres en attentes
	  function operation_pendingbook($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$data['noml'] = $this->input->post('noml');
	  	  	$data['descriptionl'] = $this->input->post('descriptionl');
	  	  	$data['edition'] = $this->input->post('edition');
	  	  	$data['iddep'] = $this->input->post('iddep');
	  	  	$data['auteur'] = $this->input->post('auteur');
	  	  	$data['id_user'] = $this->session->userdata('admin_login');

	  	  	if($_FILES['user_image']['size'] > 0){

             	$data['image'] = $this->upload_image_livre();
            }
            else{
            	$data['image'] = "logobook.jpg";
            }

            if($_FILES['user_image2']['size'] > 0){

             	$data['fichier'] = $this->upload_image_livre_fichier();
            }

	        $requete=$this->crud_model->insert_pendingbook($data);

	        echo("Enregistrement avec succès");
  				     
	  	  	# code...
	  	  }
	  	 

	  }

	  function modification_pendingbook()  
      {  
            $data['noml'] = $this->input->post('noml');
	  	  	$data['descriptionl'] = $this->input->post('descriptionl');
	  	  	$data['edition'] = $this->input->post('edition');
	  	  	$data['iddep'] = $this->input->post('iddep');
	  	  	$data['auteur'] = $this->input->post('auteur');
	  	  	$data['id_user'] = $this->session->userdata('admin_login');

	  	  	if($_FILES['user_image']['size'] > 0){

             	$data['image'] = $this->upload_image_livre();
            }
            

            if($_FILES['user_image2']['size'] > 0){

             	$data['fichier'] = $this->upload_image_livre_fichier();
            }

	        $this->crud_model->update_pendingbook($this->input->post("idl"), $data);
	        echo("information mise à jour avec succès"); 
      }

      function suppression_pendingbook()  
      {  
          $this->crud_model->delete_pendingbook($this->input->post("idl"));	     
	      echo("suppression avec succès");  
      }  
   

      function fetch_single_pendingbook()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_pendingbook($this->input->post("idl"));  
           foreach($data as $row)  
           {  
                $output['noml']   	 	= $row->noml;
                $output['descriptionl'] = $row->descriptionl;
                $output['auteur']   	= $row->auteur;
                $output['edition']  	= $row->edition; 
                $output['iddep']  		= $row->iddep; 

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/livre/'.$row->image.'" class="img-thumbnail" width="100" height="100" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
 
           }  
           echo json_encode($output);  
      } 


      // les scripts  de la vérification des livres en attente d'activation
      function accepte_verification_livre()
	  {
		  if($this->input->post('checkbox_value'))
		  {
			   $id = $this->input->post('checkbox_value');
			   for($count = 0; $count < count($id); $count++)
			   {

				   	$pending =	$this->db->query("SELECT * from pending_livre WHERE idl='".$id[$count]."' ");
				   	if ($pending->num_rows() > 0) {

				   		foreach ($pending->result_array() as $key) {

					    	$data['noml'] = $key['noml'];
					  	  	$data['descriptionl'] = $key['descriptionl'];
					  	  	$data['edition'] = $key['edition'];
					  	  	$data['iddep'] = $key['iddep'];
					  	  	$data['auteur'] = $key['auteur'];
					  	  	$data['id_user'] = $key['id_user'];

					  	  	$data['image'] = $key['image'];
					  	  	$data['fichier'] = $key['fichier'];

					        $requete=$this->crud_model->insert_book($data);
					    }
				   	}
				   	else{

				   		echo("error");
				   	}

				    $this->crud_model->verification_livre_delete($id[$count]);

			   }

			   echo("insertion avec succès");
		  }
	  }
      function verification_livre_delete(){

      	  if($this->input->post('checkbox_value'))
		  {
			   $id = $this->input->post('checkbox_value');
			   for($count = 0; $count < count($id); $count++)
			   {
			    $this->crud_model->verification_livre_delete($id[$count]);
			   }
			   echo("information supprimées avec succès");
		  }	
      }  

     function pagination_users()
	 {

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->fetch_pagination_users();
	  $config["per_page"] = 6;
	  $config["uri_segment"] = 3;
	  $config["use_page_numbers"] = TRUE;
	  $config["full_tag_open"] = '<ul class="pagination mb-0">';
	  $config["full_tag_close"] = '</ul>';
	  $config["first_tag_open"] = '<li class="page-item">';
	  $config["first_tag_close"] = '</li>';
	  $config["last_tag_open"] = '<li class="page-item">';
	  $config["last_tag_close"] = '</li>';
	  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
	  $config["next_tag_open"] = '<li class="page-item">';
	  $config["next_tag_close"] = '</li>';
	  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
	  $config["prev_tag_open"] = "<li class='page-item'>";
	  $config["prev_tag_close"] = "</li>";
	  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
	  $config["cur_tag_close"] = "</a></li>";
	  $config["num_tag_open"] = "<li class='page-item'>";
	  $config["num_tag_close"] = "</li>";
	  $config["num_links"] = 1;
	  $this->pagination->initialize($config);
	  $page = $this->uri->segment(3);
	  $start = ($page - 1) * $config["per_page"];

	  $output = array(
	   'pagination_link' => $this->pagination->create_links(),
	   'country_table'   => $this->crud_model->fetch_details_pagination_users($config["per_page"], $start)
	  );
	  echo json_encode($output);
	 }


	 function pagination_access_livre()
	 {

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->fetch_pagination_livre();
	  $config["per_page"] = 6;
	  $config["uri_segment"] = 3;
	  $config["use_page_numbers"] = TRUE;
	  $config["full_tag_open"] = '<ul class="pagination mb-0">';
	  $config["full_tag_close"] = '</ul>';
	  $config["first_tag_open"] = '<li class="page-item">';
	  $config["first_tag_close"] = '</li>';
	  $config["last_tag_open"] = '<li class="page-item">';
	  $config["last_tag_close"] = '</li>';
	  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
	  $config["next_tag_open"] = '<li class="page-item">';
	  $config["next_tag_close"] = '</li>';
	  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
	  $config["prev_tag_open"] = "<li class='page-item'>";
	  $config["prev_tag_close"] = "</li>";
	  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
	  $config["cur_tag_close"] = "</a></li>";
	  $config["num_tag_open"] = "<li class='page-item'>";
	  $config["num_tag_close"] = "</li>";
	  $config["num_links"] = 1;
	  $this->pagination->initialize($config);
	  $page = $this->uri->segment(3);
	  $start = ($page - 1) * $config["per_page"];

	  $output = array(
	   'pagination_link' => $this->pagination->create_links(),
	   'country_table'   => $this->crud_model->fetch_details_pagination_access_livre($config["per_page"], $start)
	  );
	  echo json_encode($output);
	 }


	 // pagination de formations
	 function pagination_access_formation_to_learn()
	 {

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->fetch_pagination_formation();
	  $config["per_page"] = 6;
	  $config["uri_segment"] = 3;
	  $config["use_page_numbers"] = TRUE;
	  $config["full_tag_open"] = '<ul class="pagination mb-0">';
	  $config["full_tag_close"] = '</ul>';
	  $config["first_tag_open"] = '<li class="page-item">';
	  $config["first_tag_close"] = '</li>';
	  $config["last_tag_open"] = '<li class="page-item">';
	  $config["last_tag_close"] = '</li>';
	  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
	  $config["next_tag_open"] = '<li class="page-item">';
	  $config["next_tag_close"] = '</li>';
	  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
	  $config["prev_tag_open"] = "<li class='page-item'>";
	  $config["prev_tag_close"] = "</li>";
	  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
	  $config["cur_tag_close"] = "</a></li>";
	  $config["num_tag_open"] = "<li class='page-item'>";
	  $config["num_tag_close"] = "</li>";
	  $config["num_links"] = 1;
	  $this->pagination->initialize($config);
	  $page = $this->uri->segment(3);
	  $start = ($page - 1) * $config["per_page"];

	  $output = array(
	   'pagination_link' => $this->pagination->create_links(),
	   'country_table'   => $this->crud_model->fetch_details_pagination_to_formation($config["per_page"], $start)
	  );
	  echo json_encode($output);
	 }






	 // script pour les demandes d'amitier
	 function operation_follower(){
	 	$id_sender = $this->input->post('id_sender');
	 	$id_recever = $this->input->post('id_recever');
	 	$code = substr(md5(rand(100000000, 200000000)), 0, 15);

	 	$query = $this->db->get_where("follower", array(
	 		'id_sender' 	=> 	$id_sender,
	 		'id_recever' 	=>	$id_recever
	 	));
	 	if ($query->num_rows() > 0) {
	 		
	 		echo("vous êtes déjà ami");
	 	}
	 	else{

	 		$data = array(
	 			'id_sender' 	=> $id_sender,
	 			'id_recever' 	=> $id_recever,
	 			'code'			=> $code
	 		);
	 		$folo = $this->crud_model->insert_follow($data);
	 		$nom 	 = $this->crud_model->get_name_user($id_sender);
	 		$message = $nom." vous a suivi";
	 		$url ="notification/demmande/".$id_sender."/".$code;

	 		$notification = array(
	 			'titre'		=>		"nouvelle sugestion d'amitié",
	 			'icone'		=>		"fa fa-user",
	 			'message'	=>		$message,
	 			'url'		=>		$url,
	 			'id_user'	=>		$id_recever
	 		);
	 		$not = $this->crud_model->insert_notification_new($notification);

	 		echo"votre de demmande a été ajouter avec succès ".$nom;
	 	}

	 	// echo("id_sender: ".$id_sender." id_recever:".$id_recever);
	 }


	 // script pour ajouter les livre au favory
	 function operation_ajout_favory_livre(){
	 	$id_user = $this->input->post('id_user');
	 	$idl = $this->input->post('idl');
	 	$code = substr(md5(rand(100000000, 200000000)), 0, 15);
	 	$url ="notification/cours_detail/".$idl;

	 	$query = $this->db->get_where("favory2", array(
	 		'id_user' 	=> 	$id_user,
	 		'idl' 		=>	$idl
	 	));
	 	if ($query->num_rows() > 0) {
	 		
	 		echo("vous avez déjà ajouté ce livre dans vos favoris");
	 	}
	 	else{

	 		$data = array(
	 			'id_user' 	=> $id_user,
	 			'idl' 		=> $idl,
	 			'url'		=> $url
	 		);
	 		$fav = $this->crud_model->insert_livre_favory($data);

	 		echo("ajout au fovori avec succès");
	 		
	 	}

	 }


	 // script pour Aimer ou likes de livres
	 function operation_ajout_like_livre(){
	 	$id_user = $this->input->post('id_user');
	 	$idl = $this->input->post('idl');
	 	$code = substr(md5(rand(100000000, 200000000)), 0, 15);
	 	$url ="notification/cours_detail/".$idl;

	 	$query = $this->db->get_where("likes_livre", array(
	 		'id_user' 	=> 	$id_user,
	 		'idl' 		=>	$idl
	 	));
	 	if ($query->num_rows() > 0) {

	 		$idl = $this->input->post('idl');
		 	$nombre = $this->crud_model->fetch_nombre_likes_from_livre($idl);

		 	$sup = $this->db->query("DELETE FROM likes_livre WHERE id_user='".$id_user."' AND idl='".$idl."' ");

	 		echo("je n'aime plus");

	 	}
	 	else{

	 		$data = array(
	 			'id_user' 	=> $id_user,
	 			'idl' 		=> $idl
	 		);
	 		$fav = $this->crud_model->insert_livre_likes($data);

	 		$nom 	 = $this->crud_model->get_name_user($id_user);
	 		$message = $nom." a aimé un livre";

	 		$users= $this->db->get_where('users', array('idrole'=>3))->result_array();
	 		foreach ($users as $key) {
	 			$go_to_users = $key['id'];
	 			$notification = array(
		 			'titre'		=>		"nouveau j'aime",
		 			'icone'		=>		"fa fa-thumbs-o-up",
		 			'message'	=>		$message,
		 			'url'		=>		$url,
		 			'id_user'	=>		$go_to_users
		 		);

		 		$not = $this->crud_model->insert_notification_new($notification);

	 		}


	 		

	 		echo("j'aime");
	 		
	 	}

	 	// echo("id_sender: ".$id_sender." id_recever:".$id_recever);
	 }

	 function nombre_exate_de_like_livre(){
	 	$idl = $this->input->post('idl');
	 	$nombre = $this->crud_model->fetch_nombre_likes_from_livre($idl);
	 	echo($nombre);
	 }

	 // recherche de livres
	 function fetch_search_livre_book()
	 {
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_livre_data($query);
		  
		  if($data->num_rows() > 0)
		  {
		   foreach($data->result() as $row)
		   {

		   	$nb = $this->crud_model->fetch_nombre_likes_from_livre($row->idl);

		    $output .= '
		      <div class="col-md-4">
		          <div class="card">
		              <article class="media body mb-0">

		                  <div class="col-md-12">
		                    <div class="row">
		                      <div class="col-md-4">

		                        <div class="mr-12 img-responsive" align="center">
		                            <img class="img-thumbnail" src="'.base_url().'upload/livre/'.$row->image.'" alt="" width="150" height="100">
		                        </div>
		                        
		                      </div>
		                      <div class="col-md-8">
		                        <div class="media-body">
		                            <div class="content">
		                              <p class="h5 text-left">
		                                <a href="#" class="text-primary">
		                                  '.$row->noml.'
		                                </a>
		                            </p>

		                              <p class="h6"><b>Auteur:</b>'.$row->auteur.' <small class="float-right text-muted"></small></p>

		                              <p class="h6"><b>Année de publication:</b>'.$row->edition.' </p>
		                              
		                            </div>
		                            
		                        </div>
		                      </div>

		                      <div class="col-md-12">
		                        <p>'.substr($row->descriptionl, 0,100).'...</p>

		                        <div class="row">
						            <div class="col-md-12">
						              <a href="javascript:void(0)" class="affichier">
						                <i class="icon-book-open"></i> Affichier sa description
						              </a>
						            </div>
						            <div class="col-md-12 reponse">
						              resultat

						            </div>
						        </div>


		                        <nav class="d-flex text-muted">
		                              <a href="'.base_url().'notification/cours_detail/'.$row->idl.'" class="icon mr-3"><i class="fa fa-repeat"></i> lire ce livre</a>
		                              
		                              <a href="javascript:void(0);" class="icon mr-3 favory_cours" idl="'.$row->idl.'"><i class="fa fa-heart"></i> favory</a>

		                              <a href="javascript:void(0);" class="icon mr-3 pull-right like_cours" idl="'.$row->idl.'"><i class="fa fa-thumbs-o-up"></i><span id="like_'.$row->idl.'">'.$nb.'</span></a>

		                              
		                          </nav>
		                      </div>



		                    </div>
		                  </div>

		              </article>
		          </div>
		      </div>
		    ';
		   }
		  }
		  else
		  {
		   		// $this->db->pagination_access_livre();
		  }

	  	echo $output;
	 }






	 // recherche de formations
	 function fetch_search_formation_to_learn()
	 {
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_formation_to_lean($query);
		  
		  if($data->num_rows() > 0)
		  {

		  	  if ($this->session->userdata('admin_login')) {
		         $connected = $this->session->userdata('admin_login');

		      }
		      elseif ($this->session->userdata('id')) {
		        $connected = $this->session->userdata('id');
		      }
		      elseif ($this->session->userdata('instuctor_login')) {
		        $connected = $this->session->userdata('instuctor_login');
		      }
		      else{
		        $connected = 0;
		      }
		      $message = "Explorez des milliers de formations en ligne au prix le plus bas jamais atteint !";


			   foreach($data->result() as $key)
			   {



			    $output .= '
			      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
			          <div class="card bg-light">
			            <div class="card-header text-muted border-bottom-0 text-center">
			              <span class="text-info">'.$message.'</span>
			            </div>
			            <div class="card-body pt-0">
			              <div class="row">
			                <div class="col-7">
			                  <h2 class="lead"><b>'.$key->nomformation.'</b></h2>
			                  <h1 class="lead"><b>'.$key->prix.'$</b></h1>
			                  
			                  
			                </div>
			                <div class="col-5 text-center" style="margin-top: 10px;">
			                  <img src="'.base_url().'upload/formation/'.$key->image.'" alt="" class="img-thumbnail img-fluid" style="height: 100px;">
			                </div>
			              </div>
			            </div>
			            <div class="card-footer">
			              <div class="text-center">
			                
			                    <a href="javascript:void(0)" iduser="'.$connected.'" idformation="'.$key->idformation.'" class="btn btn-sm bg-info inscription2">
			                    <i class="fas fa-user"></i> je minscris</a>
			                      
			              </div>
			            </div>
			          </div>
			        </div>  
			    ';
			   }
		  }
		  else
		  {
		   		$this->db->pagination_access_formation_to_learn();
		  }

	  	echo $output;
	 }





	 function number_follower($id_sender=''){
	 	$nombre = $this->crud_model->follower_number($id_sender);
	 	echo($nombre);
	 }

	 function number_following($id_recever=''){
	 	$nombre = $this->crud_model->following_number($id_recever);
	 	echo($nombre);
	 }

	 function detail_users_profile($param1=''){
	 	$data['users_id'] = $param1;
	 	$data['title'] = "Détail de profile de l'utilisateur ".$param1;
	 	$this->load->view("backend/admin/detail_users_profile", $data);
	 }


	 // les scripts de map
	 // this function receive ajax request and return closest providers
    function closest_locations(){

        $location =json_decode( preg_replace('/\\\"/',"\"",$_POST['data']));
        $lan=$location->longitude;
        $lat=$location->latitude;
        $ServiceId=$location->ServiceId;
        $base = base_url().'admin/detail_users_profile/';

        // echo("lat:".$lat." log:".$lan." ServiceId:".$ServiceId);

        $providers= $this->crud_model->get_closest_locations($lan,$lat,$ServiceId);
        $indexed_providers = array_map('array_values', $providers);
        // this loop will change retrieved results to add links in the info window for the provider
        $x = 0;
        foreach($indexed_providers as $arrays => &$array){
            foreach($array as $key => &$value){
                if($key === 1){
                    $pieces = explode(",", $value);
                    $value = "$pieces[1]<a href='$base$pieces[0]'>Plus d'informations..</a>";
                }

                $x++;
            }
        }
        echo json_encode($indexed_providers,JSON_UNESCAPED_UNICODE);

    }

    function order_service_two()
    {
        $this->form_validation->set_rules('lat', 'lat', 'trim|required');
        $this->form_validation->set_rules('lng', 'lng', 'trim|required');
        $this->form_validation->set_rules('RequestAddress', 'RequestAddress', 'trim|required');

        if ($this->form_validation->run($this) == FALSE) {
            $data['error'] = validation_errors('
        <div class="alert alert-danger notices errorimg alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert">
         <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>', '</div> ');
            $this->view('content/order_service_two', $data);
        } else {
            print_r($this->input->post());

        }
    }
	 // fin

    function recherche_utilisateur(){
    	$output = '';
    	$query = $this->input->post('query');
    	$resultat = $this->crud_model->recherche_utilisateur_requete($query);
    	if ($resultat->num_rows() > 0) {
    		$output .='<table class="table table-hover table-custom spacing5">
                <tbody>';

    		foreach ($resultat->result() as $key) {
    			$output .='

    				<tr>
                        <td>
                            <span><i class="fa fa-camera"></i></span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="'.base_url().'upload/photo/'.$key->image.'" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar '.$key->first_name.'">
                                <div class="ml-3">
                                    <a href="'.base_url().'admin/detail_users_profile/'.$key->id.'" title="">'.$key->first_name.' '.$key->first_name.'</a>
                                    <p class="mb-0">'.$key->email.'</p>
                                </div>
                            </div>                                        
                        </td>
                    </tr>


    			';
    		}

    		$output .='</tbody>
            </table>';

            echo($output);
    	}
    	else{

    	}
    }


    function recherche_utilisateur_chat(){

    	$id = $this->session->userdata('admin_login');
    	$output = '';
    	$query = $this->input->post('query');
    	$resultat = $this->crud_model->recherche_utilisateur_requete($query);
    	if ($resultat->num_rows() > 0) {
    		$output .='<ul class="right_chat list-unstyled mb-0">';

    		foreach ($resultat->result() as $key) {

    			$status ="";
                $msg_status= "";
                
                $test = $this->db->query("SELECT * FROM profile_online");
            	if ($test->num_rows() > 0) {

            		foreach ($test->result_array() as $row) {
            			
            			if ($key->id == $row['id_user']) {
            				$status ="inline";
            				$msg_status= "en ligne";
            			}
            			else{

            				$status ="offline";
            				$msg_status= "n'est pas en ligne";
            			}
            		}
            		
            	}
            	else{
            		$status ="offline";
            		$msg_status= "n'est pas en ligne";
            	}

            	$url = '';
            	if ($key->id == $id) {
            		$url = "javascript:void(0)";
            	}
            	else{
            		$url = base_url().'admin/chat_admin/'.$id.'/'.$key->id;
            	}
                	


    			$output .='

    			<li class="'.$status.'">
                    <a href="'.$url.'">
                        <div class="media">
                            <div class="avtar-pic w35 bg-danger"><span>
                            	<img src="'.base_url().'upload/photo/'.$key->image.'" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Discuter avec '.$key->first_name.'">
                            </span></div>
                            <div class="media-body">
                                <span class="name">'.$key->first_name.'</span>
                                <span class="message">'.$msg_status.'</span>
                                <span class="badge badge-inline status"></span>
                            </div>
                        </div>
                    </a>                            
                </li>

    				

    			';
    		}

    		$output .='</ul>';

            echo($output);
    	}
    	else{

    	}

    }


    function recherche_utilisateur_chat_goupe(){

    	$id = $this->session->userdata('admin_login');
    	$output = '';
    	$query = $this->input->post('query');
    	$code_groupe = $this->input->post('code_groupe');
    	$resultat = $this->crud_model->recherche_utilisateur_requete_groupe($query, $code_groupe);
    	if ($resultat->num_rows() > 0) {
    		$output .='<ul class="right_chat list-unstyled mb-0">';

    		foreach ($resultat->result() as $key) {

    			$status ="";
                $msg_status= "";
                
                $test = $this->db->query("SELECT * FROM profile_online");
            	if ($test->num_rows() > 0) {

            		foreach ($test->result_array() as $row) {
            			
            			if ($key->id == $row['id_user']) {
            				$status ="inline";
            				$msg_status= "en ligne";
            			}
            			else{

            				$status ="offline";
            				$msg_status= "n'est pas en ligne";
            			}
            		}
            		
            	}
            	else{
            		$status ="offline";
            		$msg_status= "n'est pas en ligne";
            	}

            	$url = '';
            	if ($key->id == $id) {
            		$url = "javascript:void(0)";
            	}
            	else{
            		$url = base_url().'admin/chat_admin/'.$id.'/'.$key->id;
            	}
                	


    			$output .='

    			<li class="'.$status.'">
                    <a href="'.$url.'">
                        <div class="media">
                            <div class="avtar-pic w35 bg-danger"><span>
                            	<img src="'.base_url().'upload/photo/'.$key->image.'" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Discuter avec '.$key->first_name.'">
                            </span></div>
                            <div class="media-body">
                                <span class="name">'.$key->first_name.'</span>
                                <span class="message">'.$msg_status.'</span>
                                <span class="badge badge-inline status"></span>
                            </div>
                        </div>
                    </a>                            
                </li>

    				

    			';
    		}

    		$output .='</ul>';

            echo($output);
    	}
    	else{

    	}

    }



    function operation_goupe(){
    	  $code = substr(md5(rand(100000000, 200000000)), 0, 10);
	      $insert_data = array(  
	           'nom'          			=>     $this->input->post('nom'),  
	           'id_users'           	=>     $this->input->post("id_users"), 
	           'code'         		    =>     $code, 
	           'image'                  =>     $this->upload_image_groupe()
		  );  
	       
	      $requete=$this->crud_model->insert_groupe_chat($insert_data);
	      // echo("le groupe est créé avec succès");
	      redirect('admin/groupe', 'refresh');
	      
      }


      function recherche_utilisateur_groupe(){
      	$id = $this->session->userdata('admin_login');
    	$output = '';
    	$query = $this->input->post('query');
    	$resultat = $this->crud_model->recherche_utilisateur_requete($query);
    	if ($resultat->num_rows() > 0) {
    		$output .='<ul class="list-unstyled resultat">';

    		foreach ($resultat->result() as $key) {
    			$output .='

    			<li class="clearfix">
                    <div class="md-left">
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" class="checkbox-tick" value="'.$key->id.'">
                            <span></span>
                        </label>
                        <a href="javascript:void(0);" class="mail-star active"><i class="fa fa-star"></i></a>                                                
                    </div>
                    <div class="md-right">
                        <img class="rounded" src="'.base_url().'upload/photo/'.$key->image.'" alt="">
                        <p class="sub"><a href="'.base_url().'admin/chat_admin/'.$id.'/'.$key->id.'" class="mail-detail-expand">'.$key->first_name.' '.$key->last_name.' </a></p>
                        <p class="dep"><span class="m-r-10">'.$key->email.'</span>
                        '.$key->biographie.'...</p>
                        
                    </div>
                </li>

    			';
    		}

    		$output .='</ul>';

            echo($output);
    	}
    	else{

    	}
    }


     function profile_groupe(){
      	$id = $this->session->userdata('admin_login');
    	$output = '';
    	$query = $this->input->post('code');

    	$resultat = $this->crud_model->get_users_groupe_by_code($query);
    	if ($resultat->num_rows() > 0) {
    		$output .='<ul class="list-unstyled resultat">';

    		foreach ($resultat->result() as $key) {
    			$output .='

    			<li class="clearfix">
    				
                    <div class="md-left">
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" class="checkbox-tick" value="'.$key->id.'">
                            <span></span>
                        </label>
                        <a href="javascript:void(0);" class="mail-star active"><i class="fa fa-star"></i></a>                                                
                    </div>
                    <div class="md-right">
                        <img class="rounded" src="'.base_url().'upload/photo/'.$key->image.'" alt="">
                        <p class="sub"><a href="'.base_url().'admin/chat_admin/'.$id.'/'.$key->id.'" class="mail-detail-expand">'.$key->first_name.' '.$key->last_name.' </a></p>
                        <p class="dep"><span class="m-r-10">'.$key->email.'</span>
                        </p>
                        
                    </div>
                </li>

    			';
    		}

    		$output .='</ul>';

            echo($output);
    	}
    	else{

    	}
    }



    function nos_goupe_discution_groupe(){
      	$id = $this->session->userdata('admin_login');
    	$output = '';
   
    	$this->db->where("id_users", $id);
    	$resultat = $this->db->get("groupe_chat");

    	if ($resultat->num_rows() > 0) {
    		$output .='<ul class="list-unstyled resultat">';

    		foreach ($resultat->result() as $key) {
    			$output .='

    			<li class="clearfix">
                    <div class="md-left">
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" class="checkbox-tick" value="'.$key->idgroupe.'">
                            <span></span>
                        </label>
                        <a href="javascript:void(0);" class="mail-star active"><i class="fa fa-star"></i></a>                                                
                    </div>
                    <div class="md-right">
                        <img class="rounded" src="'.base_url().'upload/groupe/'.$key->image.'" alt="">
                        <p class="sub"><a href="'.base_url().'admin/chat_admin2/'.$id.'/'.$key->code.'" class="mail-detail-expand">'.$key->nom.' </a></p>
                        
                        
                    </div>
                </li>

    			';
    		}

    		$output .='</ul>';

            echo($output);
    	}
    	else{

    	}
    }


    function delete_groupe()
     {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
                $idgroupe    = $id[$count];
                $this->crud_model->delete_groupe_discution($idgroupe);
                
           }

           echo("le groupe a été supprimé avec succès");

        }
     }


     function integration_du_groupe()
     {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           $gr = $this->input->post('code_groupe_value');
           for($count = 0; $count < count($id); $count++)
           {
                $id_user    = $id[$count];

                for($count2 = 0; $count2 < count($gr); $count2++)
		        {
	                $code_groupe    = $gr[$count2];

	                $data = array(
	                	'id_user'		=>	$id_user,
	                	'code_groupe'	=>	$code_groupe
	                );

	                $this->crud_model->insert_integration_groupe($data);
		                
		        }
                
           }

           echo("intégration du groupe avec succès");

        }
     }

     function retirer_integration_du_groupe()
     {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           $gr = $this->input->post('code_groupe_value');
           for($count = 0; $count < count($id); $count++)
           {
                $id_user    = $id[$count];

                for($count2 = 0; $count2 < count($gr); $count2++)
		        {
	                $code_groupe    = $gr[$count2];

	                $this->crud_model->returer_suppression_au_groupe_discution($code_groupe, $id_user);
		                
		        }
                
           }

           echo("suppession au groupe avec succès");

        }
     }











}


 ?>