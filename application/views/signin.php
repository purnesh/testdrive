<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sign In page for ATCAD Control Panel">
    <meta name="author" content="Purnesh Tripathi & Saurabh Verma">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title>Incorrect Details</title>

    <link href="<?php echo base_url('content/css/style.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('content/css/signin.css'); ?>" rel="stylesheet">

  </head>

  <body>
		<?php
			echo br(6);
		?>
    <div class="container border-black col-md-4 col-md-offset-4" id="signin_border">
		<?php
			$attrs = array('class' => 'form-signin', 'role' => 'form');
			echo form_open('control', $attrs);
		?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <button type="button" class="btn btn-sm btn-danger"><?=$error; ?></button>
        <br />
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
        <button class="btn btn-lg btn-primary col-md-4 btn-block" type="submit">Sign in</button>
      </form>

    </div>
</body></html>
