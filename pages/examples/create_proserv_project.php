<?php
     
    require 'connect.php';
	if ( !empty($_GET['val'])) {
	$val = $_REQUEST['val'];}
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $idError = null;
        $proserv_idError = null;
        $project_contractor_idError = null;
		$project_priceError = null;
        $project_teamError = null;
        $project_statusError = null;
        $category_proserv_projectError = null;
         
        // keep track post values
		$id = $_POST['id'];
        $proserv_id = $_POST['proserv_id'];
		$project_contractor_id = $_POST['project_contractor_id'];
        $project_price = $_POST['project_price'];
        $project_team = $_POST['project_team'];
		$project_status = $_POST['project_status'];
		$category_proserv_project = $_POST['category_proserv_project'];
		         
        // validate input
        $valid = true;
        if (empty($id)) {
            $idError = 'Please enter id';
            $valid = false;
        }
		if (empty($proserv_id)) {
            $proserv_idError = 'Please enter name';
            $valid = false;
        }
         if (empty($project_contractor_id)) {
            $project_contractor_idError = 'Please enter project_contractor_id';
            $valid = false;
        }
        if (empty($project_price)) {
            $project_priceError = 'Please enter project_price Address';
            $valid = false;
        } 
         if (empty($project_team)) {
            $project_teamError = 'Please enter project_team';
            $valid = false;
        }
        if (empty($project_status)) {
            $project_statusError = 'Please enter project_status';
            $valid = false;
        }
		if (empty($category_proserv_project)) {
            $category_proserv_projectError = 'Please enter category_proserv_project';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO proserv_project (id,proserv_id,project_contractor_id,project_price,project_team,project_status,category_proserv_project) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id,$proserv_id,$project_contractor_id,$project_price,$project_team,$project_status,$category_proserv_project));
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
		}        }
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
                        <h3>Create a PROSERV PROJECt</h3>
                    </div>
             
                    <form class="form-horizontal" action="create_proserv_project.php?val=<?php echo $val;?>" method="post">
                      <div class="control-group <?php echo !empty($idError)?'error':'';?>">
                        <label class="control-label">id</label>
                        <div class="controls">
                            <input name="id" type="int"  placeholder="id" value="<?php echo !empty($id)?$id:'';?>">
                            <?php if (!empty($idError)): ?>
                                <span class="help-inline"><?php echo $idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($proserv_idError)?'error':'';?>">
                        <label class="control-label">proserv_id</label>
                        <div class="controls">
                            <input name="proserv_id" type="text"  placeholder="proserv_id" value="<?php echo !empty($proserv_id)?$proserv_id:'';?>">
                            <?php if (!empty($proserv_idError)): ?>
                                <span class="help-inline"><?php echo $proserv_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($project_contractor_idError)?'error':'';?>">
                        <label class="control-label">project_contractor_id</label>
                        <div class="controls">
                            <input name="project_contractor_id" type="text"  placeholder="project_contractor_id" value="<?php echo !empty($project_contractor_id)?$project_contractor_id:'';?>">
                            <?php if (!empty($project_contractor_idError)): ?>
                                <span class="help-inline"><?php echo $project_contractor_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($project_priceError)?'error':'';?>">
                        <label class="control-label">project_price</label>
                        <div class="controls">
                            <input name="project_price" type="text" placeholder="project_price Address" value="<?php echo !empty($project_price)?$project_price:'';?>">
                            <?php if (!empty($project_priceError)): ?>
                                <span class="help-inline"><?php echo $project_priceError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($project_teamError)?'error':'';?>">
                        <label class="control-label">project_team</label>
                        <div class="controls">
                            <input name="project_team" type="project_team"  placeholder="project_team" value="<?php echo !empty($project_team)?$project_team:'';?>">
                            <?php if (!empty($project_teamError)): ?>
                                <span class="help-inline"><?php echo $project_teamError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($project_statusError)?'error':'';?>">
                        <label class="control-label">project_status</label>
                        <div class="controls">
                            <input name="project_status" type="text"  placeholder="project_status" value="<?php echo !empty($project_status)?$project_status:'';?>">
                            <?php if (!empty($project_statusError)): ?>
                                <span class="help-inline"><?php echo $project_statusError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  </div>
                      <div class="control-group <?php echo !empty($category_proserv_projectError)?'error':'';?>">
                        <label class="control-label">category_proserv_project</label>
                        <div class="controls">
                            <input name="category_proserv_project" type="text"  placeholder="category_proserv_project" value="<?php echo !empty($category_proserv_project)?$category_proserv_project:'';?>">
                            <?php if (!empty($category_proserv_projectError)): ?>
                                <span class="help-inline"><?php echo $category_proserv_projectError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
						<?php
						if($val == "company"){
						echo "<a class='btn' href='company_index.php'>Back</a>";}
						elseif($val == "sales"){
						echo "<a class='btn' href='sales_index.php'>Back</a>";}
						elseif($val == "prom"){
						echo "<a class='btn' href='project_manager_index.php'>Back</a>";}
						else{
						echo "<a class='btn' href='indeex.php'>Back</a>";}
						?> 
						</div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

