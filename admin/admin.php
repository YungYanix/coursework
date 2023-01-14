
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
  <h1 class="display-2">Журнал успеваемости</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-12">
      <button href class="btn btn-outline-success mt-2" data-bs-toggle="modal" data-bs-target="#create"
      ><i class="fa-solid fa-person-circle-plus"></i></button>
      <a href="/profile.php" class="btn btn-outline-primary mt-2" role="button"><i class="fa-solid fa-user"></i></a>
      <!-- <button href="/index.php" class="btn btn-outline-info mt-2" type="button"><i class="fa-solid fa-user"></i></button> -->

      <table class="table table-striped table-hover mt-2">
        <thead class="thead-dark">
            <th>№</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Действие</th>
        </thead>
        <tbody>
          <?php
              $mysql = new mysqli(
  '1193261-yungyanix.tw1.ru', 
  'root', 
  'VGJKva(asx7637)xnas', 
  'student_bd'
 );
           $q = "SELECT * FROM `users_1`";
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
            <td><?php echo $res['surname']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['patronymic']; ?></td>
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
                  <form action="edit.php" method="post">
                    <div class="form-group">
                      <small>Фамилия</small>
                      <input type="text" class="form-control" name="surname" value="<?php echo $res['surname']; ?>">
                    </div>
                    <div class="form-group">
                      <small>Имя</small>
                      <input type="text" class="form-control" name="name" value="<?php echo $res['name']; ?>">
                    </div>
                    <div class="form-group">
                      <small>Отчество</small>
                      <input type="text" class="form-control" name="patronymic" value="<?php echo $res['patronymic']; ?>">
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
                  <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?php echo $res['id']; ?></h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/admin/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
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
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить учащиегося</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> 
        </button>
      </div>
      <div class="modal-body">
        <form action="add.php" method="post">
          <div class="form-group">
            <small>Фамилия</small>
            <input type="text" class="form-control" name="surname">
          </div>
          <div class="form-group">
            <small>Имя</small>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <small>Отчество</small>
            <input type="text" class="form-control" name="patronymic">
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
</div>
</body>
</html>
