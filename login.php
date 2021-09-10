<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Assignment 1 </title>
<?php include('header.php');?>
<div class="col-12">
<article>
<h1>Login Page</h1>
<?php
//code for login start
include('mysqlconnect.php');
$errors = array();
if(isset($_POST['login']))
{
if(trim($_POST['username'])=='') $errors[]='Please Enter UserName';
if(trim($_POST['password'])=='') $errors[]='Please Enter Password';
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$pass=password_hash($password, PASSWORD_DEFAULT);
$link = "SELECT * FROM  login_signup WHERE name='$username'";
$res = mysqli_query($conn, $link);
$total = mysqli_num_rows($res);
$row = mysqli_fetch_assoc($res);
$hash=$row['password'];
$email=$row['email'];	
$id=$row['id'];	
if($total=='0')
{
$errors[]='Email and Password not correct.';
}
else
{
if (password_verify($password, $hash)) {
if(sizeof($errors)==0)
{
$_SESSION['email'] = $email;
$_SESSION['username'] = $username;
$_SESSION['id'] = $id;
echo '<SCRIPT LANGUAGE="javascript">'; 
echo 'window.location="game_list.php";';
echo '</SCRIPT>'; 	
} 
}
else {
$errors[]='Email and Password not correct.';
}
}	
}
?>
<?php
if(sizeof($errors) != 0)
{
foreach($errors as $error)
{
echo '<h2 align="center"><font style="color:#ff0000"><blink>'.$error.'</blink></font></h2>';						
}
}
//code for login end
?>
<form method="POST">
<label for="email">UserName</label>
<input type="text" id="username" name="username" placeholder="Your UserName" required>
<label for="password">Password</label>
<input type="password" id="password" name="password" placeholder="Password.." required>
<input type="submit" name="login" value="Login">
</form>
</article>
<?php include('footer.php');?>