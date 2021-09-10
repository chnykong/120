<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Gaming Problem </title>
<?php include('header.php');?>
<div class="col-12">
<article>
<h1>If you have same Question then click Ok</h1>
<?php
$errors = array();
//code for editprofile



include('mysqlconnect.php');
$email=$_SESSION['email'];
$id=$_SESSION['id'];
$name=$_SESSION['username'];
$g_name = $_REQUEST['name'];
$quest = $_REQUEST['ques'];
echo $quest;

if(isset($_POST['question']))
{


$sql="INSERT INTO feedback(userid,name,email,game_name,question) VALUES('$id','$name','$email','$g_name','$quest')";
$result=mysqli_query($conn, $sql);
echo '<SCRIPT LANGUAGE="javascript">'; 
echo 'window.location="index.php";';
echo '</SCRIPT>';	

}
else 
{
}

?>
<form method="POST">

<br/>
<input type="submit" name="question" value="OK">
</form>
</article>
<?php include('footer.php');?>