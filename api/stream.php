
<?php 	if (stristr($_SERVER['HTTP_REFERER'],"dalatplay.xyz") || stristr($_SERVER['HTTP_REFERER'],"dalatplay.blogspot.com")||
stristr($_SERVER['HTTP_REFERER']," ")||
 stristr($_SERVER['HTTP_REFERER'],"embedapi.herokuapp.com/vast15s")|| stristr($_SERVER['HTTP_REFERER'],"your otherdomain add here")) { ;?>



<?php 
include("decode.php");
$link = $_GET['api'];
$file = $link;
header('Location: '.openssl($file));

?>


<?php
}
else echo 'Opps sorry!  For more info contact us ';
?>	
