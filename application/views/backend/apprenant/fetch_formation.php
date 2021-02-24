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

											<div class="col-md-12 col-lg-12 col-sm-12">

												<!-- bande de recherche -->
												<div class="row">
													<div class="col-sm-12 col-md-12 col-lg-12">
														<div class="input-group mb-3">
						                                	<input type="text" class="form-control" placeholder="Taper pour rechercher une formation" id="search_text">
						                                <div class="input-group-append">
						                                    <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i> Rechercher</button>
						                                </div>
													</div>
									                
					                            </div>
									            </div>
												<!-- fin de la bande de recherche -->

												<div class="row col-md-12 col-lg-12 col-sm-12" class="resultat_pagination" id="country_table">
													
												</div>
												 <!-- pagination resultat -->
							                    <div class="col-lg-12 col-sm-12 col-md-12">
							                    	<div class="row">
							                    		<div class="col-md-4">
							                    			<input type="hidden" class="connected_user" name="connected_user" id="connected_user" value="<?php echo($this->session->userdata('admin_login')) ?>" >
							                    		</div>
							                    		<div class="col-md-4">
							                    			<div align="center" class="pagination" id="pagination_link"></div>
							                    		</div>
							                    		<div class="col-md-4"></div>
							                    	</div>
							                    </div>
							                    <!-- fin pagination -->
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



 <script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>student/pagination_access_formation_to_learn/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }
 
 load_country_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });


 function load_data(query)
 {
	  $.ajax({
	   url:"<?php echo base_url(); ?>student/fetch_search_formation_to_learn",
	   method:"POST",
	   data:{query:query},
	   success:function(data){
	    $('#country_table').html(data);
	   }
	  });
  }

 $(document).on('keyup','#search_text',function(){
	var search = $(this).val();
	if(search != '')
	{
	   load_data(search);
	   // $('#pagination_link').html('');
	}
	else
	{
	   load_country_data(1);
	}
});



});

</script>


<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
    

      $(document).on('click', '.inscription', function(event){  
           event.preventDefault();
           var iduser    	  = $(this).attr('iduser');
           var idformation    = $(this).attr('idformation');
           // alert(iduser+" idformation:"+idformation);
           
           if(iduser != '' && idformation != '')
            {
        		$.ajax({  
                     url:"<?php echo base_url() . 'student/view_formation/inscription'?>",  
                     method:'POST',  
                     data:{
                     	iduser:iduser,
                     	idformation:idformation
                     },  
                     success:function(data)  
                     {  
                          swal("votre inscription a reussie avec succès", 'félicitation', 'success');  
                     }  
                });

            }
            else
            {
              swal("Erreur lors de l'inscription!!!!", "", "danger");
            }
 
      });  

      
 });  
 </script>


 <script type="text/javascript">
  $(document).ready(function(){
      $(document).on('keyup', '.rechercher_un_utilisateur', function(){
        var query = $(this).val();
        var format = $('.resutat_de_recherce_users');

        $.ajax({
          url:"<?php echo(base_url()) ?>student/recherche_utilisateur",
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