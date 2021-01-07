<?php 
include_once "../header.php";
?>
<section>
<h2>Log in</h2>
<form action="\logincludes\login.inc.php" method="POST">
<input type="text" name="uid" placeholder="Username/Email...">
<input type="password" name="pwd" placeholder="Password...">
<button type="submit" name="submit">Log in</button>
</form>
<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET['error'] == "wronglogin") {
        echo "<p>Check username or password!</p>";
    }
}
?>
</section>
<?php
include_once "../footer.php";
?>