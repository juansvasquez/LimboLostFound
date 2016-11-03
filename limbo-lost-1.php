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
    <title>Results for Lost</title>
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
The main section of the page for limbo-home where introduction and recent items are.
-->
<table class="main">
    <tbody>
        <tr>
            <td width="45%" align="center">
                <h1>Similar Results</h1>
                <p align="center">
				<?php
					# Connect to MySQL server and the database
					require( 'includes/limbo-connect_db.php' ) ;

					# Includes these helper functions
					require( 'includes/limbo-helpers.php' ) ;
					
					#Search through stuff
					$model = $_POST['model'];
					search_lost($dbc, $model);
					
					# Close the connection
					mysqli_close($dbc) ; #Produces "Warning: mysqli_close(): Couldn't fetch mysqli in C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\ipresidents.php on line 37"
					
				?>
                    
                </p>
            </td>
            <td width="10%">
                <!-- Empty for a space to make the information spaced out and more appealing. --> 
            </td>
            <td width="45%" align="center">
                <div>
                <h2>Your item isn't here?</h2>
                <input type="button" value="Create Inquiry" onclick="openLostIn()">
                </div>
            </td>
        </tr>
    </tbody>
</table>

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
function openLostIn() {
    window.open("limbo-lost-2.php")
}
</script>