<?php 
//Processing
session_start();
$connection = mysql_connect("localhost", "root", ""); 
$db = mysql_select_db("awp", $connection);
$board=$_POST['board1']; 
$dest= ($_POST['dest1']);
$doj=$_POST['doj01'];
$_SESSION['doj'] = $doj; 
$result = mysql_query("SELECT * FROM trains where `start`='$board' AND `end` ='$dest'");
if (mysql_num_rows($result) == 0)
{
					echo "<script>alert('No trains Found');</script>";
					
}

else  
{
	   $_SESSION['board']=$board;
	$_SESSION['dest']=$dest;

	echo "Found";

}
?>