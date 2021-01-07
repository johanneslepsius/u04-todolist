<?php 
include_once "../header.php";
?>
<section>
<h2>Sign Up</h2>
<form action="\logincludes\signup.inc.php" method="POST">
<input type="text" name="name" placeholder="Full name...">
<input type="text" name="email" placeholder="Email...">
<input type="text" name="uid" placeholder="Username...">
<input type="password" name="pwd" placeholder="Password...">
<input type="password" name="pwdrepeat" placeholder="Repeat Password...">
<button type="submit" name="submit">Submit</button>
</form>
<?php 
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET['error'] == "invaliduid") {
        echo "<p>Choose a proper username! (a-z, A-Z, 0-9)</p>";
    }
    else if ($_GET['error'] == "invalidemail") {
        echo "<p>Check your email!</p>";
    }
    else if ($_GET['error'] == "pwdnomatch") {
        echo "<p>Your passwords do not match. Try again!</p>";
    }
    else if ($_GET['error'] == "usernametaken") {
        echo "<p>That username is already taken!</p>";
    }
    else if ($_GET['error'] == "none") {
        echo "<p>You have signed up successfully!</p>";
    }
}
?>
</section>

<?php
include_once "../footer.php";
?>