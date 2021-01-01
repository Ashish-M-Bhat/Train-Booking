<?php 
session_start();
$connection = mysql_connect("localhost", "root", ""); 
$db = mysql_select_db("awp", $connection);
$trainId = $_SESSION['trainId'];
$doj = $_SESSION['doj'];
$board=$_SESSION['board'];
$dest=$_SESSION['dest'];
$result = mysql_query("SELECT * FROM bookedTrains where bookedTrainId = '$trainId' AND doj = '$doj';");
echo mysql_error();
if (mysql_num_rows($result) == 0)
{


			$result2 = mysql_query("INSERT INTO bookedTrains (bookedTrainId, start, `end`, `doj`, seatsBooked)VALUES ('$trainId', '$board', '$dest', CAST(N'$doj' AS Date), '1')");
			echo mysql_error();
					
}

else  
{
	$row = mysql_fetch_row($result);

	$newVal = $row[5]+1;
	$result1 = mysql_query("UPDATE bookedTrains SET seatsBooked = '$newVal' WHERE bookedTrainId = '$trainId' AND doj = '$doj' ;");

}
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script type="text/javascript">
		alert("Booking confirmed. Thanks for choosing our travels");
	window.location.replace("http://localhost/awp/takeInput.html");
	</script>

</body>
</html>

