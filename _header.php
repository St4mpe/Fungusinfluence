<?php 
require_once("functions.php");
?>
<link rel="stylesheet" href="headerStyle.css">
<header>
    <img src="https://www.pngmart.com/files/22/The-Last-Of-Us-Logo-PNG-Pic.png" alt="">
    <section class="navbar">
        <nav>
            <a href="index.php">Hem</a>
            <a href="_utforskaLandingPage.php">Utforska världen</a>
            <a href="webbshop.php">Shoppa merch</a>
            <?php 
            
            if (isset($_SESSION['userLoggedIn']))
            {?>
                <?php 
                if ($_SESSION['userLoggedIn'] == 1)
                {?>
                    <a href="MyPage.php">Konto</a>
                    <a href="kundvagn.php">Kundvagn</a>
                <?php
                }
                else
                {?>
                    <a href="Konto.php">Logga in</a>
                    <?php
                }
                ?>
            <?php  
            } 
            else
            {?>
                <a href="Konto.php">Logga in</a>    
                <?php
            }
            ?>
        </nav>
        
    </section>
</header>