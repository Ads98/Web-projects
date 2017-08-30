<head>
    <title>Add Album</title>
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
    <input type="number" min="1.00" max="40.00" name="Number" />
	<br>
	<br>
          <!-- <form id = "theForm" method="GET" action="get.php" > -->
          Album Title: <input id ="fname" list="Albums" type="text" name="Album" 
                    onkeyup="loadDocGet('findAlbum.php', myFunction, 'Albums')"> 
                    <!--<div id="Albums">
					
					//</div>-->
					<datalist id="Albums">
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
		fail=  validateTracksTitle(form.Title.value);
		fail+= validateNumber(form.Number.value);
		fail+= validateAlbum(form.Album.value);
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
    temp = document.getElementById("Albums");
	
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

