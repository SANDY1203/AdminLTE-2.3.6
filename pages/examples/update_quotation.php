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
        
        $leadError = null;
        $opportunityError = null;
		$proposalError = null;
        $quotationError = null;
		$ra = null;
		$designError = null;
        $testingError = null;
		$developmentError = null;
        $supportError = null;
		$maintenanceError = null;
		$deliveryError = null;
        $invoiceError = null;
		$cancelledError = null;
        $delayError = null;
		$completedError = null;
		$user_id = null;
    
         
        // keep track post values
     	
        $lead = $_POST['lead'];
		$opportunity = $_POST['opportunity'];
        $proposal = $_POST['proposal'];
        $quotation = $_POST['quotation'];
		$ra = $_POST['ra'];
		$design = $_POST['design'];
		$testing = $_POST['testing'];
        $development = $_POST['development'];
        $support = $_POST['support'];
		$maintenance = $_POST['maintenance'];
		$delivery = $_POST['delivery'];
		$invoice = $_POST['invoice'];
        $cancelled = $_POST['cancelled'];
        $delay = $_POST['delay'];
		$completed = $_POST['completed'];
		$user_id = $_POST['user_id'];
		
        // validate input
        $valid = true;
       
        }
		if (empty($lead)) {
            $leadError = 'Please enter lead';
            $valid = false;
        }
		if (empty($opportunity)) {
            $opportunityError = 'Please enter opportunity';
            $valid = false;
        }
         if (empty($proposal)) {
            $proposalError = 'Please enter proposal';
            $valid = false;
        }
		
        if (empty($quotation)) {
            $quotationError = 'Please enter quotation';
            $valid = false;
        }
		 if (empty($ra)) {
            $raError = 'Please enter ra';
            $valid = false;
        }
		if (empty($design)) {
            $designError = 'Please enter design';
            $valid = false;
        }
		if (empty($testing)) {
            $testingError = 'Please enter testing';
            $valid = false;
        }
         if (empty($development)) {
            $developmentError = 'Please enter development';
            $valid = false;
        }
		
        if (empty($support)) {
            $supportError = 'Please enter support';
            $valid = false;
        }
		 if (empty($maintenance)) {
            $maintenanceError = 'Please enter maintenance';
            $valid = false;
        }
		if (empty($invoice)) {
            $invoiceError = 'Please enter invoice';
            $valid = false;
        }
		if (empty($delivery)) {
            $deliveryError = 'Please enter delivery';
            $valid = false;
        }
		if (empty($cancelled)) {
            $cancelledError = 'Please enter cancelled';
            $valid = false;
        }
         if (empty($delay)) {
            $delayError = 'Please enter delay';
            $valid = false;
        }
		
        if (empty($completed)) {
            $completedError = 'Please enter completed';
            $valid = false;
        }
		 if (empty($user_id)) {
            $user_idError = 'Please enter user_id';
            $valid = false;
        }
   
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE quotation set lead = ?, opportunity = ?, proposal = ?, quotation = ?, ra = ?, design = ?, development = ?, testing = ?, support = ?, maintenance = ?, invoice = ?, delivery = ?, cancelled = ?, delay = ?, completed = ?, user_id = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
            $q->execute(array($lead,$opportunity,$proposal,$quotation,$ra,$design,$development,$testing,$support,$maintenance,$invoice,$delivery,$cancelled,$delay,$completed,$user_id,$id));
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
		header("Location: project_manager.php");
		}					
		else
		{
		header("Location: indeex.php");
		}
        }
     else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM quotation where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$lead = $data['lead'];
        $opportunity = $data['opportunity'];
        $proposal = $data['proposal'];
        $quotation = $data['quotation'];
		$ra = $data['ra'];
        $design = $data['design'];
        $development = $data['development'];
        $testing = $data['testing'];
		$support = $data['support'];
        $maintenance = $data['maintenance'];
        $invoice = $data['invoice'];
        $delivery = $data['delivery'];
		$cancelled = $data['cancelled'];
        $delay = $data['delay'];
        $completed = $data['completed'];
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
                        <h3>Update a QUOTATION</h3>
                    </div>
					
             
                    <form class="form-horizontal" action="update_quotation.php?id=<?php echo $id?>&val=<?php echo $val?>" method="post">

                      <div class="control-group <?php echo !empty($leadError)?'error':'';?>">
                        <label class="control-label">lead</label>
                        <div class="controls">
                            <input name="lead" type="text"  placeholder="lead" value="<?php echo !empty($lead)?$lead:'';?>">
                            <?php if (!empty($leadError)): ?>
                                <span class="help-inline"><?php echo $lead;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($opportunityError)?'error':'';?>">
                        <label class="control-label">opportunity</label>
                        <div class="controls">
                            <input name="opportunity" type="text"  placeholder="opportunity" value="<?php echo !empty($opportunity)?$opportunity:'';?>">
                            <?php if (!empty($opportunityError)): ?>
                                <span class="help-inline"><?php echo $opportunityError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($proposalError)?'error':'';?>">
                        <label class="control-label">proposal</label>
                        <div class="controls">
                            <input name="proposal" type="text"  placeholder="proposal" value="<?php echo !empty($proposal)?$proposal:'';?>">
                            <?php if (!empty($proposalError)): ?>
                                <span class="help-inline"><?php echo $proposalError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($quotationError)?'error':'';?>">
                        <label class="control-label">quotation</label>
                        <div class="controls">
                            <input name="quotation" type="text" placeholder="quotation" value="<?php echo !empty($quotation)?$quotation:'';?>">
                            <?php if (!empty($quotationError)): ?>
                                <span class="help-inline"><?php echo $quotationError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($raError)?'error':'';?>">
                        <label class="control-label">ra</label>
                        <div class="controls">
                            <input name="ra" type="text"  placeholder="ra" value="<?php echo !empty($ra)?$ra:'';?>">
                            <?php if (!empty($raError)): ?>
                                <span class="help-inline"><?php echo $raError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($designError)?'error':'';?>">
                        <label class="control-label">design</label>
                        <div class="controls">
                            <input name="design" type="text"  placeholder="design" value="<?php echo !empty($design)?$design:'';?>">
                            <?php if (!empty($designError)): ?>
                                <span class="help-inline"><?php echo $design;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($testingError)?'error':'';?>">
                        <label class="control-label">testing</label>
                        <div class="controls">
                            <input name="testing" type="text"  placeholder="testing" value="<?php echo !empty($testing)?$testing:'';?>">
                            <?php if (!empty($testingError)): ?>
                                <span class="help-inline"><?php echo $testingError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($developmentError)?'error':'';?>">
                        <label class="control-label">development</label>
                        <div class="controls">
                            <input name="development" type="text"  placeholder="development" value="<?php echo !empty($development)?$development:'';?>">
                            <?php if (!empty($developmentError)): ?>
                                <span class="help-inline"><?php echo $developmentError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($supportError)?'error':'';?>">
                        <label class="control-label">support</label>
                        <div class="controls">
                            <input name="support" type="text" placeholder="support" value="<?php echo !empty($support)?$support:'';?>">
                            <?php if (!empty($supportError)): ?>
                                <span class="help-inline"><?php echo $supportError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($maintenanceError)?'error':'';?>">
                        <label class="control-label">maintenance</label>
                        <div class="controls">
                            <input name="maintenance" type="text"  placeholder="maintenance" value="<?php echo !empty($maintenance)?$maintenance:'';?>">
                            <?php if (!empty($maintenanceError)): ?>
                                <span class="help-inline"><?php echo $maintenanceError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($invoiceError)?'error':'';?>">
                        <label class="control-label">invoice</label>
                        <div class="controls">
                            <input name="invoice" type="text"  placeholder="invoice" value="<?php echo !empty($invoice)?$invoice:'';?>">
                            <?php if (!empty($invoiceError)): ?>
                                <span class="help-inline"><?php echo $invoice;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($deliveryError)?'error':'';?>">
                        <label class="control-label">delivery</label>
                        <div class="controls">
                            <input name="delivery" type="text"  placeholder="delivery" value="<?php echo !empty($delivery)?$delivery:'';?>">
                            <?php if (!empty($deliveryError)): ?>
                                <span class="help-inline"><?php echo $deliveryError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($cancelledError)?'error':'';?>">
                        <label class="control-label">cancelled</label>
                        <div class="controls">
                            <input name="cancelled" type="text"  placeholder="cancelled" value="<?php echo !empty($cancelled)?$cancelled:'';?>">
                            <?php if (!empty($cancelledError)): ?>
                                <span class="help-inline"><?php echo $cancelledError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($delayError)?'error':'';?>">
                        <label class="control-label">delay</label>
                        <div class="controls">
                            <input name="delay" type="text" placeholder="delay" value="<?php echo !empty($delay)?$delay:'';?>">
                            <?php if (!empty($delayError)): ?>
                                <span class="help-inline"><?php echo $delayError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($completedError)?'error':'';?>">
                        <label class="control-label">completed</label>
                        <div class="controls">
                            <input name="completed" type="text" placeholder="completed" value="<?php echo !empty($completed)?$completed:'';?>">
                            <?php if (!empty($completedError)): ?>
                                <span class="help-inline"><?php echo $completedError;?></span>
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
                          <button type="submit" class="btn btn-success">Update</button>
                          <?php
						if($val == "company"){
						echo "<a class='btn' href='company_index.php'>Back</a>";}
						elseif($val == "sales"){
						echo "<a class='btn' href='sales_index.php'>Back</a>";}
						elseif($val == "prom"){
						echo "<a class='btn' href='project_manager.php'>Back</a>";}
						else{
						echo "<a class='btn' href='indeex.php'>Back</a>";}
						
						  ?>
                        </div>
                    </form>
                </div>
               
	</div><!-- /container -->
  </body>
</html>