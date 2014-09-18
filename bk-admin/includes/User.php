<html>
	<head>
		<title>Updating Account</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body>
<?php
/*

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
*/	

class User{
	private $_Email;
	private $_Password;
	
	public function __construct($Email, $Password){
		$this->_Email = $Email;
		$this->_Password = $Password;
	}
	
	public function Login(){
			
			$Email = $this->_Email;
			$Password = $this->_Password;
		
		if(isset($Email) && isset($Password)){
		
			$Password = md5("Wub".$Password."Crate!");
			$Password = substr($Password, 0, 15);
			$Password = md5($Password);
			
			
			$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
			$result = mysqli_query($DataConnect,"SELECT * FROM client_accounts WHERE email='$Email' AND password='$Password'");

			while($row = mysqli_fetch_array($result)) {
				$User_ID = $row['account_id'];
				$DB_Email = $row['email'];
				$DB_Password = $row['password'];
			}
			
			if($Email == $DB_Email){
				if($Password == $DB_Password){
					return array($User_ID, $DB_Email);
				}
			}
			
		}else{
			return "You must enter a valid email and password to login.";
		}
	}
	
	private function CreateSession($userid, $email){
		return array($_SERVER['userid'] = $userid,$_SERVER['cemail'] = $email);
	}
	
}

?>