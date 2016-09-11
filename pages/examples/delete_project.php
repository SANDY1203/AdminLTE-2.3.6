<?php
    require 'connect.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
	if ( !empty($_GET['val'])) {
        $val = $_REQUEST['val'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
		$val = $_POST['val'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM projects WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
		if($val == "company")
		{
		header("Location: company_index.php");
		}
		elseif($val == "sales")
		{
		header("Location: sales_index.php");
		}
		elseif($val == "prom")
		{
		header("Location: project_manager_index.php");
		}					
		else
		{
		header("Location: indeex.php");
		}
      
         
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
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a User</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete_project.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <input type="hidden" name="val" value="<?php echo $val;?>"/>
					  
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
						  <?php
						if($val == "company"){
						echo "<a class='btn' href='company_index.php'>No</a>";}
						elseif($val == "sales"){
						echo "<a class='btn' href='sales_index.php'>No</a>";}
						elseif($val == "prom"){
						echo "<a class='btn' href='project_manager_index.php'>No</a>";}
						else{
						echo "<a class='btn' href='indeex.php'>No</a>";}
						
						  ?>
                          
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>