<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kontoStyle.css">
    <script src="konto.js" defer></script>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="Konto.php" method="POST">
                <input type="text" name="name" placeholder="Name"/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="email" name="email" placeholder="Email Address"/>
                <input type="stad" name="stad" placeholder="Stad"/>
                <input type="gata" name="gata" placeholder="Gata"/>
                <input type="postnummer" name="postnummer" placeholder="Postnummer"/>
                <input type="submit" value="Create Account"/>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="Konto.php" method="POST">
                <input type="text" name="username" placeholder="Username"/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="submit" value="Login"/>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>
</body>
</html>