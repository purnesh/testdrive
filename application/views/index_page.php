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
          <a class="navbar-brand" href="<?php echo base_url(); ?>">ATCAD</a>
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
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div>
      </div>
    </div>

    <div class="jumbotron">
      <div class="container">
        <h1>ATCAD</h1>
        <p>Automatic Ticket Cancellation And confirmation Device (ATCAD) is the next generation 
        ticket verification and redundancy reduction system for <strong>Indian Railways.</strong> </p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

