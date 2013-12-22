<section class="fuel">
<h3> Add fuel cost details </h3>
<form class="new-fuel posts" method='POST' action='/posts/addFuel'>
<p>Here you can calculate your gas mileage and post details about your trip.</p>
<p>Let's start with gas mileage calculations</p>
<p>
  <label for="Miles">Enter your expected number of miles you will be traveling:</label>
</p>
<p>
  <input name="Miles" type="number" required id="Miles" placeholder="Miles" title="Miles">
</p>
<p>
  <label for="MPG">What are the average miles per gallon of your vehicle:</label>
</p>
<p>
  <input name="MPG" type="number" required id="MPG" placeholder="MPG" title="MPG">
</p>
<p>
  <label for="FuelPrice">What is the estimated fuel price:</label>
</p>
<p>
  <input name="FuelPrice" type="number" required id="FuelPrice" placeholder="FuelPrice" title="FuelPrice">
</p>
<p>
  <input name="Calculate" type="button" id="Calculate" title="Calculate" value="Calculate">
</p>
<p>
  <label for="FuelCost">Your approximate fuel cost is:</label>
</p>
<p>
  <input name="fuel" type="number" id="fuel" placeholder="FuelCost" title="Fuel Cost" readonly>
</p>
<p>
  <input type="submit" name="submit" id="submit" value="Submit">
</p>
<p>
  <input type="reset" name="reset" id="reset" value="Reset">
</p>
</form> 
</section>

