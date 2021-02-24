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

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?= base_url('js/html/assets/css/site.min.css')?>">

<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>




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

                	<!-- <form class="row clearfix col-lg-12" id="ServiceRequest" action="<?= current_url() ?>" method='post'>
                		<div class="col-md-7 col-sm-12">
	                        <select name="Service_type" class="form-control" id="ServiceId">
		                            <option>--all--</option>
		                            <option value="1" selected>Administration</option>
		                            <option value="2">Les formateurs</option>
		                    </select>
	                    </div>  

	                    <div class="col-md-3 col-sm-12 text-right">
	                        <input id="ProviderId" name="ProviderId" type="text" value="" />
		                        <input id="lat" type="text" value="" />
		                        <input id="lng" type="text" value="" />
		                        
		                        <button type="button" class="btn btn-primary btn-round" onclick="RelatedLocationAjax();">show_closest_providers</button>
	                    </div>

	                    <div class="col-md-2 col-sm-12">
	                        <div id='submit_button'>
			                     <input class="btn btn-success btn-round" type="submit" name="submit" value="Send data"/>
			                 </div>
	                    </div> 


                	</form> -->
                    
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">

                        	<!-- <div class="col-sm-12 col-lg-12 col-md-12">
                        		<div class="form-group">
	                        		<p class="notice error"><?= $this->session->flashdata('error_msg') ?></p>
	                        	</div>
                        	</div>
                        	

                        	<div class="col-sm-12 col-lg-12 col-md-12">
                        		<div id="map" class="col-md-12" style="height: 600px;"></div>
                        	</div> -->

							<div class="container">

								<form class="col-md-12 row" id="ServiceRequest" action="<?php echo(base_url()) ?>" method='post'>


									<div class="col-md-7 col-sm-12">
				                        <select name="Service_type" class="form-control" id="ServiceId">
					                            <option>--all--</option>
					                            <option value="1" selected>Administration</option>
					                            <option value="2">Les formateurs</option>
					                    </select>
				                    </div>  

				                    <div class="col-md-3 col-sm-12 text-right">
				                        <input id="ProviderId" name="ProviderId" type="hidden" value="" />
					                        <input id="lat" type="hidden" value="" />
					                        <input id="lng" type="hidden" value="" />
					                        
					                        <button type="button" class="btn btn-primary btn-round" onclick="RelatedLocationAjax();">fulter la requête</button>
				                    </div>

				                    <div class="col-md-2 col-sm-12">
				                        <div id='submit_button'>
						                     <input class="btn btn-success btn-round" type="submit" name="submit" value="Envoyer"/>
						                 </div>
				                    </div>

				                    <div class="col-md-12 col-sm-12" style="margin-top: 20px;">
				                    	
				                    </div> 


				                    <div class="col-md-12 col-sm-12">
				                        <!-- provider_counter service id  !-->
				                       
				                        <div class="text-lg-center alert-success col-md-12" id="info"></div>
				                        <!-- display map  !-->
				                        <div id="map" style="height: 600px;" class="col-md-12"></div>
				                        <!-- current latituide and longtuide  !-->
				                        
				                       
				                    </div>

				                    
				                </form>
				        
								<script>

								    var lat = document.getElementById("lat"); // this will select the input with id = lat
								    var lng = document.getElementById("lng"); // this will select the input with id = lng
								    var info = document.getElementById("info"); // this will select the current div  with id = info
								    var ServiceId = document.getElementById("ServiceId"); // this will select the input with id = ServiceId
								    var prov = document.getElementById("ProviderId"); // this will select the input with id = ProviderId
								    var locations = [];
								    var km = 8000; // this kilometers used to specify circle wide when use drawcircle function
								    var Crcl ; // circle variable
								    var map; // map variable
								    var mapOptions = {
								        zoom: 11,
								        center: {lat:24.774265, lng:46.738586}
								    }; // map options
								    var markers = []; // markers array ,we will fill it dynamically
								    var infoWindow = new google.maps.InfoWindow(); // information window ,we will use for our location and for markers
								    // this will initiate when load the page and have all
								    function initialize() {
								        // set the map to the div with id = map and set the mapOptions as defualt
								        map = new google.maps.Map(document.getElementById('map'),
								            mapOptions);

								        var infoWindow = new google.maps.InfoWindow({map: map});

								        // get current location with HTML5 geolocation API.
								        if (navigator.geolocation) {
								            navigator.geolocation.getCurrentPosition(function(position) {
								                var pos = {
								                    lat: position.coords.latitude,
								                    lng: position.coords.longitude
								                };
								                lat.value  =  position.coords.latitude ;
								                lng.value  =  position.coords.longitude;
								                info.nodeValue =  position.coords.longitude;
								                // set the current posation to the map and create info window with (Here Is Your Location) sentense
								                infoWindow.setPosition(pos);
								                infoWindow.setContent('Here Is Your Location.');
								                // set this info window in the center of the map
								                map.setCenter(pos);
								                // draw circle on the map with parameters
								                DrowCircle(mapOptions, map, pos, km);

								            }, function() {
								                // if user block the geolocatoon API and denied detect his location
								                handleLocationError(true, infoWindow, map.getCenter());
								            });
								        } else {
								            // Browser doesn't support Geolocation
								            handleLocationError(false, infoWindow, map.getCenter());

								        }
								    }
								    // to handle user denied
								    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
								        infoWindow.setPosition(pos);
								        infoWindow.setContent(browserHasGeolocation ?
								            'Error: User Has Denied Location Detection.' :
								            'Error: Your browser doesn\'t support geolocation.');
								    }

								    // to draw circle around 30 kilometers to current location
								    function DrowCircle(mapOptions, map, pos, km ) {
								        var populationOptions = {
								            strokeColor: '#FF000F',
								            strokeOpacity: 0.8,
								            strokeWeight: 2,
								            fillColor: '#FFFFFF',
								            fillOpacity: 0.35,
								            map: map,
								            center: pos,
								            radius: Math.sqrt(km*500) * 100
								        };
								        // Add the circle for this city to the map.
								        this.Crcl = new google.maps.Circle(populationOptions);
								    }
								    // this function to get providers with ajax request
								    function RelatedLocationAjax() {
								        $.ajax({
								            type: "POST",
								            url: "<?php echo(base_url()) ?>admin/closest_locations",
								            dataType: "json",
								            data:"data="+ '{ "latitude":"'+ lat.value+'", "longitude": "'+lng.value+'", "ServiceId": "'+ServiceId.value+'" }',
								            success:function(data) {
								                // when request is successed add markers with results
								                add_markers(data);
								            }
								        });
								    }
								    // this function to will draw markers with data returned from the ajax request
								    function add_markers(data){
								        var marker, i;
								        var bounds = new google.maps.LatLngBounds();
								        var infowindow = new google.maps.InfoWindow();
								        // display how many closest providers avialable
								        document.getElementById('info').innerHTML = " Available:" + data.length + " Providers<br>";

								        for (i = 0; i < data.length; i++) {
								            var coordStr = data[i][2];
								            var coords = coordStr.split(",");
								            var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
								            bounds.extend(pt);
								            marker = new google.maps.Marker({
								                position: pt,
								                map: map,
								                icon: data[i][3],
								                address: data[i][1],
								                title: data[i][0],
								                html: data[i][0] + "<br>" + data[i][1]
								            });
								            markers.push(marker);
								            google.maps.event.addListener(marker, 'click', (function (marker, i) {
								                return function () {
								                    infowindow.setContent(marker.html);
								                    prov.value = data[i][5];
								                    infowindow.open(map, marker);
								                }
								            })
								            (marker, i));

								        }
								        // this is important part , because we tell the map to put all markers inside the circle,
								        // so all results will display and centered
								        map.fitBounds(this.Crcl.getBounds());
								    }

								    google.maps.event.addDomListener(window, 'load', initialize);

								</script>
								<script async defer
								        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjjbxEQotHRr-OOyPMVZ3nUKioR_i4uPg&callback=initialize">
								</script>

								</div><!-- /.container -->


										


                           
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

<script src="<?= base_url('js/my_js.js')?>"></script>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="<?= base_url()?>global/site/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="<?= base_url()?>global/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?= base_url()?>global/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>


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