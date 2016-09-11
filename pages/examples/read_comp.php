<?php
    require 'connect.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $company_id = $_REQUEST['id'];
    }
	if ( !empty($_GET['val'])) {
        $val = $_REQUEST['val'];
    }
     
    if ( null==$company_id ) {
        header("Location: indeex.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM company where company_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($company_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
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
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Company</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">company_id</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['company_id'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">company_name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['company_name'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">company_address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['company_address'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">company_phone</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['company_phone'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">company_email</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['company_email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">user_id</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['user_id'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <?php
						if($val == "company"){
						echo "<a class='btn' href='company_index.php'>Back</a>";}
						elseif($val == "sales"){
						echo "<a class='btn' href='sales_index.php'>Back</a>";}
						elseif($val == "prom"){
						echo "<a class='btn' href='project_manager.php'>Back</a>";}
						else{
						echo "<a class='btn' href='indeex.php'>Back</a>";}
						
						  ?>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>