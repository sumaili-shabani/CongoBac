<?php

$message;
$debit_event;
$fin_event;
$evenement=$this->db->get('evenement');
if ($evenement->num_rows() > 0) {
  foreach ($evenement->result_array() as $row) {
    $message = $row['message'];
    $debit_event = $row['debit_event'];
    $fin_event = $row['fin_event'];
    $json[] = array(
      'title' => $message,
      'start' => $debit_event,
      'end' => $fin_event,
      'className' => 'bg-info' 
  );

  // var_dump($json);

  }
}
else{

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
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/light-gallery/css/lightgallery.css')?>">

<link rel="stylesheet" href="<?= base_url('js/assets/vendor/dropify/css/dropify.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-steps/jquery.steps.css')?>">

<!-- adventor form -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/multi-select/css/multi-select.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/nouislider/nouislider.min.css')?>">
<!-- fin -->

<!-- datatables  -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/sweetalert/sweetalert.css')?>"/>
<!-- fin -->

<!-- calendrier -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/fullcalendar/fullcalendar.min.css')?>">
<!-- fin calendrier -->

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?= base_url('js/html/assets/css/site.min.css')?>">

<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
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
                
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            
                            <div id="calendar"></div>




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

<script src="<?= base_url('js/html/assets/bundles/mainscripts.bundle.js')?>"></script>

<!-- datatables -->
<script src="<?= base_url('js/html/assets/bundles/datatablescripts.bundle.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/sweetalert/sweetalert.min.js')?>"></script><!-- SweetAlert Plugin Js -->
<script src="<?= base_url('js/html/assets/js/pages/tables/jquery-datatable.js')?>"></script>


<script src="<?= base_url('js/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<!-- Bootstrap Colorpicker Js --> 
<script src="<?= base_url('js/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')?>"></script><!-- Input Mask Plugin Js --> 
<script src="<?= base_url('js/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/multi-select/js/jquery.multi-select.js')?>"></script><!-- Multi Select Plugin Js -->
<script src="<?= base_url('js/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')?>"></script><!-- Bootstrap Tags Input Plugin Js --> 
<script src="<?= base_url('js/assets/vendor/nouislider/nouislider.js')?>"></script><!-- noUISlider Plugin Js -->

<script src="<?= base_url('js/html/assets/js/pages/forms/advanced-form-elements.js')?>"></script>

 <!-- modal -->

<script src="<?= base_url('js/assets/vendor/dropify/js/dropify.js')?>"></script>
<script src="<?= base_url('js/assets/vendor/jquery-steps/jquery.steps.js')?>"></script>
<!-- JQuery Steps Plugin Js -->

<script src="<?= base_url('js/html/assets/js/pages/forms/dropify.js')?>"></script>
<script src="<?= base_url('js/html/assets/js/pages/forms/form-wizard.js')?>"></script>



<!-- script pour calendrier -->
   


<script src="<?= base_url('js/html/assets/bundles/fullcalendarscripts.bundle.js')?>"></script><!--/ calender javascripts -->
<!-- <script src="<?= base_url('js/html/assets/js/pages/calendar.js')?>"></script> -->
<!-- fin calendrier -->



<script>

  
$(document).ready(function(){
  "use strict";
  $('#calendar').fullCalendar({
      defaultView: 'month',

      header: {
          left: 'title', // you can add today btn
          center: '',
          right: 'month, agendaWeek, listWeek, prev, next', // you can add agendaDay btn
      },
      contentHeight: 'auto',
      defaultDate: '<?= date('Y-m-d'); ?>',
      editable: true,
      droppable: false, // this allows things to be dropped onto the calendar
      eventLimit: false, // allow "more" link when too many events
          
      events: <?= json_encode($json); ?>
  });
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $(document).on('keyup', '.rechercher_un_utilisateur', function(){
        var query = $(this).val();
        var format = $('.resutat_de_recherce_users');

        $.ajax({
          url:"<?php echo(base_url()) ?>admin/recherche_utilisateur",
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

</body>
</html>