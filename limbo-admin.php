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
    <link rel="stylesheet" type="text/css" href="styleSheetADMIN.css">
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
<table class="main" align="center">
    <tbody>
        <tr>
        <td width=3%></td>
        <td width="50%">
        <div>
        <?php
            # Connect to MySQL server and the database
            require( 'includes/limbo-connect_db.php' ) ;
            
            # Connect to MySQL server and the database
            require( 'includes/limbo_login_tools.php' ) ;
            
            if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
            
            	$name = $_POST['password'] ;
            
                $pid = validate($name) ;
            
                if($pid == -1)
                  echo '<P style=color:red>Login failed please try again.</P>' ;
            
                else
                  load('limbo-admin-1.php', $pid);
            }
        ?>
       <h2>Admin Login</h2>
        <form action="limbo-admin.php" method="POST">
           <p><input type="text" name="username" placeholder="Username"></p>
           <p><input type="password" name="password" placeholder="Password"></p>
           <p><input type="submit" value="Login"></p>
        </form>
        </div>
        </td>
        <td width="30%"></td>
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
</script>