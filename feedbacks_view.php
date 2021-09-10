<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
    rel="stylesheet" type="text/css" />
<style>

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 5px;
  margin: 10px 0;
  width:40%;
  max-height:50%;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}



.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
  padding:"50px";
}
</style>
</head>
<title>Games Problem </title>
<?php include('header.php');?>
<div class="col-12">
  <h1>Feedbacks from  users</h1>
<article> 
	
<?php
//code for editprofile
include('mysqlconnect.php');
$g_name = $_REQUEST['name'];



$link = "SELECT * FROM  feedback WHERE game_name='$g_name'";



$res = mysqli_query($conn, $link);
$total = mysqli_num_rows($res);

if($total=='0')
{
	
 echo 'No Record Found';   
}
    else
{   

	while ($row = mysqli_fetch_assoc($res))
{
$quest = $row['question'];
$id= $row['id'];
$name=$row['name'];


	  
echo '<div class="container" >';
echo	'<span class="time-left" id="btn" > From:-'  .$name. '<br/> <br/>';
echo '<a href="question.php?name='.$g_name.'&ques='.$quest.'" title="Feedback"> ' .$quest. '</a>';
echo '</span>';
 echo '</div>';
 
}
}
    

?>



<script type="text/javascript">
 


</article>
<?php include('footer.php');?>