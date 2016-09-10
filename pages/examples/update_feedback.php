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
        
        $user_idError = null;
        $ans_1Error = null;
        $ans_2Error = null;
		$ans_3Error = null;
        $ans_4Error = null;
        $ans_5Error = null;
		$remarksError = null;
        $contact_idError = null;
         
        // keep track post values
		$user_id = $_POST['user_id'];
        $ans_1 = $_POST['ans_1'];
		$ans_2 = $_POST['ans_2'];
        $ans_3 = $_POST['ans_3'];
        $ans_4 = $_POST['ans_4'];
		$ans_5 = $_POST['ans_5'];
		$remarks = $_POST['remarks'];
		$contact_id = $_POST['contact_id'];
		         
        // validate input
        $valid = true;
	}
        if (empty($user_id)) {
            $user_idError = 'Please enter user_id';
            $valid = false;
        }
		if (empty($ans_1)) {
            $ans_1Error = 'Please enter ans_1';
            $valid = false;
        }
         if (empty($ans_2)) {
            $ans_2Error = 'Please enter ans_2';
            $valid = false;
        }
        if (empty($ans_3)) {
            $ans_3Error = 'Please enter ans_3';
            $valid = false;
        
        }
         if (empty($ans_4)) {
            $ans_4Error = 'Please enter ans_4';
            $valid = false;
        }
        if (empty($ans_5)) {
            $ans_5Error = 'Please enter ans_5';
            $valid = false;
        }
		if (empty($remarks)) {
            $remarksError = 'Please enter remarks';
            $valid = false;
        }
		if (empty($contact_id)) {
            $contact_idError = 'Please enter contact_id';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE feedback set user_id = ?, ans_1 = ?, ans_2 = ?, ans_3 = ?, ans_4 = ?, ans_5 = ?, remarks = ?, contact_id = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($user_id,$ans_1,$ans_2,$ans_3,$ans_4,$ans_5,$remarks,$contact_id,$id));
            Database::disconnect();
            header("Location: indeex.php");
        }
     else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM feedback where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$user_id = $data['user_id'];
        $ans_1 = $data['ans_1'];
        $ans_2 = $data['ans_2'];
        $ans_3 = $data['ans_3'];
		$ans_4 = $data['ans_4'];
		$ans_5 = $data['ans_5'];
		$remarks = $data['remarks'];
		$contact_id = $data['contact_id'];
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
                        <h3>Update a Feedback</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_feedback.php?id=<?php echo $id?>" method="post">

                      <div class="control-group <?php echo !empty($user_idError)?'error':'';?>">

                     
					  <div class="control-group <?php echo !empty($user_idError)?'error':'';?>">

                        <label class="control-label">user_id</label>
                        <div class="controls">
                            <input name="user_id" type="integer"  placeholder="user_id" value="<?php echo !empty($user_id)?$user_id:'';?>">
                            <?php if (!empty($user_idError)): ?>
                                <span class="help-inline"><?php echo $user_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($ans_1Error)?'error':'';?>">
                        <label class="control-label">ans_1</label>
                        <div class="controls">
                            <input name="ans_1" type="integer"  placeholder="ans_1" value="<?php echo !empty($ans_1)?$ans_1:'';?>">
                            <?php if (!empty($ans_1Error)): ?>
                                <span class="help-inline"><?php echo $ans_1Error;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ans_2Error)?'error':'';?>">
                        <label class="control-label">ans_2</label>
                        <div class="controls">
                            <input name="ans_2" type="integer" placeholder="ans_2" value="<?php echo !empty($ans_2)?$ans_2:'';?>">
                            <?php if (!empty($ans_2Error)): ?>
                                <span class="help-inline"><?php echo $ans_2Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($ans_3Error)?'error':'';?>">
                        <label class="control-label">ans_3</label>
                        <div class="controls">
                            <input name="ans_3" type="integer"  placeholder="ans_3" value="<?php echo !empty($ans_3)?$ans_3:'';?>">
                            <?php if (!empty($ans_3Error)): ?>
                                <span class="help-inline"><?php echo $ans_3Error;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ans_4Error)?'error':'';?>">
                        <label class="control-label">ans_4</label>
                        <div class="controls">
                            <input name="ans_4" type="integer"  placeholder="ans_4" value="<?php echo !empty($ans_4)?$ans_4:'';?>">
                            <?php if (!empty($ans_4Error)): ?>
                                <span class="help-inline"><?php echo $ans_4Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($ans_5Error)?'error':'';?>">
                        <label class="control-label">ans_5</label>
                        <div class="controls">
                            <input name="ans_5" type="integer"  placeholder="ans_5" value="<?php echo !empty($ans_5)?$ans_5:'';?>">
                            <?php if (!empty($ans_5Error)): ?>
                                <span class="help-inline"><?php echo $ans_5Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($remarksError)?'error':'';?>">
                        <label class="control-label">remarks</label>
                        <div class="controls">
                            <input name="remarks" type="integer"  placeholder="remarks" value="<?php echo !empty($remarks)?$remarks:'';?>">
                            <?php if (!empty($remarksError)): ?>
                                <span class="help-inline"><?php echo $remarksError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($contact_idError)?'error':'';?>">
                        <label class="control-label">contact_id</label>
                        <div class="controls">
                            <input name="contact_id" type="integer"  placeholder="contact_id" value="<?php echo !empty($contact_id)?$contact_id:'';?>">
                            <?php if (!empty($contact_idError)): ?>
                                <span class="help-inline"><?php echo $contact_idError;?></span>
                            <?php endif;?>
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