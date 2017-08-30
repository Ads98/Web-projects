
//albums	
	function validateTitle(entry)
	{
		if (entry=="")return "Please enter a Title.\n";
		else if (entry.length>50)
			 return "error the Title is too large.\n";
		 else if (entry.length<3)
			 return "error please enter the full title.\n";
		 else if (/[^a-zA-Z0-9 ]/.test(entry))
			 return "Only charecters from a-z and 0-9 are allowed.\n";
		 return "";
	}
	
	
	function validatePrice(entry)
	{
		if (entry=="")return "Please enter a price.\n";
		else if (entry>13)
			 return "error this price is too large.\n";
		 else if (entry<1)
			 return "error this price is to small.\n";
		 else if (/^[1-9]\D*(\.\D+)?$/.test(entry))
			 return "D Only numeric values are allowed.\n";
		 return "";
	}
	
	
	function validateGenre(entry)
	{
		if (entry=="")return "Please enter a Genre.\n";
		else if (entry.length>20)
			 return "error genre name is too large.\n";
		 else if (entry.length<3)
			 return "error please enter full genre name.\n";
		 else if (/[^a-zA-Z ]/.test(entry))
			 return "Only charecters from a-z are allowed.\n";
		 return "";
	}
	
	
	
	function validateArtist(entry)
	{
		if (entry=="")return "Please enter a name.\n";
		else if (entry.length>100)
			 return "error name is too large.\n";
		 else if (entry.length<3)
			 return "error please enter full name.\n";
		 else if (/[^a-zA-Z0-9. ]/.test(entry))
			 return "Only charecters from a-z and 0-9 are allowed.\n";
		 return "";
	}
	
	//artist
	function validateName(entry)
	{
		if (entry=="")return "Please enter a name.\n";
		else if (entry.length>100)
			 return "error name is too large.\n";
		 else if (entry.length<3)
			 return "error please enter full name.\n";
		 else if (/[^a-zA-Z0-9. ]/.test(entry))
			 return "Only charecters from a-z and 0-9 are allowed.\n";
		 return "";
	}
	
	//Tracks
	function validateTracksTitle(entry)
	{
		if (entry=="")return "Please enter a Title.\n";
		else if (entry.length>50)
			 return "error the Title is too large.\n";
		 else if (entry.length<3)
			 return "error please enter the full title.\n";
		 else if (/[^a-zA-Z0-9 ]/.test(entry))
			 return "Only charecters from a-z and 0-9 are allowed.\n";
		 return "";
	}
	
	
	function validateNumber(entry)
	{
		if (entry=="")return "Please enter the number of tracks.\n";
		else if (entry>40)
			 return "error the number of tracks  is too large.\n";
		 else if (entry<1)
			 return "error the number of tracks is to small.\n";
		 else if (/[^0-9]/.test(entry))
			 return "Only numeric values are allowed.\n";
		 return "";
	}
	
	function validateAlbum(entry)
	{
		if (entry=="")return "Please enter a Album.\n";
		else if (entry.length>70)
			 return "error the album title is too large.\n";
		 else if (entry.length<3)
			 return "error please enter the full album title.\n";
		 else if (/[^a-zA-Z0-9 ]/.test(entry))
			 return "Only charecters from a-z and 0-9 are allowed.\n";
		 return "";
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
	
	