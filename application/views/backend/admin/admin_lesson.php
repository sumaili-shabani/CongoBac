


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

													<div class="row">

														<div class="col-md-12">

															<!-- /.mailbox-read-info -->
											                <div class="mailbox-controls with-border text-center">
											                   
											                   <div align="right">
					                                                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg"><i class="fa fa-plus"></i>add</button> 
					                                            </div>
					                                            <br>
											                  
											                <!-- /.mailbox-controls -->
											                <div class="mailbox-read-message">

											                	<div class="table-responsive resultat_ok">


											                      <table id="user_data" class="table table-bordered table-striped">  
											                       <thead>  
											                            <tr>  
											                                 <th width="10%">Image</th> 
											                                 <th width="10%">chapitre</th> 
											                                 <th width="25%">nom du cours</th>
											                                 <th width="25%">niveau</th>  
											                                 <th width="25%">description</th>
											                                 <th width="10%">nom formation</th>
											                                 <th width="25%">mis à jour</th>

											                                 <th width="15%">chapitre</th>
											                                 <th width="15%">typde de fichier</th>

											                                 <!-- <th width="5%">voir</th> -->

											                                 <th width="5%">Edit</th>  
											                                 <th width="5%">Delete</th>  
											                            </tr>  
											                       </thead>  
											                     </table>
											                		


											                	</div>
											                  
											                </div>
											                <!-- /.mailbox-read-message -->
															

														</div>
														

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


<div id="userModal" class="modal fade">  
      <div class="modal-dialog modal-lg">  
            
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Ajout d'un cour pour la formation</h4>  
                     </div> 

                    
	                     <div class="modal-body">

	                     	<div class="form-group">

	                     		<label><i class="fa fa-book"></i>Choisissez une formation</label>
	                     		<select class="form-control selectpicker formation_valider" name="cours" id="formation_valider"  data-live-search="true">
	                     			<?php 
	                     			$cours = $this->db->get("formation");
	                     			if ($cours->num_rows() > 0) {
	                     				?>
	                     				<option value="">selectionner une formation</option>
	                     				<?php
	                     				foreach ($cours->result_array() as $data) {
		                     				?>
		                     				<option value="<?php echo($data['idformation']) ?>">
		                     					<?php echo($data['nomformation']) ?>
		                     			    </option>
		                     				<?php
		                     			}
	                     			}
	                     			else{
	                     				?>
	                     				<option value="">vide</option>
	                     				<?php

	                     			}
	                     			

	                     			 ?>
	                     			
	                     		</select>
	                     		
	                     	</div>

	                     	<div class="form-group">

	                     		<label><i class="fa fa-book"></i>Choisissez un cours</label>
	                     		<select class="form-control  formation_valider" name="cours" id="categorie"  data-live-search="true">
	                     			
	                     			
	                     		</select>
	                     		
	                     	</div>

	                     	<div class="form-group">

	                     		<label><i class="fa fa-book"></i>Choisissez un chapitre</label>
	                     		<select class="form-control  formation_valider" name="section" id="categorie2"  data-live-search="true">
	                     			
	                     			
	                     		</select>
	                     		
	                     	</div>

	                     	<div class="form-group">

	                     		<label><i class="fa fa-toggle-off"></i>Quel est le type de fichier pour la leçon</label>
	                     		<select class="form-control" name="fichier" id="fichier"  data-live-search="true">
	                     			<option value="">selectionner un type</option>
	                     			<option value="PDF">PDF</option>
	                     			<option value="VIDEO">VIDEO</option>
	                     			<option value="YOUTUBE">VIDEO YOUTUBE</option>
	                     			
	                     		</select>
	                     		
	                     	</div>

	                      <form method="post" id="user_form" enctype="multipart/form-data"> 

							  <div class="form-group">
							  		<input type="hidden" name="idsection" id="idsection" />
									<input type="hidden" name="type_fichier" id="type_fichier" />
							  </div>

	                          <div class="form-group">
	                          	<label><i class="fa fa-book"></i>Entrer le nom de la leçon</label>  
	                          	<input type="text" name="titre" id="titre" class="form-control" /> 
	                          </div>  

	                          <div class="form-group">
	                          	<label><i class="fa fa-plus"></i>Entrer une petite description de de la leçon</label>  
	                          	<textarea class="form-control" name="description" id="description" placeholder="parler un peu plus sur ce cours pour plus d'informations">
	                          	
	                          	</textarea>  
	                          </div>
	                        
	                         <div class="form-group fichier_containaire">
	                          <label><i class="fa fa-video"></i>uploader un fichier</label>  
	                          <input type="file" name="user_image" id="user_image" class="form-control round" />  
	                          <span id="user_uploaded_image"></span>
	                         </div>
	                         <div class="form-group fichier_containaire_link" style="display: none;">
	                          	<label><i class="fa fa-video"></i>entrer adresse url de la video</label>  
	                          	<input type="text" name="youtube" id="youtube" class="form-control" />  
	                         </div>   
	                     </div>  
	                     <div class="modal-footer"> 
	                             
	                          <input type="hidden" name="idlesson" id="idlesson" />  
	                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
	                          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>Close</button>  
	                     </div>
                    </form>  
                </div>  
             
      </div>  
 </div> 
   

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Ajout d'une leçon pour la formation");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      });

      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_lesson'; ?>",  
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
           var idsection = $('#idsection').val();
           var type_fichier = $('#type_fichier').val(); 
           var titre = $('#titre').val();  
           var description = $('#description').val();  
           var youtube = $('#youtube').val();
           var extension = $('#user_image').val().split('.').pop().toLowerCase(); 
           var action = $('#action').val();


           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['webm','mp4','pdf']) == -1)  
                {  
                     alert("Invalid video File");  
                     $('#user_image').val('');  
                     return false;  
                }  
           }

           // alert(nomformation+" description:"+description+" action:"+action);


           if(titre != '' && description != '' && idsection !='' && type_fichier !=''  && extension !='')
            {

	            if (action =="Add") {
	                 
	                $.ajax({  
	                     url:"<?php echo base_url() . 'admin/insertion_lesson'?>",  
	                     method:'POST',  
	                     data:new FormData(this),  
	                     contentType:false,  
	                     processData:false,  
	                     success:function(data)  
	                     {  
	                          swal(data, '', 'success');  
	                          $('#user_form')[0].reset();  
	                          $('#userModal').modal('hide');  
	                          dataTable.ajax.reload();  
	                     }  
	                });
	                  // alert("insertion");

	            }
	            if (action == 'Edit') {

	            	 $.ajax({  
                         url:"<?php echo base_url() . 'admin/modification_lesson'?>",  
                         method:'POST',  
                         data:new FormData(this),  
                         contentType:false,  
                         processData:false,  
                         success:function(data)  
                         {  
                              swal(data, '', 'success'); 
                              $('#user_form')[0].reset();  
                              $('#userModal').modal('hide');  
                              dataTable.ajax.reload();  
                         }  
                    });

                  
                }

            }

            else if (titre != '' && description != '' && idsection !='' && type_fichier !=''  && extension ==''){

            	if (action =="Add") {
	                 
	                $.ajax({  
	                     url:"<?php echo base_url() . 'admin/insertion_lesson_sans_video'?>",  
	                     method:'POST',  
	                     data:new FormData(this),  
	                     contentType:false,  
	                     processData:false,  
	                     success:function(data)  
	                     {  
	                          swal(data, '', 'success');  
	                          $('#user_form')[0].reset();  
	                          $('#userModal').modal('hide');  
	                          dataTable.ajax.reload();  
	                     }  
	                });

	                // alert("insertion");

	            }
	            else if(action == "Edit"){

	            	if (youtube =='') {

	            		$.ajax({  
	                         url:"<?php echo base_url() . 'admin/modification_lesson2'?>",  
	                         method:'POST',  
	                         data:new FormData(this),  
	                         contentType:false,  
	                         processData:false,  
	                         success:function(data)  
	                         {  
	                              swal(data, '', 'info'); 
	                              $('#user_form')[0].reset();  
	                              $('#userModal').modal('hide');  
	                              dataTable.ajax.reload();  
	                         }  
	                    });
	            	}
	            	else{

	            		$.ajax({  
	                         url:"<?php echo base_url() . 'admin/modification_lesson_youtube'?>",  
	                         method:'POST',  
	                         data:new FormData(this),  
	                         contentType:false,  
	                         processData:false,  
	                         success:function(data)  
	                         {  
	                              swal(data, '', 'success'); 
	                              $('#user_form')[0].reset();  
	                              $('#userModal').modal('hide');  
	                              dataTable.ajax.reload();  
	                         }  
	                    });

	            	}


	            	 
	            }
            	// alert("ajout lien de la video");
            }
            else 
            {
            	swal("Tous les champs doivent être remplis", "erreur", "alert-danger"); 
            }


             
      });  
      $(document).on('click', '.update', function(){  
           var idlesson = $(this).attr("idlesson"); 
           var titre = $(this).attr("titre");
           var idsection = $(this).attr("idsection");
           var type_fichier = $(this).attr("type_fichier");
           var description = $(this).attr("description");

           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_lesson_plus",  
                method:"POST",  
                data:{idlesson:idlesson},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#titre').val(data.titre);  
                     $('#description').val(data.description);
                     $('#type_fichier').val(data.type_fichier);
                     $('#idsection').val(data.idsection); 

                     $('.modal-title').text("modification de la leçon");  
                     $('#idlesson').val(idlesson);  
                     $('#idsection').val(idsection); 
                     $('#titre').val(titre); 
                     $('#description').val(description); 
                     $('#type_fichier').val(type_fichier);
                     $('#youtube').val(fichier);

                     $('#action').val("Edit");  
                }  
           }); 

      });

      $(document).on('click', '.delete', function(){
          var idlesson = $(this).attr("idlesson");
          if(confirm("Are you sure you want to delete this?"))
          {
            
            $.ajax({
              url:"<?php echo base_url(); ?>admin/supression_lesson",
              method:"POST",
              data:{idlesson:idlesson},
              success:function(data)
              {
                swal(data, '', 'success');
                dataTable.ajax.reload();
              }
            });
          }
          else
          {
            swal("opération annulée", '', 'danger');
          }

      });


	  $(document).on('change', '#formation_valider', function(){

	    	  var idformation = $(this).val();
			  if(idformation != '')
			  {
				  // alert(idformation);
				   $.ajax({
					    url:"<?php echo base_url(); ?>admin/fetch_operation_formation_departement",
					    method:"POST",
					    data:{idformation:idformation},
					    success:function(data)
					    {
					     $('#categorie').html(data);
					    }
				   });
			  }
			  else
			  {
				   $('#categorie').html('<option value="">Selectionner un cours</option>');
			  }
	    	// alert(idv);
	   });


	  $(document).on('change', '#categorie', function(){

	    	  var idcours = $(this).val();
			  if(idcours != '')
			  {
				  // alert(idcours);
				   $.ajax({
					    url:"<?php echo base_url(); ?>admin/fetch_operation_cours_departement",
					    method:"POST",
					    data:{idcours:idcours},
					    success:function(data)
					    {
					     $('#categorie2').html(data);
					    }
				   });
			  }
			  else
			  {
				   $('#categorie2').html('<option value="">Selectionner un chapitre</option>');
			  }
	    	// alert(idv);
	   });

	  $(document).on('change','#categorie2', function(){

	        var idsection = $(this).val();

	        $('#idsection').val(idsection);

	  });

	  $(document).on('change','#fichier', function(){

	        var type_fichier = $(this).val();

	        $('#type_fichier').val(type_fichier);
	        if (type_fichier == "YOUTUBE") {
	        	$('.fichier_containaire_link').show();
	        	$('.fichier_containaire').hide();
	        }
	        else{
	        	$('.fichier_containaire_link').hide();
	        	$('.fichier_containaire').show();
	        }

	  });



 });  
 </script>
   


</body>
</html>