<?php

$mysql = new mysqli(
  'localhost', 
  'root', 
  'root', 
  'student_bd'
 );

$name = filter_var(trim($_POST['name']), 
 FILTER_SANITIZE_STRING);
$subject = filter_var(trim($_POST['subject']), 
 FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), 
 FILTER_SANITIZE_STRING);
$deadline = $_POST['deadline'];
$id = $_POST['id'];



$q = "UPDATE `homeworks` SET `name` = '$name', `subject` = '$subject', `deadline` = '$deadline', `description` = '$description' WHERE `id` = '$id'";
if (mysqli_query($mysql, $q)) 
{
  header('Location: /teacher/homeworks.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /teacher/homeworks.php');
}
mysqli_close($mysql);
?>