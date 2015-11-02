<?php
  include("db.php");  

	$id =$_REQUEST['caseid'];
	
	
	// sending query
	mysql_query("DELETE FROM books WHERE case = '$id'")
	or die(mysql_error());  	
	
	header("Location: case.php");
?>