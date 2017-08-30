<?php
include "../navbar.php";
?>
<form method="post" onsubmit="return validate(this)">
<h3>Current Entries</h3>
<p>Please enter the following details for the given Artist </p>
  <div>
    <label>Artist Name:</label>
    <input type="text" max length="20" min length="3" name="name" />
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
		fail=validateName(form.name.value);
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
	
	function validateName(entry)
	{
		if (entry=="")return "Please enter a name.\n";
		else if (entry.length>100)
			 return "error name is too large.\n";
		 else if (entry.length<3)
			 return "error please enter full name.\n";
		 else if (/[^a-zA-Z0-9.& ]/.test(entry))
			 return "Only charecters from a-z and 0-9 are allowed.\n";
		 return "";
	}
  
  
  </script>
</form>
