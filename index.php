<?php
   session_start();
   if( isset( $_SESSION['counter'] ) )
   {
      $_SESSION['counter'] += 1;
   }
   else
   {
      $_SESSION['counter'] = 1;
   }
   $msg = "You have visited this page ".  $_SESSION['counter'];
   $msg .= "in this session.";
?>

<?php

function getBrowserOS() { 

    $user_agent     =   $_SERVER['HTTP_USER_AGENT']; 
    $browser        =   "Unknown Browser";
    $os_platform    =   "Unknown OS Platform";

    // Get the Operating System Platform

        if (preg_match('/windows|win32/i', $user_agent)) {

            $os_platform    =   'Windows';

            if (preg_match('/windows nt 6.2/i', $user_agent)) {

                $os_platform    .=  " 8";

            } else if (preg_match('/windows nt 6.1/i', $user_agent)) {

                $os_platform    .=  " 7";

            } else if (preg_match('/windows nt 6.0/i', $user_agent)) {

                $os_platform    .=  " Vista";

            } else if (preg_match('/windows nt 5.2/i', $user_agent)) {

                $os_platform    .=  " Server 2003/XP x64";

            } else if (preg_match('/windows nt 5.1/i', $user_agent) || preg_match('/windows xp/i', $user_agent)) {

                $os_platform    .=  " XP";

            } else if (preg_match('/windows nt 5.0/i', $user_agent)) {

                $os_platform    .=  " 2000";

            } else if (preg_match('/windows me/i', $user_agent)) {

                $os_platform    .=  " ME";

            } else if (preg_match('/win98/i', $user_agent)) {

                $os_platform    .=  " 98";

            } else if (preg_match('/win95/i', $user_agent)) {

                $os_platform    .=  " 95";

            } else if (preg_match('/win16/i', $user_agent)) {

                $os_platform    .=  " 3.11";

            }

        } else if (preg_match('/macintosh|mac os x/i', $user_agent)) {

            $os_platform    =   'Mac';

            if (preg_match('/macintosh/i', $user_agent)) {

                $os_platform    .=  " OS X";

            } else if (preg_match('/mac_powerpc/i', $user_agent)) {

                $os_platform    .=  " OS 9";

            }

        } else if (preg_match('/linux/i', $user_agent)) {

            $os_platform    =   "Linux";

        }

        // Override if matched

            if (preg_match('/iphone/i', $user_agent)) {

                $os_platform    =   "iPhone";

            } else if (preg_match('/android/i', $user_agent)) {

                $os_platform    =   "Android";

            } else if (preg_match('/blackberry/i', $user_agent)) {

                $os_platform    =   "BlackBerry";

            } else if (preg_match('/webos/i', $user_agent)) {

                $os_platform    =   "Mobile";

            } else if (preg_match('/ipod/i', $user_agent)) {

                $os_platform    =   "iPod";

            } else if (preg_match('/ipad/i', $user_agent)) {

                $os_platform    =   "iPad";

            }

    // Get the Browser

        if (preg_match('/msie/i', $user_agent) && !preg_match('/opera/i', $user_agent)) { 

            $browser        =   "Internet Explorer"; 

        } else if (preg_match('/firefox/i', $user_agent)) { 

            $browser        =   "Firefox";

        } else if (preg_match('/chrome/i', $user_agent)) { 

            $browser        =   "Chrome";

        } else if (preg_match('/safari/i', $user_agent)) { 

            $browser        =   "Safari";

        } else if (preg_match('/opera/i', $user_agent)) { 

            $browser        =   "Opera";

        } else if (preg_match('/netscape/i', $user_agent)) { 

            $browser        =   "Netscape"; 

        } 

        // Override if matched

            if ($os_platform == "iPhone" || $os_platform == "Android" || $os_platform == "BlackBerry" || $os_platform == "Mobile" || $os_platform == "iPod" || $os_platform == "iPad") { 

                if (preg_match('/mobile/i', $user_agent)) {

                    $browser    =   "Handheld Browser";

                }

            }

    // Create a Data Array

        return array(
            'browser'       =>  $browser,
            'os_platform'   =>  $os_platform
        );

} 


$user_agent     =   getBrowserOS();

$device_details =   "<strong>Browser: </strong>".$user_agent['browser']."<br /><strong>Operating System: </strong>".$user_agent['os_platform']."";

print_r($device_details);

//echo("<br /><br /><br />".$_SERVER['HTTP_USER_AGENT']."");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- The stylesheet -->
<link rel="stylesheet" href="styles.css" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
<title>Issue Tracking</title>
</head>

<body  background-image="url http://ariftechnologies.com/bg1.png" >

<style>

</style>
<form method="post" >
<table>

	<tr>
		<td>First Name:</td>
	<td><input type="text" class="form-control" placeholder="" name="first_name"></td>	</tr>
	<tr></p>
		<td>Last Name</td></p>
	<td><input type="text" class="form-control" placeholder="" name="last_name"></td>	</tr>
	<tr>
		<td>Email</td>
	<td><input type="text" class="form-control" placeholder="" name="email"></td>	</tr>
	<tr>
		<td>Phone Number</td></p>
		<td><input type="text" class="form-control" placeholder="" name="phone_no"></td>
	</tr>
		<tr>
		<td>Company</td>
		<td><input type="text" class="form-control" placeholder="" name="company"></td>
		<!--<td><input type="text" name="company" /></td>-->
	</tr>
	<tr>
		<td>Issue to be resolved</td>
		<td><textarea class="form-control" rows="3" name="comments"></textarea></td>
	</tr>
	<tr>
		<td>Any other Message</td>
		<td><textarea class="form-control" rows="3" name="comments"></textarea></td>
		<!--<td><input type="text" name="comments" /></td>-->
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Submit" /></td>
	</tr>
</table>
<?php
if (isset($_POST['submit']))
	{	   
	include 'db.php';
	
			 		$first_name=$_POST['first_name'] ;
					$last_name= $_POST['last_name'] ;					
					$email=$_POST['email'] ;
					$phone_no=$_POST['phone_no'] ;
					$company= $_POST['company'] ;					
					$issue=$_POST['issue'] ;
					$comments=$_POST['comments'];
					$date = date('d/m/Y');
					$time = date('H:i:s');
					//$device_details =$browser['browser'];
					//$user_agent =$user_agent['browser'];
												
		 mysql_query("INSERT INTO `clients`(first_name,last_name,email,phone_no,company,issue,comments,date,time) 
		 VALUES ('$first_name','$last_name','$email','$phone_no','$company','$issue','$comments','$date','$time')"); 
				
				
	        }
?>
</form>
<table border="1">
	
			<?php
			include("db.php");
			
				
			$result=mysql_query("SELECT * FROM clients");
			
			while($test = mysql_fetch_array($result))
			{
				$id = $test['id'];	
				echo "<tr align='center'>";	
				echo"<td><font color='black'>" .$test['id']."</font></td>";
				echo"<td><font color='black'>" .$test['first_name']."</font></td>";
				echo"<td><font color='black'>". $test['last_name']. "</font></td>";
				echo"<td><font color='black'>". $test['email']. "</font></td>";
				echo"<td><font color='black'>". $test['phone_no']. "</font></td>";
				echo"<td><font color='black'>". $test['company']. "</font></td>";
				echo"<td><font color='black'>". $test['issue']. "</font></td>";
				echo"<td><font color='black'>". $test['comments']. "</font></td>";
				echo"<td><font color='black'>". $test['date']. "</font></td>";
				echo"<td><font color='black'>". $test['time']. "</font></td>";
				echo"<td><font color='black'>". $test['browser']. "</font></td>";
				echo"<td><font color='black'>". $test['os']. "</font></td>";
				echo"<td> <a href ='view.php?id=$id'>Edit</a>";
				echo"<td> <a href ='del.php?id=$id'><center>Delete</center></a>";
									
				echo "</tr>";
			}
			mysql_close($conn);
			?>
</table>

<?php

 ?>

</body>
</html>
