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
        
        $product_nameError = null;
        $product_descriptionError = null;
		$product_start_priceError = null;
        $product_end_priceError = null;
        $categoryError = null;
       
         
        // keep track post values
     	
        $product_name = $_POST['product_name'];
		$product_description = $_POST['product_description'];
        $product_start_price = $_POST['product_start_price'];
        $product_end_price = $_POST['product_end_price'];
		$category = $_POST['category'];
	
         
        // validate input
        $valid = true;
       
        }
		if (empty($product_name)) {
            $product_nameError = 'Please enter name';
            $valid = false;
        }
         if (empty($product_description)) {
            $product_descriptionError = 'Please enter product_description';
            $valid = false;
        }
        if (empty($product_start_price)) {
            $product_start_priceError = 'Please enter product_start_price Address';
            $valid = false;
        
        }
         if (empty($product_end_price)) {
            $product_end_priceError = 'Please enter product_end_price';
            $valid = false;
        }
        if (empty($category)) {
            $categoryError = 'Please enter category';
            $valid = false;
        }
		
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE proserv set product_name = ?, product_description = ?, product_start_price = ?, product_end_price = ?, category = ?  WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($product_name,$product_description,$product_start_price,$product_end_price,$category,$id));
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
        $sql = "SELECT * FROM proserv where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$product_name = $data['product_name'];
        $product_description = $data['product_description'];
        $product_start_price = $data['product_start_price'];
        $product_end_price = $data['product_end_price'];
		$category = $data['category'];
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
                        <h3>Update a PROSERV</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_proserv.php?id=<?php echo $id?>&val=<?php echo $val?>" method="post">

                      <div class="control-group <?php echo !empty($product_nameError)?'error':'';?>">

                     
					  <div class="control-group <?php echo !empty($product_nameError)?'error':'';?>">

                        <label class="control-label">product_name</label>
                        <div class="controls">
                            <input name="product_name" type="text"  placeholder="product_name" value="<?php echo !empty($product_name)?$product_name:'';?>">
                            <?php if (!empty($product_nameError)): ?>
                                <span class="help-inline"><?php echo $product_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($product_descriptionError)?'error':'';?>">
                        <label class="control-label">product_description</label>
                        <div class="controls">
                            <input name="product_description" type="text"  placeholder="product_description" value="<?php echo !empty($product_description)?$product_description:'';?>">
                            <?php if (!empty($product_descriptionError)): ?>
                                <span class="help-inline"><?php echo $product_descriptionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($product_start_priceError)?'error':'';?>">
                        <label class="control-label">product_start_price</label>
                        <div class="controls">
                            <input name="product_start_price" type="text" placeholder="product_start_price Address" value="<?php echo !empty($product_start_price)?$product_start_price:'';?>">
                            <?php if (!empty($product_start_priceError)): ?>
                                <span class="help-inline"><?php echo $product_start_priceError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($product_end_priceError)?'error':'';?>">
                        <label class="control-label">product_end_price</label>
                        <div class="controls">
                            <input name="product_end_price" type="product_end_price"  placeholder="product_end_price" value="<?php echo !empty($product_end_price)?$product_end_price:'';?>">
                            <?php if (!empty($product_end_priceError)): ?>
                                <span class="help-inline"><?php echo $product_end_priceError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($categoryError)?'error':'';?>">
                        <label class="control-label">category</label>
                        <div class="controls">
                            <input name="category" type="text"  placeholder="category" value="<?php echo !empty($category)?$category:'';?>">
                            <?php if (!empty($categoryError)): ?>
                                <span class="help-inline"><?php echo $categoryError;?></span>
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