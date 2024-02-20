<?php

function getPDO(): PDO
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'mydb';

    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function getAllMessages(PDO $pdo): array
{
    $data = [];
    $sql = "SELECT * FROM messages";
    $queryRunner = $pdo->query($sql);
    $queryRunner->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $queryRunner->fetch()) {
        $data[] = $row;
    }

    return $data;
}

function getUsers(PDO $pdo): array
{
    $users = [];
    $sql = "SELECT * FROM users";
    $queryRunner = $pdo->query($sql);
    $queryRunner->setFetchMode(PDO::FETCH_ASSOC);

    while($row = $queryRunner->fetch()) {
        $users[] = $row;
    }

    return $users;
}

function addNewMessage(PDO $pdo, string $name, string $message)
{
    $sql = "INSERT INTO messages (name, message) VALUES (:name, :message)";

    $queryRunner = $pdo->prepare($sql);

    $params = compact('name', 'message');

    if (!$queryRunner->execute($params)) {
        echo 'Something went wrong';
    }
}

function deleteMessage($pdo, $id)
{
    $sql = "DELETE FROM messages WHERE id=:id";

    $queryRunner = $pdo->prepare($sql);

    if (!$queryRunner->execute(['id' => $id])) {
        echo 'Something went wrong';
    }
}

/*function getConnection()
{
    $host = 'localhost';
    $username = 'root';
    $password ='';
    $dbName = 'mydb';
    $connection = mysqli_connect($host, $username, $password, $dbName);

    if ($connection->connect_error) {
        die("Connection failed" . $connection->connect_error);
    }

return $connection;
}

function getUsers($connection): array
{
    $users = [];
    $sql = "SELECT * FROM users";
    $result = $connection->query($sql);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $users[] = $row;
    }

    return $users;
}

function getAllMessages($connection): array
{
    $data = [];
    $sql = "SELECT * FROM messages";
    $result = $connection->query($sql);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }

    return $data;
}

function addNewMessage($connection, $name, $message)
{
    $sql = "INSERT INTO messages (name, message) VALUES (\"$name\", \"$message\")";

    if (!mysqli_query($connection, $sql)) {
        echo 'Something went wrong';
    }
}

function deleteMessage($connection , $id)
{
    $sql = "DELETE FROM messages WHERE id=". $id;

    if (!mysqli_query($connection, $sql)) {
        echo 'Something went wrong';
    }
}*/