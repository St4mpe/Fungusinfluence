<?php  
require_once("functions.php");

$loggedinUserId = $_SESSION['loggedInUserId'];
$sql = "SELECT * FROM userinfo WHERE id = '$loggedinUserId'";
$result = $conn->query($sql);
$row = $result -> fetch_assoc();

$userId = (int) $_SESSION['loggedInUserId'];
$sqlOrders = "SELECT * FROM completedorders WHERE userid = $userId ORDER BY orderid DESC";
$resultOrders = mysqli_query($conn, $sqlOrders);

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
            <h2 class="infotitle">Konto information</h2>
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
            <?php
                $currentOrderId = null;
                $orderCount = 0;

                $orderSum = 0;

                while($rowOrder = mysqli_fetch_assoc($resultOrders)):
                    if ($currentOrderId !== $rowOrder['orderid']):
                        if ($currentOrderId !== null) {?>
                        <section class="orderItem">
                            <p><strong>Summa: <?= $orderSum ?> kr</strong></p>
                        </section>
                        </section>
                        <?php
                    }
                    $orderSum = 0;
                    $orderCount++;
                    $currentOrderId = $rowOrder['orderid'];?>
                    <section class="orderDisplay">
                        <h3 class="orderShow">Order: <?= $orderCount ?></h3>
                    <?php endif; ?>
                        <section class="orderItem">
                        <p><?= $rowOrder['produktid'] ?></p>

                        <?php
                        $sqlprod = "SELECT * FROM produkter";
                        $resultprod = mysqli_query($conn, $sqlprod);

                        while($rowprod = mysqli_fetch_assoc($resultprod)):
                            if($rowprod['produktnamn'] == $rowOrder['produktid']):

                                $linePrice = $rowOrder['antal'] * $rowprod['pris'];
                                $orderSum += $linePrice;?>
                                <section class="prodantal">
                                    <p>Pris: <?= $linePrice ?> kr</p>
                                    <p>Antal: <?= $rowOrder['antal'] ?></p>
                                </section>
                                <?php
                            endif;
                        endwhile;
                        ?>
                    </section>
                <?php endwhile;
            if ($currentOrderId !== null) {
            ?>
                <section class="orderItem">
                    <p><strong>Summa: <?= $orderSum ?> kr</strong></p>
                </section>
                </section>
            <?php
            }
            ?>
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