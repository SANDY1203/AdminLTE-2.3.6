<!DOCTYPE html>
<?php $val= "prom"; ?>
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
                <h3>TEAM TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_team.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>team_id</th>
					  <th>team_name</th>
                      <th>team_lead</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  				  include 'connect.php';

                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM team';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['team_id'] . '</td>';
							echo '<td>'. $row['team_name'] . '</td>';
							echo '<td>'. $row['team_lead'] . '</td>';
                            echo '<td width=250>';
                                echo '<a class="btn" href="read_team.php?id='.$row['team_id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_team.php?id='.$row['team_id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_team.php?id='.$row['team_id'].'&val='.$val.'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
	<<div class="container">
            <div class="row">
                <h3>TEAM MEMBERS TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_team_mem.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>team_m_id</th>
					  <th>team_m_first_name</th>
                      <th>team_m_last_name</th>
                      <th>team_m_position</th>
					  <th>team_m_employement_status</th>
					  <th>team_id</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM team_members';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['team_m_id'] . '</td>';
							echo '<td>'. $row['team_m_first_name'] . '</td>';
							echo '<td>'. $row['team_m_last_name'] . '</td>';
                            echo '<td>'. $row['team_m_position'] . '</td>';
                            echo '<td>'. $row['team_m_employement_status'] . '</td>';
							echo '<td>'. $row['team_id'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read_team_mem.php?id='.$row['team_m_id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_team_mem.php?id='.$row['team_m_id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_team_mem.php?id='.$row['team_m_id'].'&val='.$val.'">Delete</a>';
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
	