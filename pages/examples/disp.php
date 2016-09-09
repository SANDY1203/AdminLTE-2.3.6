<html>
<head>
Table Details
<style>
table
{
border-style:solid;
border-width:2px;
border-color:pink;
}
</style>
</head>
<body bgcolor="#EEFDEF">
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("sales management", $con);
 
$result = mysql_query("SELECT * FROM users");
 echo "<form action='display.php' method='post'>";
echo "<table border='1'>
<tr>
<th>select</th>
<th>Id</th>
<th>first_name</th>
<th>last_name</th>
<th>email</th>
<th>password</th>
<th>roles</th>
</tr>";
 
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><input type='checkbox' name='check_list[]' value=". $row['id'] ."><label>". $row['id'] ."</label></td>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['first_name'] . "</td>";
  echo "<td>" . $row['last_name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['role'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<input type='submit' name='submit' value='Delete'/>";
echo "</form>";
 
mysql_close($con);
?>
 </body>
</html>