<!DOCTYPE html>
<?php $val= "company"; ?>
<html lang="en">
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
</head>
 
<body>
<div class="container">
            <div class="row">
                <h3>PROJECTS TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_project.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
					  <th>project_name</th>
                      <th>project_desc</th>
                      <th>project_company_id</th>
					  <th>project_price</th>
					  <th>project_team</th>
					  <th>project_status</th>
					  <th>user_id</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  include 'connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM projects';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['project_name'] . '</td>';
							echo '<td>'. $row['project_desc'] . '</td>';
                            echo '<td>'. $row['project_company_id'] . '</td>';
                            echo '<td>'. $row['project_price'] . '</td>';
							echo '<td>'. $row['project_team'] . '</td>';
                            echo '<td>'. $row['project_status'] . '</td>';
							echo '<td>'. $row['user_id'] . '</td>';
							echo '<td width=250>';
							
                                echo '<a class="btn" href="read_project.php?id='.$row['id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_project.php?id='.$row['id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_project.php?id='.$row['id'].'&val='.$val.'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
	</body>
	</html>