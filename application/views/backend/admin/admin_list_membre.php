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
				                    <a href="" type="button" class="btn btn-round btn-default btn-lg"><i class="fa fa-refresh"></i>Actualiser</a> 
				                  </div>
			                    <br>
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
		                      <table id="user_data" class="table table-hover table-custom spacing5 ">  
		                       <thead>  
		                            <tr> 
		                                 <th width="10%">Image</th>  
		                                 <th width="25%">nom </th>  
		                                 <th width="25%">postnom</th>  
		                                 <th width="20%">email</th> 
		                                 <th width="20%">Fonction</th> 
		                                 <th width="10%">voir plus</th> 
		                                 <th width="10%">supprimer</th> 
		                            </tr>  
		                       </thead> 
		                       <tbody id="example-tbody">
		                       	<?php 
		                       	
		                       	$this->db->order_by('idmembre', 'Desc');
		                       	$users = $this->db->get('profile_membre');
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
		                       					<?php echo($key['fonction']) ?>
		                       				</td>

		                       				<td>
		                       					<a href="javascript:void(0)" class="btn btn-info btn-xs update" id="<?php echo($key['iduser']) ?>"><i class="fa fa-eye "></i></a>
		                       				</td>
		                       				<td>
		                       					<a href="<?php echo(base_url()) ?>admin/operation_formateur/suppression_membre/<?php echo($key['iduser']) ?>" onclick="return confirm('Etes-vous sûre de vouloir supprimer ce membre?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
 
 <!-- <style>
.removeRow
{
 background-color: #D0D9E6;
 color:#FFFFFF;
}
</style> -->
<div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Ajout d'une formation</h4>  
                     </div>  
                     <div class="modal-body"> 

                     	<div class="col-md-12">
	                      <div class="row">
	                        <div class="col-md-12">
	                          <div class="side-navigation">
	                            <div class="img-responsive">
	                              

	                              <div class="col-md-12">
	                                <div class="row">
	                                  <div class="col-md-1">
	                                    
	                                  </div>
	                                  <div class="col-md-10">

	                                  	<div class="col-md-12">
	                                  		<div class="row">
	                                  			<div class="col-md-4">
	                                  				<div class="img-responsive">

			                                          <span id="user_uploaded_image"></span>

			                                        </div>
	                                  			</div>

	                                  			<div class="col-md-8">

	                                  				<div class="form-group text-center">
				                                      <label class="text-info"><i class="fa fa-user"></i> Nom:  <span id="first_name"></span><br></label>
				                                      <label class="text-info"><i class="fa fa-user"></i> Prénom: </label> <span id="last_name"></span>

				                                      <label class="text-info"><i class="fa fa-google"></i> Email: </label> <span id="email"></span>

				                                      <label class="text-info"><i class="fa fa-calendar"></i> Date de naissance:</label> <span id="date_nais"></span>

				                                      <label class="text-info"><i class="fa fa-map-marker"></i> Adresse:</label> <span id="full_adresse"></span>

				                                      <div class="form-group">
				                                        <label class="text-info"><i class="fa fa-phone"></i> Téléphone:</label> <span id="telephone"></span>
				                                      </div>

				                                      

				                                    </div>
	                                  				
	                                  			</div>

	                                  			<div class="col-md-12">
	                                  				<div class="form-group">
				                                        <label class="text-info"><i class="fa fa-home"></i> Bieographie:</label> <span id="biographie"></span>
				                                     </div>
	                                  			</div>

	                                  			<div class="col-md-12">
					                              	<label>Fonction</label>
					                              	<input type="text" name="fonction" id="fonction" class="form-control">
				                                </div>

				                                <br><br><br><br>


	                                  		</div>
	                                  	</div>

	                                   

	                                    
	                                    
	                                  </div>
	                                  <div class="col-md-1">
	                                    
	                                  </div>
	                                </div>
	                              </div>
	                              


	                            </div>
	                          </div>
	                        </div>

                            
                     </div>  
                     <div class="modal-footer"> 
                          <input type="hidden" name="idmembre" id="idmembre" class="form-control">
                          <input type="submit" name="valider" id="action" class="btn btn-info" value="Edit"> 
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
      var dataTable = $('#user_data').DataTable();

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

      
      $(document).on('click', '.update', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_membre",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#first_name').text(data.first_name);  
                     $('#last_name').text(data.last_name); 

                      $('#last_name').text(data.last_name);
                      $('#email').text(data.email);
                      $('#telephone').text(data.telephone);
                      $('#full_adresse').text(data.full_adresse);
                      $('#biographie').text(data.biographie);
                      $('#date_nais').text(data.date_nais);
                      $('#idmembre').val(data.idmembre);
                      $('#fonction').val(data.fonction);
                      
                     $('.modal-title').text(data.fonction);
                     $('#user_uploaded_image').html(data.user_image);    
                }  
           });  
      });

      
 });  
 </script>
 


</body>
</html>