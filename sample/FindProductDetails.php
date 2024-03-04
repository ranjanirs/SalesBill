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
	
	//salesproduct id generation
	
	$sql = "SELECT MAX(convert(SalesProdID, unsigned))  FROM tblsalesproductdet";
	$result = $conn->query($sql);



	if ($result->num_rows > 0) 
	{

		$row = $result->fetch_row();
		if($row[0]!="")
		{

			$SalesProd_ID=$row[0] ;
			$SalesProd_ID=$SalesProd_ID+1;
		}
		else
		{
			$SalesProd_ID="1";
		}	
	}
	else 
	{
		"0 results";
	}
	 $productname=$_GET['productname'];
	 $Quantity=$_GET['Quantity'];
	 $rate=$_GET['rate'];
	 $amount=$_GET['amount'];
	 $Invoiceno=$_GET['Invoiceno'];
	 
	 /* ----*/
	 $sql1="INSERT INTO tblsalesproductdet(SalesProdID,ProductName,Qty,Rate,Amount,Invoiceno)
		VALUES
		('$SalesProd_ID','$productname','$Quantity','$rate','$amount','$Invoiceno')";
		
		
		if ($conn->query($sql1) === TRUE) 
		{
			$s=0;
			//echo "New record created successfully";
		} 
		else 
		{
			$s=1;
			echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
		
		if($s==0)
		{
			$sql2 = "SELECT * FROM tblsalesproductdet where Invoiceno=". $Invoiceno;
			$result2 = $conn->query($sql2);
			$i=1;
			if ($result2->num_rows > 0 ) 
			{
				 
				echo "<div class='divSearchDet1'>";
					echo '<table WIDTH="700" border="1" CELLPADDING="0" cellspacing="0">';
					echo "<tr>";
					echo "<th>Sno</th>";
					echo "<th>Product Name</th>";
					echo "<th>Quantity</th>";
					echo "<th>Rate</th>";
					echo "<th> Amount</th>";
					echo "</tr>";
					
					while($row3 = $result2 -> fetch_array(MYSQLI_ASSOC)) {
						echo "<tr align='center'>";
						echo "<td>".$i."</td>";
						echo "<td>" . $row3['ProductName'] . "</td>";
						echo "<td>" . $row3['Qty'] . "</td>";
						echo "<td>" . $row3['Rate'] . "</td>";
						echo "<td>" . $row3['Amount'] . "</td>";
						echo "</tr>";
						$i++;
					}
					echo "</table>";
				echo "</div>";
			}
			else 
			{
				echo "<div >No Records Found </div>";
			}
		}		
	 /*--- */
	
?>

