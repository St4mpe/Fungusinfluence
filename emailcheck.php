<?php
require_once("functions.php");
$crp = new Crypt();

if (!isset($_POST['email'])) {
    echo "error";
    exit();
}

$inputMail = $_POST['email'];
$sql    = "SELECT mail FROM userinfo";
$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
    if ($crp->dec($row['mail']) === $inputMail) {
        echo "taken";
        exit();
    }
}

echo "available";