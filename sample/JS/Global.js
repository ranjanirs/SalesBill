//function to validate the Film Details
function ValidateSalesDetails(oForm)
{
	var txtFilmName=document.forms["frmFilmDetails"]["txtFilmName"].value;
	var SelGenere=document.forms["frmFilmDetails"]["SelGenere"].value;
	var txtAbstract=document.forms["frmFilmDetails"]["txtAbstract"].value;

	if (txtFilmName==null || txtFilmName=="")
	{
		alert("Pls enter the FilmName");
		document.forms["frmFilmDetails"]["txtFilmName"].focus();
		return false;
	}
	if(SelGenere=="select")
	{
		alert("Pls select the Genere");
		document.forms["frmFilmDetails"]["SelGenere"].focus();
		return false;
	}
	
	if (txtAbstract==null || txtAbstract=="")
	{
		alert("Pls enter the Abstract");
		document.forms["frmFilmDetails"]["txtAbstract"].focus();
		return false;
	 }
	return  ImageValidation(oForm,"frmFilmDetails");
	
}
function Validatetextboxes(oForm)
{
	
	var txtQuantity=document.forms["frmsales"]["txtQuantity"].value;
	var txtrate=document.forms["frmsales"]["txtrate"].value;
	var txtamt=document.forms["frmsales"]["txtamt"].value;
	
	if (txtQuantity==null || txtQuantity==""||txtQuantity=="0")
		{
			alert("Pls enter the Quantity/Quantity cannot be zero");
			document.forms["frmsales"]["txtQuantity"].focus();
			return false;
		}
	if (txtrate==null || txtrate==""||txtrate=="0")
	{
		alert("Pls enter the rate/rate cannot be zero");
		document.forms["frmsales"]["txtrate"].focus();
		return false;
	}
	if (txtamt==null || txtamt==""||txtamt=="0")
	{
		alert("Pls enter the amount / amount cannot be zero");
		document.forms["frmsales"]["txtamt"].focus();
		return false;
	}
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
		alert("hi");
	}
