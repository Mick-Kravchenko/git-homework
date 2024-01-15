<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Аутентифікація</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">

    <br>
    <br>



    <br>
    <br>

    <!-- Перевірка, чи аутентифіковано користувача -->

    <?php
    if (isset($_SESSION)&&empty($_SESSION)){$_SESSION['is_registered']=false;
        setcookie('user1', 'user1@gmail.com{}user1');
        setcookie('user2', 'user2@gmail.com{}user2');
        setcookie('user3', 'user3@gmail.com{}user3');
        setcookie('user4', 'user4@gmail.com{}user4');
        setcookie('user5', 'user5@gmail.com{}user5');

    }
    //var_dump($_SESSION);
    //var_dump($_COOKIE['user2']);
    ?>

    <?php
    if ($_SESSION['is_registered']===false):
        ?>

        <p class="fs-1"><span class="badge rounded-pill text-bg-light">Аутентифікація в системі</span></p>


    <?php endif; ?>




    <!-- Ввід даних у форму -->

    <?php if(!isset($_POST['email'])) : ?>
    <?php elseif(isset($_POST['email'])&&empty($_POST['email'])) : ?>

        <div class="alert alert-danger" role="alert">
            Ви не вказали email
        </div>
    <?php elseif(isset($_POST['password'])&&empty($_POST['password'])) : ?>

        <div class="alert alert-danger" role="alert">
            Ви не вказали password
        </div>

        <!-- Перевірка пошти та пароля -->

    <?php elseif(!empty($_POST['email'])&&!empty($_POST['password'])) :
        for ($i=0; $i<5; $i++) $users[] = explode('{}', $_COOKIE['user' . ($i+1)]);
        $counter=false;
        for ($i=0; $i<5; $i++) {
           if($users[$i][0]===$_POST['email']&&$users[$i][1]===$_POST['password'])  {
               $_SESSION['is_registered']=true;
               ?>



               <?php
           }
        }
        if ($_SESSION['is_registered']===false){
            ?>

            <div class="alert alert-danger" role="alert">
                Невірна пошта чи пароль
            </div>

                <?php
        }
      else {

        ?>
            <div class="alert alert-success" role="alert">
                Ви увійшли за email <?= $_POST['email']; ?>
            </div>
<?php }?>

    <?php endif; ?>



    <?php
    if ($_SESSION['is_registered']===true):
        ?>

    <span class="badge rounded-pill text-bg-success">Вас успішно аутентифіковано</span>

    <?php
    else:
        ?>



    <br>
    <br>
    <form method="post">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email"
                   class="form-control"
                   name = "email"
            >

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password"
                   class="form-control"
                   name = "password"
            >

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



    <?php endif; ?>

</div>
</body>
</html>
<?php

//session_destroy();

?>

