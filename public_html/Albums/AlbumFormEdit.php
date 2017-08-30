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
    <label>Title:  </label>
    <input type="text" max length="50" min length="3" name="Title" />
	<br>
	<br>
	<label>Price:  </label>
    <input type="number" max step="0.01" length="20" min="1.00" max="13.00" name="price" />
	<br>
	<br>
	<label>Genre: </label>
    <input type="text" max length="20" min length="3" name="Genre" />
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
		fail=  validateTitle(form.Title.value);
		fail+= validatePrice(form.price.value);
		fail+= validateGenre(form.Genre.value);
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

