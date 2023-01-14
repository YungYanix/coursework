<?php

$mysql = new mysqli(
  'localhost', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'student_bd'
 );



$name = filter_var(trim($_POST['name']), 
 FILTER_SANITIZE_STRING);
$subject = filter_var(trim($_POST['subject']), 
 FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), 
 FILTER_SANITIZE_STRING);
$date = $_POST['deadline'];

$q = "INSERT INTO `homeworks` (`name`,`subject`,`deadline`, `description`) VALUES ('$name','$subject','$date', '$description')";
$q_us = "ALTER TABLE `users_1` ADD `$name` INT(11) NULL DEFAULT NULL";
if (mysqli_query($mysql, $q) & mysqli_query($mysql, $q_us)) {
  header('Location: /teacher/homeworks.php');
}
else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /teacher/homeworks.php');
}
mysqli_close($mysql);
?>
