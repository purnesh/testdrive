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
</div>

<div class="col-md-12" id="data-collector">
	<div class="aec-record col-md-12 heading">
		<div class="col-md-1 serial-number coach-blueprint heading"><strong>S. No.</strong></div>
		<div class="col-md-2 seat-type coach-blueprint heading"><strong>Seat Type</strong></div>
		<?php
			foreach($route->result() as $row){
		?>
		<div class="col-md-1 station-code coach-blueprint heading"><strong><?php echo $row->station_code;?></strong></div>
		<?php	
			}
		?>
	</div>
	<?php
		foreach($blueprint->result() as $blue){
	?>
		<div class="aec-record col-md-12 ">
			<div class="col-md-1 serial-number coach-blueprint"><?php echo $blue->serial_number;?></div>
			<div class="col-md-2 seat-type coach-blueprint"><?php echo $blue->seat_type;?></div>
			<?php
				foreach($route->result() as $red){
			?>
			<div class="col-md-1 station-code coach-blueprint"><?php $a = $red->station_code;echo $blue->$a;?></div>
			<?php	
				}
			?>
		</div>
	<?php
		}
	?>
</div>

