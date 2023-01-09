<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/d7ea81c781.js" crossorigin="anonymous"></script>

    <title>Личный кабинет преподователя</title>
  </head>
  <body>
    <div class="container p-5 my-5 bg-dark text-white mt-2">
      <h1>Личный кабинет преподователя</h1>
      <display-4>Здравствуйте, <?php echo $_COOKIE['user'] ?>.</display-4>
    </div>
    <div class = "container overflow-hidden mt-3">
      <p><a href="admin/admin.php" class="btn btn-primary btn-lg btn-block mt-2" role="button">Новое задание</a></p>
      <p><a href="admin/access/access.php" class="btn btn-primary btn-lg btn-block mt-2" role="buttion">Настройка доступа</a></p> 
      <a href="/exit.php" class="btn btn-danger btn-lg btn-block mt-2" role="button">Выход</a>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>