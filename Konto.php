<?php
session_start();

$host="localhost";
$user="root";
$pass="";
$db="fungus";
$conn=mysqli_connect($host, $user, $pass, $db);

if(isset($_POST['create']))
{
    $username=$_POST['name'];
    $userpassword=$_POST['password'];
    $useremail=$_POST['email'];
    $userstad=$_POST['stad'];
    $usergata=$_POST['gata'];
    $userpostnummer=$_POST['postnummer'];

    $sql="INSERT INTO userinfo(user, pass, mail, stad, road, postnummer) VALUES ('$username','$userpassword', '$useremail', '$userstad', '$usergata', '$userpostnummer')";
    $result=mysqli_query($conn,$sql);
}

if (isset($_POST['login']))
{
    $username = $_POST['username'];
    $userpassword = $_POST['password'];

    $sql = "SELECT id, user, pass FROM userinfo WHERE user = '$username' AND pass = '$userpassword'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row)
    {
        $_SESSION['loggedInUserId'] = $row["id"];
        header("Location: MyPage.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kontoStyle.css">
    <script src="konto.js" defer></script>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="Konto.php" method="POST">
                <input type="text" name="name" placeholder="Namn"/>
                <input type="password" name="password" placeholder="Lösenord"/>
                <input type="email" name="email" placeholder="Mail Adress"/>
                <input type="stad" name="stad" placeholder="Stad"/>
                <input type="gata" name="gata" placeholder="Gata"/>
                <input type="postnummer" name="postnummer" placeholder="Postnummer"/>
                <input type="submit" value="Create Account" name="create">
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="Konto.php" method="POST">
                <input type="text" name="username" placeholder="Username"/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="submit" value="Login" name="login"/>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>
</body>
</html>