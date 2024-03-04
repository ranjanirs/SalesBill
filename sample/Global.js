//function to validate the sales bill

function cleartextboxes()
{
	document.getElementById("txtproduct").value="";
	document.getElementById("txtQuantity").value="";
	document.getElementById("txtrate").value="";
	document.getElementById("txtamt").value="" ;
	document.getElementById("txtproduct").focus();
	
}


function ValProductValue()
{
	 var Qty = document.getElementById("txtQuantity").value;
	 var rate1 = document.getElementById("txtrate").value;
	 //alert(Qty);
	 //alert(rate1);
	 var amt= Qty*rate1;
	 //alert(amt);
	 document.getElementById("txtamt").value = amt;
	 	 
}
function GetSalesDetails()
	{
		var product= document.getElementById("txtproduct").value;
		var Qty = document.getElementById("txtQuantity").value;
		var rate1 = document.getElementById("txtrate").value;
		var amt= document.getElementById("txtamt").value ;
		var SelParty_Name= document.getElementById("SelPartyName").value ;
		var Invoice_No= document.getElementById("txtInvoiceno").value ;
		
		//alert("hi");	
		//alert(Qty);
		
		if(product==null || product=="")
		{
			alert("Pls enter the product name");
			document.getElementById("txtproduct").focus();
		}
		else if(SelParty_Name == "select")
		{
			alert("Pls enter the Party name name");
			document.getElementById("SelPartyName").focus();
		}
		else if(Qty==null || Qty=="")
		{
			alert("Pls enter the Quantity");
			document.getElementById("txtQuantity").focus();
		}
		else if(rate1==null || rate1=="")
		{
			alert("Pls enter the rate");
			document.getElementById("txtrate").focus();
		}
		else if(amt==null || amt=="")
		{
			alert("Pls enter the amount");
			document.getElementById("amt").focus();
		}
		else
		{
	
			var strURL="FindProductDetails.php?productname="+product+"&Quantity="+Qty+"&rate="+rate1+"&amount="+amt+"&Invoiceno="+Invoice_No;
			var req=new XMLHttpRequest();
			
			req.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) 
				{
					
					document.getElementById('divtabledis').innerHTML=this.responseText;
				}//200 
				
			};	  
			   req.open("GET", strURL, true);
			   req.send();
			   cleartextboxes();
			}
		
		}
			
		   		   