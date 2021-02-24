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

            			<!-- debit détail des livres -->

            			<!-- fin détail des livres -->

            			<!-- visualisation de livres au tableau -->
            			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-lg-12">
		                    <div class="card">
		                        <div class="body">

		                        	<div class="table-responsive resultat_ok">
		                        		 <div align="right">
		                        		 	<a href="" class="btn btn-light btn-sm "><i class="icon-refresh"></i></a>
						                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-light btn-sm btn-lg"><i class="fa fa-plus"></i>Ajouter</button> 
						                  </div>
					                    <br><br>
				                      <table id="user_data" class="table table-hover table-custom spacing5 ">  
				                       <thead>  
				                            <tr> 
				                            	<th width="5%">
				                            		
                                        			<a href="javascript:void(0);" class="btn btn-success btn-sm accepter_livre" title="accepter ce livre"><i class="icon-check"></i></a>

                                        			<a href="javascript:void(0);" class="btn btn-danger btn-sm delete_all" title="rejeter ce livre"><i class="icon-trash"></i></a>

                                                </th>
				                            	 <th width="5%">Editer</th>  

				                            	 <th width="10%">Image</th> 
				                            	 
				                            	 <th width="10%">Nom du livre</th>
				                            	 <th width="10%">Auteur</th> 
				                            	 <th width="10%">Description</th>
				                            	 <th width="10%">Edition</th>
				                            	 <th width="10%">Université</th> 

				                                 <th width="10%">Département</th>  
				                                 <th width="10%">photo</th>
				                                 <th width="5%">Ajouter par</th>

				                                 <th width="10%">Mise à jour</th>
 
				                            </tr>  
				                       </thead> 
				                       <tbody>
				                       	<?php 
				                       	$connected = $this->session->userdata('admin_login');
				                       	// echo($connected);
				                       	// $this->db->where("id", $connected);
				                       	$this->db->order_by("idl", "desc");
				                       	$pendding = $this->db->get("profile_pending_livre");
				                       	if ($pendding->num_rows() > 0) {
				                       		foreach ($pendding->result_array() as $key) {
				                       			// echo($key['noml']).'<br>';
				                       			?>
				                       			<tr>
						                       		<td>
						                       			<label class="fancy-checkbox">
		                                                    <input type="checkbox" name="checkbox" class="checkbox-tick delete_checkbox" value="<?php echo($key['idl']) ?>">
		                                                    <span></span>
		                                                </label>
						                       		</td>
						                       		<td>
						                       			<a href="javascript:void(0)" class="btn btn-warning btn-sm update" idl="<?php echo($key['idl']) ?>"><i class="fa fa-edit"></i></a>
						                       		</td>
						                       		<td>
						                       			<img src="<?php echo(base_url()) ?>upload/livre/<?php echo($key['image']) ?>" class="img img-thumbnail" style="width: 50px; height: 35px;">
						                       		</td>
						                       		<td>
						                       			<?php echo(nl2br(substr($key['noml'], 0,15))) ?>
						                       		</td>
						                       		<td>
						                       			<?php echo(nl2br(substr($key['auteur'], 0,15))) ?>
						                       		</td>
						                       		<td>
						                       			<?php echo(nl2br(substr($key['descriptionl'], 0,15))) ?>
						                       		</td>
						                       		<td>
						                       			<?php echo(nl2br(substr($key['edition'], 0,15))) ?>
						                       		</td>
						                       		<td>
						                       			<?php echo(nl2br(substr($key['nom'], 0,15))) ?>
						                       		</td>
						                       		<td>
						                       			<?php echo(nl2br(substr($key['nomdep'], 0,15))) ?>
						                       		</td>
						                       		<td>
						                       			<img src="<?php echo(base_url()) ?>upload/photo/<?php echo($key['photo']) ?>" class="img img-thumbnail" style="width: 50px; height: 35px;">
						                       		</td>
						                       		<td>
						                       			<?php echo(nl2br(substr($key['first_name'], 0,15))) ?>
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

		                <!-- fin visualisation -->


            			
            		</div>
            	</div>

                
            </div>

        </div>
    </div>



</div>

<!-- Javascript -->




 <!-- Setup New Project -->
<div class="modal fade new-project-modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <form method="post" id="user_form" enctype="multipart/form-data">
	            <div class="modal-body">

	            	<div class="col-md-12">
	            		<div class="row">
	            			<div class="col-md-6">
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
	            			</div>

	            			<div class="col-md-6">
	            				<div class="input-group mb-3">
				                    <select name="id_ville" id="id_ville" class="form-control input-lg" data-live-search="true">
									    <option value="">Selectionner la ville</option>
									   
									 </select>
				                </div>

	            			</div>

	            			<div class="col-md-6">
	            				<div class="input-group mb-3">
				                    <select name="id_universite" id="id_universite" class="form-control input-lg" data-live-search="true">
									    <option value="">Selectionner l'université</option>
									   
									 </select>
				                </div>
	            			</div>

	            			<div class="col-md-6">
	            				 <div class="input-group mb-3">
				                    <select name="id_faculte" id="id_faculte" class="form-control input-lg" data-live-search="true">
									    <option value="">Selectionner la faculté</option>
									   
									 </select>
				                </div>
	            			</div>

	            			<div class="col-md-6">
	            				<div class="input-group mb-3">
				                    <select name="id_departement" id="id_departement" class="form-control input-lg" data-live-search="true">
									    <option value="">Selectionner le département</option>
									   
									 </select>
				                </div>

	            			</div>

	            			<div class="col-md-6">
	            				<div class="input-group mb-3">
				                    <input type="text" name="noml" id="noml" class="form-control" placeholder="Entrer le nom du livre">
				                </div>
	            			</div>

	            			<div class="col-md-12">
	            				<div class="input-group mb-3">
				                    <textarea name="descriptionl" class="form-control round textarea" id="descriptionl" placeholder="Entrer une petite description du livre">
				                    	
				                    </textarea>
				                </div>
	            			</div>

	            			<div class="col-md-6">
	            				 <div class="input-group mb-3">
				                    <input type="text" name="auteur" id="auteur" class="form-control" placeholder="Entrer le nom de l'auteur du livre">
				                </div>
	            			</div>

	            			<div class="col-md-6">
	            				<div class="input-group mb-3">
				                    <input type="text" name="edition" id="edition" class="form-control" placeholder="Entrer l'année de publication du livre">
				                </div>
	            			</div>

	            			<div class="col-md-6">
	            				 <div class="input-group mb-3">
				                	<label for="user_image" class="control-label">Image du livre</label>
				                	<input type="file" class="dropify-fr" name="user_image" id="user_image" title="Selectionner l'image du livre" />  
			                        
				                </div>
	            			</div>

	            			<div class="col-md-6">

	            				<div class="input-group mb-3">
				                	<label for="user_image2" class="control-label">Contenu ou fichier du livre</label>
				                	<input type="file" class="dropify-fr" name="user_image2" id="user_image2" title="Selectionner l'image du livre" /> 

				                </div>
	            				
	            			</div>

	            			<div class="col-md-12">
		                		<div class="row">
		                			<div class="col-md-4"></div>
		                			<div class="col-md-4">
		                				<span id="user_uploaded_image"></span>
		                			</div>
		                			<div class="col-md-4"></div>
		                		</div>
	                        	
	                        </div> 
	            			<!-- fin -->
	            			
	            		</div>
	            	</div>
	                
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>                    
                    <input type="hidden" name="iddep" id="iddep" />  
					<input type="hidden" name="idl" id="idl" /> 
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
   

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Ajout d'un livre");  
           $('#action').val("Add");  
      });

      $('.selectpicker').selectpicker();

      var dataTable = $('#user_data').DataTable();

      $(document).on('submit', '#user_form', function(event){  
           event.preventDefault(); 
           var noml = $('#noml').val(); 
           var descriptionl = $('#descriptionl').val();
           var auteur = $('#auteur').val();
           var edition = $('#edition').val();
           var iddep = $('#iddep').val();
          
 
           var extension = $('#user_image').val().split('.').pop().toLowerCase();
           var extension2 = $('#user_image2').val().split('.').pop().toLowerCase(); 
           var action = $('#action').val();


           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     swal("Erreur!!!","Invalide type d'image","error");  
                     $('#user_image').val('');  
                     return false;  
                }  
           }

           if(extension2 != '')  
           {  
                if(jQuery.inArray(extension2, ['pdf']) == -1)  
                {  
                     swal("Erreur!!!","Invalide type de fichier","error");  
                     $('#user_image').val('');  
                     return false;  
                }  
           }

           // alert(noml+" "+action);


           if(noml != '' && descriptionl !='' && auteur !='' && edition !='' && iddep !='')
            {

	            if (action =="Add") {
	                 
	                $.ajax({  
	                     url:"<?php echo base_url() . 'admin/operation_pendingbook/Add'?>",  
	                     method:'POST',  
	                     data:new FormData(this),  
	                     contentType:false,  
	                     processData:false,  
	                     success:function(data)  
	                     {  
	                          swal("succès", ''+data, 'success');  
	                          // $('#user_form')[0].reset();  
	                          $('#userModal').modal('hide');  
	                          dataTable.ajax.reload();  
	                     }  
	                });
	                  // alert("insertion");

	            }
		        else if (action == 'Edit') {
		        	$.ajax({  
                         url:"<?php echo base_url() . 'admin/modification_pendingbook'?>",  
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
           var idl = $(this).attr("idl");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_pendingbook",  
                method:"POST",  
                data:{idl:idl},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#noml').val(data.noml);

                     $('#descriptionl').val(data.descriptionl);
                     $('#edition').val(data.edition);
                     $('#auteur').val(data.auteur);

                     $('#user_uploaded_image').html(data.user_image);

                     $('#iddep').val(data.iddep);
                     $('.modal-title').text("modification du département");  
                     $('#idl').val(idl);  
                     $('#action').val("Edit");  
                }  
           });  
      });

      $(document).on('click', '.delete', function(){
          var idl = $(this).attr("idl");

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
		              url:"<?php echo base_url(); ?>admin/suppression_pendingbook",
		              method:"POST",
		              data:{idl:idl},
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
		  if(iduniv != '')
		  {
			  // alert(iduniv);
			   $.ajax({
				    url:"<?php echo base_url(); ?>admin/fetch_university_faculte",
				    method:"POST",
				    data:{iduniv:iduniv},
				    success:function(data)
				    {
				     $('#id_faculte').html(data);
				    }
			   });
		  }
		  else
		  {
			   $('#id_faculte').html('<option value="">Selectionner une faculté</option>');
		  }
    	// alert(idv);
    });

    $(document).on('change', '#id_faculte', function(){
    	
    	  var idfac = $(this).val();
		  if(idfac != '')
		  {
			  // alert(idfac);
			   $.ajax({
				    url:"<?php echo base_url(); ?>admin/fetch_university_departement",
				    method:"POST",
				    data:{idfac:idfac},
				    success:function(data)
				    {
				     $('#id_departement').html(data);
				    }
			   });
		  }
		  else
		  {
			   $('#id_departement').html('<option value="">Selectionner un département</option>');
		  }
    	// alert(idv);
    });



    $(document).on('change', '#id_departement', function(){
    	var iddep = $(this).val();
    	$('#iddep').val(iddep);
    	// alert(idv);
    });


    $('.delete_checkbox').click(function(){
	  if($(this).is(':checked'))
	  {
	   $(this).closest('tr').addClass('removeRow');
	  }
	  else
	  {
	   $(this).closest('tr').removeClass('removeRow');
	  }
	 });

	 $(document).on('click', '.accepter_livre', function(e){
	 	  e.preventDefault();
	 	  var checkbox = $('.delete_checkbox:checked');
		  if(checkbox.length > 0)
		  {
			   var checkbox_value = [];
			   $(checkbox).each(function(){
			    checkbox_value.push($(this).val());
			   });


			   swal({
			        title:"Êtes-vous sûr?",
			        text: "Accepter pour valider dans la liste des livres au sytèmes",
			        type: "warning",
			        showCancelButton: true,
			        confirmButtonColor: "#dc3545",
			        confirmButtonText: "Oui, Enregistrez-le!",
			        cancelButtonText: "Non, annulez!",
			        closeOnConfirm: false,
			        closeOnCancel: false
			    }, function (isConfirm) {
			        if (isConfirm) {
			        	// alert(checkbox_value);
					   $.ajax({
					    url:"<?php echo base_url(); ?>admin/accepte_verification_livre",
					    method:"POST",
					    data:{checkbox_value:checkbox_value},
					    success:function(data)
					    {
						     swal("succès", ""+data, "success");
						     // alert(data);
					    }
					   });
			           
			        } else {
			            swal("Ouf!!!", "opération annulée :)", "error");
			        }
			    });
			   
		  }
		  else
		  {
		   swal("Désolé", "veillez Selectionner au moins un livre", "error");
		  }
	});


	 $('.delete_all').click(function(){
	  var checkbox = $('.delete_checkbox:checked');
	  if(checkbox.length > 0)
	  {
		   var checkbox_value = [];
		   $(checkbox).each(function(){
		    checkbox_value.push($(this).val());
		   });

		   swal({
		        title:"Êtes-vous sûr?",
		        text: "Vous ne pourrez pas récupérer ces données provinciales!",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#dc3545",
		        confirmButtonText: "Oui, supprimez-le!",
		        cancelButtonText: "Non, annulez!",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		        	// alert(checkbox_value);
				   $.ajax({
				    url:"<?php echo base_url(); ?>admin/verification_livre_delete",
				    method:"POST",
				    data:{checkbox_value:checkbox_value},
				    success:function(data)
				    {
					     swal("succès", ""+data, "success");
					     // alert(data);
					     $('.removeRow').fadeOut(1500);
				    }
				   });
		           
		        } else {
		            swal("Ouf!!!", "opération annulée :)", "error");
		        }
		    });

		   


		   
	  }
	  else
	  {
	   swal("Désolé", "veillez Selectionner au moins un livre", "error");
	  }

	 });

	 $('#user_data').DataTable();

	
 });  
 </script>










</body>
</html>