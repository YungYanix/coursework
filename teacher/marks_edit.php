<?php

$mysql = new mysqli(
  '1193261-yungyanix.tw1.ru', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'student_bd'
 );

$q_hw = "SELECT * FROM `homeworks`";
if (mysqli_query($mysql, $q_hw)) {
$res0 = mysqli_query($mysql, $q_hw);
$result_hw = mysqli_fetch_all($res0, MYSQLI_ASSOC);}
$id = $_POST['id'];
foreach ($result_hw as $res_hwe){
  $name = $res_hwe['name'];
  $mark = $_POST['$name'];
  $q = "UPDATE `users_1` SET {$name} = '$mark' WHERE `id` = '$id'";
  if (!mysqli_query($mysql, $q)) {
    echo "Error: ".$q."<br>".mysqli_error($mysql);
  } 
}

header('Location: /teacher/marks.php');
mysqli_close($mysql);
?>