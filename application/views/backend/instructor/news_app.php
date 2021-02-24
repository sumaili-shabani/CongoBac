
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
            <div class="row clearfix">

            	<div class="col-md-12">
                    <div class="card social">
                        <div class="profile-header d-flex justify-content-between justify-content-center">
                            <div class="d-flex">
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
                                
                            </div>
                        </div>

                        

                    </div>                    
                </div>
                
                <div class="tab-content col-md-12">
                    <div class="tab-pane vivify fadeIn delay-100 active show" id="Feed">
                        <div class="row clearfix">
                            <div class="col-lg-8 col-md-12">


                            	<?php
                        $this->db->order_by('created_at','desc');
                        $this->db->limit(10);
                        $information = $this->db->get('information');
                        if ($information->num_rows() > 0) {
                           foreach ($information->result_array() as $value) {
                             ?>


                             <div class="card">
                                    <div class="body">
                                        <div class="d-flex mb-3">
                                            <div class="icon bg-transparent">

                                            	<img src="<?= base_url('js/assets/images/icon.svg')?>" alt="Oculux Logo" class="rounded mr-3 w40" alt=""><font color="red">C</font><font color="green">ongo</font><font color="red">B</font><font class="text-warning">ack</font>
                                            	<small><?php echo(substr(date(DATE_RFC822, strtotime($value['created_at'])), 0, 23)); ?></small>
                                                
                                        	</div>
                                            
                                        </div>
                                        <div class="content">
                                            <img class="img-fluid rounded img-responsive img-thumbnail" src="<?php echo(base_url());?>upload/info/<?php echo($value['image']) ?>" alt="">
                                            <h5 class="mt-3"><?php echo(nl2br($value['titre'])); ?></h5>
                                            <span><?php echo(nl2br($value['message'])); ?></span>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    	<?php 

                                         $nbr;
                                         $nombre_like = $this->db->query("SELECT COUNT(nombre) AS nombre FROM likes WHERE idinfo='".$value['idinfo']."' ");
                                         if ($nombre_like->num_rows() >0) {
                                           foreach ($nombre_like->result_array() as  $pat) {
                                             $nbr = $pat['nombre'];
                                           }
                                         }
                                         else{
                                          $nbr=0;
                                         }

                                          $nbr_comment;
                                          $nombre_commentaire= $this->db->query("SELECT COUNT(idinfo) AS nombre FROM commentaire WHERE idinfo='".$value['idinfo']."'");
                                          if ($nombre_commentaire->num_rows() > 0) {
                                            foreach ($nombre_commentaire->result_array() as $key) {
                                             $nbr_comment = $key['nombre'];
                                            }
                                          }
                                          else{
                                            $nbr_comment = 0;
                                          }


                                          ?>


                                        <a href="<?php echo(base_url()) ?>instructor/likes/add_like/<?php echo($value['idinfo']) ?>" class="mr-3"><i class="icon-like"></i> <?php echo($nbr) ?> Likes </a>
                                        <div class="pull-right">
                                        	<a href="javascript:void(0);" class="mr-3 affichier"><i class="icon-bubbles"></i> <?php echo($nbr_comment) ?> Comments </a>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 reponse">
                                              <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="margin-top: 5px;" >
                                                  <form method="POST" action="<?php echo(base_url()) ?>instructor/commentaire/add_comment/<?php echo($value['idinfo']) ?>">
                                                    <div class="form-group">
                                                      <textarea class="form-control" name="message" id="comment" placeholder="Quoi de news?" style="overflow:hidden" class="form-control" rows="2" cols="4">
                                                        
                                                      </textarea>
                                                      <div class="form-group" style="margin-top: 5px;">
                                                        <button type="submit" class="btn btn-info btn-sm pull-right"><i class="fa fa-save"></i>Commenter</button>
                                                      </div>
                                                    </div>
                                                  </form>
                                                </div>

                                                <?php 

                                              $this->db->order_by('created_at', 'desc');
                                              $this->db->where('idinfo', $value['idinfo']);
                                              $pub = $this->db->get('commentaire');
                                              if ($pub->num_rows() > 0) {

                                                foreach ($pub->result_array() as $key) {

                                                 $this->db->where('id', $key['id_user']);
                                                 $info_personnel = $this->db->get('users');
                                                 if ($info_personnel->num_rows() > 0) {
                                                   foreach ($info_personnel->result_array() as $row) {
                                                     $first_name2 = $row['first_name'];
                                                     $last_name2 = $row['last_name'];
                                                     $image2 = $row['image'];

                                                   }
                                                 }
                                                 else{

                                                 }

                                                  ?>

                                                  <!-- bock de repetition de commentaire -->
                                                  <div class="col-sm-12 col-lg-12 col-md-12">
                                                    <!-- media -->
                                                      <div class="media">
                                                        <div class="media-left">

                                                          <img src="<?php echo(base_url()) ?>upload/photo/<?php echo($image2) ?>" class="img img-responsive img-circle media-object" style="width:40px; height: 40px; border-radius: 50%;"> 


                                                           <a class="h6 post__author-name fn" href="javascript:void(0);"><?php echo($first_name2.' '.$last_name2) ?></a><br> 

                                                          <strong>
                                                            <?php echo(nl2br($key['message'])) ?>
                                                            <br>
                                                            <i class="fa fa-clock-o"></i> <?php echo($key['created_at']) ?>
                                                          </strong>
                                                          <br> 
                                                          <span class="rating text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-full"></i>
                                                            <i class="fa fa-star-half-full"></i>
                                                            <i class="fa fa-star-half-full"></i>
                                                          </span>
                                                          <hr>
                                                        </div><!--media-left-->

                                                  
                                                    </div><!--media-->

                                                  </div>
                                                  <!-- fin bloc repetition decommentaire -->

                                                  <?php
                                                 
                                                }
                                                # code...
                                              }
                                              else{

                                              }

                                              


                                              ?>


                                                
                                              </div>

                                            </div>




                                        <a class="share_facebook text-primary"  data-url="<?php echo(base_url()) ?>" ><i class="fa fa-facebook"></i> Share</a>
                                    </div>
                                </div>



                             <?php
                           }
                        }
                        else{

                        } 

                        ?>
                                
                                
                                
                                
                               


                            </div>

                            <!-- block 2 -->
                            <div class="col-lg-4 col-md-12">                                
                                <div class="card">
                                    <div class="body">
                                        <a href="<?php echo(base_url()) ?>"><img src="<?= base_url('js/assets/images/icon.svg')?>" alt="Oculux Logo" class="img-fluid logo rounded mr-3 w40"><font color="red">C</font><font color="green">ongo</font><font color="red">B</font><font class="text-warning">ack</font></a>
                                    </div>
                                </div>
                                <div class="card">
                                    
                                    <div class="body">

                                    	<div id="fb-root"></div>
										<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v7.0&appId=301499887887474&autoLogAppEvents=1" nonce="fNhxinIE"></script>

										<div class="fb-page" data-href="https://www.facebook.com/La-cour-des-grands-496436247480290/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/La-cour-des-grands-496436247480290/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/La-cour-des-grands-496436247480290/">La cour des grands</a></blockquote></div>

                                        
                                    </div>
                                </div>
                                <div class="row clearfix w_social3">
                                    <div class="col-lg-6 col-6">
                                        <div class="card facebook-widget">
                                            <div id="slider2" class="carousel slide" data-ride="carousel" data-interval="2000">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">

                                                    	<a class="share_facebook"  data-url="<?php echo(base_url()) ?>">
								                            <div class="icon"><i class="fa fa-facebook"></i></div>
	                                                        <div class="content">
	                                                            <div class="text">Like</div>
	                                                            <div class="number">10K</div>
	                                                        </div>
								                        </a>
                                                        
                                                    </div>
                                                    <div class="carousel-item">
                                                    	<a class="share_facebook"  data-url="<?php echo(base_url()) ?>">
								                            <div class="icon"><i class="fa fa-facebook"></i></div>
	                                                        <div class="content">
	                                                            <div class="text">Share</div>
	                                                            <div class="number">34</div>
	                                                        </div>
								                        </a>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <div class="card instagram-widget">

                                        	<a class="share_linkedin"  data-url="<?php echo(base_url()) ?>">
					                            <div class="icon"><i class="fa fa-linkedin"></i></div>
	                                            <div class="content">
	                                                <div class="text">Followers</div>
	                                                <div class="number">231</div>
	                                            </div>
					                        </a>

                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <div class="card google-widget">
                                            <div id="slider2" class="carousel slide vert" data-ride="carousel" data-interval="2000">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">

                                                    	<a class="share_gplus"  data-url="<?php echo(base_url()) ?>">
								                            <div class="icon"><i class="fa fa-google"></i></div>
	                                                        <div class="content">
	                                                            <div class="text">Like</div>
	                                                            <div class="number">10K</div>
	                                                        </div>
								                        </a>
                                                        
                                                    </div>
                                                    <div class="carousel-item">

                                                    	<a class="share_gplus"  data-url="<?php echo(base_url()) ?>">
								                            <div class="icon"><i class="fa fa-google"></i></div>
	                                                        <div class="content">
	                                                            <div class="text">Comment</div>
	                                                            <div class="number">217</div>
	                                                        </div>
								                        </a>

                                                        
                                                    </div>
                                                    <div class="carousel-item">
                                                    	<a class="share_gplus"  data-url="<?php echo(base_url()) ?>">
								                             <div class="icon"><i class="fa fa-google"></i></div>
	                                                        <div class="content">
	                                                            <div class="text">Share</div>
	                                                            <div class="number">78</div>
	                                                        </div>
								                        </a>

                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <div class="card twitter-widget">
                                            <div id="slider2" class="carousel slide" data-ride="carousel" data-interval="2000">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">

                                                    	<a class="share_twitter"  data-url="<?php echo(base_url()) ?>">
								                             <div class="icon"><i class="fa fa-twitter"></i></div>
	                                                        <div class="content">
	                                                            <div class="text">Followers</div>
	                                                            <div class="number">10K</div>
	                                                        </div>
								                        </a>

                                                        
                                                    </div>
                                                    <div class="carousel-item">
                                                    	<a class="share_twitter"  data-url="<?php echo(base_url()) ?>">
								                             <div class="icon"><i class="fa fa-twitter"></i></div>
	                                                        <div class="content">
	                                                            <div class="text">Twitt</div>
	                                                            <div class="number">657</div>
	                                                        </div>
								                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="card">
                                    <div class="header">
                                        <h2>Followers</h2>
                                    </div>
                                    <div class="body">

                                        <ul class="right_chat w_followers list-unstyled mb-0">

                                        	<?php
                                        	$this->db->limit(10);
                                        	$this->db->order_by('created_at', 'Desc');
                                        $online= $this->db->get('profile_online');
                                        if ($online->num_rows() > 0) {
                                          ?>
                                         
                                            <?php 
                                            foreach ($online->result_array() as $key) {



                                               ?>

                                               <li class="online">
	                                                <a href="<?php echo(base_url()) ?>instructor/detail_users_profile/<?php echo($key['id_user']) ?>">
	                                                    <div class="media">
	                                                        <div class="avtar-pic w35 bg-red">
	                                                        	<span>
	                                                        	<img src="<?php echo(base_url()) ?>upload/photo/<?php echo($key['image']) ?>" class="img img-responsive img-circle" style="width: 50px; height: 40px; border-radius: 70%;">
		                                                        </span>
		                                                    </div>
	                                                        <div class="media-body" style="padding-right: 10px;">
	                                                            <span class="name">&nbsp;&nbsp;@<?php echo(substr($key['first_name'].' '.$key['last_name'], 0,25)) ?>... </span>
	                                                            <?php 

	                                                            if ($key['id_user'] != $id) {
	                                                            	?>
	                                                            	<span class="message">
	                                                            		<a href="<?php echo(base_url()) ?>instructor/chat_admin/<?php echo($id) ?>/<?php echo($key['id_user']) ?>">
	                                                            	&nbsp;&nbsp;<i class="fa fa-comments-o"></i> message
		                                                            	</a> 
		                                                            </span>
	                                                            	<?php
	                                                            }
	                                                            else{

	                                                            	?>
	                                                            	<span class="message">
	                                                            		<a href="<?php echo(base_url()) ?>instructor/detail_users_profile/<?php echo($key['id_user']) ?>" class="text-warning">
	                                                            	&nbsp;&nbsp;<i class="fa fa-user"></i> profile
		                                                            	</a> 
		                                                            </span>
	                                                            	<?php

	                                                            }

	                                                             ?>

	                                                            <span class="badge badge-outline status"></span>
	                                                        </div>
	                                                    </div>
	                                                </a>
	                                            </li>

                                                 
                                               <?php
                                             }

                                             ?>
                                         
                                          <?php
                                        }
                                        else{

                                        }

                                        ?>

                                        </ul>
                                    </div>
                                </div>
                            </div> 
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
		// alert("cool");
		Stripe.setPublishableKey('pk_test_51GzgDmLqhFzYb1A33x7hsUsXprGneq0OZhI5i9Qv0G7mrLdd0RHpOZMqB4PxsMIIwo3PvpQ1RdQdnYVKaWrxAnaT00Rm8dGt4D');

		var $form = $('#payement_form');
		$form.submit(function(e){
			e.preventDefault();
			$form.find('.valider_paiement').attr('disabled', true);

			Stripe.card.createToken($form, function(status, response){

				if (response.error) {
					$form.find('.message').remove();
					$form.prepend('<div class="alert alert-danger message"><p>'+response.error.message+'</p></div>');
				}
				else{
					var token = response.id;
					// alert(token);
					$form.append($('<input type="hidden" name="stripeToken">').val(token));
					$form.get(0).submit();
				}
				
			});
			

			
		});

	});
</script>

<script type="text/javascript">
  (function(){

    var popupCenter = function(url, title, width, height){
        var popupWidth = width || 640;
        var popupHeight = height || 320;
        var windowLeft = window.screenLeft || window.screenX;
        var windowTop = window.screenTop || window.screenY;
        var windowWidth = window.innerWidth || document.documentElement.clientWidth;
        var windowHeight = window.innerHeight || document.documentElement.clientHeight;
        var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2 ;
        var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
        var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
        popup.focus();
        return true;
    };

    document.querySelector('.share_twitter').addEventListener('click', function(e){
        e.preventDefault();
        var url = this.getAttribute('data-url');
        var shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
            "&via=RogerPatrona" +
            "&url=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur Twitter");
    });

    document.querySelector('.share_facebook').addEventListener('click', function(e){
        e.preventDefault();
        var url = this.getAttribute('data-url');
        var shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur facebook");
    });

    document.querySelector('.share_gplus').addEventListener('click', function(e){
        e.preventDefault();
        var url = this.getAttribute('data-url');
        var shareUrl = "https://plus.google.com/share?url=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur Google+");
    });

    document.querySelector('.share_linkedin').addEventListener('click', function(e){
        e.preventDefault();
        var url = this.getAttribute('data-url');
        var shareUrl = "https://www.linkedin.com/shareArticle?url=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur Linkedin");
    });

})();
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