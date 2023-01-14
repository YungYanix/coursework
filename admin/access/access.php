<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d7ea81c781.js" crossorigin="anonymous"></script>

    <title>Настройка доступа</title>
  </head>
  <body>
    <div class="container p-5 my-5 bg-dark text-white mt-2">
      <h1>Настройка доступа</h1>
    </div>
    <div class="container">
  <div class="row">
    <div class="col-12">
      <a href="/profile.php" class="btn btn-outline-primary mt-2" role="button"><i class="fa-solid fa-user"></i></a>
      <table class="table table-striped table-hover mt-2">
        <thead class="thead-dark">
            <th>№</th>
            <th>Логин</th>
            <th>Имя</th>
            <th>Доступ</th>
        </thead>
        <tbody>

          <?php

          new mysqli(
  '1193261-yungyanix.tw1.ru', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'register-bd'
 );
          $q = "SELECT * FROM `users`";
          if (mysqli_query($mysql, $q)) {
          $res0 = mysqli_query($mysql, $q);
          $result = mysqli_fetch_all($res0, MYSQLI_ASSOC);
          } 
          else {
            echo "Error: ".$q."<br>".mysqli_error($mysql);
          }
          ?>
          <?php foreach ($result as $res): ?>
          <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['login']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td>
              <a href="id=<?php echo $res['id']; ?>" class="btn btn<?php if($res['access'] == 1){echo "-primary";} else {echo "-secondary";}?>" data-bs-toggle="modal" data-bs-target="#edit<?php echo $res['id']; ?>">Ученик</a>
              <a href="" class="btn btn<?php if($res['access'] == 2){echo "-primary";} else {echo "-secondary";}?>" data-bs-toggle="modal" data-bs-target="#add<?php echo $res['id']; ?>">Преподаватель</a>
              
            </td>
          </tr>
          <!-- Modal student -->
          <div class="modal fade" id="edit<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ввведите id для привязки аккаунта</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/admin/access/student.php" method="post">
                    <div class="form-group">
                      <small>id</small>
                      <input type="text" class="form-control" name="student_id">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                  </button>
                  <button type="submit" class="btn btn-primary" name="Edit">Привязать</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal student -->
          <!-- Modal teacher -->
          <div class="modal fade" id="add<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Присвоить <?php echo $res['login'];?> права преподователя?</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/admin/access/teacher.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                  </button>
                  <button type="submit" class="btn btn-primary" name="add">Присвоить</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal teacher -->
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>











    <!-- Дополнительный JavaScript; выберите один из двух! -->

    <!-- Вариант 1: Bootstrap в связке с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Вариант 2: Bootstrap JS отдельно от Popper
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>