<?php
require_once("functions.php");

$crp = new Crypt();

if (isset($_POST['create'])) {
    $encuser       = $crp->enc($_POST['name']);
    $userpassword  = md5($_POST['password']);
    $encmail       = $crp->enc($_POST['email']);
    $encstad       = $crp->enc($_POST['stad']);
    $encgata       = $crp->enc($_POST['gata']);
    $encpostnummer = $crp->enc($_POST['postnummer']);

    $sql = "INSERT INTO userinfo(user, pass, mail, stad, road, postnummer)
            VALUES ('$encuser','$userpassword','$encmail','$encstad','$encgata','$encpostnummer')";
    mysqli_query($conn, $sql);
}

if (isset($_POST['login'])) {
    $usermail     = $_POST['mail'];
    $userpassword = md5($_POST['password']);

    $sql    = "SELECT id, mail, pass FROM userinfo WHERE pass = '$userpassword'";
    $result = mysqli_query($conn, $sql);

    while ($row = $result->fetch_assoc()) {
        if ($crp->dec($row['mail']) === $usermail) {
            $_SESSION['loggedInUserId'] = $row['id'];
            $_SESSION['userLoggedIn']   = true;
            header("Location: MyPage.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto</title>
    <link rel="stylesheet" href="kontoStyle.css">
    <script src="konto.js" defer></script>
</head>
<body>
    <section class="login-page">
        <section class="form">
            <form class="register-form" action="Konto.php" method="POST">
                <input id="Name" type="text" name="name" placeholder="Namn" required maxlength="20" pattern="[a-zA-ZåäöÅÄÖ]{1,20}">
                <input type="password" name="password" placeholder="Lösenord" required maxlength="32" pattern="[a-zA-ZåäöÅÄÖ0-9]{6,32}">
                <input type="email" name="email" placeholder="Mail Adress" required maxlength="100">
                <input type="text" name="stad" placeholder="Stad" required maxlength="20" pattern="[a-zA-ZåäöÅÄÖ]{1,20}">
                <input type="text" name="gata" placeholder="Gata" required maxlength="20" pattern="[a-zA-ZåäöÅÄÖ0-9 ]{1,20}">
                <input type="text" name="postnummer" placeholder="Postnummer" required maxlength="5" pattern="[0-9]{5}">
                <input type="submit" value="Create Account" name="create">
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="Konto.php" method="POST">
                <input type="email" name="mail" placeholder="Email" required maxlength="100">
                <input type="password" name="password" placeholder="Password" required maxlength="32" pattern="[a-zA-ZåäöÅÄÖ0-9]{6,32}">
                <input type="submit" value="Login" name="login">
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </section>
    </section>
</body>
</html>