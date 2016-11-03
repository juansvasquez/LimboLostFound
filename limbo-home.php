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
    <title>Limbo Home</title>
    <link rel="stylesheet" type="text/css" href="styleSheetHOME.css">
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
    <li><input type="button" value="Admins" onclick="openAdmins()"></li>
</ul>
</div>
<!-- 
The main section of the page for limbo-home where introduction and recent items are.
-->
<table class="main">
    <tbody>
        <tr>
            <td width="45%">
                <h1>Welcome to Limbo!</h1>
                <p>If you lost or found something, you're in luck: this is the place to report it.</p>
            </td>
            <td width="10%">
                <!-- Empty for a space to make the information spaced out and more appealing. -->
            </td>
            <td width="45%" align="center">
                <?php
					# Connect to MySQL server and the database
					require( 'includes/limbo-connect_db.php' ) ;

					# Includes these helper functions
					require( 'includes/limbo-helpers.php' ) ;

					if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
						if(isset($_GET['id']))
							show_record($dbc, $_GET['id']) ;
					}

					# Show the records
					show_link_records($dbc);

					# Close the connection
					mysqli_close($dbc) ; #Produces "Warning: mysqli_close(): Couldn't fetch mysqli in C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\ipresidents.php on line 37"

				?>
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
</script>