<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class register extends CI_Controller {  
      //functions  
 	 public function __construct()
	 {
	  parent::__construct();
	  if($this->session->userdata('id'))
	  {
	   redirect('Home');
	  }
	  $this->load->library('form_validation');
	  $this->load->library('encrypt');
	  
	  $this->load->model('crud_model'); 
	 }

      function index(){  
           $data["title"] = "creation de compte"; 
           $this->load->view('register', $data);  
      }


     function validation()
  	 {

        $avatar = "icone-user.png";
  		  $this->form_validation->set_rules('first_name', 'first name', 'required|trim');
  		  $this->form_validation->set_rules('last_name', 'last name', 'required|trim');
  		  $this->form_validation->set_rules('mail_ok', 'email', 'required|trim|valid_email|is_unique[users.email]');
  		  $this->form_validation->set_rules('user_password', 'password', 'required');
  		  if($this->form_validation->run())
  		  {
  			   $verification_key = md5(rand());
           $encrypted_password = md5($this->input->post("user_password"));
  			   $data = array(
  			    'first_name'  			=> $this->input->post('first_name'),
  			    'last_name'  			=> $this->input->post('last_name'),
  			    'email'  			    => $this->input->post('mail_ok'),
  			    'passwords' 			=> $encrypted_password,
  			    'idrole' 			    => 2,
  			    'image'           => $avatar
  			   );
  		   	   $id = $this->crud_model->insert($data);
  			   if($id > 0)
  			   {

  			    $this->session->set_flashdata('message', 'votre compte a été créé avec succès, vous pouvez déjà vous connecter '.$this->input->post('first_name'));
  				     redirect('login');
  			   }
  			   else{
  			   	$this->session->set_flashdata('message2', 'erreur veillez vérifier les informations requises');
  				     redirect('register');
  			   }
  		  }
  		  else
  		  {
  		   $this->index();
  		  }

  	 }


      function inserer(){

      	  $encrypted_password = $this->encrypt->encode($this->input->post("pass1"));
          $insert_data = array(  
               'first_name'          =>     $this->input->post('first_name'),  
               'last_name'           =>     $this->input->post("last_name"),  
               'image'               =>     $this->upload_image(),
               'email'               =>     $this->input->post("mail_ok"),
               'passwords'           =>     $encrypted_password,
               'idrole'           	 =>     2  
          );  
           
          $requete=$this->crud_model->insert_crud($insert_data);
          if (!empty($requete)) {
          	echo("votre compte a été créé avec succès");
          }
          else{
          	echo ("erreur veillez vérifier les informations");
          }
         
      }

      function modification(){

          $user_image = '';  
          if($_FILES["user_image"]["name"] != '')  
          {  
               $user_image = $this->upload_image();  
          }  
          else  
          {  
               $user_image = $this->input->post("hidden_user_image");  
          }
          $encrypted_password = $this->encrypt->encode($this->input->post("pass1"));  
          $updated_data = array(  
               'first_name'          =>     $this->input->post('first_name'),  
               'last_name'           =>     $this->input->post('last_name'),  
               'image'               =>     $user_image,
               'email'               =>     $this->input->post("mail_ok"),
               'passwords'           =>     $this->input->post("pass1")  
          );  

          $this->crud_model->update_crud($this->input->post("user_id"), $updated_data);

          echo("modification avec succès");
      }

      function supression(){
 
          $this->crud_model->delete_crud($_POST['user_id']);

          echo("suppression avec succès");
        
      }



      function fetch_user(){  

           $fetch_data = $this->crud_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = $row->first_name;  
                $sub_array[] = $row->last_name; 
                $sub_array[] = $row->email; 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->crud_model->get_all_data(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
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
      function fetch_single_user()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_user($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                $output['first_name'] = $row->first_name;  
                $output['last_name'] = $row->last_name; 
                $output['email'] = $row->email;
                $output['passwords'] = $row->passwords; 
                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  
 }


   