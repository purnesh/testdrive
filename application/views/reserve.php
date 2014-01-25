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
		$(".btn.btn-lg.btn-primary.btn-block.reserve").hide();
		$(".form-control.train_number").hide();
		$(".form-control.class").hide();
		$(".form-control.name").hide();
		$(".form-control.age").hide();
		$(".form-control.email").hide();
		$(".form-control.frm").hide();
		$(".form-control.to").hide();
		var train_number;
		$(document).on('click', '.train-entries.list-group-item', function(){
				train_number = $(this).html();
				$.post("<?php echo base_url(''); ?>", {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'}, function(result){
					$("#current_data").html(result);
				});
		});
	</script>
</div>
 
<div class="col-md-12 container "> 
	<div class="col-md-2 list-group train-list">
		<?php 
			foreach($trains_list->result() as $train){	
		?>
				<a class="list-group-item train-entries"><?=$train->train_number;?></a>
		<?php
			}
		?>
	</div>

	<div class="col-md-2 list-group class-list">
		<?php 
			foreach($classes->result() as $class){	
		?>
				<a class="list-group-item class"><?=$class->coach_class;?></a>
		<?php
			}
		?>
	</div>
	
	<div class="col-md-2">
		<input type="text" class="form-control name" name="name" placeholder="Name"/>
		<br />
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control age" name="age" placeholder="Age"/>
		<br />
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control email" name="email" placeholder="Email"/>
		<br />
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control coach_capacity" name="coach_capacity" placeholder="Coach Capacity"/>
		<br />
	</div>
	<button class="btn btn-lg btn-primary btn-block add-coach" type="submit">Add Coach</button>
	<div id="result"> </div>
</div>


