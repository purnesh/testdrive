<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title>Control Panel - ATCAD</title>

	<link href="<?php echo base_url('content/css/style.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('content/css/style2.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('content/css/font-awesome.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('content/css/sticky-footer-navbar.css'); ?>" rel="stylesheet">
    <script language="javascript">


    </script>
  </head>

  <body>
    <div id="wrap">
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo base_url('index.php'); ?>"><span class="the-text navbar-brand control"><span class="glyphicon glyphicon-home"></span>ATCAD</span></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo base_url('index.php/control');?>"><i class="fa fa-gear fa-spin"></i>Control Panel</a></li>
              <li><a href="<?php echo base_url('index.php/about');?>"><i class="fa fa-info-circle"></i>About</a></li>
              <li><a href="<?php echo base_url('/index.php/control/logout');?>"><span class="glyphicon glyphicon-remove-circle button-icon-home"></span>Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="page-header">
          <h2><span class="fa fa-th-list"></span>Trains available</h2>
        </div>
        <div class="page_content control_panel">
			<i class="fa fa-refresh fa-spin"></i>Loading...
        </div>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted">
			<span>User currently logged in: <span class="black_text"><?=$name ?></span> </span>
			<span id="floating_right">&copy; A Purnesh Tripathi & Saurabh Verma production</span>
        </p>
        
      </div>
    </div>

    <script src="<?php echo base_url('content/js/jquery-1.js'); ?>"></script>
    <script src="<?php echo base_url('content/js/booty.js'); ?>"></script>
	<script src="<?php echo base_url('content/js/prime_loader.js'); ?>"></script>

</body></html>
