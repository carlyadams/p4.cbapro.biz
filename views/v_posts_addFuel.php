<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
body {
	background-color: rgba(51,249,12,1);
}
</style>
</head>
<body>
<div align="center">
<section class="fuel">
<h3>Fuel Cost Calculator</h3>
<p>Here you can calculate your gas mileage and post details about your trip.</p>
<p>Let's start with gas mileage calculations</p>
<form name="form1" id="fuel" method='POST' action='/posts/p_addFuel'>
  <div align="left"><strong>Total expected miles:</strong>  
    <input type="text" id="Miles" name="miles" placeholder="MILES" title="Miles"><br><br>    
    <strong>Miles per Gallon of your vehicle:</strong>  
    <input type="text" id="MPG" name="gas" placeholder="MPG" title="MPG"><br><br>
    <strong>Average price of fuel:</strong>  
    <input type="text" id="FuelPrice" name="price" placeholder="PRICE" title="Price"><br><br> 
    <strong>The trip Cost:  $</strong>
    <input type="text" id="fuel" name="fuel" placeholder="Fuel" title="fuel" readonly><br> <br>   
    <input type="button" value="Calculate" onclick="d()"> <br> <br> <input type="Reset" value="Clear"><br><br>
    <input type="submit" id="submit" name="submit" title="submit"><br> <br>
    <p id="mess"></p>
</div>
</form>
</section>
</div>


<noscript>CBA Professionals is a FIRM that practices GREEN. Interested in learning more, visit us at cbaprofessionals.com
</noscript>
<script type="text/javascript">
function d(){
  var a = document.form1.miles.value;
  var b = document.form1.gas.value;
  var c = document.form1.price.value;
  var fuel = document.form1.fuel.value;
  E=c/b;
  F=E*a;
  document.form1.fuel.value=F.toFixed(2);
  var y=document.getElementById("mess");
  y.innerHTML="";
  				try{
				if(a=="") throw "Please enter Miles";
  				if(isNaN(a)) throw "A number is required for Miles";
				if(b=="") throw "Please enter MPG";
  				if(isNaN(b)) throw "A number is required for MPG";
				if(c=="") throw "Please enter the Fuel Price";
  				if(isNaN(c)) throw "A number is required for Fuel Price";

				}
				catch (err)
				{
				y.innerHTML="Error: " + err + ".";

   
                }
}
</script>

</body>
</html>