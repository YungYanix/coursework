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
      <!-- <button href class="btn btn-primary btn-lg btn-block mt-2" data-bs-toggle="modal" data-bs-target="#create">Новое задание</button> -->
      <p><a href="/teacher/homeworks.php" class="btn btn-primary btn-lg btn-block mt-2" role="buttion">Домашние задания</a></p> 
      <p><a href="/teacher/marks.php" class="btn btn-primary btn-lg btn-block mt-2" role="buttion">Выставление оценок</a></p> 
      <a href="/exit.php" class="btn btn-danger btn-lg btn-block mt-2" role="button">Выход</a>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- new task -->
    <!-- <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> -->
    <!-- end new task -->
  </div>
  </body>
</html>