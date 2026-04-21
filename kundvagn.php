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
                while($row=mysqli_fetch_assoc($result)):
                if ($row['produktantal'] != 0)
                {?>
                    <section class="cartDisplay">
                        <p><?= $row['produktid']?></p>
                        <p><?= $row['produktantal']?></p>
                    </section>
                <?php 
                } 
                endwhile
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