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

<form action="directions.php" method="get">


<?php 

$train_no=intval($_GET['trainid']);

echo "Details for Train with no: ".$train_no;
echo "<br><br>";
//$train_no= 12046;
//$url= "http://api.railwayapi.com/between/source/".$from."/dest/".$to."/date/".$date."/apikey/dlbld2375/";
$url = "http://api.railwayapi.com/route/train/".$train_no."/apikey/ijxwv8926/";
$content = file_get_contents($url);
$json = json_decode($content, true);
	$routeno= sizeof($json["route"]);
?>
<select name="from">
<option value="#">Select Station</option>
<?php 
for($i=0; $i<$routeno;$i++)
{
	
	if($i==$routeno-1)
	{
		continue;
	}
	
echo "<option>".$json["route"][$i]["fullname"]."</option>" ;
}

?>

</select>

<select name="to">
<option value="#">Select Station</option>
<?php 
	
for($i=0; $i<$routeno;$i++)
{
	if($i==0)
	{
		continue;
	}
	
echo "<option>".$json["route"][$i]["fullname"]."</option>" ;
}

?>

</select>





<br>
<br>
<input type="submit" name="submit" value="Go!" class="btn btn-default">
</form>

</div>
<script src="js/bootstrap.js">  </script>
<script src="js/jquery.min.js">  </script>


</div>

</body>
</html>

