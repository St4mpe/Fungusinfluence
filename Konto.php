<?php
require_once("functions.php");

if(isset($_POST['create']))
{
    $crp=new Crypt();

    $username=$_POST['name'];
    $encuser=$crp->enc($username);

    $userpassword=md5($_POST['password']);

    $useremail=$_POST['email'];
    $encmail=$crp->enc($useremail);

    $userstad=$_POST['stad'];
    $encstad=$crp->enc($userstad);

    $usergata=$_POST['gata'];
    $encgata=$crp->enc($usergata);

    $userpostnummer=$_POST['postnummer'];
    $encpostnummer=$crp->enc($userpostnummer);

    $sql="INSERT INTO userinfo(user, pass, mail, stad, road, postnummer) VALUES ('$encuser','$userpassword', '$encmail', '$encstad', '$encgata', '$encpostnummer')";
    $result=mysqli_query($conn,$sql);
}

if (isset($_POST['login']))
{
    $usermail = $_POST['mail'];
    $userpassword = md5($_POST['password']);

    // Fetch all users and compare decrypted email
    $sql = "SELECT id, mail, pass FROM userinfo WHERE pass = '$userpassword'";
    $result = mysqli_query($conn, $sql);

    $loggedInRow = null;

    while ($row = $result->fetch_assoc()) {
        $decryptedMail = $crp->dec($row['mail']);
        if ($decryptedMail === $usermail) {
            $loggedInRow = $row;
            break;
        }
    }

    if ($loggedInRow) {
        $_SESSION['loggedInUserId'] = $loggedInRow["id"];
        $_SESSION['userLoggedIn'] = true;
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
    <section class="login-page">
        <section class="form">
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
                <input type="text" name="mail" placeholder="Email"/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="submit" value="Login" name="login"/>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </section>
    </section>
</body>
</html>