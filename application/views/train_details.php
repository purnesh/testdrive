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
		<div class="col-xs-3 col-md-2 coach-number aec-record-details heading"><strong>Coach Number</strong></div>
		<div class="col-xs-2 col-md-4 coach-class aec-record-details heading"><strong>Coach Class</strong></div>
		<div class="col-xs-2 col-md-2 coach-name aec-record-details heading"><strong>Coach Name</strong></div>
		<div class="col-xs-2 col-md-2 coach-tte aec-record-details heading"><strong>Coach TTE</strong></div>
		<div class="col-xs-3 col-md-1 coach-device aec-record-details heading"><strong>Coach Device</strong></div>
	</div>
<?php
foreach ($a->result() as $row)
	{
?>
	<div class="aec-record col-md-12">
		<div class="col-xs-3 col-md-2 coach-number aec-record-details"><?php echo $row->coach_number; ?></div>
		<div class="col-xs-2 col-md-4 coach-class aec-record-details"><?php echo $row->coach_class; ?></div>
		<div class="col-xs-2 col-md-2 coach-name aec-record-details"><?php echo $row->coach_name; ?></div>
		<div class="col-xs-2 col-md-2 coach-tte aec-record-details"><?php echo $row->coach_tte; ?></div>
		<div class="col-xs-3 col-md-1 coach-device aec-record-details"><?php echo $row->coach_device; ?></div>
	</div>

<?php
		}
?>
</div>
