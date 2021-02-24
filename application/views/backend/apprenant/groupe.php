 <?php

if($this->session->userdata('id')) {
  $id=$this->session->userdata('id');
}
elseif($this->session->userdata('admin_login')) {
  $id=$this->session->userdata('admin_login');
}
elseif($this->session->userdata('instuctor_login')) {
  $id=$this->session->userdata('instuctor_login');
}
else{
  $id=0;
}

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

 $facebook;
 $linkedin;
 $twitter ;

 $university;
 $faculte;
 $option ;
 $sexe;

 $this->db->where("id", $id) ;
 $users_details = $this->db->get("users")->result_array();

 foreach ($users_details as $row) {
  $id_user 		= $row["id"];
  $first_name 	= $row["first_name"];
  $last_name  	= $row["last_name"];
  $email    	= $row["email"];
  $image    	= $row["image"];
  $telephone    = $row["telephone"];
  $full_adresse = $row["full_adresse"];
  $biographie   = $row["biographie"];
  $date_nais    = $row["date_nais"];
  $passwords    = $row["passwords"];
  $idrole       = $row["idrole"];
  $sexe      	= $row["sexe"];

  $facebook     = $row["facebook"];
  $linkedin     = $row["linkedin"];
  $twitter      = $row["twitter"];

  $university   = $row["university"];
  $faculte     	= $row["faculte"];
  $option     	= $row["option"];
  
 }


  $nombre_follower;
  $query1 = $this->db->query("SELECT count(id_sender) AS nombre FROM follower WHERE id_sender='".$id_user."'");
  if ($query1->num_rows() > 0) {
    foreach ($query1->result_array() as $key) {
      $nombre_follower = $key["nombre"];
    }
  }
  else{
    $nombre_follower = 0;
  }


  $nombre_following;
  $query = $this->db->query("SELECT count(id_recever) AS nombre FROM follower WHERE id_recever='".$id_user."'");
  if ($query->num_rows() > 0) {
    foreach ($query->result_array() as $key) {
      $nombre_following = $key["nombre"];
    }
  }
  else{
    $nombre_following = 0;
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
                    <div class="col-md-6 col-sm-12">
                        
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="javascript:void(0);" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-sm btn-primary btn-round" title="Ajouter un groupe de discution">Nouveau groupe</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="mail-inbox">
                            <div class="mobile-left">
                                <a href="javascript:void(0);" class="btn btn-primary toggle-email-nav"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="body mail-left">
                                <div class="mail-compose m-b-20">
                                    <a href="javascript:void(0);" class="btn btn-danger btn-block btn-round viw_groupe">Groupe</a>
                                </div>
                                <div class="mail-side">
                                    <ul class="nav">
                                        
                                        <li><a href="javascript:void(0);" class="add_to_groupe"><i class="icon-envelope-open"></i> Ajoute du groupe</a></li>                                        
                                        <li><a href="javascript:void(0);" class="delete_to_groupe"><i class="icon-drawer"></i>Réturer du groupe</a></li>

                                        <li><a href="javascript:void(0);" class="delete_groupe" ><i class="icon-trash"></i>Supprimer ce groupe</a></li>
                                    </ul>
                                    <h3 class="label">Mes groupes</h3>
                                    <ul class="nav">
                                    	<?php 
                                    	$gr = $this->db->where('id_users', $id);
                                    	$gr = $this->db->get('groupe_chat')->result_array();
                                    	foreach ($gr as $chat) {
                                    		?>
                                    		<li>
                                    			<a href="<?php echo(base_url()) ?>student/chat_admin2/<?php echo($id) ?>/<?php echo($chat['code']) ?>">

                                    			<img src="<?php echo(base_url()) ?>upload/groupe/<?php echo($chat['image']) ?>" class="img img-responsive img-circle" style="width: 20px; height: 20px; border-radius: 50px;">

                                    			<?php echo($chat['nom']) ?></a> 

                                    		</li>
                                    		<?php
                                    	}

                                    	 ?>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="body mail-right check-all-parent">
                                
                                <div class="mail-action clearfix m-l-15">
                                    <div class="pull-left">
                                        <div class="fancy-checkbox d-inline-block">
                                            <label>
                                                <input class="check-all" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="icon-trash"></i></a>
                                        <a href="" class="btn btn-light btn-sm hidden-sm"><i class="icon-refresh"></i></a>                                        
                                        <div class="btn-group">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-tag"></i></button>
                                            <div class="dropdown-menu">
                                            	<?php 
		                                    	$gr = $this->db->where('id_users', $id);
		                                    	$gr = $this->db->get('groupe_chat');
		                                    	if ($gr->num_rows() > 0) {
		                                    		foreach ($gr->result_array() as $chat) {
		                                    		?>
		                                    		
	                                    			<a class="dropdown-item show_member_of_group" href="javascript:void(0);" code="<?php echo($chat['code']) ?>" >

	                                    				<input type="checkbox" name="code" class="code_groupe" value="<?php echo($chat['code']) ?>">

	                                    			<img src="<?php echo(base_url()) ?>upload/groupe/<?php echo($chat['image']) ?>" class="img img-responsive img-circle" style="width: 20px; height: 20px; border-radius: 50px;">

	                                    			<?php echo($chat['nom']) ?></a>
		                                    		
		                                    		<?php
		                                    		}

		                                    	}
		                                    	else{

		                                    	}
		                                    	
		                                    	 ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right ml-auto">
                                        <div class="pagination-email d-flex">
                                            
                                            <div class="btn-group m-l-20">
                                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i></button>
                                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-angle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mail-list">
                                	<div class="row clearfix">
						                <div class="col-md-12" style="margin-top: 10px;">
						                    <div class="input-group mb-3">
				                                <input type="text" class="form-control round" placeholder="Taper pour rechercher une personne" id="search_text">
				                                <div class="input-group-append">
				                                    <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i> Rechercher</button>
				                                </div>
				                            </div>
						                </div>
						            </div>

                                    <ul class="list-unstyled resultat">
                                    	<?php 
                                    	$gr = $this->db->limit(8);
                                    	$gr = $this->db->get('users');
                                    	if ($gr->num_rows() > 0) {
                                    		foreach ($gr->result_array() as $key) {
                                    		?>
                                    		
                                			<li class="clearfix">
	                                            <div class="md-left">
	                                                <label class="fancy-checkbox">
	                                                    <input type="checkbox" name="checkbox" class="checkbox-tick" value="<?php echo($key['id']) ?>">
	                                                    <span></span>
	                                                </label>
	                                                <a href="javascript:void(0);" class="mail-star active"><i class="fa fa-star"></i></a>                                                
	                                            </div>
	                                            <div class="md-right">
	                                                <img class="rounded" src="<?php echo(base_url()) ?>upload/photo/<?php echo($key['image']) ?>" alt="">
	                                                <p class="sub"><a href="<?php echo(base_url()) ?>student/chat_admin/<?php echo($id) ?>/<?php echo($key['id']) ?>" class="mail-detail-expand"><?php echo($key['first_name']) ?> <?php echo($key['last_name']) ?></a></p>
	                                                <p class="dep"><span class="m-r-10"><?php echo($key['email']) ?></span><?php echo(substr($key['biographie'], 0,50)) ?>...</p>
	                                                <span class="time">23 Jun</span>
	                                            </div>
	                                        </li>
                                    		
                                    		<?php
                                    		}

                                    	}
                                    	else{

                                    	}
                                    	
                                    	 ?>
                                        
                                        
                                    </ul>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


<!-- feed-post-modal -->
<div class="modal fade feed-post-modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        	
            <div class="modal-body">
                <div class="d-flex mb-3">
                    <div class="icon bg-transparent">
                        <img src="<?php echo(base_url()) ?>upload/photo/<?php echo($image) ?>" class="rounded mr-3 w40" alt="">
                    </div>
                    <div>
                        <h6 class="mb-0"><?php echo($first_name) ?></h6>
                        <span><?php echo($email) ?></span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form method="post" id="user_form" action="<?php echo(base_url()) ?>student/operation_goupe" enctype="multipart/form-data">

                	<div class="form-group">
                    <textarea name="nom" id="nom" rows="4" class="form-control no-resize" placeholder="Quel est le nom de ce groupe ?"></textarea>
                    </div>
                    <div class="align-right">

                    	<input type="hidden" name="id_users" id="id_users" value="<?php echo($id) ?>">

                      <label class="btn btn-link Attachez" data-toggle="tooltip" data-placement="top" title="Attachez un logo">
                        <div class="affichier">
                          <a href="javascript:void(0);" class="btn btn-link affichier">
                            <i class="icon-paper-clip text-muted"></i>
                          </a>
                        </div>
                        <div class="col-md-12" style="display: none;">
                             <input type="file" name="user_image" id="user_image" required="" />
                        </div>
                       
                      </label>
                        
                       <input type="submit" name="action" id="action" class="btn btn-round btn-warning" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- launch-pricing -->

<script type="text/javascript">
  $(document).ready(function(){

      $(".reponse").hide();
      $(document).on('click', '.affichier', function(event){
        event.preventDefault();
        $(this).parent().next().slideToggle();

      });

  });
</script>


<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Ajout d'une formation");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
     

 });  
 </script>

 <script type="text/javascript">
  $(document).ready(function(){
      $(document).on('keyup', '.rechercher_un_utilisateur', function(){
        var query = $(this).val();
        var format = $('.resutat_de_recherce_users');

        $.ajax({
          url:"<?php echo(base_url()) ?>student/recherche_utilisateur",
          method: 'POST',
          data: {
            query: query
          },
          success: function(data){
            format.html(data);
          }
        });
        
      });
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
	  $(document).on('keyup', '#search_text', function(){
	    var query = $(this).val();
	    var format = $('.resultat');

	    $.ajax({
	      url:"<?php echo(base_url()) ?>student/recherche_utilisateur_groupe",
	      method: 'POST',
	      data: {
	        query: query
	      },
	      success: function(data){
	        format.html(data);
	      }
	    });
	    
	  });

	  $(document).on('click', '.viw_groupe', function(){
	  	
	  	var format = $('.resultat');

	    $.ajax({
	      url:"<?php echo(base_url()) ?>student/nos_goupe_discution_groupe",
	      method: 'POST',
	      success: function(data){
	        format.html(data);
	      }
	    });

	 });

	$('.checkbox-tick').click(function(){

	  if($(this).is(':checked'))
	  {
	   		$(this).closest('tr').addClass('removeRow');
	  }
	  else
	  {
	   		$(this).closest('tr').removeClass('removeRow');
	  }

	});


	$('.delete_groupe').click(function(event){
 		  event.preventDefault();
	  	  var checkbox = $('.checkbox-tick:checked');

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
  			        	// swal("id_groupe:", ""+checkbox_value,"info");
      					   $.ajax({
        					    url:"<?php echo base_url(); ?>student/delete_groupe",
        					    method:"POST",
        					    data:{checkbox_value:checkbox_value},
        					    success:function(data)
        					    {
        						     swal("succès", ""+data, "success");
        						     $('.removeRow').fadeOut(1500);
        					    }
        					 });
    			           
    			      } 
                else {
    			            swal("Ouf!!!", "opération annulée :)", "error");
    			      }
  			    });

  			   
  		  }
  		  else
  		  {
  		  	swal("veillez selectionner au moins un groupe", '', 'danger');
  		   
  		  }

	});


	$('.add_to_groupe').click(function(event){
 		  event.preventDefault();
	  	  var checkbox = $('.checkbox-tick:checked');
	  	  var code_groupe = $('.code_groupe:checked');

	  	  if(checkbox.length > 0 && code_groupe.length > 0)
		  {
			   var checkbox_value = [];
			   var code_groupe_value = [];
			   $(checkbox).each(function(){
			    checkbox_value.push($(this).val());
			   });

			   $(code_groupe).each(function(){
			    code_groupe_value.push($(this).val());
			   });

			   swal({
			        title:"Êtes-vous sûr de les intégrer?",
			        text: "Les personnes selectionnées peuvent interagir dans le groupe!",
			        type: "info",
			        showCancelButton: true,
			        confirmButtonColor: "#dc3545",
			        confirmButtonText: "Oui, Enregistrez-les!",
			        cancelButtonText: "Non, annulez!",
			        closeOnConfirm: false,
			        closeOnCancel: false
			    }, function (isConfirm) {
			        if (isConfirm) {
			        	// swal("id_groupe:", ""+code_groupe_value+" idusers:"+checkbox_value,"info");
					   $.ajax({
					    url:"<?php echo base_url(); ?>student/integration_du_groupe",
					    method:"POST",
					    data:{
					   			checkbox_value:checkbox_value,
					   			code_groupe_value:code_groupe_value
					   	},
					    success:function(data)
					    {
						     swal("succès", ""+data, "success");
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
		  	swal("veillez selectionner au moins un groupe", '', 'danger');
		   
		  }

	});


	$('.delete_to_groupe').click(function(event){
 		  event.preventDefault();
	  	  var checkbox = $('.checkbox-tick:checked');
	  	  var code_groupe = $('.code_groupe:checked');

	  	  if(checkbox.length > 0 && code_groupe.length > 0)
		  {
			   var checkbox_value = [];
			   var code_groupe_value = [];
			   $(checkbox).each(function(){
			    checkbox_value.push($(this).val());
			   });

			   $(code_groupe).each(function(){
			    code_groupe_value.push($(this).val());
			   });

			   swal({
			        title:"Êtes-vous sûr de les retirer?",
			        text: "Les personnes selectionnées seront retirer du groupe!",
			        type: "info",
			        showCancelButton: true,
			        confirmButtonColor: "#dc3545",
			        confirmButtonText: "Oui, Retirez-les!",
			        cancelButtonText: "Non, annulez!",
			        closeOnConfirm: false,
			        closeOnCancel: false
			    }, function (isConfirm) {
			        if (isConfirm) {
			        	// swal("id_groupe:", ""+code_groupe_value+" idusers:"+checkbox_value,"info");
					   $.ajax({
					    url:"<?php echo base_url(); ?>student/retirer_integration_du_groupe",
					    method:"POST",
					    data:{
					   			checkbox_value:checkbox_value,
					   			code_groupe_value:code_groupe_value
					   	},
					    success:function(data)
					    {
						     swal("succès", ""+data, "success");
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
		  	swal("veillez selectionner au moins un groupe", '', 'danger');
		   
		  }

	});

	$(document).on('dblclick','.show_member_of_group', function(){

		var code = $(this).attr('code');
		// alert(code);
		var format = $('.resultat');

	    $.ajax({
	      url:"<?php echo(base_url()) ?>student/profile_groupe",
	      method: 'POST',
	      data: {
	        code: code
	      },
	      success: function(data){
	        format.html(data);
	      }
	    });

	});









});
</script>





</body>
</html>