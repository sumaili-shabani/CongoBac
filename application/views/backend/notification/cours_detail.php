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

<script type="text/javascript" src="<?= base_url() ?>js/assets/video2/java/FWDEVPlayer.js"></script>

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
                <div class="col-xl-8 col-lg-7 col-md-12">

                	<div class="card">
                		<div class="card-body">

                		<?php 
	                	if ($detail_livre->num_rows() > 0) {

	                		foreach ($detail_livre->result_array() as $row) {
	                			?>
			                   <a href="<?php echo base_url() . 'upload/livre/fichier/' . $row['fichier']; ?>">
			                   	 <iframe src="<?php echo base_url() . 'upload/livre/fichier/' . $row['fichier']; ?>" class="col-xl-12 col-lg-12 col-md-12" style="margin:auto; height: 490px;"></iframe>
			                   </a>
	                			<?php
	                		} 
	                		
	                	}

	                	 ?>
                			
                		</div>
                	</div>
                    
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12">
                    <div class="card">
                        <div class="body">
                        	<?php 
                        	if ($detail_livre->num_rows() > 0) {

                        		foreach ($detail_livre->result_array() as $key) {
                        			?>

                        			<a href="#"><img class="img-fluid img-thumbnail" src="<?php echo(base_url()) ?>upload/livre/<?php echo($key['image']) ?>" alt="..."></a>
		                            <h5 class="mt-4"><?php echo($key['noml']) ?></h5>
		                            <p><?php echo($key['descriptionl']) ?>.</p>
		                            <div class="mt-3">
		                                <div><strong class="d-inline-block w-70px">Auteur:</strong> <?php echo($key['auteur']) ?></div>
		                                <div><strong class="d-inline-block w-70px">Edition:</strong> <?php echo($key['edition']) ?></div>
		                                <div><strong class="d-inline-block w-70px">Université ou institut supérieur:</strong> <?php echo($key['nom']) ?></div>

		                                <div><strong class="d-inline-block w-70px">Faculté ou session:</strong> <?php echo($key['nomfac']) ?></div>

		                                <div><strong class="d-inline-block w-70px">Département:</strong> <?php echo($key['nomdep']) ?></div>


		                                <div><strong class="d-inline-block w-70px">Mise à jour:</strong> <?php echo(nl2br(substr(date(DATE_RFC822, strtotime($key['created_at'])), 0, 23))) ?></div>
		                            </div>

                        			<?php
                        		}
                        		
                        	}

                        	 ?>
                            
                            
                        </div>
                    </div>
                </div>
            </div> 

            <!-- fin de détail de livre -->
        

        </div>
    </div>



</div>

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

</body>
</html>