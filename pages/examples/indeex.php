<!DOCTYPE html>
<?php $val= "admin"; ?>
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
                <h3>USER TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
					  <th>first_name</th>
                      <th>last_name</th>
                      <th>email</th>
					  <th>password</th>
					  <th>role</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM users';
                   foreach ($pdo->query($sql) as $row) {
							$val = "admin";
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['first_name'] . '</td>';
							echo '<td>'. $row['last_name'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['password'] . '</td>';
							echo '<td>'. $row['role'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'&val='.$val.'">Delete</a>';
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
                <h3>COMPANY TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_comp.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
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
                                echo '<a class="btn" href="read_comp.php?id='.$row['company_id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_comp.php?id='.$row['company_id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_comp.php?id='.$row['company_id'].'&val='.$val.'">Delete</a>';
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
                    <a href="create_contact.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
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
                                echo '<a class="btn" href="read_contact.php?id='.$row['id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_contact.php?id='.$row['id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_contact.php?id='.$row['id'].'&val='.$val.'">Delete</a>';
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
                <h3>FEEDBACK TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_feedback.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
					  <th>user_id</th>
                      <th>ans_1</th>
                      <th>ans_2</th>
					  <th>ans_3</th>
					  <th>ans_4</th>
					  <th>ans_5</th>
					  <th>remarks</th>
					  <th>contact_id</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM feedback';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['user_id'] . '</td>';
							echo '<td>'. $row['ans_1'] . '</td>';
                            echo '<td>'. $row['ans_2'] . '</td>';
                            echo '<td>'. $row['ans_3'] . '</td>';
							echo '<td>'. $row['ans_4'] . '</td>';
                            echo '<td>'. $row['ans_5'] . '</td>';
							echo '<td>'. $row['remarks'] . '</td>';
							echo '<td>'. $row['contact_id'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read_feedback.php?id='.$row['id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_feedback.php?id='.$row['id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_feedback.php?id='.$row['id'].'&val='.$val.'">Delete</a>';
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
	<div class="container">
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
	<div class="container">
            <div class="row">
                <h3>PROSERV TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_proserv.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
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
                                echo '<a class="btn" href="read_proserv.php?id='.$row['id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_proserv.php?id='.$row['id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_proserv.php?id='.$row['id'].'&val='.$val.'">Delete</a>';
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
                    <a href="create_proserv_project.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
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
                                echo '<a class="btn" href="read_proserv_project.php?id='.$row['id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_proserv_project.php?id='.$row['id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_proserv_project.php?id='.$row['id'].'&val='.$val.'">Delete</a>';
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
                <h3>QUESTIONS TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_quation.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>q_id</th>
					  <th>questions</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM questions';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['q_id'] . '</td>';
							echo '<td>'. $row['question'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read_quation.php?id='.$row['q_id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_quation.php?id='.$row['q_id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_quation.php?id='.$row['q_id'].'&val='.$val.'">Delete</a>';
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
                <h3>QUOTATION TABLE DATA</h3>
            </div>
            <div class="row">
			 <p>
                    <a href="create_quotation.php?val=<?php echo $val?>" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>quotation_id</th>
					  <th>lead</th>
					  <th>proposal</th>
					  <th>design</th>
					  <th>testing</th>
					  <th>development</th>
					  <th>maintenance</th>
					  <th>invoice</th>
					  <th>delivery</th>
					  <th>user_id</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM quotation';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['lead'] . '</td>';
							echo '<td>'. $row['proposal'] . '</td>';
                            echo '<td>'. $row['design'] . '</td>';
							echo '<td>'. $row['testing'] . '</td>';
							echo '<td>'. $row['development'] . '</td>';
							echo '<td>'. $row['maintenance'] . '</td>';
                            echo '<td>'. $row['invoice'] . '</td>';
							echo '<td>'. $row['delivery'] . '</td>';
							echo '<td>'. $row['user_id'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn" href="read_quotation.php?id='.$row['id'].'&val='.$val.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_quotation.php?id='.$row['id'].'&val='.$val.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_quotation.php?id='.$row['id'].'&val='.$val.'">Delete</a>';
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