
 <?php

if($this->session->userdata('id')) {
  $id=$this->session->userdata('id');
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

 $first_name;
 $last_name;
 $email;
 $image;
 $telephone;
 $full_adresse;
 $biographie;
 $date_nais;
 $passwords;
 $idrole;

 $facebook;
 $linkedin;
 $twitter ;

 $university;
 $faculte;
 $option ;
 $sexe;

 $this->db->where("id", $id) ;
 $users_details = $this->db->get("users")->result_array();

 foreach ($users_details as $row) {
  // $id_user 		= $row["id"];
  $first_name 	= $row["first_name"];
  $last_name  	= $row["last_name"];
  $email    	= $row["email"];
  $image    	= $row["image"];
  $telephone    = $row["telephone"];
  $full_adresse = $row["full_adresse"];
  $biographie   = $row["biographie"];
  $date_nais    = $row["date_nais"];
  $passwords    = $row["passwords"];
  $idrole       = $row["idrole"];
  $sexe      	= $row["sexe"];

  $facebook     = $row["facebook"];
  $linkedin     = $row["linkedin"];
  $twitter      = $row["twitter"];

  $university   = $row["university"];
  $faculte     	= $row["faculte"];
  $option     	= $row["option"];
  
 }


  $nombre_follower;
  $query1 = $this->db->query("SELECT count(id_sender) AS nombre FROM follower WHERE id_sender='".$id_user."'");
  if ($query1->num_rows() > 0) {
    foreach ($query1->result_array() as $key) {
      $nombre_follower = $key["nombre"];
    }
  }
  else{
    $nombre_follower = 0;
  }


  $nombre_following;
  $query = $this->db->query("SELECT count(id_recever) AS nombre FROM follower WHERE id_recever='".$id_user."'");
  if ($query->num_rows() > 0) {
    foreach ($query->result_array() as $key) {
      $nombre_following = $key["nombre"];
    }
  }
  else{
    $nombre_following = 0;
  }


 ?>
<!doctype html>
<html lang="en">

<head>
<title><?php echo($title) ?></title>
<?php include('meta.php') ?>
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/font-awesome/css/font-awesome.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/animate-css/vivify.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/light-gallery/css/lightgallery.css')?>">

<link rel="stylesheet" href="<?= base_url('js/assets/vendor/dropify/css/dropify.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-steps/jquery.steps.css')?>">

<!-- adventor form -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/multi-select/css/multi-select.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/nouislider/nouislider.min.css')?>">
<!-- fin -->

<!-- datatables  -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/sweetalert/sweetalert.css')?>"/>
<!-- fin -->

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?= base_url('js/html/assets/css/site.min.css')?>">

<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>

</head>
<body class="theme-cyan font-montserrat light_version">

<!-- Page Loader -->
<?php include('theme.php') ?>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <?php include('navbare.php') ?>

    <!-- left slidebar -->
    <?php include('navigation.php'); ?>
    <!-- fin de slidebar -->

    <div id="main-content">        
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">                    
                    <div class="card">
                        <div class="body">
                        	<!-- fin fultrage recherche -->
                            <div class="chatapp_list">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control rechercher_un_utilisateur2" placeholder="Search...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-magnifier"></i></span>
                                    </div>
                                </div>
                                <div class="resutat_de_recherce_users2">
                                	
                                
	                                <ul class="right_chat list-unstyled mb-0">

                                	<?php 

                                		$status ="";
					                    $msg_status= "";
					                    $this->db->limit(10);
					                    $users = $this->db->get("users")->result_array();
					                    foreach ($users as $key ) {

					                    	$test = $this->db->query("SELECT * FROM profile_online");
					                    	if ($test->num_rows() > 0) {

					                    		foreach ($test->result_array() as $row) {
					                    			
					                    			if ($key['id'] == $row['id_user']) {
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
					                    	if ($key['id'] == $id) {
					                    		$url = "javascript:void(0)";
					                    	}
					                    	else{
					                    		$url = base_url().'admin/chat_admin/'.$id.'/'.$key['id'];
					                    	}

					                        ?>

					                        <li class="<?php echo($status) ?>">
		                                        <a href="<?php echo($url) ?>">
		                                            <div class="media">
		                                                <div class="avtar-pic w35 bg-danger"><span>
		                                                	<img src="<?= base_url()?>upload/photo/<?php echo($key['image']) ?>" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Discuter avec <?php echo($key['first_name']) ?>">
		                                                </span></div>
		                                                <div class="media-body">
		                                                    <span class="name"><?php echo($key['first_name']) ?></span>
		                                                    <span class="message"><?php echo($msg_status) ?></span>
		                                                    <span class="badge badge-inline status"></span>
		                                                </div>
		                                            </div>
		                                        </a>                            
		                                    </li>

					                        <?php
					                    }


					                     ?>

	                                    
	                                </ul>
	                             </div>
                            </div>

                            <!-- fultrage recherche -->

                            <!-- cordde messagerie -->
                            <div class="chatapp_body">
                                <div class="chat-header clearfix">
                                    <div class="row clearfix">
                                        <div class="col-lg-12">
                                            <div class="chat-about">
                                                <h6 class="m-b-0">Discution directe</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-history">
                                    <ul class="message_data">


                          <?php

				                	$CodeEntrep;

				                

					            	$connected= $id_user;
					            	$CodeEntrep= $id_recever2;

					            	$chat= $this->db->query("SELECT id_user,id_recever, messagerie.created_at, messagerie.fichier, users.first_name,users.last_name, users.image, message FROM messagerie 
					                inner join 
					                users on users.id=messagerie.id_user WHERE (id_user='".$CodeEntrep."' AND id_recever='".$id_user."')
					                OR (id_recever='".$CodeEntrep."' AND id_user='".$id_user."')
					                 ORDER BY created_at ASC");
					            	if ($chat->num_rows() < 0) {
					            		# code...
					            	}
					            	else{

					            		foreach ($chat->result_array() as $data) {
					            			?>

					            			<li class="<?= ($data['id_user'] == $connected) ? 'left clearfix' : 'right clearfix' ?> ">
                                <img class="user_pix" src="<?php echo(base_url()) ?>upload/photo/<?php echo($data['image']) ?>" alt="avatar">
                                <div class="message">
                                   <?php 

                                    if ($data['message'] !='') {
                                      ?>
                                      <span>
                                        <?php 
                                            echo(nl2br($data['message']));
                                        ?>
                                      </span>
                                      <?php
                                    }

                                    ?>
                                    

                                    <?php 

                                    if ($data['fichier'] !='') {
                                      ?>
                                      <span class="text-muted"><a href="<?php echo(base_url()) ?>upload/groupe/fichier/<?php echo($data['fichier']) ?>" download="<?php echo(base_url()) ?>upload/groupe/fichier/<?php echo($data['fichier']) ?>" class="text-muted"><i class="fa fa-download"></i> télécharger ce fichier</a></span>
                                      <?php
                                    }

                                   ?>
                                </div>
                                <span class="data_time">
                                	<?php echo substr(date(DATE_RFC822, strtotime($data['created_at'])), 0, 23); ?>
                                		
                                </span>
                            </li>


					            			<?php
					            		}
					            	}


					            	 ?>

                                        
                                    </ul>
                                </div>
                                <div class="chat-message clearfix">
                                	<form action="<?php echo(base_url()) ?>admin/chat_local_view/<?php echo($id) ?>/<?php echo($id_recever2) ?>" method="post" enctype="multipart/form-data">
                                                
                                        <div class="input-group mb-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="fa fa-send"></i>
                                                    </button>

                                                  <label class="btn btn-link Attachez" data-toggle="tooltip" data-placement="top" title="Attachez un fichier">
                                                    <div class="affichier">
                                                      <a href="javascript:void(0);" class="btn btn-link affichier">
                                                        <i class="icon-paper-clip text-muted"></i>
                                                      </a>
                                                    </div>
                                                    <div class="form-group reponse" style="display: none;">
                                                         <input type="file" name="user_image" class="form-control" />
                                                    </div>
                                                   
                                                  </label>


                                                </span>
                                            </div>
                                            <textarea type="text" name="Message_text" row="" class="form-control" minlength="2" placeholder="Quoi de news?" required=""></textarea>




                                        </div>
                                        

                                    </form>
                                    
                                </div>
                            </div>
                            <!-- fin cords de messagerie -->

                            <!-- user detail -->
                            <div class="chatapp_detail text-center vivify pullLeft delay-150">

                            	<?php 

                            	 $this->db->where("id", $id_recever2) ;
								 $users_details_chat = $this->db->get("users")->result_array();

								 foreach ($users_details_chat as $row) {
								  $id_user_chat 		= $row["id"];
								  $first_name_chat  	= $row["first_name"];
								  $last_name_chat   	= $row["last_name"];
								  $email_chat     	= $row["email"];
								  $image_chat     	= $row["image"];
								  $telephone_chat     = $row["telephone"];
								  $full_adresse_chat  = $row["full_adresse"];
								  

								  $university_chat      = $row["university"];
								  $faculte_chat      	= $row["faculte"];
								  $option_chat      	= $row["option"];
								  
								 }


                            	 ?>


                                <div class="profile-image"><img src="<?php echo(base_url()) ?>upload/photo/<?php echo($image_chat) ?>" class="rounded-circle mb-3" alt="" style="width: 200px; height: 100px; border-radius: 50px;"></div>
                                <h5 class="mb-0"><?php echo($first_name_chat) ?></h5>                                
                                <small class="text-muted">Addresse: </small>
                                <p> <?php echo($full_adresse_chat) ?></p>
                                <small class="text-muted">Addresse Mail: </small>
                                <p><?php echo($email_chat) ?></p>
                                <small class="text-muted">Mobile: </small>
                                <p><?php echo($telephone_chat) ?></p>
                                <a href="<?php echo(base_url()) ?>admin/detail_users_profile/<?php echo($id_user_chat) ?>" class="btn btn-round btn-success">Voir son profile</a>
                            </div>
                            <!-- fin détail user -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<!-- Javascript -->
<script src="<?= base_url('js/html/assets/bundles/libscripts.bundle.js')?>"></script>    
<script src="<?= base_url('js/html/assets/bundles/vendorscripts.bundle.js')?>"></script>

<script src="<?= base_url('js/html/assets/bundles/mainscripts.bundle.js')?>"></script>

<!-- datatables -->
<script src="<?= base_url('js/html/assets/bundles/datatablescripts.bundle.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/sweetalert/sweetalert.min.js')?>"></script><!-- SweetAlert Plugin Js -->
<script src="<?= base_url('js/html/assets/js/pages/tables/jquery-datatable.js')?>"></script>


<script src="<?= base_url('js/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<!-- Bootstrap Colorpicker Js --> 
<script src="<?= base_url('js/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')?>"></script><!-- Input Mask Plugin Js --> 
<script src="<?= base_url('js/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/multi-select/js/jquery.multi-select.js')?>"></script><!-- Multi Select Plugin Js -->
<script src="<?= base_url('js/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')?>"></script><!-- Bootstrap Tags Input Plugin Js --> 
<script src="<?= base_url('js/assets/vendor/nouislider/nouislider.js')?>"></script><!-- noUISlider Plugin Js -->

<script src="<?= base_url('js/html/assets/js/pages/forms/advanced-form-elements.js')?>"></script>

 <!-- modal -->

<script src="<?= base_url('js/assets/vendor/dropify/js/dropify.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-steps/jquery.steps.js')?>"></script>
<!-- JQuery Steps Plugin Js -->

<script src="<?= base_url('js/html/assets/js/pages/forms/dropify.js')?>"></script>
<script src="<?= base_url('js/html/assets/js/pages/forms/form-wizard.js')?>"></script>

<!-- <script src="<?= base_url('js/my_js.js')?>"></script> -->


<script type="text/javascript">
  $(document).ready(function(){

      $(".reponse").hide();
      $(document).on('click', '.affichier', function(event){
        event.preventDefault();
        $(this).parent().next().slideToggle();

      });

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $(document).on('keyup', '.rechercher_un_utilisateur2', function(){
        var query = $(this).val();
        var format = $('.resutat_de_recherce_users2');

        $.ajax({
          url:"<?php echo(base_url()) ?>admin/recherche_utilisateur_chat",
          method: 'POST',
          data: {
            query: query
          },
          success: function(data){
            format.html(data);
          }
        });
        
      });
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $(document).on('keyup', '.rechercher_un_utilisateur', function(){
        var query = $(this).val();
        var format = $('.resutat_de_recherce_users');

        $.ajax({
          url:"<?php echo(base_url()) ?>admin/recherche_utilisateur",
          method: 'POST',
          data: {
            query: query
          },
          success: function(data){
            format.html(data);
          }
        });
        
      });
});
</script>


</body>
</html>