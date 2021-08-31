<?php
$tasktext = $_POST["tasktext"];
$catcheck1 = stripos($tasktext, "cat");
echo $tasktext;

if (!is_numeric($catcheck1)) {
    //this is triggered if you try to create a task not involving the cat
    header("location: ../index.php?cat=sad");
} else {
    header("location: ../includes/handleinput.inc.php?title={$_POST['title']}&tasktext={$_POST['tasktext']}");
}
