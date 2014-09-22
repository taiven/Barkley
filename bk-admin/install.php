<!DOCTYPE html>
<html>
<head>
<title>Barkley &rsaquo; Installation</title>
</head>
<?php
$step = (isset($_GET['step']) && $_GET['step'] != '') ? $_GET['step'] : '';
switch($step){
  case '1':
  step_1();
  break;
  case '2':
  step_2();
  break;
  case '3':
  step_3();
  break;
  case '4':
  step_4();
  break;
  default:
  step_1();
}
?>
<body>

<?php
function step_1(){ 
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agree'])){
  header('Location: install.php?step=2');
  exit;
 }
 if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['agree'])){
  echo "You must agree to the license.";
 }
?>
 <p>Our LICENSE will go here.</p>
 <form action="install.php?step=1" method="post">
 <p>
  I agree to the license
  <input type="checkbox" name="agree" />
 </p>
  <input type="submit" value="Continue" />
 </form>
<?php 
}

function step_2(){
  if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['pre_error'] ==''){
   header('Location: install.php?step=3');
   exit;
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['pre_error'] != '')
   echo $_POST['pre_error'];
      
  if (phpversion() < '5.0') {
   $pre_error = 'You need to use PHP5 or above for our site!<br />';
  }
  if (ini_get('session.auto_start')) {
   $pre_error .= 'Our site will not work with session.auto_start enabled!<br />';
  }
  if (!extension_loaded('mysql')) {
   $pre_error .= 'MySQL extension needs to be loaded for our site to work!<br />';
  }
  if (!extension_loaded('gd')) {
   $pre_error .= 'GD extension needs to be loaded for our site to work!<br />';
  }
  if (!is_writable('config.php')) {
   $pre_error .= 'config.php needs to be writable for our site to be installed!';
  }
  ?>
  <table width="100%">
  <tr>
   <td>PHP Version:</td>
   <td><?php echo phpversion(); ?></td>
   <td>5.0+</td>
   <td><?php echo (phpversion() >= '5.0') ? 'Ok' : 'Not Ok'; ?></td>
  </tr>
  <tr>
   <td>Session Auto Start:</td>
   <td><?php echo (ini_get('session_auto_start')) ? 'On' : 'Off'; ?></td>
   <td>Off</td>
   <td><?php echo (!ini_get('session_auto_start')) ? 'Ok' : 'Not Ok'; ?></td>
  </tr>
  <tr>
   <td>MySQL:</td>
   <td><?php echo extension_loaded('mysql') ? 'On' : 'Off'; ?></td>
   <td>On</td>
   <td><?php echo extension_loaded('mysql') ? 'Ok' : 'Not Ok'; ?></td>
  </tr>
  <tr>
   <td>GD:</td>
   <td><?php echo extension_loaded('gd') ? 'On' : 'Off'; ?></td>
   <td>On</td>
   <td><?php echo extension_loaded('gd') ? 'Ok' : 'Not Ok'; ?></td>
  </tr>
  <tr>
   <td>Configuration File</td>
   <td><?php echo is_writable('../bk-config.php') ? 'Writable' : 'Unwritable'; ?></td>
   <td>Writable</td>
   <td><?php echo is_writable('../bk-config.php') ? 'Ok' : 'Not Ok'; ?></td>
  </tr>
  </table>
  <form action="install.php?step=2" method="post">
   <input type="hidden" name="pre_error" id="pre_error" value="<?php echo $pre_error;?>" />
   <input type="submit" name="continue" value="Continue" />
  </form>
<?php
}

function step_3(){
  if (isset($_POST['submit']) && $_POST['submit']=="Install!") {
   $database_host=isset($_POST['database_host'])?$_POST['database_host']:"";
   $database_name=isset($_POST['database_name'])?$_POST['database_name']:"";
   $database_username=isset($_POST['database_username'])?$_POST['database_username']:"";
   $database_password=isset($_POST['database_password'])?$_POST['database_password']:"";
   $admin_name=isset($_POST['admin_name'])?$_POST['admin_name']:"";
   $admin_password=isset($_POST['admin_password'])?$_POST['admin_password']:"";
  
  if (empty($admin_name) || empty($admin_password) || empty($database_host) || empty($database_username) || empty($database_name)) {
   echo "All fields are required! Please re-enter.<br />";
  } else {
   $connection = mysql_connect($database_host, $database_username, $database_password);
   mysql_select_db($database_name, $connection);
  
   $file ='data.sql';
   if ($sql = file($file)) {
   $query = '';
   foreach($sql as $line) {
    $tsl = trim($line);
   if (($sql != '') && (substr($tsl, 0, 2) != "--") && (substr($tsl, 0, 1) != '#')) {
   $query .= $line;
  
   if (preg_match('/;\s*$/', $line)) {
  
    mysql_query($query, $connection);
    $err = mysql_error();
    if (!empty($err))
      break;
   $query = '';
   }
   }
   }
   @mysql_query("INSERT INTO admin SET admin_name='".$admin_name."', admin_password = md5('" . $admin_password . "')");
   mysql_close($connection);
   }
   $f=fopen("config.php","w");
   $database_inf="<?php
     define('DATABASE_HOST', '".$database_host."');
     define('DATABASE_NAME', '".$database_name."');
     define('DATABASE_USERNAME', '".$database_username."');
     define('DATABASE_PASSWORD', '".$database_password."');
     define('ADMIN_NAME', '".$admin_name."');
     define('ADMIN_PASSWORD', '".$admin_password."');
     ?>";
  if (fwrite($f,$database_inf)>0){
   fclose($f);
  }
  header("Location: install.php?step=4");
  }
  }
?>
  <form method="post" action="install.php?step=3">
  <p>
   <input type="text" name="database_host" value='localhost' size="30">
   <label for="database_host">Database Host</label>
 </p>
 <p>
   <input type="text" name="database_name" size="30" value="<?php echo $database_name; ?>">
   <label for="database_name">Database Name</label>
 </p>
 <p>
   <input type="text" name="database_username" size="30" value="<?php echo $database_username; ?>">
   <label for="database_username">Database Username</label>
 </p>
 <p>
   <input type="text" name="database_password" size="30" value="<?php echo $database_password; ?>">
   <label for="database_password">Database Password</label>
  </p>
  <br/>
  <p>
   <input type="text" name="admin_name" size="30" value="<?php echo $username; ?>">
   <label for="username">Admin Login</label>
 </p>
 <p>
   <input name="admin_password" type="text" size="30" maxlength="15" value="<?php echo $password; ?>">
   <label for="password">Admin Password</label>
  </p>
 <p>
   <input type="submit" name="submit" value="Install!">
  </p>
  </form>
<?php
}

function step_4(){
?>
 <p><a href="http://localhost/installsample/">Site home page</a></p>
 <p><a href="http://localhost/installsample/admin">Admin page</a></p>
<?php 
}
?>