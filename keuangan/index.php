<?php
error_reporting(0);
session_start();
$username   = $_SESSION['nama'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];

    if(isset($_SESSION['nama']) && isset($_SESSION['level']))
    {
      header('Location: home.php');
    }
    else
    {
      //header('Location: index.php');
    }

?>

<form method="POST" action="session.php">
  <center>Monggo Login dengan bootstrap 
   
    <table class="table table-dark">
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="save"></td>
		</tr>
  </table>
  </center>
<form>