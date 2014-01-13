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

    <link href="<?php echo base_url('content/css/sticky-footer-navbar.css'); ?>" rel="stylesheet">
  </head>

  <body>
    <div id="wrap">
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url('index.php');?>">ATCAD</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo base_url('index.php/control');?>">Control Panel</a></li>
              <li><a href="<?php echo base_url('index.php/about');?>">About</a></li>
              <li><a href="<?php echo base_url('/index.php/control/logout');?>">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="page-header">
          <h2>Trains available</h2>
        </div>
        <p class="lead">Pin a fixed-height footer to the bottom of the 
viewport in desktop browsers with this custom HTML and CSS. A fixed 
navbar has been added within <code>#wrap</code> with <code>padding-top: 60px;</code> on the <code>.container</code>.</p>
        <p>Back to <a href="http://getbootstrap.com/examples/sticky-footer">the default sticky footer</a> minus the navbar.</p>
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
  

</body></html>
