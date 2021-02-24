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
	            			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
			                    <div class="card">
			                        <div class="body">
			                        	<?php 

			                        	 $nbllivreactid = $this->db->get("profile_livre");
			                        	 if ($nbllivreactid->num_rows() >0) {
			                        	 	$nbactif = $nbllivreactid->num_rows();
			                        	 }
			                        	 else{
			                        	 	$nbactif = 0;
			                        	 }

			                        	 ?>
			                            <h6 class="mb-4"><i class="fa fa-hospital-o"></i> Total livre</h6>                            
			                            <div class="card-value text-danger float-left mr-3 pr-2 border-right"><a href="<?php echo(base_url()) ?>admin/detail_book_livre" class="text-info"><?php echo($nbactif) ?></a></div>
			                            <div class="font-12">total des livres enregistrer dans le système à  les lire plus tard</div>
			                            
			                            
			                        </div>
			                    </div>
			                </div>
			                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
			                    <div class="card">
			                        <div class="body">
			                        	<?php 

			                        	 $utilisateur = $this->db->query("SELECT * FROM users WHERE idrole=1 OR idrole=3");
			                        	 if ($utilisateur->num_rows() >0) {
			                        	 	$nbrutilisateur = $utilisateur->num_rows();
			                        	 }
			                        	 else{
			                        	 	$nbrutilisateur = 0;
			                        	 }

			                        	 ?>

			                            <h6 class="mb-4"><i class="fa fa-users"></i> Total des personnes</h6>
			                            <div class="card-value text-danger float-left mr-3 pr-2 border-right"><a href="<?php echo(base_url()) ?>admin/access_livre" class="text-warning"><?php echo($nbrutilisateur) ?></a></div>
			                            <div class="font-12">Nombre total des personnes ayant accès  dans notre le système d'activités</div>
			                        </div>
			                    </div>
			                </div>
			                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
			                    <div class="card">
			                        <div class="body">

			                        	<?php 

			                        	 $nblivreinactif = $this->db->get("profile_pending_livre");
			                        	 if ($nblivreinactif->num_rows() >0) {
			                        	 	$nbina = $nblivreinactif->num_rows();
			                        	 }
			                        	 else{
			                        	 	$nbina = 0;
			                        	 }

			                        	 ?>
			                            <h6 class="mb-4"><i class="fa fa-hospital-o"></i> Total pending livre</h6>
			                            <div class="card-value text-green float-left mr-3 pr-2 border-right"><a href="<?php echo(base_url()) ?>admin/pending_livre_book"><?php echo($nbina) ?></a></div>
			                            <div class="font-12">Nombre total des livres en attente d'activation au système à  les lire plus tard <span class="float-right"></span></div>
			                          
			                        </div>
			                    </div>
			                </div>
			                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
			                    <div class="card">
			                        <div class="body">
			                            <h6 class="mb-4"><i class="fa fa-book"></i> Total des livres suivis</h6>
			                            <div class="card-value text-green float-left mr-3 pr-2 border-right">65</div>
			                            <div class="font-12">Nombre total des livres plus suivis par les lecteurs au système<span class="float-right"></span></div>
			                        </div>
			                    </div>
			                </div>
			            
            			<!-- fin détail des livres -->

            			<!-- visualisation de livres au tableau -->
            			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-lg-12">
		                    <div class="card">
		                        <div class="body">

		                        	<div class="table-responsive resultat_ok">
		                        		 <div align="right">
		                        		 	<a href="<?php echo(base_url()) ?>admin/detail_book_livre" class="btn btn-default btn-sm btn-round "><i class="icon-refresh"></i>Détail</a>

						                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-round btn-default btn-lg"><i class="fa fa-plus"></i>Ajouter</button> 
						                  </div>
					                    <br>
				                      <table id="user_data" class="table table-hover table-custom spacing5 ">  
				                       <thead>  
				                            <tr> 
				                            	 <th width="5%">Editer</th>  
				                                 <th width="5%">Supprimer</th>

				                            	 <th width="10%">Image</th> 
				                            	 
				                            	 <th width="10%">Nom du livre</th>
				                            	 <th width="10%">Auteur</th> 
				                            	 <th width="10%">Description</th>
				                            	 <th width="10%">Edition</th>
				                            	 <th width="10%">Université</th> 

				                                 <th width="10%">Département</th>  
				                                 <!-- <th width="10%">photo</th>
				                                 <th width="10%">Ajouter par</th> -->

				                                 <th width="10%">Mise à jour</th>
 
				                            </tr>  
				                       </thead>  
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
           $('.modal-title').text("Ajout d'un livre'");  
           $('#action').val("Add");  
      });

      $('.selectpicker').selectpicker();

      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_book'; ?>",  
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
	                     url:"<?php echo base_url() . 'admin/operation_book/Add'?>",  
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
                         url:"<?php echo base_url() . 'admin/modification_book'?>",  
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
                url:"<?php echo base_url(); ?>admin/fetch_single_book",  
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
		              url:"<?php echo base_url(); ?>admin/suppression_book",
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

	
 });  
 </script>



</body>
</html>