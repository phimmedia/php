<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>vk stream</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="robots" content="noindex">
</head>
<body>
<center>
<form action="" method="POST" >
<fieldset>
<legend><h3>Encode</h3></legend>
Exemplo: oid=238502474&video_id=167198805&embed_hash=eb91601fc1663916<br><br>
ID:<input type="text" name="id">
<input type="submit" value="Submit">
<br>
<?php
error_reporting(0);
$id=$_POST["id"];
if ($id=='id'){
		echo 'ERROR';
			}
	else {
		echo '<br>'.base64_encode ($id);
}?>
</fieldset>
</form>
<br>
<form action="" method="POST" >
<fieldset>
<legend><h3>Decode</h3></legend>
ID:<input type="text" name="id2">
<input type="submit" value="Submit">
<br>
<?php
error_reporting(0);
$id2=$_POST["id2"];
if ($id=='id2'){
		echo 'ERROR';
			}
	else {
		echo '<br>'.base64_decode ($id2);
}?>
</fieldset>
</form>
</BODY>
</html>
