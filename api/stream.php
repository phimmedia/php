

<?php 
include("decode.php");
$link = $_GET['api'];
$file = $link;
header('Location: '.openssl($file));

?>

