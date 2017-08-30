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
    <input type="number"  step="0.01" max length="20" min="1.00" max="13.00" name="price" />
	<br>
	<br>
	<label>Genre: </label>
    <input type="text" max length="20" min length="3" name="Genre" />
	<br>
	<br>
          <!-- <form id = "theForm" method="GET" action="get.php" > -->
          Artist Name: <input id ="fname" list="Arts" type="text" name="Art" 
                    onkeyup="loadDocGet('find.php', myFunction, 'Arts')"> 
                    <!--<div id="Arts">
					
					//</div>-->
					<datalist id="Arts">
                    <option value=" ">
                    <option value=" ">
                    <option value=" ">
                    <option value=" ">
                    <option value=" ">
                    </datalist>  
         <!-- <input type="button" value="Button" onclick="loadDocPost('get.php', myFunction2, '')">-->
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
		fail+= validateArtist(form.Art.value);
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
	
	
	function loadDocGet(url, cFunction, my_params) {  
    var request = new XMLHttpRequest();
	
	var s = document.getElementById('fname').value;
	
	console.log(url + '?s=' + s) 
    request.open("GET", url + '?s=' + s, true);
    request.send();
    
    request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
      cFunction(this, my_params);}
    //document.getElementById("test").innerHTML = url2;
    }

    function myFunction(request, my_params) {   
    var received_j = request.responseText;
    var received = JSON.parse(received_j);
    
    //document.getElementById("test").innerHTML = nameval2;
    temp = document.getElementById("Arts");
	
	//temp.innerHTML = "";
	
	//for (var i = 0; i < received.length; i++)
      //     temp.innerHTML += "<p>" + received[i] + "<p>";   
    for (var i = 0; i < temp.options.length; i++)
            temp.options.item(i).value = " ";
        
     for (var i = 0; i < temp.options.length; i++)
            temp.options.item(i).value = received[i];   
        
    //var x = received[2];
    //document.getElementById("test").innerHTML = x; 
    }
	
	
	//function display(request, my_params) {  
 
	//alert(document.getElementById(my_params));
    //var received_j = request.responseText;
    //var received = JSON.parse(received_j);
    //temp = document.getElementById(my_params);
	 
	
	
//    }
    
    
   


    function myFunction2(request, my_params) {   
    //document.getElementById("test").innerHTML = "G1";

    var received_j = request.responseText;
    var received = JSON.parse(received_j);
    
    document.getElementById("test").innerHTML = "Artist ID " + received[0] + " Artist name " + received[1] + "<br>"+ "options "+ "<a href=\"ArtistData.php?delete=$artId\">delete</a> |   <a href=\"edit.php?edit=$artId\">edit</a>"; 
    }
	
  
  </script>
</form>

