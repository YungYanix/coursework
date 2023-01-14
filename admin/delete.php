<?php

$mysql = new mysqli(
  '1193261-yungyanix.tw1.ru', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'student_bd'
 );

$id = $_POST['id'];

$q = "DELETE FROM `users_1` WHERE `id` = '$id'";
if (mysqli_query($mysql, $q)) 
{
  header('Location: /admin/admin.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /admin/admin.php');
}
mysqli_close($mysql);
?>