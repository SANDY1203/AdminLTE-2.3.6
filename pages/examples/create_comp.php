<?php
     require 'connect.php';
	 if ( !empty($_GET['val'])) {
	$val = $_REQUEST['val'];}
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
       
  		if (empty($company_name)) {
            $company_nameError = 'Please enter company_name';
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
            $company_emailError = 'Please enter Email';
            $valid = false;
        } else if ( !filter_var($company_email,FILTER_VALIDATE_EMAIL) ) {
            $company_emailError = 'Please enter a valid Email Address';
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
            $sql = "INSERT INTO company (company_name,company_address,company_phone,company_email,user_id) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($company_name,$company_address,$company_phone,$company_email,$user_id));
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
                        <h3>Create a COMPANY</h3>
                    </div>
             
                    <form class="form-horizontal" action="create_comp.php?val=<?php echo $val?>" method="post">
                      <div class="control-group <?php echo !empty($company_nameError)?'error':'';?>">
                        <label class="control-label">company_name</label>
                        <div class="controls">
                            <input name="company_name" type="text"  placeholder="company_name" value="<?php echo !empty($company_name)?$company_name:'';?>">
                            <?php if (!empty($company_nameError)): ?>
                                <span class="help-inline"><?php echo $company_name;?></span>
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
                            <input name="company_phone" type="integer"  placeholder="company_phone" value="<?php echo !empty($company_phone)?$company_phone:'';?>">
                            <?php if (!empty($company_phoneError)): ?>
                                <span class="help-inline"><?php echo $company_phoneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($company_emailError)?'error':'';?>">
                        <label class="control-label">company_email</label>
                        <div class="controls">
                            <input name="company_email" type="email" placeholder="Email Address" value="<?php echo !empty($company_email)?$company_email:'';?>">
                            <?php if (!empty($company_emailError)): ?>
                                <span class="help-inline"><?php echo $company_emailError;?></span>
                            <?php endif;?>
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

