<?php

$mysql = new mysqli(
  'localhost', 
  'root', 
  'root', 
  'register-bd'
 );
$id = $_POST['id'];


$q = "UPDATE `users` SET `access` = 2 WHERE `id` = '$id'";
if (mysqli_query($mysql, $q)) 
{
  header('Location: /admin/access/access.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /admin/access/access.php');
}
mysqli_close($mysql);
?>