<?php
     
    require 'connect.php';
	if ( !empty($_GET['val'])) {
	$val = $_REQUEST['val'];}
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $project_nameError = null;
        $project_descError = null;
        $project_company_idError = null;
		$project_priceError = null;
        $project_teamError = null;
        $project_statusError = null;
        $user_idError = null;
         
        // keep track post values
		$project_name = $_POST['project_name'];
        $project_desc = $_POST['project_desc'];
		$project_company_id = $_POST['project_company_id'];
        $project_price = $_POST['project_price'];
        $project_team = $_POST['project_team'];
		$project_status = $_POST['project_status'];
		$user_id = $_POST['user_id'];
		         
        // validate input
        $valid = true;
        if (empty($project_name)) {
            $idError = 'Please enter project_name';
            $valid = false;
        }
		if (empty($project_desc)) {
            $project_descError = 'Please enter name';
            $valid = false;
        }
         if (empty($project_company_id)) {
            $project_company_idError = 'Please enter project_company_id';
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
		if (empty($user_id)) {
            $user_idError = 'Please enter user_id';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO projects (project_name,project_desc,project_company_id,project_price,project_team,project_status,user_id) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($project_name,$project_desc,$project_company_id,$project_price,$project_team,$project_status,$user_id));
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
                        <h3>Create a Project</h3>
                    </div>
             
                    <form class="form-horizontal" action="create_project.php?val=<?php echo $val?>" method="post">
                      <div class="control-group <?php echo !empty($idError)?'error':'';?>">
                        <label class="control-label">project_name</label>
                        <div class="controls">
                            <input name="project_name" type="int"  placeholder="project_name" value="<?php echo !empty($project_name)?$project_name:'';?>">
                            <?php if (!empty($idError)): ?>
                                <span class="help-inline"><?php echo $idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($project_descError)?'error':'';?>">
                        <label class="control-label">project_desc</label>
                        <div class="controls">
                            <input name="project_desc" type="text"  placeholder="project_desc" value="<?php echo !empty($project_desc)?$project_desc:'';?>">
                            <?php if (!empty($project_descError)): ?>
                                <span class="help-inline"><?php echo $project_descError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($project_company_idError)?'error':'';?>">
                        <label class="control-label">project_company_id</label>
                        <div class="controls">
                            <input name="project_company_id" type="text"  placeholder="project_company_id" value="<?php echo !empty($project_company_id)?$project_company_id:'';?>">
                            <?php if (!empty($project_company_idError)): ?>
                                <span class="help-inline"><?php echo $project_company_idError;?></span>
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
                      <div class="control-group <?php echo !empty($user_idError)?'error':'';?>">
                        <label class="control-label">user_id</label>
                        <div class="controls">
                            <input name="user_id" type="text"  placeholder="user_id" value="<?php echo !empty($user_id)?$user_id:'';?>">
                            <?php if (!empty($user_idError)): ?>
                                <span class="help-inline"><?php echo $user_idError;?></span>
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

