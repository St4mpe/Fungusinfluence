<?php 
require_once("functions.php");
?>
<link rel="stylesheet" href="headerStyle.css">
<header style="position: relative;">
    <img src="https://www.pngmart.com/files/22/The-Last-Of-Us-Logo-PNG-Pic.png" alt="">

    <button class="hamburger" id="hamburgerBtn" aria-label="Öppna meny">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <section class="navbar" id="navbar">
        <nav>
            <a href="index.php">Hem</a>
            <a href="_utforskaLandingPage.php">Utforska världen</a>
            <a href="webbshop.php">Shoppa merch</a>
            <?php 
            if (isset($_SESSION['userLoggedIn'])) {
                if ($_SESSION['userLoggedIn'] == 1) { ?>
                    <a href="MyPage.php">Konto</a>
                    <a href="kundvagn.php">Kundvagn</a>
                <?php } else { ?>
                    <a href="Konto.php">Logga in</a>
                <?php }
            } else { ?>
                <a href="Konto.php">Logga in</a>    
            <?php } ?>
        </nav>
    </section>
</header>

<script>
    const btn = document.getElementById('hamburgerBtn');
    const nav = document.getElementById('navbar');

    btn.addEventListener('click', () => {
        btn.classList.toggle('open');
        nav.classList.toggle('open');
    });
</script>