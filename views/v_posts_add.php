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

<section class="content">
<h3 style="font-size: large"> Add Trip Details </h3>
<form class="new-post" name="form1" method='POST' action='/posts/p_add'>

    <div class="button">
      <p style="font-style: italic; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 16px;">Tell us about your trip:</p>
            <p>
        <label for="location" style="font-weight: bold">Location:</label>
        <textarea name="location" id="location" placeholder="Location?"></textarea>
      </p>
      <label for="Content" style="font-style: oblique; font-weight: bold;">Details:</label>
      <textarea name='content' required="required" id='content' placeholder="Tell us about it..."></textarea>
      <p>
        <label for="Travelers" style="font-style: oblique; font-weight: bold;">Travelers:</label>
        <textarea name="travelers" id="travelers" placeholder="Who is going or went?"></textarea>
      </p>

      <p>&nbsp;</p>

</div>
<h3>Fuel Cost Calculator</h3>
<p>Here you can calculate your gas mileage and post details about your trip.</p>
<p>Let's start with gas mileage calculations</p>
  <div align="left"><strong>Total expected miles:</strong>  
    <input type="text" id="Miles" name="miles" placeholder="MILES" title="Miles"><br><br>    
    <strong>Miles per Gallon of your vehicle:</strong>  
    <input type="text" id="MPG" name="gas" placeholder="MPG" title="MPG"><br><br>
    <strong>Average price of fuel:</strong>  
    <input type="text" id="FuelPrice" name="price" placeholder="PRICE" title="Price"><br><br> 
    <strong>The fuel for the trip cost:  $</strong>
    <input type="text" id="fuel" name="fuel" placeholder="FUEL" title="fuel" readonly><br> <br>   
    <input type="button" value="Calculate" onclick="d()"> <br> <br> <input type="Reset" value="Clear"><br><br>
    <p id="mess"></p>

</div>
          <p>
        <input type='submit' value='Add'>
      </p>
      </form> 
</section>
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