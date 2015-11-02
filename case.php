<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>case</title>
</head>

<body>
<form method="post">
<table>

	<tr>
		<td>case_number:</td>
		<td><input type="text" name="a" /></td>
	</tr>
	<tr>
		<td>date_of_commence</td>
		<td><input type="text" name="b" /></td>
	</tr>
	<tr>
		<td>date_0f_conclusion</td>
		<td><input type="text" name="c" /></td>
	</tr>
	<tr>
		<td>suspect_number Year</td>
		<td><input type="text" name="d" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="add" /></td>
	</tr>
</table>
<?php
if (isset($_POST['submit']))
	{	   
	include 'db.php';
	
			 		$a=$_POST['case_number'] ;
					$b= $_POST['date_of_commence'] ;					
					$c=$_POST['date_0f_conclusion'] ;
					$d=$_POST['suspect_number'] ;
												
		 mysql_query("INSERT INTO `case`(case_number, date_of_commence, date_0f_conclusion, suspect_number) 
		 VALUES ('$a','$b','$c','$d')"); 				
				
	        }
?>
</form>
<table border="1">	
			<?php
			include("db.php");
			
				
			$result=mysql_query("SELECT * FROM case");
			
			while($test = mysql_fetch_array($result))
			{
				$id = $test['caseid'];	
				echo "<tr align='center'>";	
				echo"<td><font color='black'>" .$test['caseid']."</font></td>";
				echo"<td><font color='black'>" .$test['case_number']."</font></td>";
				echo"<td><font color='black'>". $test['date_of_commence']. "</font></td>";
				echo"<td><font color='black'>". $test['date_0f_conclusion']. "</font></td>";
				echo"<td><font color='black'>". $test['suspect_number']. "</font></td>";	
				echo"<td> <a href ='view.php?caseid=$id'>Edit</a>";
				echo"<td> <a href ='del.php?caseid=$id'><center>Delete</center></a>";
									
				echo "</tr>";
			}
			mysql_close($conn);
			?>
</table>

</body>
</html>
