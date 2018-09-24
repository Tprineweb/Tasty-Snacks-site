<!DOCTYPE html>
<html>
<title>Tasty Snacks</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
</style>
<body class="w3-brown">
<script>
function Confirm() {
	var r = confirm("You will now be redirected to the Admin login page. Are you ready?");
	
	return r;
 

}
</script>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-brown w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">Tasty Snacks</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#Snacks" class="w3-bar-item w3-button">Snacks</a>
      <a href="#No" class="w3-bar-item w3-button">Not Snacks</a>
      <a href="#Video" class="w3-bar-item w3-button">Featured Video</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="sugar.jpg" alt="Tasty Snacks" width="1600" height="700">
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="Snacks">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="hotdog.jpg" class="w3-round w3-image w3-opacity-min" alt="Hotdog" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
		<h2>Tasty Snacks</h2>
		<p>These are snacks posted by our Admins for your enjoyment. Make sure to look these up on <a href='Wikipedia.com'>Wikipedia</a> for more information. If you are an admin, you can add, edit, or delete posts by using the Admin button below.</p><br>
      <?php
// connect to the database
include('/MVC2/connect-db.php');

// get the records from the database
if ($result = $mysqli->query("SELECT * FROM snacks ORDER BY id"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table
echo "<table border='1' cellpadding='10'>";

// set table headers
echo "<tr><th>Post Number</th><th>Name</th><th>Description</th></tr>";

while ($row = $result->fetch_object())
{
// set up a row for each record
echo "<tr>";
echo "<td class='w3-center'>" . $row->id . "</td>";
echo "<td>" . $row->name . "</td>";
echo "<td>" . $row->description . "</td>";
echo "</tr>";
}

echo "</table>";
}
// if there are no records in the database, display an alert message
else
{
echo "No results to display!";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $mysqli->error;
}

// close database connection
$mysqli->close();

?>
<br>
<form action="login.php">
    <input type="submit" Onclick="return Confirm()" value="Admin"/>
</form>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="No">
    <div class="w3-col l6 w3-padding-large">
      
	<?php
	$xml = new DOMdocument;
	$xml->load('BadSnacks.xml');
	
	$xsl = new DOMdocument;
	$xsl->load('BadSnacks.xsl');
	
	$processing = new XSLTProcessor;
	
	$processing->importStyleSheet($xsl);
	
	echo $processing->transformToXML($xml);
?>
      
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="RockRandy.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:70%">
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64 w3-center" id="Video">
  <h2>Our Featured Video</h2><br>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/L52dVwMJTEc?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>