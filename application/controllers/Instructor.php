<?php 
 /**
 * 
 */

class instructor extends CI_Controller
{
	
	public function __construct()
	{
	  parent::__construct();
	  if(!$this->session->userdata('instuctor_login'))
      {
      	redirect(base_url().'login');
      }
	  $this->load->library('form_validation');
	  $this->load->library('encrypt');
	  $this->load->model('crud_model'); 
	  $this->load->model('login_model'); 
	}
	

	function index(){
		$data['title']="mon profile admin";
		$this->load->view('backend/instructor/panel', $data);
	}

	function dashbord(){
		$data['title']="accueil post de travail";
		$this->load->view('backend/instructor/dashbord', $data);

		// $this->load->view('backend/instructor/dashbord2', $data);
	}

	function calendrier(){
		$data['title']="Calendrier de déroulement des activités";
		$this->load->view('backend/instructor/calendrier', $data);
	}

	function map(){
		$data['title']="detection et localisation";
		$this->load->view('backend/instructor/map', $data);
	}

	function message($param1=''){
		$data['id_user']= $param1;
		$data['title']="Mes messages";
		$this->load->view('backend/instructor/message', $data);
	}

	function chat_admin($param1, $param2){
		$data['title']="Discution instantané";
		$data['id_user']= $param1;
		$data['id_recever']= $param2;
		$data['id_recever2']= $param2;
		$this->load->view('backend/instructor/messagerie', $data);
	}

	function chat_admin2($param1, $param2){
		$data['title']="Discution groupe instantané";
		$data['id_user']= $param1;
		$data['code_groupe']= $param2;
		$this->load->view('backend/instructor/messagerie_groupe', $data);
	}

	function news_app(){
		$data['title']="Les nouvelles informations à la une";
		$this->load->view('backend/instructor/news_app', $data);
	}


	function notification($param1=''){
		$data['id_user']= $param1;
		$data['title']="Mes notifications";
		$this->load->view('backend/instructor/notification', $data);
	}

	function detail_book_livre(){

		$data['title']="Ajout des livres en attente d'activation  dans une université ou institution supérieur";
		$data['provinces'] = $this->crud_model->fetch_province();
		$this->load->view('backend/instructor/detail_book_livre', $data);
	}

	function groupe(){
		$data['title']="Création d'un groupe de discution";
		$this->load->view('backend/instructor/groupe', $data);
	}

	function favory($param1=''){
		$data['id_user']= $param1;
		$data['title']="Mes cours";
		$this->load->view('backend/instructor/favory', $data);
	}

	function projet_plus(){
		$data['title']="Liste des projets ajoutés par les apprenants";
		$this->load->view('backend/instructor/admin_liste_projets', $data);
	}

	function pending_livre_book(){

		$data['title']="Ajout des livres en attente d'activation  dans une université ou institution supérieur";
		$data['provinces'] = $this->crud_model->fetch_province();
		$this->load->view('backend/instructor/pending_livre_book', $data);
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
				     redirect('instructor', 'refresh');
		}

	}

	function modification_photo($param1=''){

	   $id_user= $param1;
	   $data = array(
		    'image'     => $this->upload_image()
		);
	   $query = $this->crud_model->update_crud($id_user, $data);
	   $this->session->set_flashdata('message', 'modification avec succès');
	   		redirect('instructor','refresh');
	}

	function modification_account2($param1=''){

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
		  				     redirect('instructor/dashbord', 'refresh');
			   		 	// var_dump($data);

	  			     }
	  			     else{
	 
	  			   		$this->session->set_flashdata('message2', 'les deux mot de passe doivent être identiques');
	  			   		redirect('instructor');
	  			     }
			   
			    }

		   }
		   else{

		   	  $this->session->set_flashdata('message2', 'information incorecte');
	  		  redirect('instructor');

		   }

	}

	 function detail_users_profile($param1=''){
	 	$data['users_id'] = $param1;
	 	$data['title'] = "Détail de profile de l'utilisateur ".$param1;
	 	$this->load->view("backend/instructor/detail_users_profile", $data);
	 }


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
                                    <a href="'.base_url().'instructor/detail_users_profile/'.$key->id.'" title="">'.$key->first_name.' '.$key->first_name.'</a>
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
		$this->load->view('backend/instructor/fetch_formation', $data);
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
			
			redirect('instructor/chat_admin/'.$param1.'/'.$param2);
		}
		else{
			redirect('instructor/chat_admin/'.$param1.'/'.$param2);
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
			redirect('instructor/chat_admin2/'.$param1.'/'.$param2);
		}
		else{
			redirect('instructor/chat_admin2/'.$param1.'/'.$param2);
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
			redirect('instructor/message/'.$param2);
			# code...
		}

		elseif ($param1=='display_delete_favory') {

			$this->db->query("DELETE FROM favories WHERE  idfovorie='".$param3."'  ");
			redirect('instructor/favory/'.$param2);
			# code...
		}
		elseif ($param1=='display_delete_favory_cours') {

			$this->db->query("DELETE FROM favory2 WHERE  idfav='".$param3."'  ");
			redirect('instructor/favory/'.$param2);
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



	function recherche_utilisateur_chat(){

    	$id = $this->session->userdata('instuctor_login');
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
            		$url = base_url().'instructor/chat_admin/'.$id.'/'.$key->id;
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

    	$id = $this->session->userdata('instuctor_login');
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
            		$url = base_url().'instructor/chat_admin/'.$id.'/'.$key->id;
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


    function likes($param1='', $param2='', $param3=''){
      	if ($param1=='add_like') {
      		$id_user = $this->session->userdata('instuctor_login');
      		$idinfo = $param2;
      		$like = $this->db->query("SELECT * FROM likes WHERE idinfo='".$idinfo."' AND id_user='".$id_user."' ");
      		if ($like->num_rows() > 0) {

      			$this->db->query("DELETE FROM likes WHERE idinfo='".$idinfo."' AND id_user='".$id_user."' ");
      			redirect('instructor/news_app');
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
      			redirect('instructor/news_app');

      		}
      	}
      }

      function commentaire($param1='', $param2='', $param3=''){
      	if ($param1 == 'add_comment') {

  			 $id_user = $this->session->userdata('instuctor_login');
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
            redirect('instructor/news_app');
      		# code...
      	}


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

	  // this function receive ajax request and return closest providers
    function closest_locations(){

        $location =json_decode( preg_replace('/\\\"/',"\"",$_POST['data']));
        $lan=$location->longitude;
        $lat=$location->latitude;
        $ServiceId=$location->ServiceId;
        $base = base_url().'instructor/detail_users_profile/';

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


     // scripts pour les livres en attentes
	  function operation_pendingbook($param1 ='', $param2='', $param3=''){
	  	  if ($param1='Add') {

	  	  	$data['noml'] = $this->input->post('noml');
	  	  	$data['descriptionl'] = $this->input->post('descriptionl');
	  	  	$data['edition'] = $this->input->post('edition');
	  	  	$data['iddep'] = $this->input->post('iddep');
	  	  	$data['auteur'] = $this->input->post('auteur');
	  	  	$data['id_user'] = $this->session->userdata('instuctor_login');

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
	  	  	$data['id_user'] = $this->session->userdata('instuctor_login');

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

      function operation_goupe(){
    	  $code = substr(md5(rand(100000000, 200000000)), 0, 10);
	      $insert_data = array(  
	           'nom'          			=>     $this->input->post('nom'),  
	           'id_users'           	=>     $this->input->post("id_users"), 
	           'code'         		    =>     $code, 
	           'image'                  =>     $this->upload_image_groupe()
		  );  
	       
	      $requete=$this->crud_model->insert_groupe_chat($insert_data);
	      redirect('instructor/groupe', 'refresh');
	      // echo(var_dump($insert_data));
	      
      }

      function recherche_utilisateur_groupe(){
      	$id = $this->session->userdata('instuctor_login');
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
                        <p class="sub"><a href="'.base_url().'instructor/chat_admin/'.$id.'/'.$key->id.'" class="mail-detail-expand">'.$key->first_name.' '.$key->last_name.' </a></p>
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


    function nos_goupe_discution_groupe(){
      	$id = $this->session->userdata('instuctor_login');
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
                        <p class="sub"><a href="'.base_url().'instructor/chat_admin2/'.$id.'/'.$key->code.'" class="mail-detail-expand">'.$key->nom.' </a></p>
                        
                        
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


  function profile_groupe()
  {
      	$id = $this->session->userdata('instuctor_login');
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
                        <p class="sub"><a href="'.base_url().'instructor/chat_admin/'.$id.'/'.$key->id.'" class="mail-detail-expand">'.$key->first_name.' '.$key->last_name.' </a></p>
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
















}


 ?>