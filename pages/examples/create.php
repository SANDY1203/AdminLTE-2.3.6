<?php
     
    require 'connect.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $idError = null;
        $first_nameError = null;
        $last_nameError = null;
		$emailError = null;
        $passwordError = null;
        $roleError = null;
         
        // keep track post values
		$id = $_POST['id'];
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
		$role = $_POST['role'];
		         
        // validate input
        $valid = true;
        if (empty($id)) {
            $idError = 'Please enter id';
            $valid = false;
        }
		if (empty($first_name)) {
            $first_nameError = 'Please enter name';
            $valid = false;
        }
         if (empty($last_name)) {
            $last_nameError = 'Please enter last_name';
            $valid = false;
        }
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         if (empty($password)) {
            $passwordError = 'Please enter password';
            $valid = false;
        }
        if (empty($role)) {
            $roleError = 'Please enter role';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO users (id,first_name,last_name,email,password,role) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id,$first_name,$last_name,$email,$password,$role));
            Database::disconnect();
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
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a User</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($idError)?'error':'';?>">
                        <label class="control-label">id</label>
                        <div class="controls">
                            <input name="id" type="int"  placeholder="id" value="<?php echo !empty($id)?$id:'';?>">
                            <?php if (!empty($idError)): ?>
                                <span class="help-inline"><?php echo $idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($first_nameError)?'error':'';?>">
                        <label class="control-label">first_name</label>
                        <div class="controls">
                            <input name="first_name" type="text"  placeholder="first_name" value="<?php echo !empty($first_name)?$first_name:'';?>">
                            <?php if (!empty($first_nameError)): ?>
                                <span class="help-inline"><?php echo $first_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($last_nameError)?'error':'';?>">
                        <label class="control-label">last_name</label>
                        <div class="controls">
                            <input name="last_name" type="text"  placeholder="last_name" value="<?php echo !empty($last_name)?$last_name:'';?>">
                            <?php if (!empty($last_nameError)): ?>
                                <span class="help-inline"><?php echo $last_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">email</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">password</label>
                        <div class="controls">
                            <input name="password" type="password"  placeholder="password" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($roleError)?'error':'';?>">
                        <label class="control-label">role</label>
                        <div class="controls">
                            <select name="role" value="<?php echo !empty($role)?$role:'';?>">
<option value="admin">admin</option>	
  <option value="sales">sales</option>
  <option value="project_manager">project_manager</option>
  <option value="company">company</option>
  </select> 
                            <?php if (!empty($roleError)): ?>
                                <span class="help-inline"><?php echo $roleError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="indeex.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

