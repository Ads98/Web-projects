<?php
  // The PHP functions
include "db.php";
  function validate_Title($field)
  {
  	if ($field == "") return  "Please enter a album title.\n";
	else if (strlen($field) < 3) return "The album title was too short ";
	else if (strlen($field) > 50) return "The album title was too long ";
	else if (preg_match("/[^a-zA-Z0-9_ ]/", $field))
      return "Only letters, numbers, - and _ in the album title<br>";
    return "";
  }
  
  function validate_TrackTitle($field)
  {
  	if ($field == "") return  "Please enter a track title.\n";
	else if (strlen($field) < 3) return "The Track title was too short ";
	else if (strlen($field) > 50) return "The Track title was too long ";
	else if (preg_match("/[^a-zA-Z0-9_ ]/", $field))
      return "Only letters, numbers, - and _ in the Track title<br>";
    return "";
  }
  
  
  function validate_Genre($field)
  {
  	if ($field == "") return "No Genre was entered<br>";
	else if (strlen($field) < 3) return "The genre listed is to short";
	else if (strlen($field) > 20) return "The genre listed is too long ";
	else if (preg_match("/[^a-zA-Z]/", $field))
     return "Only letters are allowed in the albums genre<br>";
    return "";
  }
  
  function validate_Price($field)
  {
    if ($field == 0) return "No price was entered<br>";
    else if ($field < 1 || $field > 13)
      return "The price must be between £1 and £13";
        else if (preg_match("/^[1-9]\D*(\.\D+)?$/", $field))
      return "Only  numbers are allowed in the albums price<br>";
    return "";
  }
  
  function validate_Number($field)
  {
    if ($field == 0) return "No number  was entered<br>";
    else if ($field < 1 || $field > 40)
      return "There can only be between  must be between 1 and 40 tracks";
        else if (preg_match("/[^0-9]/", $field))
      return "Only  numbers are allowed in the number of tracks<br>";
    return "";
  }
  
  function validate_Artist($field)
  {
  	if ($field == "") return  "Please enter a name.\n";
	else if (strlen($field) < 3) return "The artist name was too short ";
	else if (strlen($field) > 100) return "The artist name was too long ";
	else if (preg_match("/[^a-zA-Z0-9. ]/", $field))
      return "  **Only letters, numbers, - and _ in the artist name<br>";
    return "";
  }
  
  function sterlise($string){
    return htmlentities ($string);
  }
?>

