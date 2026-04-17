<?php 
require_once("functions.php");

$sql="SELECT * FROM orderinfo";
$result=mysqli_query($conn,$sql);
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
    <?php 
        while($row=mysqli_fetch_assoc($result)):
        if ($row['produktantal'] != 0)
        {?>
            <p class="cartDisplay"><?= $row['produktid']?> <?= $row['produktantal']?></p>
        <?php 
        } 
        endwhile
    ?>
    </section>
    <?php require_once("_footer.php");?>
</body>
</html>