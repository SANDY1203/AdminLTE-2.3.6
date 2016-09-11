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
        $contact_nameError = null;
        $contact_positionError = null;
		$contact_number_oneError = null;
        $contact_number_twoError = null;
        $contact_email_oneError = null;
		$contact_email_twoError = null;
		$contact_company_alloError = null;
        
         
        // keep track post values
     	
        $contact_name = $_POST['contact_name'];
        $contact_position = $_POST['contact_position'];
		$contact_number_one = $_POST['contact_number_one'];
		$contact_number_two = $_POST['contact_number_two'];
		$contact_email_one = $_POST['contact_email_one'];
		$contact_email_two = $_POST['contact_email_two'];
		$contact_company_allo = $_POST['contact_company_allo'];
         
        // validate input
        $valid = true;
       
        }
		if (empty($contact_name)) {
            $contact_nameError = 'Please enter contact_name';
            $valid = false;
        }
		if (empty($contact_position)) {
            $contact_positionError = 'Please enter contact_position';
            $valid = false;
        }
         if (empty($contact_number_one)) {
            $contact_number_oneError = 'Please enter contact_number_one';
            $valid = false;
        }
		if (empty($contact_number_two)) {
            $contact_number_twoError = 'Please enter contact_number_two';
            $valid = false;
        }
        if (empty($contact_email_one)) {
            $contact_email_oneError = 'Please enter contact_email_one';
            $valid = false;
        } else if ( !filter_var($contact_email_one,FILTER_VALIDATE_EMAIL) ) {
            $contact_email_oneError = 'Please enter a valid Email Address';
            $valid = false;
        }
		if (empty($contact_email_two)) {
            $contact_email_twoError = 'Please enter contact_email_two';
            $valid = false;
        } else if ( !filter_var($contact_email_two,FILTER_VALIDATE_EMAIL) ) {
            $contact_email_twoError = 'Please enter a valid Email Address';
            $valid = false;
        }
         if (empty($contact_company_allo)) {
            $contact_company_alloError = 'Please enter contact_company_allo';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE contact set contact_name = ?, contact_position = ?, contact_number_one = ?, contact_number_two = ?, contact_email_one = ?, contact_email_two = ?, contact_company_allo = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($contact_name,$contact_position,$contact_number_one,$contact_number_two,$contact_email_one,$contact_email_two,$contact_company_allo,$id));
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
        $sql = "SELECT * FROM contact where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$contact_name = $data['contact_name'];
        $contact_position = $data['contact_position'];
        $contact_number_one = $data['contact_number_one'];
        $contact_number_two = $data['contact_number_two'];
		$contact_email_one = $data['contact_email_one'];
		$contact_email_two = $data['contact_email_two'];
		$contact_company_allo = $data['contact_company_allo'];
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
                        <h3>Update a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_contact.php?id=<?php echo $id?>&val=<?php echo $val?>" method="post">

                      <div class="control-group <?php echo !empty($contact_nameError)?'error':'';?>">

                     
					  <div class="control-group <?php echo !empty($contact_nameError)?'error':'';?>">

                        <label class="control-label">contact_name</label>
                        <div class="controls">
                            <input name="contact_name" type="text"  placeholder="contact_name" value="<?php echo !empty($contact_name)?$contact_name:'';?>">
                            <?php if (!empty($contact_nameError)): ?>
                                <span class="help-inline"><?php echo $contact_name;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($contact_positionError)?'error':'';?>">
                        <label class="control-label">contact_position</label>
                        <div class="controls">
                            <input name="contact_position" type="text"  placeholder="contact_position" value="<?php echo !empty($contact_position)?$contact_position:'';?>">
                            <?php if (!empty($contact_positionError)): ?>
                                <span class="help-inline"><?php echo $contact_positionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($contact_number_one)?'error':'';?>">
                        <label class="control-label">contact_number_one</label>
                        <div class="controls">
                            <input name="contact_number_one" type="integer"  placeholder="contact_number_one" value="<?php echo !empty($contact_number_one)?$contact_number_one:'';?>">
                            <?php if (!empty($contact_number_oneError)): ?>
                                <span class="help-inline"><?php echo $contact_number_oneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($contact_number_twoError)?'error':'';?>">
                        <label class="control-label">contact_number_two</label>
                        <div class="controls">
                            <input name="contact_number_two" type="integer" placeholder="contact_number_two" value="<?php echo !empty($contact_number_two)?$contact_number_two:'';?>">
                            <?php if (!empty($contact_number_twoError)): ?>
                                <span class="help-inline"><?php echo $contact_number_twoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($contact_email_oneError)?'error':'';?>">
                        <label class="control-label">contact_email_one</label>
                        <div class="controls">
                            <input name="contact_email_one" type="email"  placeholder="contact_email_one" value="<?php echo !empty($contact_email_one)?$contact_email_one:'';?>">
                            <?php if (!empty($contact_email_oneError)): ?>
                                <span class="help-inline"><?php echo $contact_email_oneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($contact_email_twoError)?'error':'';?>">
                        <label class="control-label">contact_email_two</label>
                        <div class="controls">
                            <input name="contact_email_two" type="email"  placeholder="contact_email_two" value="<?php echo !empty($contact_email_two)?$contact_email_two:'';?>">
                            <?php if (!empty($contact_email_twoError)): ?>
                                <span class="help-inline"><?php echo $contact_email_twoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($contact_company_alloError)?'error':'';?>">
                        <label class="control-label">contact_company_allo</label>
                        <div class="controls">
                            <input name="contact_company_allo" type="integer"  placeholder="contact_company_allo" value="<?php echo !empty($contact_company_allo)?$contact_company_allo:'';?>">
                            <?php if (!empty($contact_company_alloError)): ?>
                                <span class="help-inline"><?php echo $contact_company_alloError;?></span>
                            <?php endif;?>
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