<!DOCTYPE html>
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
                <h3>COMPANY TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_comp.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>company_id</th>
					  <th>company_name</th>
                      <th>company_address</th>
                      <th>company_phone</th>
					  <th>company_email</th>
					  <th>user_id</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				   include 'connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM company';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['company_id'] . '</td>';
							echo '<td>'. $row['company_name'] . '</td>';
							echo '<td>'. $row['company_address'] . '</td>';
                            echo '<td>'. $row['company_phone'] . '</td>';
                            echo '<td>'. $row['company_email'] . '</td>';
							echo '<td>'. $row['user_id'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read_comp.php?id='.$row['company_id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_comp.php?id='.$row['company_id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_comp.php?id='.$row['company_id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
	<div class="container">
            <div class="row">
                <h3>CONTACT TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_contact.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
					  <th>contact_name</th>
                      <th>contact_position</th>
                      <th>contact_number_one</th>
					  <th>contact_number_two</th>
					  <th>contact_email_one</th>
					  <th>contact_email_two</th>
					  <th>contact_company_allo</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM contact';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['contact_name'] . '</td>';
							echo '<td>'. $row['contact_position'] . '</td>';
                            echo '<td>'. $row['contact_number_one'] . '</td>';
                            echo '<td>'. $row['contact_number_two'] . '</td>';
							echo '<td>'. $row['contact_email_one'] . '</td>';
                            echo '<td>'. $row['contact_email_two'] . '</td>';
							echo '<td>'. $row['contact_company_allo'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read_contact.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_contact.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_contact.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
	<div class="container">
            <div class="row">
                <h3>PROJECTS TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create.php" class="btn btn-success">Create</a>
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
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
	<div class="container">
            <div class="row">
                <h3>PROSERV TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
					  <th>product_name</th>
                      <th>product_description</th>
                      <th>product_start_price</th>
					  <th>product_end_price</th>
					  <th>category</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM proserv';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['product_name'] . '</td>';
							echo '<td>'. $row['product_description'] . '</td>';
                            echo '<td>'. $row['product_start_price'] . '</td>';
                            echo '<td>'. $row['product_end_price'] . '</td>';
							echo '<td>'. $row['category'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
	<div class="container">
            <div class="row">
                <h3>PROJECTSERV_PROJECT TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
					  <th>proserv_id</th>
                      <th>project_contractor_id</th>
                      <th>project_price</th>
					  <th>project_team</th>
					  <th>project_status</th>
					  <th>category_proserv_project</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM proserv_project';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['proserv_id'] . '</td>';
							echo '<td>'. $row['project_contractor_id'] . '</td>';
                            echo '<td>'. $row['project_price'] . '</td>';
                            echo '<td>'. $row['project_team'] . '</td>';
							echo '<td>'. $row['project_status'] . '</td>';
                            echo '<td>'. $row['category_proserv_project'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
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