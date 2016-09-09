<?php
echo "hello world";
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("sales management", $con);
 

if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
$result = mysql_query("DELETE FROM users WHERE id = '$selected'");
}
}
}
mysql_close($con);
header("refresh:0; url=disp.php");
?>
