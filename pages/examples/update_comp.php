<?php
    require 'connect.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: indeex.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        
        $company_nameError = null;
        $company_addressError = null;
		$company_phoneError = null;
        $company_emailError = null;
		$user_id = null;
    
         
        // keep track post values
     	
        $company_name = $_POST['company_name'];
		$company_address = $_POST['company_address'];
        $company_phone = $_POST['company_phone'];
        $company_email = $_POST['company_email'];
		$user_id = $_POST['user_id'];
		
        // validate input
        $valid = true;
       
        }
		if (empty($company_name)) {
            $company_nameError = 'company_name';
            $valid = false;
        }
         if (empty($company_address)) {
            $company_addressError = 'Please enter company_address';
            $valid = false;
        }
		if (empty($company_phone)) {
            $company_phoneError = 'Please enter company_phone';
            $valid = false;
        }
        if (empty($company_email)) {
            $company_emailError = 'Please enter company_email';
            $valid = false;
        } else if ( !filter_var($company_email,FILTER_VALIDATE_EMAIL) ) {
            $company_emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        if (empty($user_id)) {
            $user_idError = 'Please enter user_id';
		$valid = false; }
   
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE company set company_name = ?, company_address = ?, company_phone = ?, company_email = ?, user_id = ? WHERE company_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($company_name,$company_address,$company_phone,$company_email,$user_id,$id));
            Database::disconnect();
            header("Location: indeex.php");
        }
     else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM company where company_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$company_name = $data['company_name'];
        $company_address = $data['company_address'];
        $company_phone = $data['company_phone'];
        $company_email = $data['company_email'];
		$user_id = $data['user_id'];
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
                        <h3>Update a Company</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_comp.php?id=<?php echo $id?>" method="post">

                      <div class="control-group <?php echo !empty($company_nameError)?'error':'';?>">

                     
					  <div class="control-group <?php echo !empty($company_nameError)?'error':'';?>">

                        <label class="control-label">company_name</label>
                        <div class="controls">
                            <input name="company_name" type="text"  placeholder="company_name" value="<?php echo !empty($company_name)?$company_name:'';?>">
                            <?php if (!empty($company_nameError)): ?>
                                <span class="help-inline"><?php echo $company_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($company_addressError)?'error':'';?>">
                        <label class="control-label">company_address</label>
                        <div class="controls">
                            <input name="company_address" type="text"  placeholder="company_address" value="<?php echo !empty($company_address)?$company_address:'';?>">
                            <?php if (!empty($company_addressError)): ?>
                                <span class="help-inline"><?php echo $company_addressError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($company_phoneError)?'error':'';?>">
                        <label class="control-label">company_phone</label>
                        <div class="controls">
                            <input name="company_phone" type="integer" placeholder="company_phone" value="<?php echo !empty($company_phone)?$company_phone:'';?>">
                            <?php if (!empty($company_phoneError)): ?>
                                <span class="help-inline"><?php echo $company_phoneError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($company_emailError)?'error':'';?>">
                        <label class="control-label">company_email</label>
                        <div class="controls">
                            <input name="company_email" type="email"  placeholder="company_email" value="<?php echo !empty($company_email)?$company_email:'';?>">
                            <?php if (!empty($company_emailError)): ?>
                                <span class="help-inline"><?php echo $company_emailError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($user_idError)?'error':'';?>">
                        <label class="control-label">user_id</label>
                        <div class="controls">
                            <input name="user_id" type="text"  placeholder="user_id" value="<?php echo !empty($user_id)?$user_id:'';?>">
                            <?php if (!empty($user_idError)): ?>
                                <span class="help-inline"><?php echo $user_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                     <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="indeex.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>