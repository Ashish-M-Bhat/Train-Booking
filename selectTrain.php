
<?php 
session_start();

print <<<END
<!DOCTYPE html>
<html lang="en">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="template/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="template/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="template/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="template/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="template/css/util.css">
	<link rel="stylesheet" type="text/css" href="template/css/main.css">
	<link rel="stylesheet" href="style.css"/>

</head>
<body>
END;

$connection = mysql_connect("localhost", "root", ""); // Establishing connection with server..
$db = mysql_select_db("awp", $connection);
//$board=$_POST['board']; // Fetching Values from URL.
//$dest= ($_POST['dest']); 
$x=$_SESSION['board'];
$y=$_SESSION['dest'];
$doj1=$_SESSION['doj'];
$result = mysql_query("SELECT * FROM trains where `start`='$x' AND `end` ='$y'");
if (mysql_num_rows($result) == 0)
{
					echo "<script>alert('No trains Found');</script>";
					
}
else  
{
	
	 $bol=1;
	print<<<END

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Train ID</th>
								<th class="column100 column2" data-column="column2">Boadring</th>
								<th class="column100 column3" data-column="column3">Destination</th>
								<th class="column100 column4" data-column="column4">Seats</th>
								<th class="column100 column4" data-column="column5">Fare</th>

							</tr>
						</thead>
						<tbody>
						<tr class="row100">
END;

		        		while($row = mysql_fetch_row($result))
		        		{
		        			
		        					echo " <tr class="."row100 head"."><td class="."column100 column1"."data-column="."column1>".$row[0]."</td>";
		        					echo " <td class="."column100 column2"."data-column="."column2>".$row[1]."</td>";
		        					echo " <td class="."column100 column3"."data-column="."column3>".$row[2]."</td>";
		        					

		        					$totalSeats=$row[3];
		        					$trainId=$row[0];
		        					$bookedSeats=0;
		        					$tempResult = mysql_query("SELECT * FROM bookedTrains where `bookedTrainId`=$row[0] AND doj = '$doj1' ");
		        					echo mysql_error();
		        					if (mysql_num_rows($tempResult) > 0)
		        					{
		        						
		        						$tempRow = mysql_fetch_row($tempResult);
		        						$bookedSeats=$tempRow[5];
		        					}
		        					$remSeats=$totalSeats - $bookedSeats;
		        					
		        					
		        				
		        					echo " <td class="."column100 column4"."data-column="."column4 id = "."remId".">".$remSeats."</td>";
		        					echo " <td class="."column100 column3"."data-column="."column5>".$row[4]."</td></tr>";
		        					
		        				
		        			
		        		}
		        		print<<<END
		        		</tr>
		        		
		  						</tbody>
		  					</table>
		  				</div></div>

<div class="container" style="margin-left:30%;"	" > 
<div class="main" align="center">
<form class="form" method="post" action="../awp/bookSeats.php">
<label>Train Id :</label>
<input type="text" name="trainId" id="trainId">

<input type="submit" id="book" value="Book">
</form>
</div>
</div>
</div>
		  			</body>
		  		</html>
		}

		        			
		        			
END;
}
?>