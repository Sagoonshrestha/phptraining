<!DOCTYPE html>
<html>
<head>
	<title></title>
	
		<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) { 
	 
		    $('#btn-submit').click(function(e) {
		    e.preventDefault();  
		    	alert('clicked');
		 
		        $(".error").hide();
		        var hasError = false;
		        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 
		        var emailaddressVal = $("#UserEmail").val();
		        if(emailaddressVal == '') {
		            $("#UserEmail").after('<span class="error">Please enter your email address.</span>');
		            hasError = true;
		        }
		 
		        else if(!emailReg.test(emailaddressVal)) {
		            $("#UserEmail").after('<span class="error">Enter a valid email address.</span>');
		            hasError = true;
		        }
		 
		        if(hasError == true) { return false; }
		 
		    });
		});
	</script>
</head>
<body>
<form method="post" name="form1" action="">
  <fieldset>
   <label>Email Address:</labe>
   <input type="text" name="UserEmail" id="UserEmail" value="" size="32" />
   <input type="submit" value="Submit" id="btn-submit" />
  </fieldset>
</form>
</body>
</html>