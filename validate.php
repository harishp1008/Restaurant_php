<?php
session_start();
$con=mysqli_connect('localhost','root','12345');
mysqli_select_db($con,'userregistration');
$name=$_POST['email'];
$pass=$_POST['password'];
$s="select * from usetable where email='$name' && password='$pass'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1)
{
	$_SESSION['username']=$name;
		if(isset($_POST['remember'])){
		setcookie('name',$name,time()+60*60*7);
		setcookie('pass',$pass,time()+60*60*7);
		
	}
	
	header('location:welcome.php');
}
else
{
	header('location:customerlogin.php');
}

?>