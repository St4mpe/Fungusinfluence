<?php 
require_once("functions.php");

$sql="SELECT * FROM orderinfo";
$result=mysqli_query($conn,$sql);

    if(isset($_POST['rensa']))
    {
        while($row=mysqli_fetch_assoc($result)):
            $sql="UPDATE orderinfo SET produktantal=0";
            mysqli_query($conn, $sql);
            header("Location: kundvagn.php");
        endwhile;  
    }

if(isset($_POST['placera']))
{
    $userId = (int) $_SESSION['loggedInUserId'];

    $sqlMax = "SELECT MAX(orderid) AS max_id FROM completedorders";
    $resultMax = mysqli_query($conn, $sqlMax);
    $rowMax = mysqli_fetch_assoc($resultMax);

    $orderId = $rowMax['max_id'] + 1;
    if (!$orderId) 
    {
        $orderId = 1;
    }

    $sqlInsert = "INSERT INTO completedorders (orderid, produktid, antal, userid) SELECT $orderId, produktid, produktantal, $userId FROM orderinfo WHERE produktantal > 0";

    mysqli_query($conn, $sqlInsert);

    $sqlClear = "UPDATE orderinfo SET produktantal = 0";
    mysqli_query($conn, $sqlClear);

    header("Location: MyPage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kundvagnStyle.css">
</head>
<body>
    <?php require_once("_header.php");?>
    <section class="main">
        <section class="mainHeader">
            <h1>Kundvagn</h1>
        </section>
        <section class="ordername">
            <h2>Order:</h2>
        </section>
        <section class="orderItems">
            <?php 
                $_SESSION['summa'] = 0;
                while($row=mysqli_fetch_assoc($result)):
                if ($row['produktantal'] != 0)
                {?>
                    <section class="cartDisplay">
                        <p><?= $row['produktid']?></p>
                        <section class="antalpris">
                            <p>Antal: <?= $row['produktantal']?></p>
                            <?php 
                            $sqlprod="SELECT * FROM produkter";
                            $resultprod=mysqli_query($conn,$sqlprod);
                            while($rowprod=mysqli_fetch_assoc($resultprod)):
                                if($rowprod['produktnamn'] == $row['produktid'])
                                {?>
                                    <p>Pris: <?=$row['produktantal'] * $rowprod['pris']?>kr</p>
                                <?php
                                     $_SESSION['summa'] += $row['produktantal'] * $rowprod['pris'];
                                }
                            endwhile
                            ?>
                            <?php
                            ?>
                        </section>
                    </section>
                <?php 
                }
                endwhile
                ?>
                <section class="cartDisplay">
                    <p>Total summa: <?=$_SESSION['summa']?>kr</p>
                </section>
                <?php
            ?>
        </section>
        <section class="orderKnappar">
            <section class="korgRensaOrderKnapp">
                <form class="rensaKorg" action="kundvagn.php" method="POST">
                    <input type="submit" value="Rensa Korgen" name="rensa"/>
                </form>
            </section>
            <section class="korgPlaceraOrderKnapp">
                <form class="placeraOrder" action="kundvagn.php" method="POST">
                    <input type="submit" value="Placera Order" name="placera"/>
                </form>
            </section>
        </section>
    </section>
    <?php require_once("_footer.php");?>
</body>
</html>