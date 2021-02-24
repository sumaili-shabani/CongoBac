

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
                
            </div>

            <!-- les scripts commencent -->
             <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card social">
                        <div class="profile-header d-flex justify-content-between justify-content-center">
                            <div class="d-flex">

                            	 <?php

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
								 $id = $this->session->userdata('instuctor_login');

								 $users_details = $this->db->where("id", $users_id) ;
								 $users_details = $this->db->get("users")->result_array();

								 foreach ($users_details as $row) {
								  $id_user 		= $row["id"];
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

                                <div class="mr-3">
                                    <img src="<?= base_url()?>upload/photo/<?php echo($image) ?>" class="rounded" alt="">
                                </div>
                                <div class="details">




                                    <h5 class="mb-0"><?php echo($first_name) ?> <?php echo($last_name) ?></h5>
                                    <span class="text-light"><?php echo($email) ?></span>
                                    <p class="mb-0"><span>Followers: <strong><?php echo($nombre_follower) ?></strong></span> <span>Following: <strong><?php echo($nombre_following) ?></strong></span></p>
                                </div>                                
                            </div>
                            <div>
                                <a class="btn btn-primary btn-sm Follow_User" id_recever="<?php echo($users_id) ?>">Follow</a>
                                <?php 
                                if ($id !== $users_id) {
                                	?>
                                	
                                	<a href="<?php echo(base_url()) ?>instructor/chat_admin/<?php echo($id) ?>/<?php echo($id_user) ?>" class="btn btn-success btn-sm">Message<a>
                                	<?php
                                	# code...
                                }
                                else{
                                	?>
                                	<button class="btn btn-success btn-sm">Message</button>
                                	<?php
                                }
                                 ?>
                            </div>
                        </div>

                        <ul class="nav nav-tabs3 mt-2">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Feed"></a></li>
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Feed">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Friends">Followers</a></li>

                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Follow">Following</a></li>
                        </ul>

                    </div>                    
                </div>
                <div class="tab-content col-md-12">
                    <div class="tab-pane vivify fadeIn delay-100 active show" id="Feed">
                        <div class="row clearfix">

                        	<div class="col-xl-4 col-lg-4 col-md-5">
			                    <div class="card">
			                        <div class="header">
			                            <h2>Info</h2>
			                            
			                        </div>
			                        <div class="body">
			                            <small class="text-muted">Addresse: </small>
			                            <p><?php echo($full_adresse) ?></p>

			                            <small class="text-muted">Biographie: </small>
			                            <div>
			                                <?php echo($biographie) ?>
			                            </div>
			                            <small class="text-muted">A fréquenté l'université: </small><?php echo($university) ?>
			                            <div>
			                                
			                            </div>
			                            <small class="text-muted">Faculté: </small> <?php echo($faculte) ?>
			                            <div>
			                                
			                            </div>
			                            <small class="text-muted">Option: </small> <?php echo($option) ?>
			                            <p></p>
			                            <hr>
			                            <small class="text-muted">Adresse mail: </small> <font class="text-info"><?php echo($email) ?></font>
			                              <hr>                          
			                            
			                            <small class="text-muted">Mobile: </small>
			                            <?php echo($telephone) ?>
			                            <hr>
			                            <small class="text-muted">Date d'anniversaire: </small>
			                            <p class="m-b-0"><?php echo($date_nais) ?></p>
			                            <hr>
			                            <small class="text-muted">Social: </small>
			                            <p><a href="<?php echo($twitter) ?>" target="_blank"><i class="fa fa-twitter m-r-5"></i> twitter.com</a></p>
			                            <p><a href="<?php echo($facebook) ?>" target="_blank"><i class="fa fa-facebook m-r-5"></i> facebook.com</a> </p>
			                            <p><a href="<?php echo($linkedin) ?>" target="_blank"><i class="fa fa-linkedin m-r-5"></i> linkedin.com</a> </p>
			                        </div>
			                    </div>
			                </div>

			                <div class="col-xl-8 col-lg-8 col-md-7">
			                    <div class="card">
			                        <div class="header">
			                            <h2>Basic Information</h2>
			                            
			                        </div>
			                        <div class="body">
			                            <div class="row clearfix">
			                            	<!-- form commence -->
			                            	<form method="post" id="user_form" enctype="multipart/form-data" action="<?= base_url(); ?>admin/modification_panel/option1/<?php echo($id) ?>">
			                            	<div class="col-lg-12">
			                            		<div class="row">

			                            			<div class="col-md-12">
														<div class="text-center" align="center">
											        		<?php
												            if($this->session->flashdata('message'))
												            {
												                echo '
												                <div class="alert alert-success"><i class="fa fa-check"></i>
												                    '.$this->session->flashdata("message").'
												                </div>
												                ';
												            }
												            elseif ($this->session->flashdata('message2')) {
												            	echo '
												                <div class="alert alert-danger"><i class="fa fa-question"></i>
												                    '.$this->session->flashdata("message2").'
												                </div>
												                ';
												            }
												            else{

												            }
												            ?>
											        	</div>
										            </div>


										        	<div class="col-md-6">
										        		<label class="label-control"><i class="fa fa-user"></i>Entrer votre nom</label>
					           
					         							 <input disabled="" type="text" name="first_name" id="first_name" class="form-control" placeholder="Entrer votre nom" value="<?php echo($first_name) ?>">
					         							 <div class="col-md-12">
												          	<span class="text-danger"><?php echo form_error('first_name'); ?></span>
												         </div>
										        	</div>

										        	<div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-user"></i>Entrer votre prénom</label>
											       
											        	<input disabled="" type="text" name="last_name" id="last_name" class="form-control" placeholder="Entrer votre prenom" value="<?php echo($last_name) ?>">

											        	<div class="col-md-12">
												          	<span class="text-danger"><?php echo form_error('last_name'); ?></span>
												         </div>
											           
											        </div>

											        <!-- email -->
											        <div class="col-md-6">
										        		<label class="label-control"><i class="fa fa-google"></i>Adresse email</label>
					           
					         							 <input disabled="" type="email" name="mail_ok" id="mail_ok" class="form-control" placeholder="nomdomaine@gmail.com" value="<?php echo($email) ?>" value="<?php echo($email) ?>">
					         							 <div class="col-md-12">
												          	<span class="text-danger"><?php echo form_error('mail_ok'); ?></span>
												         </div>
										        	</div>
										        	<!-- fin email -->

											        <!-- telephone -->
											        <div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-phone"></i>Complèter votre numéro de téléphone</label>
											       
											        	<input disabled="" type="tel" name="telephone" id="telephone" class="form-control" placeholder="0817883541" value="<?php echo($telephone) ?>">
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('telephone'); ?></span>
											           </div>
											         
											        </div>

											        <!-- fin telephone -->

											         <!-- telephone -->
											        <div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-map-marker"></i>Complèter votre Adresse</label>
											       
											        	<input disabled="" type="text" name="full_adresse" id="full_adresse" class="form-control" placeholder="rdc goma q/tmk avenie/indistriel n° 12" value="<?php echo($full_adresse) ?>">
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('full_adresse'); ?></span>
											           </div>
											         
											        </div>

											        <!-- date de naissence -->
											        <div class="col-md-6">
											        	<label  class="label-control"><i class="fa fa-calendar"></i>Complèter votre date de naissance</label>
											       
											        	<input disabled="" type="date" name="date_nais" id="full_adresse" class="form-control" value="<?php echo($date_nais) ?>" >
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('date_nais'); ?></span>
											           </div>
											         
											        </div>
											        <!-- fin date de naissance -->

											        <!-- date de facebook -->
											        <div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-facebook"></i> Complèter url facebook</label>
											       
											        	<input disabled="" type="url" name="facebook" id="full_adresse" class="form-control" value="<?php echo($facebook) ?>" >
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('facebook'); ?></span>
											           </div>
											         
											        </div>
											        <!-- fin date de facebook -->

											        <!-- date de twitter -->
											        <div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-twitter"></i> Complèter url twitter</label>
											       
											        	<input disabled="" type="url" name="twitter" id="twitter" class="form-control" value="<?php echo($twitter) ?>" >
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('twitter'); ?></span>
											           </div>
											         
											        </div>
											        <!-- fin date de twitter -->

											        <!-- date de linkedin -->
											        <div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-linkedin"></i> Complèter url linkedin</label>
											       
											        	<input disabled="" type="url" name="linkedin" id="linkedin" class="form-control" value="<?php echo($linkedin) ?>" >
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('linkedin'); ?></span>
											           </div>
											         
											        </div>
											        <!-- fin date de linkedin -->

											         <!-- date de university -->
											        <div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-bank"></i> Quelle université avez-vous frénquenté?</label>
											       
											        	<input disabled="" type="text" name="university" id="university" class="form-control" value="<?php echo($university) ?>" >
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('university'); ?></span>
											           </div>
											         
											        </div>
											        <!-- fin date de university -->

											        <!-- date de faculte -->
											        <div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-anchor"></i> Quelle est la faculté avez-vous faite à université ?</label>
											       
											        	<input disabled="" type="text" name="faculte" id="faculte" class="form-control" value="<?php echo($faculte) ?>" >
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('faculte'); ?></span>
											           </div>
											         
											        </div>
											        <!-- fin date de faculte -->

											        <!-- date de option -->
											        <div class="col-md-6">
											        	<label class="label-control"><i class="fa fa-caret-square-o-up"></i> Quelle est l'option de votre faculté à université ?</label>
											       
											        	<input disabled="" type="text" name="option" id="option" class="form-control" value="<?php echo($option) ?>" >
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('option'); ?></span>
											           </div>
											         
											        </div>
											        <!-- fin date de option -->





											        <div class="col-md-12">
											        	<label class="label-control"><i class="fa fa-phone"></i>Complèter votre biographie</label>
											       
											        	 <textarea disabled="" name="biographie" class=" form-control" placeholder="Quelle est ta biographie préferée?"
                                                          >
                                                          	<?php echo($biographie) ?>
                                                          </textarea>
											           <div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('biographie'); ?></span>
											           </div>
											         
											        </div>


											        

											        <!-- sexe -->
											         <div class="col-md-12">
											        	<label class="label-control"><i class="fa fa-male"></i>Complèter votre sexe</label>
											       
											        	<label>
											        		<input disabled="" type="radio" name="sexe" value="M"  
											        		<?php
											        		if ($sexe=='M') {
											        			echo("checked");
											        		}
											        		 ?>
											        		> Homme
											        	</label>
											        	<label>
											        		<input disabled="" type="radio" name="sexe" value="F"
											        		<?php
											        		if ($sexe=='F') {
											        			echo("checked");
											        		}
											        		?>

											        		>Femme
											        	</label>
											        	<div class="col-md-12">
											          	 <span class="text-danger"><?php echo form_error('sexe'); ?></span>
											           </div>
											           
											         
											        </div>
											        <!-- fin sexe -->

											        
			                            			
			                            		</div>
			                            	</div>
											

											</form>
			                            	<!-- fin forme -->

			                            </div>
			                            
			                        </div>
			                    </div>

			                    

			                    
			                </div>

                             
                        </div>
                    </div>
                    <div class="tab-pane vivify fadeIn delay-100" id="Activity">

                    	<div class="card">
	                        
	                        <div class="body">
	                            <div class="row clearfix">

	                                <div class="col-lg-12 col-md-12">
	                                    
	                                    <form method="post" id="user_form" enctype="multipart/form-data" action="<?= base_url(); ?>admin/modification_account/<?php echo($id) ?>">
	                                    <div class="col-md-12">
                                    		<div class="text-center" align="center">
								        		<?php
									            if($this->session->flashdata('message'))
									            {
									                echo '
									                <div class="alert alert-success"><i class="fa fa-check"></i>
									                    '.$this->session->flashdata("message").'
									                </div>
									                ';
									            }
									            elseif ($this->session->flashdata('message2')) {
									            	echo '
									                <div class="alert alert-danger"><i class="fa fa-question"></i>
									                    '.$this->session->flashdata("message2").'
									                </div>
									                ';
									            }
									            else{

									            }
									            ?>
								        	</div>
	                                    </div>

	                                    <div class="col-md-12">
	                                    	<h6>Changer votre mot de passe</h6>
	                                    	<hr>
	                                    </div>

							        	 <!-- nouveau mot de passe -->
								        <div class="col-md-12">
								        	<label class="label-control"><i class="fa fa-lock"></i>nouveau mot de passe</label>
								       
								        	<input type="password" name="user_password_nouveau" id="pass1" class="form-control" placeholder="nouveau mot de passe">
								           <div class="col-md-12">
								          	 <span class="text-danger"><?php echo form_error('user_password_nouveau'); ?></span>
								           </div>
								         
								        </div>
								         <!-- mot de passe -->
								        <div class="col-md-12">
								        	<label class="label-control"><i class="fa fa-lock"></i>Confirmer votre nouveau mot de passe</label>
								       
								        	<input type="password" name="user_password_confirmer" id="pass1" class="form-control" placeholder="Confirmer votre nouveau mot de passe" required="">
								           <div class="col-md-12">
								          	 <span class="text-danger"><?php echo form_error('user_password_confirmer'); ?></span>
								           </div>
								         
								        </div>

		                                <!-- fin mot de passe -->

		                                <div class="col-md-12">
								        	<label class="label-control"><i class="fa fa-key"></i>Veillez-entrer votre ancien mot de passe</label>
								       
								        	<input type="password" name="user_password_ancien" id="pass1" class="form-control" placeholder="Votre ancien mot de passe" required="">
								           <div class="col-md-12">
								          	 <span class="text-danger"><?php echo form_error('user_password_ancien'); ?></span>
								           </div>
								         
								        </div>

								        
								        <div class="col-md-12" style="margin-top: 10px;">
								        	<div class="form-group">
								        		<input type="hidden" name="operation" id="operation" value="Add" />

								        		<input type="submit" name="action" id="action" class="btn btn-primary btn-round pull-right" value="modifier" />
								        	</div>
								        </div>

									  </form>


	                                    
	                                </div>
	                            </div>
	                            
	                        </div>
	                    </div>
                        
                    </div>


                     <div class="tab-pane vivify fadeIn delay-100" id="Follow">

                    	<div class="card">
	                        
	                        <div class="body">
	                            <div class="row clearfix">

	                                <div class="col-lg-12 col-md-12">
	                                    
	                                    <div class="table-responsive">
				                            <table class="table table-hover table-custom spacing5 user_table">
				                                <thead>
				                                    <tr> 
				                                        <th>#</th>
				                                        <th></th>
				                                        <th>Email</th>
				                                        <th>A propos</th>                                        
				                                        <th>Action</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<?php 
				                                	$follower = $this->db->query("SELECT users.id,users.biographie, users.first_name,users.last_name,users.image,users.telephone,users.email FROM users INNER JOIN follower ON follower.id_sender= users.id WHERE follower.id_recever='".$users_id."' GROUP BY follower.id_sender ORDER BY follower.created_at DESC ");
				                                	if ($follower->num_rows() > 0) {
				                                		foreach ($follower->result_array() as $key) {
				                                			?>
				                                			<tr>
						                                        <td class="w60">
						                                            <img src="<?php echo(base_url()) ?>upload/photo/<?php echo($key['image']) ?>" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded">
						                                        </td>
						                                        <td>
						                                            <a href="<?php echo(base_url()) ?>instructor/detail_users_profile/<?php echo($key['id']) ?>" title=""><?php echo($key['first_name']) ?></a>
						                                            <p class="mb-0"><?php echo($key['telephone']) ?></p>
						                                        </td>
						                                        <td>
						                                            <span><?php echo($key['email']) ?></span>
						                                        </td>
						                                        <td>
						                                            <span><?php echo(substr($key['biographie'], 0,50)) ?>...</span>
						                                        </td>
						                                        <td>
						                                        	<a class="btn btn-primary btn-sm Follow_User" id_recever="<?php echo($key['id']) ?>">Follow</a>

						                                            <?php 
						                                            if ($key['id'] != $id) {
						                                            	?>
						                                            	<a href="<?php echo(base_url()) ?>instructor/chat_admin/<?php echo($id) ?>/<?php echo($key['id']) ?>" class="btn btn-success btn-sm">Message<a>
						                                            	<?php
						                                            	# code...
						                                            }
						                                            else{
						                                            	?>
						                                            	<a href="javascript:void(0);" class="btn btn-warning btn-sm">Message<a>
						                                            	<?php
						                                            }

						                                             ?>
						                                            
						                                        </td>
						                                    </tr>
				                                			<?php
				                                		}
				                                	}
				                                	else{
				                                	 
				                                	}
				                                	?>
				                                    
				                                    
				                                </tbody>
				                            </table>
				                        </div>

	                                    
	                                </div>
	                            </div>
	                            
	                        </div>
	                    </div>
                        
                    </div>


                    <div class="tab-pane vivify fadeIn delay-100" id="Friends">
                        <div class="card">
                        	<div class="card-body">

                        		<div class="table-responsive">
		                            <table class="table table-hover table-custom spacing5 user_table">
		                                <thead>
		                                    <tr> 
		                                        <th>#</th>
		                                        <th></th>
		                                        <th>Email</th>
		                                        <th>A propos</th>                                        
		                                        <th>Action</th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                	<?php 
		                                	$follower = $this->db->query("SELECT users.id, users.first_name,users.biographie ,users.last_name,users.image,users.telephone,users.email FROM users INNER JOIN follower ON follower.id_recever= users.id WHERE follower.id_sender='".$users_id."' GROUP BY follower.id_recever ORDER BY follower.created_at DESC ");
		                                	if ($follower->num_rows() > 0) {
		                                		foreach ($follower->result_array() as $key) {
		                                			?>
		                                			<tr>
				                                        <td class="w60">
				                                            <img src="<?php echo(base_url()) ?>upload/photo/<?php echo($key['image']) ?>" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 rounded">
				                                        </td>
				                                        <td>
				                                            <a href="<?php echo(base_url()) ?>instructor/detail_users_profile/<?php echo($key['id']) ?>" title=""><?php echo($key['first_name']) ?></a>
				                                            <p class="mb-0"><?php echo($key['telephone']) ?></p>
				                                        </td>
				                                        <td>
				                                            <span><?php echo($key['email']) ?></span>
				                                        </td>
				                                        <td>
				                                            <span><?php echo(substr($key['biographie'], 0,50)) ?>...</span>
				                                        </td>
				                                        <td>
				                                        	<a class="btn btn-primary btn-sm Follow_User" id_recever="<?php echo($key['id']) ?>">Follow</a>

				                                            <?php 
				                                            if ($key['id'] != $id) {
				                                            	?>
				                                            	<a href="<?php echo(base_url()) ?>instructor/chat_admin/<?php echo($id) ?>/<?php echo($key['id']) ?>" class="btn btn-success btn-sm">Message<a>
				                                            	<?php
				                                            	# code...
				                                            }
				                                            else{
				                                            	?>
				                                            	<a href="javascript:void(0);" class="btn btn-warning btn-sm">Message<a>
				                                            	<?php
				                                            }

				                                             ?>
				                                            
				                                        </td>
				                                    </tr>
		                                			<?php
		                                		}
		                                	}
		                                	else{
		                                	 
		                                	}
		                                	?>
		                                    
		                                    
		                                </tbody>
		                            </table>
		                        </div>
                        		
                        	</div>
                        </div>
                    </div>
                </div>         
            </div>
            <!-- fin de ces scripts -->


           
        </div>
    </div>


    <input type="hidden" class="connected_user" name="connected_user" id="connected_user" value="<?php echo($this->session->userdata('instuctor_login')) ?>" >



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



<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.Follow_User', function(e){
		 	e.preventDefault();
		 	var id_recever = $(this).attr('id_recever');
		 	var id_sender = $(".connected_user").val();
		 	// alert('id_sender: '+id_sender+' id_recever: '+id_recever);
		 	if (id_sender==id_recever) {

		 		// alert("erreur");
		 		swal("Ouf!","vous ne pouvez pas vous suivre tout seul","error");
		 	}
		 	else{
		 		$.ajax({
		 			url:"<?php echo base_url(); ?>instructor/operation_follower",
		 			method: 'POST',
		 			data:{
		 				id_sender: id_sender,
		 				id_recever: id_recever
		 			},
		 			success: function(data){
		 				swal("succès", ""+data,"success");
		 			}
		 			
		 		});
		 	}

		 });
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.user_table').DataTable();
	});
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $(document).on('keyup', '.rechercher_un_utilisateur', function(){
        var query = $(this).val();
        var format = $('.resutat_de_recherce_users');

        $.ajax({
          url:"<?php echo(base_url()) ?>instructor/recherche_utilisateur",
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