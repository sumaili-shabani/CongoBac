


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
														<div class="row">

															<?php 


							                                                    
							                                $chart_data = '';

							                                $detail3 = $this->db->query("SELECT COUNT(sexe) AS nombre, sexe FROM users GROUP BY sexe");
							                                
							                               
							                                if ($detail3->num_rows() > 0) {
								                                    foreach ($detail3->result_array() as $key) {

								                                       $chart_data .= "{ indexLabel:'".$key["sexe"]."', y:".$key["nombre"]."}, ";

								                                       
								                                    }

								                                    $chart_data = substr($chart_data, 0, -2);


								                                   
								                                    // echo($chart_data);
								                            }
								                            else{

								                            }
								                            ?>


							                            <?php 


							                                                    
							                               
							                                $chart_data2 = '';
							                                $chart_data3 = '';

							                              
							                                
							                                 $detail2 = $this->db->query("SELECT * FROM users ORDER BY date_nais DESC");
							                                if ($detail2->num_rows() > 0) {
							                                    foreach ($detail2->result_array() as $key) {

							                                       $chart_data2 .= "{ indexLabel:'".$key["first_name"]."', y:".$key["id"]."}, ";

							                                        $chart_data3 .= "{ indexLabel:'".$key["first_name"]."', y:".$key["id"]."}, ";

							                                       
							                                    }

							                                    
							                                    $chart_data2 = substr($chart_data2, 0, -2);
							                                    $chart_data3 = substr($chart_data3, 0, -2);

							                                    // echo($chart_data2);
							                            }
							                            else{

							                            }
							                            ?>





															
															<div class="col-md-6">

																 <div id="chartContainer" style="height: 300px; width: 100%;"></div>
															</div>

															<div class="col-md-6">

																 <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
															</div>

														</div>
													</div>
												</div>

													<div class="row">

														<div class="col-md-12">


															<!-- /.mailbox-read-info -->
											                <div class="mailbox-controls with-border text-center">
											                 
											                  
											                <!-- /.mailbox-controls -->
											                <div class="mailbox-read-message">

											                	<div class="table-responsive resultat_ok">


											                      <table id="user_data" class="table table-bordered table-striped">  
											                       <thead>  
											                            <tr>  
											                                 <th width="10%">Image</th>  
											                                 <th width="25%">nom </th>  
											                                 <th width="25%">postnom</th>  
											                                 <th width="20%">email</th>  
											                                 <th width="10%">voir plus</th>  
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

<div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title text-center">Ajout d'une formation</h4>  
                     </div>  
                     <div class="modal-body"> 

                     	<div class="col-md-12">
                     		<div class="row">
                     			<div class="col-md-6">
                     				<span id="user_uploaded_image"></span>
                     			</div>

                     			<div class="col-md-6">
                     				<div class="form-group">
                     					<label><i class="fa fa-user"></i>nom</label>  
                          				<input type="text" name="first_name" id="first_name" class="form-control" required="required" /> 
                     				</div>

                     				<div class="form-group">
                     					<label><i class="fa fa-user"></i>postnom</label>  
                          				<input type="text" name="last_name" id="last_name" class="form-control" required="required" /> 
                     				</div>

                     				
                    
                     			</div>

                     			<div class="col-md-12">
                     				<div class="row">

                     					<div class="col-md-12">

                     						<div class="form-group">
		                     					<label><i class="fa fa-google"></i>email</label>  
		                          				<input type="text" name="email" id="email" class="form-control" required="required" /> 
		                     				</div>


                     						<div class="form-group">
		                     					<label><i class="fa fa-book"></i>téléphone</label>  
		                          				<input type="text" name="telephone" id="telephone" class="form-control" required="required" /> 
		                     				</div>

		                     				<div class="form-group">
		                     					<label><i class="fa fa-book"></i>adresse</label>  
		                          				<input type="text" name="full_adresse" id="full_adresse" class="form-control" required="required" /> 
		                     				</div>

		                     				<div class="form-group">
		                     					<label><i class="fa fa-book"></i>date de naissace</label>  
		                          				<input type="text" name="date_nais" id="date_nais" class="form-control" required="required" /> 
		                     				</div>
                     						
                     					</div>
                     					
                     				</div>
                     			</div>

                     			<div class="col-md-12">
                     				<div class="row">

                     					<div class="col-md-12">

                     						<div class="form-group">
		                     					<label><i class="fa fa-book"></i>biographie</label>  
		                          				<textarea class="form-control" name="biographie" id="biographie" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
		                          					
		                          				</textarea>
		                     				</div>


                     					</div>


                     					 <div class="col-md-12">
								        	<label class="label-control"><i class="fa fa-book"></i>Qui vous a amené ou sensibilisé à suivre la formation?</label>
								       
								        	 <textarea name="temoignage1" class="form-group"  id="temoignage1" 
                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                              	
                                              </textarea>
								          
								         
								        </div>
								         <!-- temoignage 2 -->
								        <div class="col-md-12">
								        	<label class="label-control"><i class="fa fa-book"></i>Quels caractères(comportements) avez-vous avant la formation?</label>
								       
								        	 <textarea name="temoignage2" class="form-group" id="temoignage2" 
                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                              
                                              </textarea>
								           
								         
								        </div>

								          <!-- temoignage 3 -->
								        <div class="col-md-12">
								        	<label class="label-control"><i class="fa fa-book"></i>Qu'est-ce que la formation a apporté de nouveau dans ta vie?</label>
							        	 <textarea name="temoignage3" class="form-group" id="temoignage3"  
                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                              	
                                              </textarea>
								           
								         
								        </div>

								         <!-- temoignage 4 -->
								        <div class="col-md-12">
								        	<label class="label-control"><i class="fa fa-book"></i>Quelle est votre nouvelle décision, votre action amené ou les bonnes pratiques?</label>
								       
								        	 <textarea name="temoignage4" class="form-group" id="temoignage4" 
                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                              
                                              </textarea>
								           
								         
								        </div>

								         <!-- temoignage 5 -->
								        <div class="col-md-12">
								        	<label class="label-control"><i class="fa fa-book"></i>Qu'est-ce qui te pousse à changer?</label>
								       
								        	 <textarea name="temoignage5" class="form-group" id="temoignage5" 
                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                              	
                                              </textarea>
								           
								         
								        </div>



                     				</div>
                     			</div>




                     		</div>
                     	</div>	

                            
                            
                     </div>  
                     <div class="modal-footer">  
                           
                          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>Close</button>  
                     </div>  
                </div>  
           </form>  
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
<script src="<?= base_url('js/canavas.js')?>"></script>

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
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_users'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 0, 0],  
                     "orderable":false,  
                },  
           ],  
      });

      
      $(document).on('click', '.update', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_users",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#first_name').val(data.first_name);  
                     $('#last_name').val(data.last_name); 

                      $('#last_name').val(data.last_name);
                      $('#email').val(data.email);
                      $('#telephone').val(data.telephone);
                      $('#full_adresse').val(data.full_adresse);
                      $('#biographie').val(data.biographie);
                      $('#date_nais').val(data.date_nais);
                      $('#temoignage1').val(data.temoignage1);

                      $('#temoignage2').val(data.temoignage2);
                      $('#temoignage3').val(data.temoignage3);
                      $('#temoignage4').val(data.temoignage4);
                      $('#temoignage5').val(data.temoignage5);

                     $('.modal-title').text("détail de profile et information de l'apprenant "+data.first_name);
                     $('#user_uploaded_image').html(data.user_image);    
                }  
           });  
      });


 });  
 </script>

 <script type="text/javascript">
 	var chart = new CanvasJS.Chart("chartContainer", {
        theme: "theme2",
        animationEnabled: true,
        title: {
            text: ""
        },
        data: [
        {
            type: "pie",                
            dataPoints: [<?php echo $chart_data; ?>]
        }
        ]
    });
    chart.render();

    var chart = new CanvasJS.Chart("chartContainer2", {
        theme: "theme2",
        animationEnabled: true,
        title: {
            text: ""
        },
        data: [
        {
            type: "line",                
            dataPoints: [<?php echo $chart_data; ?>]
        }
        ]
    });
    chart.render();






 </script>
   


</body>
</html>