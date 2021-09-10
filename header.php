<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
<h1>Gaming Problem</h1>
</header>
<div class="row">
<div class="navbar icon-bar">
<a href="index.php">Home</a>
<?php
if(!isset($_SESSION['email']))
{
echo '<a href="signup.php" title="Signup">Signup</a>';
echo '<a href="login.php" title="login">Login</a>';
}
else
{
echo '<a href="feedback.php" title="Feedback">Feedback</a>';
echo '<a href="game_list.php" title="game_list">Game List</a>';
//echo '<a href="finding-collaborators.php" title="Finding Collaborators">Finding Collaborators</a>';
//echo '<a href="messagelist.php" title="Message List">View Feedback</a>';
//echo '<a href="aggregate-data.php" title="Aggregate data">Screenshot</a>';
echo '<a href="logout.php" title="login">Logout</a>';
}
?>
</div>