


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
			                                           <th width="15%">Image</th>  
			                                           <th width="20%">auteur</th> 
			                                           <th width="10%">logo du projet</th>
			                                           <th width="15%">nom du projet</th> 
			                                           <th width="20%">description</th>
			                                           <th width="5%">édition</th> 

			                                           <th width="5%">lire</th>  
			                                           <th width="5%">télécharger</th> 
			                                           <th width="5%">Delete</th>  
			                                      </tr>  
			                                 </thead>
			                                 <tbody>
			                                  <?php
			                                  $query = $this->db->get('profile_projet');
			                                   if ($query->num_rows() > 0) {
			                                    foreach ($query->result_array() as $key) {
			                                      ?>
			                                      <tr>
			                                        <td>
			                                          <img src="<?php echo(base_url()) ?>upload/photo/<?php echo($key['image']) ?>" class="img-thumbnail" width="50" height="35">
			                                        </td>
			                                        <td><?php echo($key['first_name']) ?>-<?php echo($key['last_name']) ?></td>
			                                          <td>
			                                            <img src="<?php echo(base_url()) ?>upload/projet/<?php echo($key['logo']) ?>" class="img-thumbnail" width="50" height="35">
			                                          </td>
			                                          <td>
			                                          <?php echo($key['nom']) ?>
			                                          </td>
			                                          <td>
			                                          <?php echo(substr($key['description'], 0,30)) ?>...
			                                          </td>
			                                          <td>
			                                          <?php echo($key['annee']) ?>
			                                          </td>
			                                          <td>
			                                            <a href="javascript:void(0)" class="btn btn-info btn-xs lire" idprojet="<?php echo($key['idprojet']) ?>"><i class="fa fa-eye "></i></a>
			                                          </td>
			                                          <td>
			                                            <a download="<?php echo(base_url()) ?>upload/projet/<?php echo($key['fichier']) ?>" href="<?php echo(base_url()) ?>upload/projet/<?php echo($key['fichier']) ?>" class="btn btn-success btn-xs telechager" fichier="<?php echo($key['fichier']) ?>"><i class="fa fa-download "></i></a>
			                                          </td>

			                                          <td>
			                                            <a href="<?php echo(base_url()) ?>admin/operation_projet_apprenant/suppression/<?php echo($key['idprojet']) ?>" onclick="return confirm('Etes-vous sûre de vouloir supprimer ce projet?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header text-center">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Ajout d'une formation</h4>  
                     </div>  
                     <div class="modal-body">  
                          <div class="form-group">
                          	 <label class="control-label" for="nom"><i class="fa fa-book"></i>Entrer le nom du projet</label>  
                         	 <input type="text" name="nom" id="nom" class="form-control" required="required" />
                          </div> 

                          <div class="form-group">
                          	<label class="control-label" for="description"><i class="fa fa-edit"></i>Entrerla description du projet</label>  
                          	<textarea class="form-control" name="description" id="description"></textarea>
                          </div>

                          <div class="form-group">
                          	<label class="control-label" for="user_image"><i class="fa fa-camera"></i>Selectionner l'image ou logo de votre projet</label>  
                          	<input type="file" name="user_image" id="user_image" class="form-control" />
                          </div>

                          <div class="form-group">
                          	<label class="control-label" for="user_image2"><i class="fa fa-file"></i>Selectionner le finchier de votre projet</label>  
                          	<input type="file" name="user_image2" id="user_image2" class="form-control" />
                          </div>
                          <div class="form-group">
                          	<div class="text-center">
                          		<span id="user_uploaded_image"></span>
                          	</div>
                          </div>
  
                     </div>  
                     <div class="modal-footer">  
                          <input type="hidden" name="idprojet" id="idprojet" class="idprojet2" />  
                          <input type="hidden" name="iduser" id="iduser" value="<?php echo($id) ?>" /> 
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>  



 <div id="userModal2" class="modal fade">  
      <div class="modal-dialog modal-lg">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header text-center">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title"></h4>  
                     </div>  
                     <div class="modal-body">  
                          <div class="form-group">
                          	 <span id="fichier"></span>
                          </div> 

  
                     </div>  
                     <div class="modal-footer">  
                          
                          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div> 
   

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Ajout d'un projet");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#user_data').DataTable();

      $(document).on('submit', '#user_form', function(event){  
           event.preventDefault();  
           var nom = $('#nom').val();  
           var description = $('#description').val();  
           var extension = $('#user_image').val().split('.').pop().toLowerCase(); 
           var extension2 = $('#user_image2').val().split('.').pop().toLowerCase(); 
           var action = $('#action').val();


           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     swal("Invalide type d'image", "erreur !!!", "danger");  
                     $('#user_image').val('');  
                     return false;  
                }  
           }

           if(extension2 != '')  
           {  
                if(jQuery.inArray(extension2, ['pdf','docx','txt','pptx']) == -1)  
                {  
                    swal("Invalide type de fichier", "erreur !!!", "danger");  
                     $('#user_image2').val('');  
                     return false;  
                }  
           }

           // alert(nom+" description:"+description+" action:"+action);


           if(nom != '' && description != '')
            {

              if (action =="Add") {
                   
                  $.ajax({  
                       url:"<?php echo base_url() . 'admin/operation_projet_apprenant/insertion'?>",  
                       method:'POST',  
                       data:new FormData(this),  
                       contentType:false,  
                       processData:false,  
                       success:function(data)  
                       {  
                            swal(data
                              , '', 'success');  
                            $('#user_form')[0].reset();  
                            $('#userModal').modal('hide');   
                       }  
                  });
                    // alert("insertion");

              }
              if (action == 'Edit') {

                  if (extension =='' && extension2 =='') {

                    $.ajax({  
                         url:"<?php echo base_url() . 'admin/operation_projet_apprenant/modification'?>",  
                         method:'POST',  
                         data:new FormData(this),  
                         contentType:false,  
                         processData:false,  
                         success:function(data)  
                         {  
                              swal(data, '', 'success'); 
                              $('#user_form')[0].reset();  
                              $('#userModal').modal('hide');  
   
                         }  
                    });

                  }
                  
                  else{

                    $.ajax({  
                         url:"<?php echo base_url() . 'admin/operation_projet_apprenant/modification_all'?>",  
                         method:'POST',  
                         data:new FormData(this),  
                         contentType:false,  
                         processData:false,  
                         success:function(data)  
                         {  
                              swal(data, '', 'success'); 
                              $('#user_form')[0].reset();  
                              $('#userModal').modal('hide');    
                         }  
                    });


                  }
              }

            }
            else
            {
              swal("Tous les champs doivent être remplis", "", "danger");
            }


             
      });  
      $(document).on('click', '.update', function(){  
           var idprojet = $(this).attr("idprojet");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_projet_apprenant",  
                method:"POST",  
                data:{idprojet:idprojet},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#nom').val(data.nom);  
                     $('#description').val(data.description);
                     $('#iduser').val(data.iduser);
                     
                     $('.modal-title').text("Détail du projet "+data.nom);  
                     $('#idprojet2').val(data.idprojet);  
                     $('#user_uploaded_image').html(data.user_image);  
                     $('#action').val("savoir plus");  
                }  
           });  
      });

       $(document).on('click', '.lire', function(){  
           var idprojet = $(this).attr("idprojet");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_projet_apprenant",  
                method:"POST",  
                data:{idprojet:idprojet},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal2').modal('show');                      
                     $('.modal-title').text("Détail du projet "+data.nom);    
                     $('#fichier').html(data.fichier);  
                     $('#action').val("lire plus");  
                }  
           });  
      });

      $(document).on('click', '.delete', function(){
          var idformation = $(this).attr("idformation");
          if(confirm("Are you sure you want to delete this?"))
          {
            
            $.ajax({
              url:"<?php echo base_url(); ?>admin/supression_formation",
              method:"POST",
              data:{idformation:idformation},
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



 });  
 </script>






   


</body>
</html>