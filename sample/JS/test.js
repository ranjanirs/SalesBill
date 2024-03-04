//Ajax code

	/*function GetSalesDetails()
	{
		var product= document.getElementById("txtproduct").value;
		var Qty = document.getElementById("txtQuantity").value;
		var rate1 = document.getElementById("txtrate").value;
		var amt= document.getElementById("txtamt").value ;
			alert("hi");	
		alert(Qty);
		
		/*if(product==null || product=="")
		{
			alert("Pls enter the product name");
			document.getElementById("txtproduct").focus();
		}
		if(Qty==null || Qty=="")
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
	
			
			var strURL="FindProductDetails.php?productname="+product+"&Quantity="+Qty+"&rate="+rate1+"&amount="+amt;
			if (window.XMLHttpRequest) 
			{
				// code for IE7+, Firefox, Chrome, Opera, Safari
				req=new XMLHttpRequest();
			}
			else 
			{ // code for IE6, IE5
				req=new ActiveXObject("Microsoft.XMLHTTP");
			}
		   if (req)
		   {
			 req.onreadystatechange = function()
			 {
				  if (req.readyState == 4)
				  {
				 // only if "OK"
					if (req.status == 200)
					{
						document.getElementById('divtabledispaly').innerHTML=req.responseText;
					}//200 
					else
					{
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				  }//end if 4
			  }//end of if req
			   req.open("GET", strURL, true);
			   req.send(null);
		   }
		}//end of else
			*/
	//}//end of function
	
/*function SetCursorFocus(frm,txt) 
{
  document.forms[frm][txt].focus();
}*/


====================


/*if (req)
		   {
			 req.onreadystatechange = function()
			 {
				  if (req.readyState == 4)
				  {
				 // only if "OK"
					if (req.status == 200)
					{
						document.getElementById('divtabledispaly').innerHTML=req.responseText;
					}//200 
					else
					{
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				  }//end if 4
			  }//end of if req
			   req.open("GET", strURL, true);
			   req.send();
		   }
		} */ 
		//end of else
			
	} //end of function
=================