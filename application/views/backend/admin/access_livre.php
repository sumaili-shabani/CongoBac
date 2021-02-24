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
                
            </div>

            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-8 col-sm-12">

                    <div class="row clearfix" id="country_table">

                    	<!-- debut row -->
                        <!-- <div class="col-lg-3 col-md-6">
                            <div class="card c_grid c_yellow">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar1.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">Michelle Green</h6>
                                    <span>jason-porter@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div> -->

                        
                        <!-- fin de row -->

                        
                    </div>

                    

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>admin/pagination_users/"+page,
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
		 			url:"<?php echo base_url(); ?>admin/operation_follower",
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