<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title><?=$title; ?></title>
	<?php
		
	?>
    <link href="<?php echo base_url('content/css/style1.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('content/css/style2.css'); ?>" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span>ATCAD</a>
        </div>
        <div class="navbar-collapse collapse">
			<?php
			
				$attributes = array("class" => "navbar-form navbar-right", "role" => "form");
				echo form_open('control', $attributes);
			?>

            <div class="form-group">
				<?php
					$data = array(
					  'name'        => 'username',
					  'type' => 'text',
					  'id'          => 'username',
					  'placeholder'       => 'Administrator Code',
					  'class'   => 'form-control',
					);

					echo form_input($data);

              ?>
            </div>
            <div class="form-group">
              <?php
					$data = array(
					  'name'        => 'password',
					  'type' 		=> 'password',
					  'placeholder' => 'Password',
					  'class'   => 'form-control',
					);

					echo form_input($data);
				
              ?>
            </div>
            <button type="submit" class="btn btn-success">Sign in<span class="glyphicon glyphicon-forward"></span></button>
          </form>
        </div>
      </div>
    </div>
    <div class="jumbotron">
      <div class="container">
        <h1>ATCAD</h1>
        <p>Automatic Ticket Cancellation And confirmation Device (ATCAD) is the next generation 
        ticket verification and redundancy removal system for <strong>Indian Railways.</strong> </p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2><span class="glyphicon glyphicon-pencil intro-text-blocks"></span>Principle</h2>
          <p>The principle behind this technology is pretty simple. It 
          works upon justification of physical presence using algorithms 
          similar to Public/Private key Cryptography. Texas Instruments' 
          Microcontroller MSP-430 was used for building the device. This
           device is used to connect to a remote server to authenticate users.</p>
          <p><a class="btn btn-default" href="#" role="button">Read More &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2><span class="glyphicon glyphicon-briefcase intro-text-blocks"></span>Working</h2>
          <p>The device is built with the intention of ensuring physical
           presence of the authenticated ticket holder in a carraige. If
            such does not happen the seat should automatically be
             alotted to the next available passenger with a waiting 
             ticket on train. The system takes into account number of
              possible scenarios keeping IR in mind.</p>
          <p><a class="btn btn-default" href="#" role="button">Read More &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2><span class="glyphicon glyphicon-list-alt intro-text-blocks"></span>About Us</h2>
          <p>Purnesh Tripathi and Saurabh Verma are third year students
           of College of Technology, G.B.P.U.A.&T. Pantnagar. This is
            the first time that they have collaborated their skills 
            viz. Information Technology & Electrical Engineering 
            respectively, to produce a unique product for the Indian Population.</p>
          <p><a class="btn btn-default" href="#" role="button">Read More &raquo;</a></p>
        </div>
      </div>

      <hr>

