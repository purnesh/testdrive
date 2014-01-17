$(document).ready(function(){
		$.post("http://localhost/testdrive/index.php/pchandler/lady/2344", {}, function(result){
			$("#footer").hide();
		});
	});
