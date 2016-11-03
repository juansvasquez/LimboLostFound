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
    <title>Limbo Admins</title>
    <link rel="stylesheet" type="text/css" href="styleSheetADMIN1.css">
</head>

<body>
<!--
The navigation bar at the stop of the page that stays in place.
-->
<div id="navbar">
<ul>
    <li><img src="https://www.marist.edu/publicaffairs/imc/graphics/For_MSOffice/MaristNPlarge_186spotReversed.jpg" alt="Marist Logo" height="100" width="392" onclick="openHome()"></img></li>
    <li><input type="button" value="Lost Something?" onclick="openLost()"></li>
    <li><input type="button" value="Found Something?" onclick="openFound()"></li>
    <li><button>Admins</li>
</ul>
</div>
<!-- 
The main section of the page for limbo-home where introduction and recent items are.
-->
<div class="main" align="center">
    <div id="adminNav" align="center">
        <ul>
            <li>Limbo Administration</li>
            <li></li><li></li><li></li><li></li><li></li><li></li><li></li>
            
            <li>Welcome, Admin. Modifiy Account / Change Password / Log Out</li>
        </ul>
    </div>
    <table>
        <tr>
            <th>
                Authentification
            </th>
            <tr>
            <td>
                Admins
            </td>
            </tr>
        </tr>
    </table>
    <p align="right">
        <input type="button" value="Add">
        <input type="button" value="Edit">
    </p>
    <p></p>
     <?php
		# Connect to MySQL server and the database
		require( 'includes/limbo-connect_db.php' ) ;

		# Includes these helper functions
		require( 'includes/limbo-helpers.php' ) ;
		
		# Show the records
		show_record_admin($dbc);

		# Close the connection
		mysqli_close($dbc) ; #Produces "Warning: mysqli_close(): Couldn't fetch mysqli in C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\ipresidents.php on line 37"

	?>
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
//refreshes page every 5 seconds
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
window.onload = timedRefresh(5000);
</script>