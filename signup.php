<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Assignment 1</title>
<?php include('header.php');?>
<div class="col-12">
<article>
<h1>SignUp</h1>
<?php
//code for signup start
include('mysqlconnect.php');
$errors = array();
$username='';
$email='';
$password='';
if(isset($_POST['signup']))
{
if(trim($_POST['username'])=='') $errors[]='Please Enter UserName';
 $link = "SELECT name FROM login_signup WHERE name='".trim($_POST['username'])."'";
$res = mysqli_query($conn, $link);
$total = mysqli_num_rows($res);
if($total>0)
$errors[]='Please Use Other username. This Is Used By Another User.';
if(trim($_POST['email'])=='') $errors[]='Please Enter Email Address';
#### Email Validation ####
  if(!empty($_POST['email']))
  {	
	if(preg_match('!@.*@|\.\.|\,!', $_POST['email']) || !preg_match('!^.+\@(\[?)[a-zA-Z0-9\.\-]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$!', $_POST['email'])) 
      { 
	  	 $errors[]='Email is incorrect';
      } 
  }
 $link = "SELECT email FROM login_signup WHERE email='".trim($_POST['email'])."'";
$res = mysqli_query($conn, $link);
$total = mysqli_num_rows($res);
if($total>0)
$errors[]='Please Use Other email. This Is Used By Another User.';
if(trim($_POST['password'])=='') $errors[]='Please Enter Email password';  
if (strlen($_POST['password']) < 5) $errors[]='Password At least 5 characters';
$username=trim($_POST['username']);
$email=trim($_POST['email']);
$password=trim($_POST['password']);
$pass=password_hash($password, PASSWORD_DEFAULT);
if(sizeof($errors)==0)
{
echo $sql="INSERT INTO login_signup(name,email,password) VALUES('$username','$email','$pass')";
$result=mysqli_query($conn, $sql);
echo '<SCRIPT LANGUAGE="javascript">'; 
echo 'window.location="login.php";';
echo '</SCRIPT>';	

}
else 
{
}
}
if(sizeof($errors) != 0)
{
foreach($errors as $error)
{
echo '<font color="#ff0000"><ul class="custom-list-style"><li>'.$error.'</li></ul></font>' ;					
}
}
//code for signup end
?>
<form method="POST">
<label for="name">UserName</label>
<input type="text" id="username" name="username" placeholder="Your username.." required>
<label for="email">Email</label>
<input type="email" id="email" name="email" placeholder="Your Email ID.." required>
<label for="password">Password</label>
<input type="password" id="password" name="password" placeholder="Password.." required>
<input type="submit" name="signup" value="Submit">
</form>
</article>
<?php include('footer.php');?>