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
		$(".btn.btn-lg.btn-primary.btn-block.add-coach").hide();
		$(".form-control.coach_number").hide();
		$(".form-control.coach_class").hide();
		$(".form-control.coach_name").hide();
		$(".form-control.coach_capacity").hide();
		var train_number;
		var coach_tte = "DMY_000";
		$(document).on('click', '.list-group-item.train-entries', function(){
			train_number = $(this).html();
			$(this).addClass(' active');
			$(".form-control.coach_number").slideDown();
		});
		$(document).on('focus', '.form-control.coach_number', function(){
			$(".form-control.coach_class").slideDown();
		});
		$(document).on('focus', '.form-control.coach_class', function(){
			$(".form-control.coach_name").slideDown();
		});
		$(document).on('focus', '.form-control.coach_name', function(){
			$(".form-control.coach_capacity").slideDown();
		});
		$(document).on('focus', '.form-control.coach_capacity', function(){
			$(".btn.btn-lg.btn-primary.btn-block.add-coach").slideDown();
		});
		$(document).on('click', '.btn.btn-lg.btn-primary.btn-block.add-coach', function(){
			var coach_no = $(".form-control.coach_number").val();
			var coach_name = $(".form-control.coach_name").val();
			var coach_class = $(".form-control.coach_class").val();
			var capacity = $(".form-control.coach_capacity").val();
			var url_to_send_to = "<?php echo base_url('index.php/setup/coach_details_inserter');?>"+"/"+train_number+"/"+coach_no+"/"+coach_class+"/"+coach_name+"/"+coach_tte+"/"+capacity;
			$.post(url_to_send_to, {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'}, function(){
				$("#result").html(result);
			});
		});

	</script>
</div>
 
<div class="col-md-10 container"> 
	<div class="col-md-2 list-group train-list">
		<?php 
			foreach($trains_list->result() as $train){	
		?>
				<a class="list-group-item train-entries"><?=$train->train_number;?></a>
		<?php
			}
		?>
	</div>
	
	<div class="col-md-2">
		<input type="text" class="form-control coach_number" name="coach_number" placeholder="Coach Number"/>
		<br />
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control coach_class" name="coach_class" placeholder="Coach Class"/>
		<br />
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control coach_name" name="coach_name" placeholder="Coach Name"/>
		<br />
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control coach_capacity" name="coach_capacity" placeholder="Coach Capacity"/>
		<br />
	</div>
	<button class="btn btn-lg btn-primary btn-block add-coach" type="submit">Add Coach</button>
	<div id="result"> </div>
</div>

