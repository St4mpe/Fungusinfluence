<?php  
require_once("functions.php");

$loggedinUserId = $_SESSION['loggedInUserId'];
$sql = "SELECT * FROM userinfo WHERE id = '$loggedinUserId'";
$result = $conn->query($sql);
$row = $result -> fetch_assoc();

if (isset($_POST['logout']))
{
    $_SESSION['userLoggedIn'] = false;
    header("Location: index.php");
    exit();
}
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
    <?php require_once("_header.php");?>
    <section class="main">
        <section class="textUppe">
            <h1>Hej, <?= $row['user'] ?></h1>
        </section>
        <section class="userinfo">
            <h2 class="infotitle">Account information</h2>
            <section class="infoStack">
                <section class="textinfo">
                    <h2>Namn:</h2>
                    <p><?= $row['user'] ?></p>
                </section>
                <section class="textinfo">
                    <h2>Mail:</h2>
                    <p><?= $row['mail'] ?></p>
                </section>
                <section class="textinfo">
                    <h2>Adress:</h2>
                    <p><?= $row['road'] ?></p>
                    <p><?= $row['stad'] ?>, <?= $row['postnummer'] ?></p>
                </section>
            </section>
        </section>
        <section class="orderinfo">
            <h2 class="infotitle">Ordrar</h2>
            <section class="orderstack">

            </section>
        </section>
        <section class="form">
            <form class="logout-form" action="MyPage.php" method="POST">
                <input type="submit" value="Log out" name="logout"/>
            </form>
        </section>
    </section>
    <?php require_once("_footer.php");?>
</body>
</html>