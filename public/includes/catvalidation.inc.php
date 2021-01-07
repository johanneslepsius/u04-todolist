<?php
var_dump($_POST);
$tasktext = $_POST["tasktext"];
$catcheck1 = stripos($tasktext, "cat");
// preg_match("/^[0-9]*$/", $catcheck1)
echo $tasktext;

if (!is_numeric($catcheck1)) {
    header("location: ../index.php?cat=sad");
} else {
    header("location: ../includes/handleinput.inc.php?title={$_POST['title']}&tasktext={$_POST['tasktext']}");
}
