<head>
    <title>Edit Album</title>
     <script src="../validation.js"></script>
  </head>
<?php
include "../navbar.php";
?>
<form method="post" onsubmit="return validate(this)">
<h3>Current Entries</h3>
<p>Please enter the following details for the given Album </p>
  <div>
    <label>Track title:  </label>
    <input type="text" max length="50" min length="3" name="Title" />
	<br>
	<br>
	<label>track number:  </label>
    <input type="number" max length="20" min="1.00" max="40.00" name="Number" />
	<br>
	<br>
  </div>
  <div>
  <br>
    <input type="submit" />
  </div>
  <div id="response">
  
  </div>
  <script>
	function validate(form)
	{
		fail=  validateTracksTitle(form.Title.value);
		fail+= validateNumber(form.Number.value);
		if (fail=="")
		{
			document.write("passed");
			return true;
		}
		else 
		{
			//window.alert(fail);
				 document.getElementById("response").innerHTML =fail;
			return false;
		}
	}
	
  </script>
</form>

