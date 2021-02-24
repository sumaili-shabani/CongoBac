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
    .reponse{
    	display: none;
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
                
            </div>

            

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Taper pour rechercher un livre" id="search_text">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="search_valider"><i class="fa fa-search"></i> Rechercher</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-8 col-sm-12">
                	<!-- resultat de la recherche -->
                    <div class="row clearfix resultat_plus_plus" id="country_table">

                    	
                    </div>
                    <!-- fin resultat de la recherche -->

                    <!-- pagination resultat -->
                    <div class="col-lg-12 col-sm-12 col-md-12">
                    	<div class="row">
                    		<div class="col-md-4">
                    			<input type="hidden" class="connected_user" name="connected_user" id="connected_user" value="<?php echo($this->session->userdata('instuctor_login')) ?>" >
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

<script src="<?= base_url('js/bibliotheque.js')?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>



<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>instructor/pagination_access_livre/"+page,
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

});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.favory_cours', function(e){
		 	e.preventDefault();
		 	var idl = $(this).attr('idl');
		 	var id_user = $(".connected_user").val();
		 	// alert('id_user: '+id_user+' idl: '+idl);
		 	if (id_user=='') {

		 		// alert("erreur");
		 		swal("Désolé!","Connecter vous pour éffectuer cette action","error");
		 	}
		 	else{
		 		$.ajax({
		 			url:"<?php echo base_url(); ?>instructor/operation_ajout_favory_livre",
		 			method: 'POST',
		 			data:{
		 				id_user: id_user,
		 				idl: idl
		 			},
		 			success: function(data){
		 				swal("succès", ""+data,"success");
		 			}
		 			
		 		});
		 	}

		 });

		$(document).on('click','.like_cours', function(e){
		 	e.preventDefault();
		 	var idl = $(this).attr('idl');
		 	var id_user = $(".connected_user").val();
		 	// alert('id_user: '+id_user+' idl: '+idl);
		 	if (id_user=='') {

		 		// alert("erreur");
		 		swal("Désolé!","Connecter vous pour éffectuer cette action","error");
		 	}
		 	else{
		 		$.ajax({
		 			url:"<?php echo base_url(); ?>instructor/operation_ajout_like_livre",
		 			method: 'POST',
		 			data:{
		 				id_user: id_user,
		 				idl: idl
		 			},
		 			success: function(data){
		 				// show_number_like(idl);
		 				swal("succès", ""+data,"success");
		 			}
		 			
		 		});
		 	}

		 });


		function load_data(query)
		{
		  $.ajax({
		   url:"<?php echo base_url(); ?>instructor/fetch_search_livre_book",
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
			   $('#pagination_link').html('');
			}
			else
			{
			   load_country_data(1);
			}
		});
		



	});
</script>

<!-- script pour la recherche des utilisateurs -->
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
<!-- fin de ce scripts -->

<script type="text/javascript">
  $(document).ready(function(){

    $('.reponse').hide();
    $(document).on('click','.affichier', function(e){
      e.preventDefault();
      $(this).parent().next().slideToggle();
    });
  });
</script>


</body>
</html>