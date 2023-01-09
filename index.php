 <!DOCTYPE html>
 <!DOCTYPE html>
 <html lang="ru" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Форма регистрации</title>
     <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="/css/style.css">
   </head>
   <body>
     <div class="container mt-4">
       <?php
         if($_COOKIE['user'] == ''):
       ?>
       <div class="row">
         <div class="col">
           <h1>Форма регистрации</h1>
           <form action="autorization/check.php" method="post">
             <input type="text" class="form-control" name="login"
             id="login" placeholder="Введите логин"><br></br>
             <input type="text" class="form-control" name="name"
             id="name" placeholder="имя"><br></br>
             <input type="password" class="form-control" name="pass"
             id="pass" placeholder="Введите пароль"><br></br>
             <button class="btn btn-success"
             type = "submit">Зарегистрировать</button>
           </form>
         </div>
         <div class="col">
           <h1>Форма авторизации</h1>
           <form action="autorization/auth.php" method="post">
             <input type="text" class="form-control" name="login"
             id="login" placeholder="Введите логин"><br></br>
             <input type="password" class="form-control" name="pass"
             id="pass" placeholder="Введите пароль"><br></br>
             <button class="btn btn-success"
             type = "submit">Войти</button>
           </form>
         </div>
       <?php else: ?>
        
         <p>Здравствуйте, <?=$_COOKIE['user']?>. Вы авторизованы. Для перехода в интерфейс админимстратора нажмите
         <a href="/admin/admin.php"> здесь</a></p>
       <?php endif;?>
       </div>
     </div>
   </body>
 </html>
