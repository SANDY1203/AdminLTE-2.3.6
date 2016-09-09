<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
<th>role</th>
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
echo "<input class='btn btn-default' type='submit' name='submit' value='Delete'/>";
echo "<a class='btn btn-default' href='web.html' role='button'>add user</a>";

echo "</form>";
 
mysql_close($con);
?>
 </body>
</html>