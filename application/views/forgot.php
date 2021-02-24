<!doctype html>
<html lang="en">

<head>
<title><?php echo($title) ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" type="image/png" href="<?= base_url('js/assets/images/logo.png')?>">

<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/font-awesome/css/font-awesome.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/assets/vendor/animate-css/vivify.min.css')?>">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?= base_url('js/html/assets/css/site.min.css')?>">

</head>

<body class="theme-cyan font-montserrat light_version">

    <!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>
<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="<?php echo(base_url()) ?>"><img src="<?= base_url('js/assets/images/icon.svg')?>" width="30" height="30" class="d-inline-block align-top mr-2" alt=""><font color="red">C</font><font color="green">ongo</font><font color="red">B</font><font class="text-warning">ack</font></a>
        </div>
        <div class="card forgot-pass">
            <div class="body">
                <p class="lead mb-3"><strong>Oops</strong>,<br> forgot something?</p>
                <p>Type email to recover password.</p>
                <form class="form-auth-small" method="post" action="<?php echo base_url(); ?>login/recuperaion_password">
                	<div class="form-group">
                		<?php
				        if($this->session->flashdata('message'))
				        {
				            echo '
				            <div class="alert alert-success text-center"><i class="fa fa-check"></i>
				                '.$this->session->flashdata("message").'
				            </div>
				            ';
				        }
				        elseif ($this->session->flashdata('message2')) {
				          echo '
				            <div class="alert alert-danger text-center">
				                '.$this->session->flashdata("message2").'
				            </div>
				            ';
				        }
				        else{

				        }
				        ?>
                	</div>
                    <div class="form-group">                                    
                        <input type="email"  class="form-control round"  placeholder="Enter your email adress" name="user_email" id="emailaddress" value="<?php echo set_value('user_email'); ?>">
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <button type="submit" class="btn btn-round btn-primary btn-lg btn-block">RESET PASSWORD</button>
                    <div class="bottom">
                        <span class="helper-text">Know your password? <a href="<?php echo(base_url()) ?>login">Login</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
    
<script src="<?= base_url('js/html/assets/bundles/libscripts.bundle.js')?>"></script>    
<script src="<?= base_url('js/html/assets/bundles/vendorscripts.bundle.js')?>"></script>
<script src="<?= base_url('js/html/assets/bundles/mainscripts.bundle.js')?>"></script>
</body>
</html>

