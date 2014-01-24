<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sign In page for ATCAD Control Panel">
    <meta name="author" content="Purnesh Tripathi & Saurabh Verma">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title><?=$signin_title ?></title>
	<link href="<?php echo base_url('content/css/font-awesome.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('content/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('content/css/signin.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('content/css/style2.css'); ?>" rel="stylesheet">

  </head>

  <body>
		<h2 class="form-signin-heading col-md-4 col-md-offset-4 signin_page">Please sign in</h2>
    <div class="container border-black col-md-4 col-md-offset-4" id="signin_border">
		<?php
			$attrs = array('class' => 'form-signin', 'role' => 'form');
			echo form_open('control', $attrs);
		?>
		<div id="user_icon">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle fa-stack-2x"></i>
				<i class="fa fa-user fa-stack-1x"></i>
			</span>
		</div>
        
        <?php
        
			$data1 = array(
			  'name'        => 'username',
			  'type' => 'text',
			  'id'          => 'username',
			  'placeholder'       => 'Administrator Code',
			  'class'   => 'form-control col-md-4 col-md-6 col-md-10',
			);
			
			$data2 = array(
			  'name'        => 'password',
			  'type' 		=> 'password',
			  'placeholder' => 'Password',
			  'class'   => 'form-control col-md-4 col-md-6 col-md-10',
			);
			echo br(1);
			echo form_input($data1);
			echo br(2);
			echo form_input($data2);
			echo br(3);
        ?>
        
        <div class="alert alert-danger error"><?=$error; ?></div>
        <button class="btn btn-lg btn-primary col-md-4 btn-block" type="submit">Sign in</button>
        
        <a href="<?php echo base_url('index.php'); ?>"><span class="btn btn-info col-md-offset-3 col-md-6 padding-top-30">Go to Home Page &raquo;</span></a>
      </form>

    </div>
</body></html>
