<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);

  if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
    echo "Недопустимая длина логина";
    exit();
  }
  else if(mb_strlen($login) < 3 || mb_strlen($login) > 50){
    echo "Недопустимая длина имени";
    exit();
  }
  else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 8){
    echo "Недопустимая длина пароля";
    exit();
  }

  $pass = password_hash($pass, PASSWORD_BCRYPT);

  $mysql = new mysqli(
  '1193261-yungyanix.tw1.ru', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'register-bd'
 );
  $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`)
  VALUES('$login', '$pass', '$name')");

  $mysql->close();

  header('Location: /');
  exit();

?>
