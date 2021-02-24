


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
 $sexe;
 $id_user;
 if ($this->session->userdata('admin_login')) {
 	$id_user = $this->session->userdata('admin_login');
 }
 else{
 	$id_user = 0;
 }
 $this->db->where("id", $id_user) ;
 $users_details = $this->db->get("users")->result_array();

 foreach ($users_details as $row) {

 	$first_name	=	$row["first_name"];
 	$last_name	=	$row["last_name"];
 	$email 		=	$row["email"];
 	$image 		=	$row["image"];
 	$telephone	=	$row["telephone"];
 	$full_adresse 	= $row["full_adresse"];
 	$biographie 	= $row["biographie"];
 	$date_nais		= $row["date_nais"];
 	$passwords		= $row["passwords"];
 	$idrole			= $row["idrole"];
 	$sexe			= $row["sexe"];
 	
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
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/dropify/css/dropify.min.css')?>">
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
            		<div class="row">

            			<!-- ajout detail à complèter -->
				<div class="col-md-12">

					<div class="col-md-12">
						<div class="row">
							<!-- debit card -->
							<div class="card">
								<div class="card-body">
									<div class="col-md-12">

				                    <div class="table-responsive resultat_ok">


				                                <table id="user_data" class="table table-bordered table-striped">  
				                                 <thead>  
				                                      <tr>  
				                                           <th width="10%">Image</th>  
				                                           <th width="20%">nom complet</th> 
				                                           <th width="10%">email</th>
				                                           <th width="10%">nom de la formation</th>
				                                           <th width="15%">montant</th> 
				                                           <th width="5%">devise</th>
				                                           <th width="10%">client</th> 

				                                           <th width="10%">Mis à jour</th>  
				                                             
				                                      </tr>  
				                                 </thead>
				                                 <tbody>
				                                  <?php
				                                  $query = $this->db->get('profile_paiment');
				                                   if ($query->num_rows() > 0) {
				                                    foreach ($query->result_array() as $key) {
				                                    	$prix = $key['prix'] / 100;
				                                      ?>
				                                      <tr>
				                                        <td>
				                                          <img src="<?php echo(base_url()) ?>upload/photo/<?php echo($key['image']) ?>" class="img-thumbnail" width="50" height="35">
				                                        </td>
				                                        <td>
				                                        	<?php echo($key['first_name']) ?>-<?php echo($key['last_name']) ?>
				                                        		
				                                        </td>
				                                          
				                                          <td>
				                                          <?php echo($key['email']) ?>
				                                          </td>
				                                          <td>
				                                          <?php echo(substr($key['nomformation'], 0,30)) ?>...
				                                          </td>
				                                          <td>
				                                          <?php echo($prix) ?>
				                                          </td>

				                                          <td>
				                                          	<?php echo($key['devise']) ?>
				                                          </td>

				                                          <td>
				                                          	<?php echo($key['client']) ?>
				                                          </td>

				                                          <td>
				                                          	<?php echo(nl2br(substr(date(DATE_RFC822, strtotime($key['created_at'])), 0, 23))) ?>
				                                          	
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
							<!-- fin de card -->
						</div>
					</div>
					

				</div>

				<!-- fin profil detail a completer -->
            			
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

<script src="<?= base_url('js/assets/vendor/dropify/js/dropify.js')?>"></script>

<script src="<?= base_url('js/html/assets/bundles/mainscripts.bundle.js')?>"></script>

<script src="<?= base_url('js/html/assets/js/pages/forms/dropify.js')?>"></script>

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
<script src="<?= base_url('js/canavas.js')?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var dataTable = $('#user_data').DataTable();
	});
</script>



   


</body>
</html>