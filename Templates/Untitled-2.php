
<!-- TWO STEPS TO INSTALL GASOLINE USAGE CALCULATOR:

  1.  Copy the coding into the HEAD of your HTML document
  2.  Add the last code into the BODY of your HTML document  -->

<!-- STEP ONE: Paste this code into the HEAD of your HTML document  -->

<HEAD>

<script type="text/javascript">
<!-- Begin
/* This script and many more are available free online at
The JavaScript Source!! http://www.javascriptsource.com
Created by: Matthew Ogden :: http://www.home.earthlink.net/~ogden1972/ */

function d(){
  var a = document.form1.miles.value;
  var b = document.form1.gas.value;
  var c = document.form1.days.value;
  var cost = document.form1.cost.value;
  mpg=a/b;
  gpd=b/c;
  mpg= Math.round(mpg*10)/10;
  gpy=gpd*365;
  co=gpy*19.36;
  cpy=gpy*cost;
  gpd= Math.round(gpd*1000)/1000;
  gpy= Math.round(gpy*10)/10;
  cpy= Math.round(cpy*100)/100;
  co= Math.round(co);
  document.form1.results.value="Your car is getting "+mpg+" miles per gallon. On the average you use "+gpd+" gallons per day. At that rate of consumption you will burn "+gpy+" gallons per year at a cost of $"+cpy+" per year. In addition, that produces "+co+" pounds of CO2 in one year.";
}
// End -->
</script>
</HEAD>

<!-- STEP TWO: Copy this code into the BODY of your HTML document  -->

<BODY>

<div align="center">
<h3>Gasoline Usage Calculator</h3>

<form name="form1">
<strong>Miles Traveled:</strong>  
<input type="text" size="8" name="miles">   
<strong>Gallons of Gas:</strong>  
<input type="text" size="6" name="gas"><br><br>
<strong>Cost of Gas:  $</strong>
<input type="text" size="4" name="cost">  
<strong>Days Between Fill-Ups:</strong>  
<input type="text" size="6" name="days"><br><br>
<input type="button" value="Calculate" onclick="d()"> <input type="Reset" value="Clear"><br><br>
<strong>Results</strong><br>
<textarea name="results" rows="5" cols="55" wrap style="border-width:0;overflow:hidden"onfocus="this.blur()">
</textarea>
</form>
</div>

<p><center>
<font face="arial, helvetica" size"-2">Free JavaScripts provided<br>
by <a href="http://javascriptsource.com">The JavaScript Source</a></font>
</center><p>

<!-- Script Size:  2.28 KB -->