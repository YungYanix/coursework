<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/d7ea81c781.js" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/a49dddca4c.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container p-5 my-5 bg-dark text-white">
  <h1 class="display-2">Домашние задания</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-12">
      <button href class="btn btn-outline-success mt-2" data-bs-toggle="modal" data-bs-target="#create"
      ><i class="fa-solid fa-plus"></i></button>
      <a href="/teacher/t_profile.php" class="btn btn-outline-primary mt-2" role="button"><i class="fa-solid fa-user"></i></a>
      <!-- <button href="/index.php" class="btn btn-outline-info mt-2" type="button"><i class="fa-solid fa-user"></i></button> -->

      <table class="table table-striped table-hover mt-2">
        <thead class="thead-dark">
            <th>№</th>
            <th>Название</th>
            <th>Предмет</th>
            <th>Срок выполнения</th>
            <th>Описание</th>
            <th>Действие</th>
        </thead>
        <tbody>
          <?php
              $mysql = new mysqli(
            'localhost', 
            'root', 
            'root', 
            'student_bd'
           );
           $q = "SELECT * FROM `homeworks`";
           if (mysqli_query($mysql, $q)) {
            $res0 = mysqli_query($mysql, $q);
            $result = mysqli_fetch_all($res0, MYSQLI_ASSOC);
           } else {
               echo "Error: ".$q."<br>".mysqli_error($mysql);
           }
          ?>
          <?php foreach ($result as $res): ?>
          <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['subject']; ?></td> 
            <td><?php echo $res['deadline']; ?></td>
            <td><?php echo $res['description']; ?></td>
            <td>
              <a href="id=<?php echo $res['id']; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $res['id']; ?>"><i class="fa fa-edit"></i></a>
              <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
            </td>
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
                  <form action="/teacher/edit_hw.php" method="post">
                    <div class="form-group">
                      <small>Название</small>
                      <input type="text" class="form-control" name="name" value="<?php echo $res['name']; ?>">
                    </div>
                    <div class="form-group">
                      <small>Предмет</small>
                      <input type="text" class="form-control" name="subject" value="<?php echo $res['subject']; ?>">
                    </div>
                    <div class="form-group">
                      <small>Срок выполнения </small>
                      <input type="text" class="form-control" name="deadline" value="<?php echo $res['deadline']; ?>">
                    </div>
                    <div class="form-group">
                      <small>Описание </small>
                      <input type="text" class="form-control" name="description" value="<?php echo $res['description']; ?>">
                    </div>
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
          <!-- Modal edit -->
          <!-- Modal delete -->
          <div class="modal fade" id="delete<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Удалить задание № <?php echo $res['id']; ?></h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/teacher/delete_hw.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                    <input type="hidden" name="name" value="<?php echo $res['name'];?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                  </button>
                  <button type="submit" class="btn btn-danger" name="add">Удалить</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal delete -->
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- new task -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить задание</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> 
        </button>
      </div>
      <div class="modal-body">
        <form action="/teacher/new_task.php" method="post">
          <div class="form-group">
            <small>Название</small>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <small>Дисциплина</small>
            <input type="text" class="form-control" name="subject">
          </div>
          <div class="form-group">
            <small>Срок выполнения</small>
            <input type="text" class="form-control" name="deadline">
          </div>
          <div class="form-group">
            <small>Описание</small>
            <input type="text" class="form-control" name="description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
        </button>
        <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
        </form>
    </div>
  </div>
</div>
    <!-- end new task -->
</body>
</html>