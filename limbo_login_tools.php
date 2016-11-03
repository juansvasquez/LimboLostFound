<!--
This PHP script was modified based on result.php in McGrath (2012).
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
By Juan Vasquez and Erina Caferra
-->
<?php
# Includes these helper functions
require( 'includes/limbo-helpers.php' ) ;

# Loads a specified or default URL.
function load( $page = 'limbo-admin-1.php', $pid = -1 )
{
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL and the print id.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page . '?id=' . $pid;

  # Execute redirect then quit.
  session_start( );

  header( "Location: $url" ) ;

  exit() ;
}

# Validates the username.
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validate($prname = '')
{
    global $dbc;

    if(empty($prname))
      return -1 ;

    # Make the query
    $query = "SELECT email, pass FROM admins WHERE pass='" . $prname . "'" ;
    show_query($query) ;

    # Execute the query
    $results = mysqli_query( $dbc, $query ) ;
    check_results($results);

    # If we get no rows, the login failed
    if (mysqli_num_rows( $results ) == 0 )
      return -1 ;

    # We have at least one row, so get the frist one and return it
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

    $pid = $row [ 'id' ] ;

    return intval($pid) ;
}
?>