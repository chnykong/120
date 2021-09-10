<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Gaming Problem </title>
<?php include('header.php');?>
<div class="col-12">
<article>
<?php
//code for editprofile
include('mysqlconnect.php');
$email=$_SESSION['email'];
$name=$_SESSION['username'];
$id=$_SESSION['id'];

$errors = array();

if(isset($_POST['feedback']))
{
if(trim($_POST['game'])=='') $errors[]='Please Enter game name';  
if(trim($_POST['question'])=='') $errors[]='Please Enter question';
$game=trim($_POST['game']);
$question=trim($_POST['question']);
if(sizeof($errors)==0)
{
$sql="INSERT INTO feedback(userid,name,email,game_name,question) VALUES('$id','$name','$email','$game','$question')";
$result=mysqli_query($conn, $sql);
echo '<SCRIPT LANGUAGE="javascript">'; 
echo 'window.location="index.php";';
echo '</SCRIPT>';	

}
else 
{
}
}

?>
<form method="POST">
<label for="game_name">Game Name</label>
<input type="text" id="game" name="game" required placeholder="Enter game name....">
<label for="question">Question</label>
<textarea  id="question" name="question" placeholder="enter your question here....." required  style="height:100px"></textarea>
<input type="submit" name="feedback" value="Submit">
</form>
</article>
<?php include('footer.php');?>