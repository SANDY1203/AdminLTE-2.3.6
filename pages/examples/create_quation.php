<?php
     require 'connect.php';
       if ( !empty($_POST)) {
        // keep track validation errors
        $question = null;
       
       
         
        // keep track post values
		$question = $_POST['question'];
		
        // validate input
        $valid = true;
       
  		if (empty($question)) {
            $company_nameError = 'Please enter question';
            $valid = false;
        }
		
        
     
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO questions (question) values(?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($question));
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
                        <h3>Create a COMPANY</h3>
                    </div>
             
                    <form class="form-horizontal" action="create_quation.php" method="post">
                      <div class="control-group <?php echo !empty($questionError)?'error':'';?>">
                        <label class="control-label">question</label>
                        <div class="controls">
                            <input name="question" type="text"  placeholder="question" value="<?php echo !empty($question)?$question:'';?>">
                            <?php if (!empty($questionError)): ?>
                                <span class="help-inline"><?php echo $question;?></span>
                            <?php endif; ?>
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

