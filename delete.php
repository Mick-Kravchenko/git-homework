<!DOCTYPE html>
<html lang="en">
<?php
session_start()
?>
<head>
    <meta charset="UTF-8">
    <title>Видалення користувача</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">

    <br>
    <br>

    <?php
    $data=fopen('data.txt', 'r') or die("Couldn't read the file");
    while (!feof($data)) {
        $users[] = explode('{}', trim(fgets($data)));
    }
    fclose($data);
    ?>

    <br>
    <br>


    <!-- Ввід даних у форму -->

    <?php if(!isset($_POST['email_del'])) : ?>
    <?php elseif(isset($_POST['email_del'])&&empty($_POST['email_del'])) : ?>

        <div class="alert alert-danger" role="alert">
            Ви не вказали email
        </div>
    <?php elseif(isset($_POST['password_del'])&&empty($_POST['password_del'])) : ?>

        <div class="alert alert-danger" role="alert">
            Ви не вказали password
        </div>

    <?php elseif(!empty($_POST['email_del'])&&!empty($_POST['password_del'])) :
        for ($i=0; $i<(count($users)-1); $i++){
            if($users[$i][0]==$_POST['email_del']&&$users[$i][1]===$_POST['password_del']){
                var_dump($users);
                var_dump('------AFTER-----');
                array_splice($users, $i, 1);
                var_dump($users);
                $data=fopen('data.txt', 'w') or die("Couldn't read the file");
                for ($j=0; $j<(count($users)-1); $j++){
                    fwrite($data, $users[$j][0] . '{}' . $users[$j][1] . PHP_EOL);
                }
                fclose($data);
                ?>
                <div class="alert alert-success" role="alert">
                    Користувача видалено
                </div>
                <?php
                $_SESSION['find']=true;
                break;
            }
            else {
                $_SESSION['find']=false;
            }
        }
        ?>


    <?php endif; ?>

    <?php if(isset($_SESSION['find'])&&!$_SESSION['find']) :?>
        <div class="alert alert-danger" role="alert">
            Користувача не знайдено
        </div>
    <?php endif; ?>

    <br>
    <br>

    <form method="post">

        <p class="fs-1"><span class="badge rounded-pill text-bg-light">Видалення користувачів</span></p>

        <br>
        <br>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email"
                   class="form-control"
                   name = "email_del"
            >

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password"
                   class="form-control"
                   name = "password_del"
            >

        </div>
        <button type="submit" class="btn btn-primary">Delete</button>

        <br>
        <br>

    </form>


</div>
</body>

