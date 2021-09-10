<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

</head>
<title>Assignment 1 - Shared Interest Day </title>
<?php include('header.php');?>
<div class="col-12">

<article>
 <?php
//code for editprofile
include('mysqlconnect.php');
$link = "SELECT DISTINCT game_name FROM  feedback ORDER BY game_name ASC";
$res = mysqli_query($conn, $link);
$total = mysqli_num_rows($res);
if($total=='0')
{
 echo 'No Record Found';   
}
    else
{       echo '<h1>'; 
        echo '<center>';    
        echo  'Game List';
        echo '</center>';
        echo '</h1>';
while ($row = mysqli_fetch_assoc($res))
{
$game = $row['game_name'];


echo '<tr>';
echo '<a href="feedbacks_view.php?name='.$game.'" title="Feedback"> <center>'. $game . '</center></a>';


echo '</tr>';

}
    
}
?>


</article>
<?php include('footer.php');?>