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
    <h1>Report Something Lost</h1>
    <form action="limbo-lost-2.php" method="POST">
        <p>
            Name of Item: <input type="text" name="item" value="<?php if(isset($_POST['item'])) echo $_POST['item']; ?>">
        </p>
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
            Color:  <input type="text" name="color" value="<?php if(isset($_POST['color'])) echo $_POST['color']; ?>">
        </p>
        <p>
            Lost at: 
            <?php
                mysql_connect('localhost', 'root', '');
                mysql_select_db('limbo_db');
                
                $sql = "SELECT name FROM locations";
                $result = mysql_query($sql);
                
                echo "<select name='location_id'>";
                while ($row = mysql_fetch_array($result)) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                echo "</select>";
            ?>
        </p>
        <p>
            Time Lost:  <input type="text" name="limbo_time" placeholder="HH:MM:SS" value="<?php if(isset($_POST['limbo_time'])) echo $_POST['limbo_time']; ?>">
        </p>
        <p>
            Date Lost: <input type="text" name="limbo_date" placeholder="YYYY-MM-DD" value="<?php if(isset($_POST['limbo_date'])) echo $_POST['limbo_date']; ?>">
        </p>
        <p>
            Description:  <input type="text" name="description" value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>">
        </p>
        <p>
            Contact Email:  <input type="text" name="contact_email" value="<?php if(isset($_POST['contact_email'])) echo $_POST['contact_email']; ?>">
        </p>
         <p>
            Contact Phone Number:  <input type="text" name="contact_phone" value="<?php if(isset($_POST['contact_phone'])) echo $_POST['contact_phone']; ?>">
        </p>
        <p>
            <input type="submit">
        </p>
            <?php
				# Connect to MySQL server and the database
				require( 'includes/limbo-connect_db.php' ) ;

				# Includes these helper functions
				require( 'includes/limbo-helpers.php' ) ;
                
                if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	                $item = $_POST['item'] ;
                    $model = $_POST['model'] ;
                    $color = $_POST['color'] ;
                    $location_id =  $_POST['location_id'] ;
                    $limbo_time = $_POST['limbo_time'] ;
                    $limbo_date = $_POST['limbo_date'] ;
                    $description = $_POST['description'] ;
                    $contact_email = $_POST['contact_email'] ;
                    $contact_phone = $_POST['contact_phone'] ;
                    
                    insert_lost_item($dbc, $location_id, $description, $model, $color, $limbo_date, $limbo_time, $item, $contact_email, $contact_phone);
                    echo '<p style="color:green;font-size:16px;">Success !!! Your input was recorded. Click on the Marist Logo to go back home.</p>';
                }
                
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