<?php
session_start();
/* DECLARE VARIABLES */
$username = 'admin';
$password = 'admin';
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1 . $password . $random2);
$self = $_SERVER['REQUEST_URI'];
/* USER LOGOUT */
if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
}
/* USER IS LOGGED IN */
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
{
	logged_in_msg($username);
}
/* FORM HAS BEEN SUBMITTED */
else if (isset($_POST['submit']))
{
	if ($_POST['username'] == $username && $_POST['password'] == $password)
	{
		//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOGIN SESSION
		$_SESSION["login"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
	}
	else
	{
		// DISPLAY FORM WITH ERROR
		display_login_form();
		display_error_msg();
	}
}
/* SHOW THE LOGIN FORM */
else
{
	display_login_form();
}
/* TEMPLATES */
function display_login_form()
{
?>
<?php
include('function/function.php');

	if($_POST['text'] || $_POST['key']){
		$encrypted_txt = encrypt_decrypt('encrypt', $_POST['text'], $_POST['key']);
	}
?>

<form method="POST">
	<textarea name="text" rows="5" cols="30" placeholder="Write text here (for encryption)"><?= $_POST['text'] ?></textarea><br/>
	<input name="key" placeholder="key" type="text" value="<?= $_POST['key'] ?>" /><br/><br/>
	<button>Encrypt Text</button><br/>

	<textarea disabled name="text" rows="5" cols="30"><?= $encrypted_txt ?></textarea><br/>
</form>
