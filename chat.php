<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('db.php');

$pdo = getPDO();

// Add new
if (!empty($_POST['message'])) {
    addNewMessage($pdo, htmlspecialchars($_SESSION['user_name']), htmlspecialchars($_POST['message']));
}


if (!empty($_GET['delete_message'])) {
    deleteMessage($pdo, $_GET['delete_message']);
}

$messages=getAllMessages($pdo);

$pdo = null;

if (isset($_GET['entered'])&&(!$_GET['entered'])) {
    $_SESSION['entered']=false;
    $_SESSION['user_admin']=false;
}

?>
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">

    <?php if(isset($_SESSION['entered'])&&$_SESSION['entered']==true) {?>
        <a href="?entered=<?= false ?>"><button type="button" class="btn btn-danger">Exit</button></a>

    <?php } else {?>
        <a href="./index.php"><p class="text-end"><button type="button" class="btn btn-primary btn-lg">
                    Enter</button></a>
        </p>
    <?php }?>
    <br>
    <br>


    <div class="card">
        <div class="card-header">
            Chat
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($messages as $message) : ?>
                <li class="list-group-item">
                    <strong><?= $message['name'] ?></strong> at
                    <?= $message['date'] ?> :
                    <i><?= $message['message'] ?></i>
                    <?php
                    if ($_SESSION['user_admin']==true) {
                    ?>
                    <a href="?delete_message=<?= $message['id'] ?>">X</a>
                    <?php
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <br>
    <br>





    <br>
    <br>








    <br>
    <br>

<!--    <p class="fs-1"><span class="badge rounded-pill text-bg-light">Messages</span></p>-->

    <br>
    <br>




            <?php if(isset($_SESSION['entered'])&&$_SESSION['entered']==true) {?>

    <form method="post">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Message</label>

            <input type="text"
                   class="form-control"
                   name = "message"
            >

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
        <br>
        <br>
        <br>

    </form>

            <?php } ?>







</div>
</body>
