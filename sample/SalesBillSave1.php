<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SalesBill Save</title>
<link rel="stylesheet" type="text/css" href="CSS/Style1.css" />
</head>

<body>
	<!--Div - ContentWrapper-->
	<div  Class="ContentWrapper1" align="center">
		<!--Div - divContent-->
		<div class="divContent11">

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dbSales";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 


	$sql = "SELECT MAX(convert(Invoiceno, unsigned))  FROM tblsales1";
	$result = $conn->query($sql);



	if ($result->num_rows > 0) 
	{

		$row = $result->fetch_row();
	
		if($row[0]!="")
		{
			$Invoice_no=$row[0] ;
			$Invoice_no=$Invoice_no+1;
		}
		else
		{
			$Invoice_no="1";
		}	
	}
	else 
	{
		echo "0 results";
	}
	
	//salesId
	$sql12 = "SELECT MAX(convert(SalesId, unsigned))  FROM tblsales1";
	$result12 = $conn->query($sql12);



	if ($result12->num_rows > 0) 
	{

		$row12 = $result12->fetch_row();
	
		if($row12[0]!="")
		{
			$Sales_Id=$row12[0] ;
			$Sales_Id=$Sales_Id+1;
		}
		else
		{
			$Sales_Id="1";
		}	
	}
	else 
	{
		echo "0 results";
	}
	
	//Sales ProductId
	//salesId
	$sql13 = "SELECT MAX(convert(SalesProdID, unsigned))  FROM tblsalesproductdet1";
	$result13 = $conn->query($sql13);



	if ($result13->num_rows > 0) 
	{

		$row13 = $result13->fetch_row();
	
		if($row13[0]!="")
		{
			$Sales_ProdID=$row13[0] ;
			$Sales_ProdID=$Sales_ProdID+1;
		}
		else
		{
			$Sales_ProdID="1";
		}	
	}
	else 
	{
		echo "0 results";
	}
	
	//
	
		$txtInvoiceno=$Invoice_no;
		$selDate1=$_POST["txtDate1"];
		$Sel_PartyName=$_POST["SelPartyName"];
		$net_amt=0;
			$sql15 = "SELECT * FROM tblsalesproductdet";
			$result15 = $conn->query($sql15);

			if ($result15->num_rows > 0) 
			{
				while($row15 = $result15 -> fetch_array(MYSQLI_ASSOC)) 
				{
					$amt=$row15['Amount'];
					$net_amt= $amt+ $net_amt;
				}
			}

			
	
		$sql1="INSERT INTO tblsales1(SalesId,Saldat1,Invoiceno,PartyName,NetAmount)
		VALUES
		('$Sales_Id',STR_TO_DATE('$selDate1', '%d/%m/%Y'),'$txtInvoiceno','$Sel_PartyName','$net_amt')";
		
		
		if ($conn->query($sql1) === TRUE) 
		{
			$s=1;
			//echo "New record created successfully";
		} 
		else 
		{
			$s=0;
			echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
		if($s==1)
		{
			$sql2 = "SELECT * FROM tblsalesproductdet";
			$result2 = $conn->query($sql2);

			if ($result2->num_rows > 0) 
			{
				while($row2 = $result2 -> fetch_array(MYSQLI_ASSOC)) 
				{
						$prod_name=$row2['ProductName'];
						$qt=$row2['Qty'];
						$rate=$row2['Rate'];
						$amt=$row2['Amount'];
						$Inv_no=$row2['Invoiceno'];
						
						$net_amt= $amt+ $net_amt;
						
						$sql3="INSERT INTO tblsalesproductdet1(SalesProdID,ProductName,Qty,Rate,Amount,Invoiceno)
						VALUES
						('$Sales_ProdID','$prod_name','$qt','$rate','$amt','$Inv_no')";
												
						//echo " sql3 =". $sql3."</br>";
						
						if ($conn->query($sql3) === TRUE) 
						{
							$v=1;
							
						} 
						else 
						{
							$v=0;
							
						}
				}//end of while
				
				$sql4="DELETE FROM tblsalesproductdet";
				$conn->query($sql4);
			}// end of if
		}
	
		$conn->close();
		 if($s==0)
		 {
		?>
			<div class="lblRec">Record not Inserted</div>
			<div class="lblBackSalesBill"><a href="SalesBill2.php" class="navigation">Back to Sales bill</a></div>
		
		<?php
			}
			else if($s==1)
			{
		
		?>
			<div class="lblRec">Sales Bill Generated Successfully</div>
			<div class="lblBackSalesBill"><a href="SalesBill2.php" class="navigation">Back to Sales bill</a></div>
			
		<?php
		   }
		?>
			</div><!--End of divContent  -->
		</div><!--End of ContentWrapper-->
</body>
</html>
