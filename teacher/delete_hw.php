<?php

$mysql = new mysqli(
  '1193261-yungyanix.tw1.ru', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'student_bd'
 );

$id = $_POST['id'];
$name = $_POST['name'];
$q = "DELETE FROM `homeworks` WHERE `id` = '$id'";
$q_us = "ALTER TABLE `users_1` DROP `$name`";
if (mysqli_query($mysql, $q) & mysqli_query($mysql,$q_us)) 
{
  header('Location: /teacher/homeworks.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /teacher/homeworks.php');
}

mysqli_close($mysql);
?>