<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "website";
	$conn = mysqli_connect($servername,$username,$password,$db);
    mysqli_select_db($conn ,"id10064942_crud_tsf");
    if(!$conn)
     echo "Not Connected" ; 
 	
?>