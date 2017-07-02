<?php
session_start();
$error=false;
$var="";
$usererror="";
$passError="";

$db=mysqli_connect(" localhost:3306","user","jahnvi","id1665612_database ");
if(isset($_POST['login']))
{
  $username=mysql_real_escape_string($_POST['username']);
  $password=mysql_real_escape_string($_POST['password1']);
  

  if(empty($username)){
  $error=true;
  $usererror="please enter username";
  }

  if (empty($password)){
   $error=true;
   $passError="Please enter password.";
  }

$password=md5($password);
  
  if(!$error){
  	$sql= "SELECT*FROM db WHERE username='$username' AND password='$password' ";
  	$result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)>=1)
     {
  	  $_SESSION['message']="You are now logged in!";
  	  $_SESSION['username']=$username;
  	  header("location: hh.php");
     }
    else
     {
       $var="incorrect username/password "."<br>"."combination"."<br>";
     }
   }
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="sss.css"/>
	<title></title>
</head>
<body>


<div id="format"></div>
<form action="signin.php" method="POST" id="enter">
   USERNAME:<br><input type="text" name="username" ><br><span class="text-danger"><?php echo $usererror; ?></span><br>
   PASSWORD:<br><input type="password" name="password1" ><br><span class="text-danger"><?php echo $passError; ?></span><br>
   

 <div id="var">
   <?php echo $var ?>
    <br>
 </div>

  <input type="submit" name="login" value="SIGN-IN"><br>

</form>

<div id="sign">
  create new account!<a href="singup.php">SIGN-UP</a>
</div>
</body>
</html>