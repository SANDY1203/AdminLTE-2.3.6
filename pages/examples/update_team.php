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
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        
        $team_nameError = null;
        $team_leadError = null;
         
        // keep track post values
     	
        $team_name = $_POST['team_name'];
        $team_lead = $_POST['team_lead'];
         
        // validate input
        $valid = true;
       
        }
		if (empty($team_name)) {
            $team_nameError = 'Please enter team_name';
            $valid = false;
        }
		if (empty($team_lead)) {
            $team_leadError = 'Please enter name';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE team set team_name = ?, team_lead = ? WHERE team_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($team_name,$team_lead,$id));
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
     else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM team where team_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$team_name = $data['team_name'];
        $team_lead = $data['team_lead'];
       
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
                        <h3>Update a TEAM</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_team.php?id=<?php echo $id?>&val=<?php echo $val?>" method="post">

                      <div class="control-group <?php echo !empty($team_nameError)?'error':'';?>">

                     
					  <div class="control-group <?php echo !empty($team_nameError)?'error':'';?>">

                        <label class="control-label">team_name</label>
                        <div class="controls">
                            <input name="team_name" type="text"  placeholder="team_name" value="<?php echo !empty($team_name)?$team_name:'';?>">
                            <?php if (!empty($team_nameError)): ?>
                                <span class="help-inline"><?php echo $team_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($team_leadError)?'error':'';?>">
                        <label class="control-label">team_lead</label>
                        <div class="controls">
                            <input name="team_lead" type="text"  placeholder="team_lead" value="<?php echo !empty($team_lead)?$team_lead:'';?>">
                            <?php if (!empty($team_leadError)): ?>
                                <span class="help-inline"><?php echo $team_leadError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                     
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
<?php
						if($val == "company"){
						echo "<a class='btn' href='company_index.php'>Back</a>";}
						elseif($val == "sales"){
						echo "<a class='btn' href='sales_index.php'>Back</a>";}
						elseif($val == "prom"){
						echo "<a class='btn' href='project_manager_index.php'>Back</a>";}
						else{
						echo "<a class='btn' href='indeex.php'>Back</a>";}
						
						  ?>                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>