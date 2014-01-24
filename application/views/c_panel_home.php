<div class="page-header col-md-12 col-xs-12">
	<h2><?=$header?></h2>
	<div class="breadcrumb-trail-container">
		<?php
			echo "<strong>";
			echo "<div class='home breadcrumb-trail'>Home</div>";
			echo "</strong>";
		?>
	</div>
</div>
 <script>
	$(document).on('click', '.add-coach.home-page-button', function(){
		$.post("<?php echo base_url('index.php/pchandler/coach_adder'); ?>", {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'}, function(result){
			$("#current_data").html(result);
		});
	});
	$(document).on('click', '.add-train.home-page-button', function(){
		$.post("<?php echo base_url('index.php/pchandler/train_adder'); ?>", {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'}, function(result){
			$("#current_data").html(result);
		});
	});
 </script>
<div class="col-md-10 ">
	<div class="btn btn-primary trains-list home-page-button">Show trains</div>
	<div class="btn btn-primary add-coach home-page-button">Add Coach</div>
	<div class="btn btn-primary add-train home-page-button">Add Train</div>
</div>
