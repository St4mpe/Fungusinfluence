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
        <p><?= $row['id'] ?></p>
        <p><?= $row['user'] ?></p>
        <p><?= $row['mail'] ?></p>
        <p><?= $row['stad'] ?></p>
        <p><?= $row['road'] ?></p>
        <p><?= $row['postnummer'] ?></p>
        <section>
            <form class="logout-form" action="MyPage.php" method="POST">
                <input type="submit" value="Log out" name="logout"/>
            </form>
        </section>
    </section>
    <?php require_once("_footer.php");?>
</body>
</html>