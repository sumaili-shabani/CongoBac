


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
				                                                             <th width="35%">nom de la formation</th>  
				                                                             <th width="30%">description</th>
				                                                             <th width="5%">Prix de la formation</th>  
				                                                             <th width="10%">Edit</th>  
				                                                             <th width="10%">Delete</th>  
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
      <div class="modal-dialog">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Ajout d'une formation</h4>  
                     </div>  
                     <div class="modal-body">  
                          <label for="nomformation"><i class="fa fa-book"></i>Entrer le nom la formation</label>  
                          <input type="text" name="nomformation" id="nomformation" class="form-control" required="required" />  
                          <br />  
                          <label for="description"><i class="fa fa-plus"></i>Entrerla description de la formation</label>  
                          <textarea class="form-control" name="description" id="description">
                            
                          </textarea>  
                          <br />
                          <label for="prix"><i class="fa fa-money"></i>Entrer le prix de la formation</label>  
                          <input type="number" name="prix" id="prix" class="form-control" min="0" required="required" />  
                          <br />



                          <label><i class="fa fa-camera"></i>Select User Image</label>  
                          <input type="file" name="user_image" id="user_image" />  
                          <span id="user_uploaded_image"></span>  
                     </div>  
                     <div class="modal-footer">  
                          <input type="hidden" name="idformation" id="idformation" />  
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
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
           $('.modal-title').text("Ajout d'une formation");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_formation'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });

      $(document).on('submit', '#user_form', function(event){  
           event.preventDefault();  
           var nomformation = $('#nomformation').val();  
           var description = $('#description').val();  
           var extension = $('#user_image').val().split('.').pop().toLowerCase(); 
           var action = $('#action').val();


           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert("Invalid Image File");  
                     $('#user_image').val('');  
                     return false;  
                }  
           }

           // alert(nomformation+" description:"+description+" action:"+action);


           if(nomformation != '' && description != '')
            {

              if (action =="Add") {
                   
                  $.ajax({  
                       url:"<?php echo base_url() . 'admin/operation_formation'?>",  
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
                            dataTable.ajax.reload();  
                       }  
                  });
                    // alert("insertion");

              }
              if (action == 'Edit') {

                  if (extension =='') {

                    $.ajax({  
                         url:"<?php echo base_url() . 'admin/modification_formation2'?>",  
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
                  else{

                    $.ajax({  
                         url:"<?php echo base_url() . 'admin/modification_formation'?>",  
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

            }
            else
            {
              swal("Tous les champs doivent être remplis", "", "danger");
            }


             
      });  
      $(document).on('click', '.update', function(){  
           var idformation = $(this).attr("idformation");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_formation",  
                method:"POST",  
                data:{idformation:idformation},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#nomformation').val(data.nomformation);  
                     $('#description').val(data.description); 
                     $('#prix').val(data.prix);

                     $('.modal-title').text("modification de la formation");  
                     $('#idformation').val(idformation);  
                     $('#user_uploaded_image').html(data.user_image);  
                     $('#action').val("Edit");  
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