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


<div class="jumbotron">
 <h1>Welcome to traininfo.com</h1>
 <div class="row">
<div class="col-md-2">

  <img src="imgs/screenIR.jpeg" alt="baby1" class="img-circle" width="85%" >
  
</div>
<div class="col-md-10">
<p>
  traininfo.com provides you the latest and reliable information about the Indian railway details.
   
   </p>
<a href="#start" class="btn btn-primary">Lets Start</a>
</div>
</div>


  </div>
<div id="start" class="well well-lg">
<h4>Train information option 1</h4>

<form action="mainprocess.php" method="get">

From:<br>
<input type="text" name="from" class="form-control" id="nameField" placeholder="enter city (eg.Delhi)" />

To : <br>
<input type="text" name="to" class="form-control" id="nameField" placeholder="enter city (eg.Mumbai)" />

<br><br>
select the date :
<?php 

$date= date('Y-m-d');

?>
<input type="date" name="date" min="<?php echo $date ?>" >
<br><br>
<input type="submit" value="Get results" class="btn btn-default">
</form>
</div>

<div id="start" class="well well-lg">
<h4>Train information option 2 </h4>

<form action="usingtrain_no.php" method="get">

<input type="text" name="train_no" class="form-control" id="nameField" placeholder="enter train no" />

<br><br>
<input type="submit" value="Get results" class="btn btn-default">
</form>

</div>
<script src="js/bootstrap.js">  </script>
<script src="js/jquery.min.js">  </script>


</div>

</body>
</html>