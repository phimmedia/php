<?php 
session_start();

    $_SESSION["check"]="aaa";
?>
<?php
include("decode.php");
$link = $_GET['api'];
 $file = $link;
header('Location: '.openssl($file));

?>


