<html>
	<head>
		<title>Updating Account</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body>
<?php


if(isset($_POST['account_id'])){
$account_id = $_POST['account_id'];
}
if(isset($_POST['first_name'])){
$first_name = $_POST['first_name'];
}
if(isset($_POST['last_name'])){
$last_name = $_POST['last_name'];
}
if(isset($_POST['email_address'])){
$email_address = $_POST['email_address'];
}
if(isset($_POST['gender'])){
$gender = $_POST['gender'];
}
if(isset($_POST['phone_number'])){
$phone = $_POST['phone_number'];
}
	if(isset($account_id)){
	require_once("connect.php");
	$query = "UPDATE `client_accounts` SET `first_name` ='$first_name', `last_name`='$last_name',`email`='$email_address',`gender`='$gender',`phone`='$phone' WHERE `account_id` = '$account_id'";
	$query = mysql_query($query);
	echo "<META http-equiv='refresh' content='0;URL=../projects.php?error=success&error_text=Your+account+has+been+successfully+updated.'>";
	// Create the email form that notifies users their account has just been altered.
	}else
	echo "<META http-equiv='refresh' content='0;URL=../projects.php?error=danger&error_text=Your+account+could+not+be+updated.'>";
	
?>
</body>
