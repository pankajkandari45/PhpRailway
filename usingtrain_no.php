<!DOCTYPE html>
<html lang="en">
<head>
<title> Welcome to traininfo.com - Getting Indian railway info now becomes easy </title>
<link href="css/bootstrap.css" rel="stylesheet">

</head>

<body>
  <?php 

include("navigation.php");

  ?>
<div class="container">

</h4>
<div id="start" class="well well-lg">
<h4> </h4>
<?php 

$train_no=intval($_GET['train_no']);

echo "Details for Train with no: ".$train_no;
echo "<br><br>";
//$train_no= 12046;
//$url= "http://api.railwayapi.com/between/source/".$from."/dest/".$to."/date/".$date."/apikey/dlbld2375/";
$url = "http://api.railwayapi.com/route/train/".$train_no."/apikey/ijxwv8926/";
$content = file_get_contents($url);
$json = json_decode($content, true);
	$routeno= sizeof($json["route"]);
session_start();

for($i=0; $i<$routeno;$i++)
{	
	if($i==0)
	{	
		$_SESSION["source"]=$json["route"][$i]["fullname"];
		$_SESSION["schdep"]=$json["route"][$i]["schdep"];
		
	}
	elseif($i==sizeof($json["route"])-1)
	{
		
		$_SESSION["destination"]=$json["route"][$i]["fullname"]; 
		$_SESSION["scharr"]=$json["route"][$i]["scharr"];

	}
	echo $json["route"][$i]["fullname"]."<br>";
	
}


echo "<br><br>Source: ".$_SESSION["source"];
echo "<br>Departure time: ".$_SESSION["schdep"];
echo "<br><br>Destination : ".$_SESSION["destination"];
echo "<br>Arrival time : ".$_SESSION["scharr"];

echo "<a href='directions.php?from= $_SESSION[source]&to=$_SESSION[destination]'>Get map </a>";

?>



</div>
<script src="js/bootstrap.js">  </script>
<script src="js/jquery.min.js">  </script>


</div>

</body>
</html>

