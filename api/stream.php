<?php
	if (stristr($_SERVER['HTTP_REFERER'],"dalatplay.xyz") || 
    stristr($_SERVER['HTTP_REFERER'],"dalatplay.blogspot.com")||
    stristr($_SERVER['HTTP_REFERER'],"dl.dropboxusercontent.com")|| 
    stristr($_SERVER['HTTP_REFERER'],"your otherdomain add here")) {   
;?>

<?php 
include("decode.php");
$link = $_GET['api'];
$file = $link;
header('Location: '.openssl($file));

?>


<?php
}
else echo 'Opps sorry!thanks. For more info contact us ';
?>	
