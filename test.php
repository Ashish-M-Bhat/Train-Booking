<?php 
//Processing
session_start();
$connection = mysql_connect("localhost", "root", ""); 
$db = mysql_select_db("awp", $connection);

$doj = $_SESSION['doj']; 
$result = mysql_query("SELECT * FROM bookedTrains where doj= '$doj' ");
if (mysql_num_rows($result) == 0)
{
					echo "<script>alert('No trains Found');</script>";
					
}

else  
{
	
		        		while($row = mysql_fetch_row($result))
		        		{
		        			echo $row[4]."<br>";
		        		}

}
?>