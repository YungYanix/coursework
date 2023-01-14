<?php

$mysql = new mysqli(
  'localhost', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'register-bd'
 );
$student_bd = new mysqli('localhost', 'root', 'root', 'student_bd');
$id = $_POST['id'];
$student_id = $_POST['student_id'];

$q = "UPDATE `users` SET `access` = 1 WHERE `id` = '$id'";
$student_q = "UPDATE `users_1` SET `flag` = '$id' WHERE `id` = '$student_id'";
if (mysqli_query($mysql, $q) & mysqli_query($student_bd, $student_q)) 
{
  header('Location: /admin/access/access.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   echo "Error: ".$q."<br>".mysqli_error($student_bd);
   header('Location: /admin/access/access.php');
}
mysqli_close($mysql);
?>