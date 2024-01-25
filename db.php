<?php
function getConnection()
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
}