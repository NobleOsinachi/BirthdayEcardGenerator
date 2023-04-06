<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "icm";
$connect = mysqli_connect($servername, $username, $password, "$dbname");
if (!$connect) {

  // die('Could not Connect MySql Server:' . mysql_error());
  echo ('Could not Connect MySql Server:');
}