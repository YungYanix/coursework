<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);
  $register_bd = new mysqli(
  '1193261-yungyanix.tw1.ru', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'register-bd'
 );
  $student_bd = new mysqli(
  '1193261-yungyanix.tw1.ru', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'student_bd'
 );
  $result_register_bd = $register_bd->query("SELECT * FROM `users` WHERE `login` =
  '$login'");

  $user = $result_register_bd->fetch_assoc();
  if(count($user) == 0) {
    echo "Пользователь не зарегестрирован";
    exit();
  }
  $hash = $user['pass'];
  if (!password_verify($pass, $hash)) {
    echo "Неверный пароль";
    exit();
  }

  $auth_id = $user['id'];
  $result_student_bd = $student_bd->query("SELECT * FROM `users_1` WHERE `flag` = '$auth_id'");

  $auth_user = $result_student_bd->fetch_assoc();
  if (count($auth_user) == 0) {
    echo "Нет доступа";
    exit();
  }
  

  setcookie('user', $user['name'], time() + 3600, "/");

  $register_bd->close();
  $student_bd->close();
  if ($user['access'] == 2){
    header('Location: /teacher/t_profile.php');
  }
  if ($user['access'] == 3){
    header('Location: /profile.php');
  }
  //header('Location: /admin/admin.php');

?>
