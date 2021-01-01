



$(document).ready(function(){
$("#searchTrains").click(function(){
var board = $("#board").val();
var dest = $("#dest").val();

function convert(str) {
  var date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
  return [date.getFullYear(), mnth, day].join("-");
}




var doj1= $("#my_date_picker").datepicker('getDate');
var doj=convert(doj1);


if( board =='' || dest ==''){
$('input[type="text"],input[type="password"]').css("border","2px solid red");
$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
alert("Please fill all fields...!!!!!!");
}else 
{
	$.post("trains.php",{ doj01: doj, board1: board, dest1:dest},
	function(data) 
	{
		if(data=='Found')
		{
			$("form")[0].reset();
			$('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
			alert("Found");
		window.location.replace("http://localhost/awp/selectTrain.php");
	} 
});
}
});
});

