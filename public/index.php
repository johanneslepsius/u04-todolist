<?php 
include_once "db/connect.inc.php";
include_once "includes/handledelete.inc.php";
include_once "header.php";
?>

    <h1>pawesome todolist</h1>
    <?php
    if (!isset($_SESSION["useruid"])) {
    echo "<p>Welcome to the cat-related-todos-only-list, unknown being! Please sign up or log in, 
    it works but does absolutely nothing with this list except changing the menu and welcome message!</p>";
    }
    if (isset($_SESSION["useruid"])) {
    echo "<p>Welcome to the cat-related-todos-only-list, " . $_SESSION["useruid"] . "!</p>";
    }
?>
    <form method="POST" action="\includes\catvalidation.inc.php">
        <label for="title">Task Title:</label>
        <input name="title" type="text">
        <label for="tasktext">Enter your Task:</label>
        <textarea rows="4" cols="50" name="tasktext" type="text"></textarea>
        <input type="submit" name="createtask" value="Create Task">
    </form>
    <?php
    if (isset($_GET['cat'])){
        echo "<div class='sadcat'><img src='\img\sadcat.jpg' alt='very sad cat'/>
        <p>It seems you have created a task not involving a cat.</p><a href='index.php'>Make the cat happy</a></div>";
    }
    ?>
    <section>
    <h3>Tasks:</h3>
    <ul>
    <?php 
    if (isset($_POST['update'])) {
        include_once "includes/handleupdates.inc.php";
    }

     if (isset($_POST['delete'])) {
        delete($conn);
    }

    if (isset($_POST['completed'])) {
        include_once "includes/complete.inc.php";
        complete($conn);
    }

    include_once "includes/printtask.inc.php";
    echo printtask($conn, false);

    ?>
    </ul>
    
    </section>
    <section>
    <h3>Completed Tasks:</h3>
    <?php 
    if (isset($_POST['deleteAllComp'])) {
        deleteAllComp($conn);
    } 
    ?>
    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <input type="submit" name="deleteAllComp" value="Delete all completed Tasks">
    </form>
    <ul>
    <?php 
    if (isset($_POST['undo'])) {
        include_once "includes/complete.inc.php";
        complete($conn);
        header("Refresh:0");
    }
    
    include_once "includes/printcomptask.inc.php";
    
    echo printcomptask($conn, true);
    ?>
    </ul>
    </section>
<?php
include_once "footer.php";
?>