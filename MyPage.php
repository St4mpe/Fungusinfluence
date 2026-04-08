<?php 
session_start();

$host="localhost";
$user="root";
$pass="";
$db="fungus";
$conn=mysqli_connect($host, $user, $pass, $db);

$loggedinUserId = $_SESSION['loggedInUserId'];
$sql = "SELECT * FROM userinfo WHERE id = '$loggedinUserId'";
$result = $conn->query($sql);
$row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleMyPage.css">
</head>
<body>
    <section>
        <p><?= $row['id'] ?></p>
        <p><?= $row['user'] ?></p>
        <p><?= $row['mail'] ?></p>
    </section>
</body>
</html>