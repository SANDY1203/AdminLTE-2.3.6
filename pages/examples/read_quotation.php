<?php
    require 'connect.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
	if ( !empty($_GET['val'])) {
        $val = $_REQUEST['val'];
    }
     
    if ( null==$id ) {
        header("Location: indeex.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM quotation where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
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
                        <h3>Read a Quotation</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">id</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['id'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">lead</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['lead'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">opportunity</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['opportunity'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">proposal</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['proposal'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">quotation</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['quotation'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">ra</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ra'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">design</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['design'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">testing</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['testing'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">development</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['development'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">support</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['support'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">maintenance</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['maintenance'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">invoice</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['invoice'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">delivery</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['delivery'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">cancelled</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['cancelled'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">delayed</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['delayed'];?>
                            </label>
                        </div>
                      </div>
					  <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">completed</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['completed'];?>
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