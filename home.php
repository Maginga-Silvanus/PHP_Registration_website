<?php
require 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Welcome to Home Page!</h2>
<p>This is protected content only visible to logged-in users.</p>
<a href="logout.php">Logout</a>
