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


<div class="col-md-6" id="data-collector">
	<div class="aec-record col-md-12 heading">
		<div class="col-xs-3 col-md-3 coach-number aec-record-details heading"><strong>Coach Number</strong></div>
		<div class="col-xs-2 col-md-3 coach-class aec-record-details heading"><strong>Coach Class</strong></div>
		<div class="col-xs-2 col-md-3 coach-name aec-record-details heading"><strong>Coach Name</strong></div>
		<div class="col-xs-2 col-md-3 coach-tte aec-record-details heading"><strong>Coach TTE</strong></div>
	</div>
<?php
foreach ($a->result() as $row)
	{
?>
	<div class="aec-record col-md-12">
		<div class="col-xs-3 col-md-3 coach-number aec-record-details"><?php echo $row->coach_number; ?></div>
		<div class="col-xs-2 col-md-3 coach-class aec-record-details"><?php echo $row->coach_class; ?></div>
		<div class="col-xs-2 col-md-3 coach-name aec-record-details"><?php echo $row->coach_name; ?></div>
		<div class="col-xs-2 col-md-3 coach-tte aec-record-details"><?php echo $row->coach_tte; ?></div>
	</div>
<?php
		}
?>
</div>

<div class="col-md-2 station-list">

<div class="station-list heading col-md-12">
	<div class="col-xs-3 col-md-4 station-code"><strong>Stn. Code</strong></div>
	<div class="col-xs-3 col-md-4 arrival-time"><strong>Arr. Time</strong></div>
	<div class="col-xs-3 col-md-4 departure-time"><strong>Dept. Time</strong></div>
</div>

<?php
	foreach($train_route->result() as $row){
?>

<div class="station-list col-md-12">
	<div class="col-xs-3 col-md-4 station-code"><?php echo $row->station_code;?></div>
	<div class="col-xs-3 col-md-4 arrival-time"><?php echo $row->arrival_time;?></div>
	<div class="col-xs-3 col-md-4 departure-time"><?php echo $row->departure_time;?></div>
</div>

<?php
	}
?>
</div>
