<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$dbusername ="null";
$dbpassword = "null";
$dbtype= "null";
if($username && $password)
{
	$connect = mysql_connect("localhost","root","");
	mysql_select_db("sales management");
	$query = mysql_query("select * from users where email='$username'");
	
	while($log = mysql_fetch_assoc($query))
	{
		$dbusername =$log["email"];
		$dbpassword =$log["password"];
		$dbtype =$log["role"];
	}
	 
	if($dbusername == $username && $dbpassword == $password && $dbtype == "admin")
	{
		
		header("Location: indeex.php");
	}
	elseif($dbusername == $username && $dbpassword == $password && $dbtype == "sales")
	{
		header("Location: sales_index.php");
	}
	elseif($dbusername == $username && $dbpassword == $password && $dbtype == "project_manager")
	{
		header("Location: project_manager_index.php");
	}
	elseif($dbusername == $username && $dbpassword == $password && $dbtype == "company")
	{
		header("Location: company_index.php");
	}
	else
	{
		header("Location: index2.php");
	}
}


?>