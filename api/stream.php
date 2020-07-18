<?php
if(md5($_SESSION["check"])=="aaa"){
      include("decode.php");
$link = $_GET['api'];
$file = $link;
header('Location: '.openssl($file));
    }else{

    }
?>


