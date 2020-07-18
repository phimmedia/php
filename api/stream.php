<?php

if(md5($_SESSION["check"])=="aaa"){
       echo $data;
    }else{

    }
?>


<?php 
include("decode.php");
$link = $_GET['api'];
$file = $link;
header('Location: '.openssl($file));

?>


