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

                        	<div class="table-responsive resultat_ok">
                        		 <div align="right">
				                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-round btn-default btn-lg"><i class="fa fa-plus"></i>Ajouter</button> 
				                  </div>
			                    <br>
		                      <table id="user_data" class="table table-hover table-custom spacing5 ">  
		                       <thead>  
		                            <tr>  
		                            	 <th width="20%">Nom de la faculté</th> 
		                            	 <th width="20%">Nom de l'université</th> 

		                                 <th width="20%">Nom de la province</th>  
		                                 <th width="10%">Nom de la ville</th>
		                                 <th width="10%">Mis à jour</th>
		                                 <th width="5%">Editer</th>  
		                                 <th width="5%">Supprimer</th>  
		                            </tr>  
		                       </thead>  
		                     </table>
		                	</div>

                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>

<!-- Javascript -->


 <!-- Setup New Project -->
<div class="modal fade new-project-modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <form method="post" id="user_form" enctype="multipart/form-data">
	            <div class="modal-body">
	                
                    <div class="input-group mb-3">
	                    <select name="id_province" id="id_province" class="form-control input-lg selectpicker" data-live-search="true">
						    <option value="">Selectionner la province</option>
						    <?php
						    foreach($provinces as $row)
						    {
						     echo '<option value="'.$row->idp.'">'.$row->nomp.'</option>';
						    }
						    ?>
						 </select>
	                </div>

	                 <div class="input-group mb-3">
	                    <select name="id_ville" id="id_ville" class="form-control input-lg" data-live-search="true">
						    <option value="">Selectionner la ville</option>
						   
						 </select>
	                </div>

	                <div class="input-group mb-3">
	                    <select name="id_universite" id="id_universite" class="form-control input-lg" data-live-search="true">
						    <option value="">Selectionner l'université</option>
						   
						 </select>
	                </div>

                    <div class="input-group mb-3">
	                    <input type="text" name="nomfac" id="nomfac" class="form-control" placeholder="Entrer le nom de la faculté">
	                </div>
	                
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" name="iduniv" id="iduniv" /> 
                    <input type="hidden" name="idfac" id="idfac" />  
                    <input type="submit" name="action" id="action" class="btn btn-round btn-success" value="Add" />  
	            </div>
        	</form>
        </div>
    </div>
</div>
<!-- feed-post-modal -->  

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
   

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Ajout d'une faculté");  
           $('#action').val("Add");  
      });

      $('.selectpicker').selectpicker();

      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_faculty'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 0, 0],  
                     "orderable":false,  
                },  
           ],  
      });

      $(document).on('submit', '#user_form', function(event){  
           event.preventDefault(); 
           var nomfac = $('#nomfac').val(); 
           var iduniv = $('#iduniv').val();
          
 
           var action = $('#action').val();

           // alert(nomfac+" "+action);


           if(nomfac != '' && iduniv !='')
            {

	            if (action =="Add") {
	                 
	                $.ajax({  
	                     url:"<?php echo base_url() . 'admin/operation_faculty/Add'?>",  
	                     method:'POST',  
	                     data:new FormData(this),  
	                     contentType:false,  
	                     processData:false,  
	                     success:function(data)  
	                     {  
	                          swal("succès", ''+data, 'success');  
	                          $('#user_form')[0].reset();  
	                          $('#userModal').modal('hide');  
	                          dataTable.ajax.reload();  
	                     }  
	                });
	                  // alert("insertion");

	            }
		        else if (action == 'Edit') {
		        	$.ajax({  
                         url:"<?php echo base_url() . 'admin/modification_faculty'?>",  
                         method:'POST',  
                         data:new FormData(this),  
                         contentType:false,  
                         processData:false,  
                         success:function(data)  
                         {  
                              swal("succès", ''+data, 'success');  
                              $('#user_form')[0].reset();  
                              $('#userModal').modal('hide');  
                              dataTable.ajax.reload();  
                         }  
                    });
	            }

            }
            else
            {
            	swal("Désolé!!!", "Tous les champs doivent être remplis", "error"); 
            }
             
      }); 

      $(document).on('click', '.update', function(){  
           var idfac = $(this).attr("idfac");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_faculty",  
                method:"POST",  
                data:{idfac:idfac},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#nomfac').val(data.nomfac);
                     $('#iduniv').val(data.iduniv);
                     $('.modal-title').text("modification de la faculté");  
                     $('#idfac').val(idfac);  
                     $('#action').val("Edit");  
                }  
           });  
      });

      $(document).on('click', '.delete', function(){
          var idfac = $(this).attr("idfac");

          	swal({
		        title:"Êtes-vous sûr?",
		        text: "Vous ne pourrez pas récupérer ces données provinciales!",
		        type: "warning",
		        showCancelButton: true,
		        confirmButtonColor: "#dc3545",
		        confirmButtonText: "Oui, supprimez-le!",
		        cancelButtonText: "Non, annulez!",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {

		        	$.ajax({
		              url:"<?php echo base_url(); ?>admin/suppression_faculty",
		              method:"POST",
		              data:{idfac:idfac},
		              success:function(data)
		              {
		                 swal("succès!", ''+data, "success");
		                 dataTable.ajax.reload();
		              }
		            });
		           
		        } else {
		            swal("Ouf!!!", "opération annulée :)", "error");
		        }
		    });
      });

    $(document).on('change', '#id_province', function(){
    	
    	  var country_id = $(this).val();
		  if(country_id != '')
		  {
			  // alert(country_id);
			   $.ajax({
				    url:"<?php echo base_url(); ?>admin/fetch_ville_requete",
				    method:"POST",
				    data:{idp:country_id},
				    success:function(data)
				    {
				     $('#id_ville').html(data);
				    }
			   });
		  }
		  else
		  {
			   $('#id_province').html('<option value="">Selectionner une ville</option>');
		  }
    	// alert(idv);
    });


    $(document).on('change', '#id_ville', function(){
    	
    	  var idv = $(this).val();
		  if(idv != '')
		  {
			  // alert(idv);
			   $.ajax({
				    url:"<?php echo base_url(); ?>admin/fetch_university_requete",
				    method:"POST",
				    data:{idv:idv},
				    success:function(data)
				    {
				     $('#id_universite').html(data);
				    }
			   });
		  }
		  else
		  {
			   $('#id_universite').html('<option value="">Selectionner une université</option>');
		  }
    	// alert(idv);
    });


    $(document).on('change', '#id_universite', function(){
    	var iduniv = $(this).val();
    	$('#iduniv').val(iduniv);
    	// alert(idv);
    });

	
 });  
 </script>



</body>
</html>