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

<!-- datatables  -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')?>">
<!-- sweetalert -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/sweetalert/sweetalert.css')?>"/>
<!-- fin -->

<!-- select picker -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">




<!-- MAIN CSS -->
<link rel="stylesheet" href="<?= base_url('js/html/assets/css/site.min.css')?>">

<style>
    td.details-control {
    background: url('<?= base_url("js/assets/images/details_open.png")?>') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('<?= base_url("js/assets/images/details_close.png")?>') no-repeat center center;
    }
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

                        	<!-- mes scripts commencent -->

					          <div class="col-sm-12 col-lg-12 col-md-12">
					          	<div class="row">

						          	<div class="col-md-12">

						          		<div class="card">
						          			
						          			<div class="card-body">
						          				<form method="post" id="user_form" enctype="multipart/form-data" action="<?= base_url(); ?>admin/operation_formateur/insertion">
										        <div class="form-group">
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

										            <label class="label-control"><i class="fa fa-user"></i>Entrer votre nom</label>
										           
										           
										          <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Entrer votre nom">
										          <div class="col-md-12">
										          	<span class="text-danger"><?php echo form_error('first_name'); ?></span>
										          </div>
										         
										        </div>
										        <!-- prenom -->
										        <div class="form-group">
										        	<label class="label-control"><i class="fa fa-user"></i>Entrer votre prénom</label>
										       
										        	<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Entrer votre prenom">

										        	<div class="col-md-12">
											          	<span class="text-danger"><?php echo form_error('last_name'); ?></span>
											         </div>
										           
										         
										        </div>
										        <!-- fin prenom -->
										        <div class="form-group">
										        	<label class="label-control"><i class="fa fa-google"></i>Entrer votre adresse email</label>

										        	<input type="email" name="mail_ok" id="mail_ok" class="form-control" placeholder="Entrer votre adresse mail">
										           <div class="col-md-12 ">
										          	 <span class="text-danger"><?php echo form_error('mail_ok'); ?></span>
										           </div>
										         
										        </div>

										        <!-- mot de passe -->
										        <div class="form-group">
										        	<label class="label-control"><i class="fa fa-lock"></i>Créer votre mot de passe</label>
										       
										        	<input type="password" name="user_password" id="pass1" class="form-control" placeholder="Entrer votre mot de passe">
										           <div class="col-md-12">
										          	 <span class="text-danger"><?php echo form_error('user_password'); ?></span>
										           </div>
										         
										        </div>

										        <!-- fin mot de passe -->
										        <!-- photo -->
										        <div class="form-group">
										        	<label class="label-control"><i class="fa fa-camera"></i>Veillez-choisir votre photo</label>
										       
										        	<input type="file" name="user_image" id="user_image" class="form-control" placeholder="selectionner une photo">
										           
										         
										        </div>
										        <!-- fin photo -->

										        <div class="form-group">
										        	<input type="hidden" name="operation" id="operation" value="Add" />

										        	<input type="submit" name="action" id="action" class="btn btn-primary pull-right" value="Enregistrer" />
										        </div>
										        <div class="form-group">
										        	<div class="text-info"><a href="<?= base_url();?>admin/detail_formateur">Voir la liste des formateurs</a></div>
										        </div>
										        
										      </form>
						          			</div>
						          		</div>
						          		
						          	</div>

					          	</div>
					          </div>


					          <!-- fin de mes scripts -->

                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>

<!-- Javascript -->


 

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
<script src="<?= base_url('js/assets/vendor/sweetalert/sweetalert.min.js')?>"></script><!-- SweetAlert 
Plugin Js -->
<script src="<?= base_url('js/html/assets/js/pages/ui/dialogs.js')?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
 



</body>
</html>