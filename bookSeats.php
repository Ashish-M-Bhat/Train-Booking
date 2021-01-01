<?php 
session_start();
//$board=$_SESSION['board'];
//$dest=$_SESSION['dest'];
$trainId = $_POST['trainId'];
$_SESSION['trainId'] = $trainId; 
print<<<END

<!DOCTYPE html>
<html>
<head>
<style>
  body
  {
    background: url(background.jpg);
    
    background-size:cover;
    
    
  }
  </style>

<script type="text/javascript" src="final.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>


<div class="row">
  <div class="col-75" >
    <div class="container" >
      <form action="..//awp/thanks.php">
      
        <div class="row">
          <div class="col-50">
END;
          	
          $connection = mysql_connect("localhost", "root", ""); 
		  $db = mysql_select_db("awp", $connection);
          	$result1 = mysql_query("SELECT * FROM trains where trainId = '$trainId' ;");
          	
          	$row1 = mysql_fetch_row($result1);
          	echo mysql_error();
          	$board = $row1[1];
          	$dest = $row1[2];
          	$_SESSION['board'] = $board;$_SESSION['dest'] = $dest;

			echo "<h3>Billing Information</h3>";
             echo "<label for="."fname"."><i class="."fa fa-user"."></i> Source</label>";
              echo" <input type="." text "." value = ".$board. " disabled >";

              echo "<label for="."fname"."><i class="."fa fa-user"."></i> Destination</label>";
            echo "<input type="." text ". " value = ".$dest." disabled >";

         
            echo "<label for="."fname"."><i class="."fa fa-user"."></i> Full Name</label>";
           echo" <input type="." text"." id = "." b " ." name= "." name > ";


              echo "<label for="."fname"."><i class="."fa fa-user"."></i>Contact Number</label>";
           echo" <input type = "." text "." id = "." c "  ." name = "." phno > ";


              echo "<label for="."adr"."fname"."><i class="."fa fa-address-card-o"."></i>Address</label>";
           echo" <input type = "." text "." id = "." c "  ." name = "." add > ";

           echo " <input type="."submit"." id = ". "confirm" . " value = "."Confirm "." >";

    

         echo " </div></div></form></div></div></div></body></body></html>";


         

		
?>


            
        