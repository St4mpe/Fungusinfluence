<?php 
session_start();

?>
<link rel="stylesheet" href="headerStyle.css">
<header>
    <img src="https://www.pngmart.com/files/22/The-Last-Of-Us-Logo-PNG-Pic.png" alt="">
    <nav>
        <a href="index.php">Hem</a>
        <a href="_utforskaLandingPage.php">Utforska världen</a>
        <a href="#">Shoppa merch</a>
        <?php 
        if ($_SESSION['userLoggedIn'] == 1)
        {?>
            <a href="MyPage.php">Konto</a>
        <?php  
        } 
        else
        {?>
            <a href="Konto.php">Logga in</a>
        
            <?php
        }?>

    </nav>
</header>