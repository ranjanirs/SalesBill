<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sales bill save</title>
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
		//salesId
			
		$sql11 = "SELECT MAX(convert(SalesId, unsigned))  FROM tblsales1";
		$result11 = $conn->query($sql11);

		
		if ($result11->num_rows > 0) 
		{
			
			$row11 = $result11 -> fetch_row();

			if($row11[0]!="")
			{

			$Sales_Id=$row11[0] ;
			$Sales_Id=$Sales_Id+1;
			}
			else
			{
			$Sales_Id="1";
			}	
		}
		else {
			echo "0 results";
			}
			
			
			
		$sql2 = "SELECT MAX(convert(Invoiceno, unsigned))  FROM tblsales1";
		$result1 = $conn->query($sql2);

		
		
		if ($result1->num_rows > 0) 
		{
			
			$row2 = $result1->fetch_row();
		//$row1 = mysql_fetch_row($result1);
			if($row2[0]!="")
			{

			$Invoice_no=$row2[0] ;
			$Invoice_no=$Invoice_no+1;
			}
			else
			{
			$Invoice_no="1";
			}	
		}
		else {
			echo "0 results";
			}
			
			/*---*/
			
		$txtInvoiceno=$Invoice_no;
		$Date1=$_POST["txtDate1"];
				
		$sql1="INSERT INTO tblsales1(SalesId,Saldat1,Invoiceno,PartyName,NetAmount)
		VALUES
		('$Sales_Id',STR_TO_DATE('$Date1', '%d/%m/%Y'),'$txtInvoiceno','$_POST[txtparty]','0')";
		
		
		if ($conn->query($sql1) === TRUE) 
		{
			$s=0;
			echo "New record created successfully";
		} 
		else 
		{
			$s=1;
			echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
		
		
		/* ---- */
		
		
		?>
			</div><!--End of divContent  -->
		</div><!--End of ContentWrapper-->
</body>
</html>
