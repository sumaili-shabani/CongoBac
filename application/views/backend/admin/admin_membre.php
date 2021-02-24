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
                        		 <!-- <div align="right">
				                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-round btn-default btn-lg"><i class="fa fa-plus"></i>Ajouter</button> 
				                  </div> -->
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
		                            	<th width="10%">
                                      		<a href="javascript:void(0)" class="btn btn-info btn-sm select_all" id="envoyer_message" ><i class="fa fa-plus"></i>Ajouter</a>
                                      	</th> 
		                                 <th width="15%">Image</th>  
		                                 <th width="25%">nom </th>  
		                                 <th width="25%">postnom</th>  
		                                 <th width="25%">email</th>  
		                                 
		                            </tr>  
		                       </thead> 
		                       <tbody id="example-tbody">
		                       	<?php 
		                       	
		                       	$this->db->order_by('id', 'Desc');
		                       	$users = $this->db->get('users');
		                       	if ($users->num_rows() > 0) {
		                       		foreach ($users->result_array() as $key) {
		                       			?>
		                       			<tr>
		                       				<td>
		                       					<input type="checkbox" name="nom" value="<?php echo($key['id']) ?>" class="delete_checkbox">
		                       				</td>
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


<script type="text/javascript" language="javascript">
	$(document).ready(function(){

		var dataTable = $('#user_data').DataTable();
	 
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


	 	$('#envoyer_message').click(function(event){
	 		  event.preventDefault();
		  	  var checkbox = $('.delete_checkbox:checked');

		  	  if(checkbox.length > 0)
				  {
					   var checkbox_value = [];
					   $(checkbox).each(function(){
					    checkbox_value.push($(this).val());
					   });

					   // alert("iduser:"+checkbox_value);
					   $.ajax({
						    url:"<?php echo base_url(); ?>admin/ajout_membre",
						    method:"POST",
						    data:{
						    	checkbox_value:checkbox_value
						    	
						    },
						    success:function(data)
						    {
						    	
						    	swal(data, '', 'success');
						    	
						     	$('.removeRow').fadeOut(1500);

						     	
						    }
					   });
				  }
				  else
				  {
				  	swal("veillez selectionner au moins une entreprise", '', 'danger');
				   
				  }

		 });

	 	

	    $('#example-tbody').on( 'click', 'tr', function () {
	        $(this).toggleClass('selected');
	    } );

	 	

	});
</script>
 


</body>
</html>