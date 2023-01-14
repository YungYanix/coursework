<?php

$mysql = new mysqli(
  '1193261-yungyanix.tw1.ru', 
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
$id = $_POST['id'];
//$get_id = $_GET['id'];
//create


$q = "UPDATE `users_1` SET `surname` = '$surname', `name` = '$name', `patronymic` = '$patronymic' WHERE `id` = '$id'";
if (mysqli_query($mysql, $q)) 
{
  header('Location: /admin/admin.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /admin/admin.php');
}
mysqli_close($mysql);
?>