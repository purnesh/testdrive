<?php

if(isset($_POST['pnrcode']) && $_POST['pnrcode'] == '1111111111'){
	echo '&#Purnesh Tripathi*#S3, 54*#Confirmed* $';
}

?>
<form method="POST" action="srv.php">
<input type="text" name="pnrcode" id="pnrcode"/>
<input type="submit"/>
</form>
