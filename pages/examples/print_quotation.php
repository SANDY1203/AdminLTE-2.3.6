
<?php
if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
	if ( !empty($_GET['val'])) {
        $val = $_REQUEST['val'];
    }

								
								
								
								
					include 'connect.php';
                   $pdo = Database::connect();
                   $sql = "SELECT * FROM quotation Where id=$id";
                   foreach ($pdo->query($sql) as $row) {
					   require('mc_table.php');
								$pdf=new PDF_MC_Table();
								$pdf->AddPage();
								$pdf->SetFont('Arial','',14);
								//Table with 20 rows and 4 columns
								$pdf->SetWidths(array(30,150));
								srand(microtime()*1000000);
								
							$pdf->Row(array("id",$row['id']));
							$pdf->Row(array("lead",$row['lead']));
							$pdf->Row(array("opportunity",$row['opportunity']));
							$pdf->Row(array("proposal",$row['proposal']));
							$pdf->Row(array("quotation",$row['quotation']));
							$pdf->Row(array("ra",$row['ra']));
							$pdf->Row(array("design",$row['design']));
							$pdf->Row(array("testing",$row['testing']));
							$pdf->Row(array("development",$row['development']));
							$pdf->Row(array("support",$row['support']));
							$pdf->Row(array("maintenance",$row['maintenance']));
							$pdf->Row(array("invoice",$row['invoice']));
							$pdf->Row(array("delivery",$row['delivery']));
							$pdf->Row(array("cancelled",$row['cancelled']));
							$pdf->Row(array("delay",$row['delay']));
							$pdf->Row(array("completed",$row['completed']));
							$pdf->Row(array("user_id",$row['user_id']));
                           
                                $pdf->Output();
                   }
                   Database::disconnect();
                  ?>