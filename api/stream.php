<?php

if(md5($_SESSION["check"])=="aaa"){
       echo $data;
    }else{
echo "Error: File Does not exists";
    }
?>


<?php 
include("decode.php");
$link = $_GET['api'];
$file = $link;
header('Location: '.openssl($file));

?>


