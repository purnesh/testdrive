<div class="page-header col-md-12 col-xs-12">
	<h2><?=$header?></h2>
	<div class="breadcrumb-trail-container">
		<?php
			echo "<strong>";
			echo "<div class='home breadcrumb-trail'>Home</div>";
			foreach($the_trail as $key => $value){
				echo "<i class='fa fa-angle-double-right'></i> <div class='$key'>$value</div>";
			}
			echo "</strong>";
		?>
	</div>
	<script>
		//http://localhost/testdrive/index.php/setup/train_details_inserter/32073/Rajdhani-Express/NDLS/KKR/23:30/05:30/0/NDLS_New-Delhi_23:30_23:30__GZB_Ghaziabad_23:45_00:00
		$(".btn.btn-lg.btn-primary.btn-block.add-train").hide();
		$(".form-control.train_name").hide();
		$(".form-control.start_point").hide();
		$(".form-control.end_point").hide();
		var train_number;
		var coach_tte = "DMY_000";

		$(document).on('focus', '.form-control.train_number', function(){
			$(".form-control.train_name").slideDown();
		});
		$(document).on('focus', '.form-control.train_name', function(){
			$(".form-control.start_point").slideDown();
		});
		$(document).on('focus', '.form-control.start_point', function(){
			$(".form-control.end_point").slideDown();
		});
		$(document).on('focus', '.form-control.end_point', function(){
			$(".form-control.start_time").slideDown();
		});
		$(document).on('focus', '.form-control.start_time', function(){
			$(".form-control.end_time").slideDown();
		});
		$(document).on('focus', '.form-control.end_time', function(){
			$(".form-control.active").slideDown();
		});
		$(document).on('focus', '.form-control.active', function(){
			$(".form-control.route").slideDown();
		});
		$(document).on('focus', '.form-control.route', function(){
			$(".btn.btn-lg.btn-primary.btn-block.add-train").slideDown();
		});
		
	</script>
</div>
 
<div class="col-md-10 container">
	<div class="col-md-2">
		<input type="text" class="form-control train_number" name="train_number" placeholder="Train Number"/>
		<br />
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control train_name" name="train_name" placeholder="Train Name"/>
		<br />
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control start_point" name="start_point" placeholder="Start station"/>
		<br />
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control end_point" name="end_point" placeholder="Destination"/>
		<br />
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control start_time" name="start_time" placeholder="Start Time"/>
		<br />
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control end_time" name="end_time" placeholder="Start Time"/>
		<br />
	</div>
	<button class="btn btn-lg btn-primary btn-block add-train" type="submit">Add Coach</button>
	
</div>


