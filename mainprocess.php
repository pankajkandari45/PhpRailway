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
<h4>
<?php 

$from= $_REQUEST["from"];
$to= $_REQUEST["to"];

// ijxwv8926
$fromshort= "http://api.railwayapi.com/name_to_code/station/".$from."/apikey/ijxwv8926/";
$fromcontent = file_get_contents($fromshort);
$fromjson = json_decode($fromcontent, true);

$from= $fromjson["stations"][0]["code"];

$toshort= "http://api.railwayapi.com/name_to_code/station/".$to."/apikey/ijxwv8926/";
$tocontent = file_get_contents($toshort);
$tojson = json_decode($tocontent, true);
$to= $tojson["stations"][0]["code"];

 $date= $_REQUEST["date"];
$day= substr($date,strrpos($date,"-")+1,2);
$month= substr($date,strpos($date,"-")+1,2);
$date=$day."-".$month;

//$date= date('d-m');

$url= "http://api.railwayapi.com/between/source/".$from."/dest/".$to."/date/".$date."/apikey/ijxwv8926/";

$content = file_get_contents($url);
$json = json_decode($content, true);



echo "From $from";
echo "<img src='imgs/background.jpg' width='10%'>"; 
echo "To $to" ;

?>

</h4>
<div id="start" class="well well-lg">
<h4> </h4>

<form action="findTrain.php" method="get">
<?php 

if($json['train']==null)
{
  echo "<h3>sorry no train found today..Try another date</h3>";
  echo "<a href='mainpage.php'> Go back </a>";
}
else
{

?>
Select train :
<select name="trainid" class="form-control" onChange="getInfo(this.value)">
<?php 
$totaltrain=  sizeof($json['train']);
for($i=0;$i<$totaltrain;$i++)
{

?>
<option value="<?php echo $json['train'][$i]["number"]; ?>"><?php echo $json['train'][$i]["number"]; echo ":".$json['train'][$i]["name"] ?></option>

<?php 

}
?>
</select>
<br>
<br>
<input type="submit" name="submit" value="Go!" class="btn btn-default">
<?php 

}

?>
</form>

</div>
<script src="js/bootstrap.js">  </script>
<script src="js/jquery.min.js">  </script>


</div>

</body>
</html>