<?php

$mysql = new mysqli(
  'localhost', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'student_bd'
 );
$surname = filter_var(trim($_POST['surname']), 
 FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), 
 FILTER_SANITIZE_STRING);
$patronymic = filter_var(trim($_POST['patronymic']), 
 FILTER_SANITIZE_STRING);


$q = "INSERT INTO `users_1` (`surname`,`name`,`patronymic`) VALUES ('$surname','$name','$patronymic')";
if (mysqli_query($mysql, $q)) {
  header('Location: /admin/admin.php');
}
else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /admin/admin.php');
}
mysqli_close($mysql);
?>
