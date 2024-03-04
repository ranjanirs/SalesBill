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
if (txtQuantity==null || txtQuantity==""||txtQuantity=="0")
	{
		alert("Pls enter the Quantity/Quantity cannot be zero");
		document.forms["frmsales"]["txtQuantity"].focus();
		return false;
	}