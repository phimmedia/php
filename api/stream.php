<?php
include("decode.php");
$link = $_GET['api'];
$file = $link;
if(md5($_SESSION["check"])=="aaa"){
      

header('Location: '.openssl($file));
    }else{

    }
?>


