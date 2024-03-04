 <!DOCTYPE html>
<html>
<head>
	<title>Sales Bill</title>
	<link rel="stylesheet" type="text/css" href="CSS/style1.css" />
	<script type="text/javascript" src="JS/Global.js" ></script>
	<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
		   
	<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
	<script type="text/javascript"> 
		window.onload = function(){
			new JsDatePick({
				useMode:2,
				target:"txtDate1",
				dateFormat:"%d/%m/%Y"
			});
		};
		
	</script>
	<style>  
           ul{  
                background-color:#eee;  
                cursor:pointer;  
           }  
           li{  
                padding:12px;  
           }  
           </style>  
	</head>
<body>
<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dbSales";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 


		$sql = "SELECT MAX(convert(Invoiceno, unsigned))  FROM tblsales";
		$result = $conn->query($sql);

		
		
		if ($result->num_rows > 0) 
		{
			
			$row = $result->fetch_row();
		//$row1 = mysql_fetch_row($result1);
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
		else {
			echo "0 results";
			}
			
			
			

			
			
			$conn->close();	
?>



	
	<div  class="ContentWrapper1" align="center">
		
		<div class="divContent11">
		<form id="frmsales" name="frmsales" method="post"  action="SalesBillSave.php" enctype="multipart/form-data"
			   onsubmit="return ()">
			   <!-- onsubmit="return Validatetextboxes(this)" -->
			  
			   <!--Div - divOuterSales-->
				<div class="divOuter1">
					<div class="divHeading" align="center">Sales bill</div>
					
					<div class="divlblEmpHeader">Sales Details</div>
					
					<!--Date-->
					<div class="divlabelOuter"> 
					
							<div class="divlblEmpname1">Date</div>
							<div class="divtxtEmpName1" >
								<input type="text" size="12" id="txtDate1" name="txtDate1"  autocomplete="off" autofocus   />
								
							</div>
						
						
						<!--Invoice no-->
						
						<div class="divlblGender1">Invoice No</div>
							<div class="divSelEmpName1" >
							
								<input type="text" id="txtInvoiceno" name="txtInvoiceno"  value="<?php echo $Invoice_no ?>" disabled  />
							
							</div>
						
						
						<div class="divMLMPhotoOuter">
										<div class="divlblPhoto1">product</div>
										<div class="divPhoto1">
											<div class="divImgbut">
											<div class="container" style="width:500px;border:1px solid  #CCC;">
												<!--<input type="text" id="txtproduct" name="txtproduct" />-->
												<input type="text" name="txtproduct" id="txtproduct" class="form-control" placeholder="Enter Product Name" /> 
												 												
												<div id="productList" style="overflow:auto;"></div>
											</div>  												
											</div>
										</div>
										
						</div>
						<div class="divlblExp2">Party</div>
							<div class="divtxtExp2" >
								<?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "dbSales";
									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									} 

									$sql = "SELECT * FROM tblparty";
									$result = $conn->query($sql);


									if ($result->num_rows > 0) {
									echo "<select name='SelPartyName' >";
									echo "<option value='select'>Select</option>";	
									while($row = $result->fetch_assoc()) 
									{
									echo "<option value=". $row['partyId'].">" . $row['partyname'] . "</option>";
									}
									} else {
									echo "0 results";
									}

									$conn->close();	
									echo "</select>";


							?>
							
							</div>
							
						<div class="divMLMPhotoOuter">
										<div class="divlblPhoto1">Quantity</div>
										<div class="divPhoto1">
											<div class="divImgbut">
												<input type="text" id="txtQuantity" name="txtQuantity"  onchange="ValProductValue()" />
											</div>
										</div>
						</div>
						
						
						<div class="divlblExp2">rate</div>
						<div class="divtxtExp2" >
							<input type="text" id="txtrate" name="txtrate" onchange="ValProductValue()"  />
							
						</div>
						
						
						<div class="divMLMPhotoOuter">
										<div class="divlblPhoto1">Amount</div>
										<div class="divPhoto1">
											<div class="divImgbut">
												<input type="text" id="txtamt" name="txtamt" disabled  />
											</div>
										</div>
						</div>
						
						<div style="float:left; padding-top:30px;">
							<input type="button" name="btnAdd" Value="Add" onclick="GetSalesDetails();" />
						</div>
						
						<!-- table content -->
				<div id="divtabledispaly" style="margin-top:50px">
						<div class='divSearchDet1'>
							<table WIDTH="700" border="1" CELLPADDING="0" cellspacing="00">
								<tr>
									<th width="300">sno</th>
									<th width="300">Product</th>
									<th width="300">Qty</th>
									<th width="300">rate</th>
									<th width="300">Amount</th>
								</tr>
							</table>
							</div>
						</div>
				<!-- table content -->
						<div class="divLoginButton" align="center">
						  <input type="submit" name="btnSave"  value="Save" />
						</div>
						
						</div><!-- outer div1>
					</div>	

				

					
			  <!--Div - divOuterSales-->
			   
		</form>
</div>
</div>



</body>
</html> 



<script>  
 $(document).ready(function(){  
      $('#txtproduct').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#productList').fadeIn();  
                          $('#productList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#txtproduct').val($(this).text());  
           $('#productList').fadeOut();  
      });  
 });  
 
  

 </script>  