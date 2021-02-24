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

                        	<!-- ajout detail à complèter -->
								<div class="col-md-12">

									<div class="col-md-12">
										<div class="row">
											<!-- debit card -->
											<div class="card">
												<div class="card-body">
													<div class="col-md-12">

															<div class="row">

																<div class="col-sm-12 col-md-12">
																	<div class="row">
																		<form class="col-md-12 row" method="POST" action="<?php echo(base_url()) ?>admin/filter_liste_incription">
																			<div class="col-md-1"></div>
																			<div class="col-md-5">
																				<select name="nomformation" id="nomformation" class="form-control">
																					<?php 

																						$this->db->group_by('nomformation', 'Desc');
																                       	$users2 = $this->db->get('profile_incription_apprenant');
																                       	if ($users2->num_rows() > 0) {
																                       		foreach ($users2->result_array() as $key) {
																                       			?>
																                       			<option value="<?php echo($key['nomformation']) ?>">
																                       				<?php echo($key['nomformation']) ?>
																                       			</option>
																                       			<?php
																                       		}
																                       	}
																                       	else{

																                       	}

																					 ?>
																				</select>
																			</div>
																			<div class="col-md-3">
																				<select name="annee" id="annee" class="form-control">
																					<?php 

																						$this->db->group_by('annee', 'Desc');
																                       	$users2 = $this->db->get('profile_incription_apprenant');
																                       	if ($users2->num_rows() > 0) {
																                       		foreach ($users2->result_array() as $key) {
																                       			?>
																                       			<option value="<?php echo($key['annee']) ?>">
																                       				<?php echo($key['annee']) ?>
																                       			</option>
																                       			<?php
																                       		}
																                       	}
																                       	else{

																                       	}

																					 ?>
																				</select>
																			</div>
																			<div class="col-md-3">
																				<button type="submit" class="btn btn-info"><i class="fa fa-check"></i> fultrer la requête</button>
																			</div>
																		</form>
																	</div>
																</div>



																<div class="col-md-12">


																	<!-- /.mailbox-read-info -->
													                <div class="mailbox-controls with-border text-center">
													                  
													                  
													                <!-- /.mailbox-controls -->
													                <div class="mailbox-read-message">

													                	<div class="form-group">
													                		<?php
																            if($this->session->flashdata('message'))
																            {
																                echo '
																                <div class="alert alert-success"><i class="fa fa-check"></i>
																                    '.$this->session->flashdata("message").'
																                </div>
																                ';
																            }
																            elseif ($this->session->flashdata('message2')) {
																            	echo '
																                <div class="alert alert-danger"><i class="fa fa-question"></i>
																                    '.$this->session->flashdata("message2").'
																                </div>
																                ';
																            }
																            else{

																            }
																            ?>
													                	</div>

													                	<div class="table-responsive resultat_ok">

													                      <table id="user_data" class="table table-bordered table-striped">  
													                       <thead>  
													                            <tr> 
													                                 <th width="10%">Image</th>  
													                                 <th width="15%">nom </th>  
													                                 <th width="15%">postnom</th>  
													                                 <th width="15%">email</th> 
													                                 <th width="20%">nom formation</th>
													                                 <th width="5%">nom année</th>
													                                 <th width="10%">mis à jour</th> 
													                                 <th width="5%">voir plus</th> 
													                                 <th width="5%">supprimer</th> 
													                            </tr>  
													                       </thead> 
													                       <tbody id="example-tbody">
													                       	<?php 
													                       	
													                       	$this->db->order_by('idinscription', 'Desc');
													                       	$users = $this->db->get('profile_incription_apprenant');
													                       	if ($users->num_rows() > 0) {
													                       		foreach ($users->result_array() as $key) {
													                       			?>
													                       			<tr>
													                       				<td>
													                       					<img src="<?php echo(base_url()) ?>upload/photo/<?php echo($key['image']) ?>" class="img-thumbnail" width="50" height="35">
													                       				</td>
													                       				<td>
													                       					<?php echo($key['first_name']) ?>
													                       				</td>
													                       				<td>
													                       					<?php echo($key['last_name']) ?>
													                       				</td>
													                       				<td>
													                       					<?php echo($key['email']) ?>
													                       				</td>

													                       				<td>
													                       					<?php echo($key['nomformation']) ?>
													                       				</td>
													                       				<td>
													                       					<?php echo($key['annee']) ?>
													                       				</td>
													                       				<td>
													                       					<?php echo(substr(date(DATE_RFC822, strtotime($key['created_at'])), 0, 23)  ) ?>
													                       				</td>

													                       				<td>
																						<a href="<?php echo(base_url()) ?>admin/detail_users_profile/<?php echo($key['iduser']) ?>" class="btn btn-info btn-xs update" id="<?php echo($key['iduser']) ?>"><i class="fa fa-eye "></i></a>
													                       				</td>
													                       				<td>
													                       					<a href="<?php echo(base_url()) ?>admin/operation_formateur/suppression_apprenant_alaformation/<?php echo($key['idinscription']) ?>" onclick="return confirm('Etes-vous sûre de vouloir supprimer ce membre?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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



</div>

<!-- Javascript -->


 

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
           $('.modal-title').text("Ajout d'une formation");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#user_data').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
     });

      $(document).on('submit', '#user_form', function(event){  
           event.preventDefault();


           var fonction    = $('#fonction').val();
           var idmembre 	= $('#idmembre').val();
           
           var action 		= $('#action').val();
           // alert(nomformation+" description:"+description+" action:"+action);
           if(fonction != '' && idmembre != '')
            {

              
              if (action == 'Edit') {

                $.ajax({  
                         url:"<?php echo base_url() . 'admin/modification_membre'?>",  
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
            else
            {
              swal("Tous les champs doivent être remplis", "", "danger");
            }


             
      });  

      
      

      
 });  
 </script>
 
 <!-- <style>
.removeRow
{
 background-color: #D0D9E6;
 color:#FFFFFF;
}
</style> -->




</body>
</html>