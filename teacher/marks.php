<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/d7ea81c781.js" crossorigin="anonymous"></script>
    
    <title>Выставление оценок</title>
  </head>
  <body>
    <div class="container p-5 my-5 bg-dark text-white mt-2">
      <h1>Выставление оценок</h1>
    </div>

    <div class="container">
  <div class="row">
    <div class="col-12">
      <!-- <button href="/teacher/t_profile.php" class="btn btn-outline-primary mt-2" role="button"><i class="fa-solid fa-user"></i></button> -->
      <a href="/teacher/t_profile.php" class="btn btn-outline-primary mt-2" role="button"><i class="fa-solid fa-user"></i></a>
      <table class="table table-striped table-hover mt-2">
        <thead class="thead-dark">
          <th>№</th>
          <th>Фамилия</th>
          <th>Имя</th>
          <th>Отчество</th>

          <?php

          $mysql = new mysqli(
            'localhost', 
            'root', 
            'VGJKva(asx7637)xnas', 
            'student_bd'
           );
          $q_hw = "SELECT * FROM `homeworks`";
          if (mysqli_query($mysql, $q_hw)) {
          $res0 = mysqli_query($mysql, $q_hw);
          $result_hw = mysqli_fetch_all($res0, MYSQLI_ASSOC);
          } 
          else {
            echo "Error: ".$q_hw."<br>".mysqli_error($mysql);
          }
          ?>
          <?php foreach ($result_hw as $res): ?>
          <th><?php echo $res['name']?></th>
          <?php endforeach;?>
          <th>Действие</th>
        </thead>
        <tbody>
          <?php
            $q_users = "SELECT * FROM `users_1`";      
            if (mysqli_query($mysql, $q_users)) {
              $res0 = mysqli_query($mysql, $q_users);
              $result_users= mysqli_fetch_all($res0, MYSQLI_ASSOC);
            } 
          ?>
          <?php foreach ($result_users as $res): ?>
          <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['surname']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['patronymic']; ?></td>
            <?php foreach ($result_hw as $res_hw): ?>
            <td><?php echo $res[$res_hw['name']];?></td>
            <?php endforeach;?>
            <td><a href="id=<?php echo $res['id']; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $res['id']; ?>"><i class="fa fa-edit"></i></a></td>
          </tr>
          <!-- Modal edit -->
          <div class="modal fade" id="edit<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Изменить учащиегося</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/teacher/marks_edit.php" method="post">
                    <?php foreach ($result_hw as $res_hwe): ?>

                    <div class="form-group">
                      <small><?php echo $res_hwe['name']; ?></small>
                      <input type="text" class="form-control" name="<?php echo $res_hwe['name']; ?>" value="<?php echo $res[$res_hwe['name']];?>">
                      
                    </div>
                    <?php endforeach;?>
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                  </button>
                  <button type="submit" class="btn btn-primary" name="Edit">Изменить</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>








    <!-- Необязательный JavaScript; выберите один из двух! -->

    <!-- Вариант 1: пакет Bootstrap с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Вариант 2: отдельные JS для Popper и Bootstrap -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
