<!DOCTYPE html>
<html>
  <head>
    <title>Search for User</title>
    <link rel ="stylesheet" href="my_style.css">
    <script src="../validation.js"></script> 
  </head>
  <body>
  <fieldset>
            
          <!-- <form id = "theForm" method="GET" action="get.php" > -->
          <form id = "theForm"  action="" > 
          <div style = "margin:5px">
          Artist name: <input id ="fname" list="Arts" type="text" name="Art" 
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
					
          </div>    
          <div style = "margin:5px">
          <input type="submit" value="Search">
         <!-- <input type="button" value="Button" onclick="loadDocPost('get.php', myFunction2, '')">-->
          </div>
          </form>
  
  </fieldset>
      
  
  <div id = "test">
		    
  </div>
  
      
      
   <script>
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
    
    
    function loadDocPost(url, cFunction, my_params) {  
    var request = new XMLHttpRequest();
    val1 = document.getElementById("fname").value;

    params = "Art="+val1;
    //document.getElementById("test").innerHTML = params;
    request.open("POST", url, true); 
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(params);

    request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
      cFunction(this, my_params);   
      //document.getElementById("test").innerHTML = "GG";
     } 
    }


    function myFunction2(request, my_params) {   
    //document.getElementById("test").innerHTML = "G1";

    var received_j = request.responseText;
    var received = JSON.parse(received_j);
    
    document.getElementById("test").innerHTML = "Artist ID " + received[0] + " Artist name " + received[1] + "<br>"+ "options "+ "<a href=\"ArtistData.php?delete=$artId\">delete</a> |   <a href=\"edit.php?edit=$artId\">edit</a>"; 
    }
    
    
    </script>  



  </body>
</html>


