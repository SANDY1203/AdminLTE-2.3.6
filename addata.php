<?php
$conn = mysqli_connect("localhost","root","");
if(!$conn) {
    echo "not connected to server";
}
if(!mysqli_select_db($conn,"sales management"))
{
	    echo "database not selected";
}
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
echo $first_name;
echo $last_name;
echo $email;
echo $password;
echo $role;
// Check connection

$query = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES (NULL, '$first_name','$last_name','$email', '$password', '$role')";
if (!mysqli_query($conn, $query)) {
    echo "not su";
} else {
    echo "New record created successfully ";
}
header("refresh:2; url=web.html");

?>