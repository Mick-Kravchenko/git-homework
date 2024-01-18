<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">

    <br>
    <br>



    <br>
    <br>


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

    <?php elseif(!empty($_POST['email'])) :
        $data = fopen("data.txt", "a+") or die("Couldn't read the file");
        fwrite($data, $_POST['email'] . '{}' . $_POST['password'] . PHP_EOL);
        fclose($data);
        ?>

        <div class="alert alert-success" role="alert">
            Ви вказали email <?= $_POST['email']; ?>
        </div>

    <?php endif; ?>







    <br>
    <br>

    <p class="fs-1"><span class="badge rounded-pill text-bg-light">Реєстрація в системі</span></p>

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



        <br>
        <br>

    </form>


</div>
</body>
