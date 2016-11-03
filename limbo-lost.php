<!--
This PHP script was modified based on result.php in McGrath (2012).
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
By Juan Vasquez and Erina Caferra
-->
<!DOCTYPE html>
<html>
<head>
    <title>Lost Something?</title>
    <link rel="stylesheet" type="text/css" href="styleSheetLOST.css">
</head>

<body>
<!--
The navigation bar at the stop of the page that stays in place.
-->
<div id="navbar">
<ul>
    <li><img src="https://www.marist.edu/publicaffairs/imc/graphics/For_MSOffice/MaristNPlarge_186spotReversed.jpg" alt="Marist Logo" height="100" width="392" onclick="openHome()"></img></li>
    <li><button>Lost Something?</button></li>
    <li><input type="button" value="Found Something?" onclick="openFound()"></li>
    <li><input type="button" value="Admins" onclick="openAdmins()"></li>
</ul>
</div>
<!-- 
The main section of the page for limbo-lost where the form is.
This includes all components of description and the sumbit button.
-->
<div class="main">
    <h1>Search Something Lost</h1>
    <form action="limbo-lost-1.php" method="POST">
        <p>
            Model: 
            <select name="model">
              <option value="Electronic">Electronic</option>
              <option value="Bags">Bags</option>
              <option value="Apparel">Apparel</option>
              <option value="Miscellaneous">Miscellaneous</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Search">
        </p>
            <?php
				# Connect to MySQL server and the database
				require( 'includes/limbo-connect_db.php' ) ;

				# Includes these helper functions
				require( 'includes/limbo-helpers.php' ) ;
				
				# Close the connection
				mysqli_close($dbc) ; #Produces "Warning: mysqli_close(): Couldn't fetch mysqli in C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\ipresidents.php on line 37"

			?>
	</form>
</div>

</body>

</html>

<script>
//link to the the main page of limbo
function openHome() {
    window.open("limbo-home.php")
}
//link to the lost page of limbo
function openLost() {
    window.open("limbo-lost.php")
}
//link to the found page of limbo
function openFound() {
    window.open("limbo-found.php")
}
//link to the admins page of limbo
function openAdmins() {
    window.open("limbo-admin.php")
}
</script>