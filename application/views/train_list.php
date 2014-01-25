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
        

<div class="col-md-8" id="data-collector">
	<div class="train-record col-md-12 heading">
		<div class="col-xs-2 col-md-2 train-number train-record-details heading"><strong>Train No.</strong></div>
		<div class="col-xs-2 col-md-4 train-name train-record-details heading"><strong>Train Name</strong></div>
		<div class="col-xs-2 col-md-2 train-from train-record-details heading"><strong>Starting Stn.</strong></div>
		<div class="col-xs-2 col-md-2 train-to train-record-details heading"><strong>Dest.</strong></div>
		<div class="col-xs-2 col-md-1 train-start-time train-record-details heading"><strong>Start Time</strong></div>
		<div class="col-xs-2 col-md-1 train-destination-time train-record-details heading"><strong>Finish Time</strong></div>
	</div>
<?php
foreach ($a->result() as $row)
		{
?>
	<div class="train-record col-md-12">
		<div class="col-xs-2 col-md-2 train-number train-record-details"><?php echo $row->train_number;?></div>
		<div class="col-md-4 col-xs-2 train-name train-record-details"><i class='fa fa-circle <?php if($row->train_active){echo "active";} else{echo "inactive";}?> train-indicator'></i><?php echo $row->train_name;?></div>
		<div class="col-md-2 col-xs-2 train-from train-record-details"><?php echo $row->train_from;?></div>
		<div class="col-md-2 col-xs-2 train-to train-record-details"><?php echo $row->train_to;?></div>
		<div class="col-md-1 col-xs-2 train-start-time train-record-details"><?php echo $row->train_start_time;?></div>
		<div class="col-md-1 col-xs-2 train-destination-time train-record-details"><?php echo $row->train_destination_time;?></div>
	</div>
<?php
		}
?>
</div>

