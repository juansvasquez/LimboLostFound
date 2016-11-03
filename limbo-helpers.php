<?php
$debug = true;

# Shows the records in stuff

function show_link_records($dbc) {
  # Create a query to get the 
  $query = 'SELECT id, dt, status, item FROM stuff ORDER BY id DESC' ;

  # Execute the query
  $results = mysqli_query( $dbc , $query ) ;

  # Show results
  if( $results )
  {
    # But...wait until we know the query succeeded before
    # starting the table.
    echo '<H1>Items in Limbo</H1>' ;
    echo '<TABLE border = \'1\'>';
    echo '<TR>';
    echo '<TH>Date/Time</TH>';
	  echo '<TH>Status</TH>';
	  echo '<TH>Stuff</TH>';
    echo '</TR>';

    # For each row result, generate a table row
	
  	while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
    {
  	  $alink = '<a href=limbo-home.php?id=' . $row['id'] . '>' . $row['item'] . '</A>' ;
  	  echo '<TR>' ;
      echo '<TD>' . $row['dt'] . '</TD>' ;
      echo '<TD>' . $row['status'] . '</TD>' ;
  	  echo '<TD ALIGN=right>' . $alink . '</TD>' ;	
      echo '</TR>' ;   
    }
	
	
	
    # End the table
    echo '</TABLE>';

    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
  else
  {
    # If we get here, something has gone wrong
    echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
  }

  # Close the connection
  mysqli_close( $dbc ) ;

}

function show_record($dbc, $id) {

  # Create a query to get the 
  $query = 'SELECT id, description, model, color, dt, limbo_date, limbo_time,
  status, item, contact_email, contact_phone FROM stuff WHERE id = ' . $id ;


  # Execute the query
  $results = mysqli_query( $dbc , $query ) ;

  # Show results
  if( $results )
  {
    # But...wait until we know the query succeeded before
    # starting the table.
    echo '<H1>Limbo Item!</H1>' ;
    echo '<TABLE border = \'1\'>';
    echo '<TR>';
    echo '<TH>ID</TH>';
    echo '<TH>Description</TH>';
    echo '<TH>Model</TH>';
    echo '<TH>Color</TH>';
	echo '<TH>Entry Created</TH>';
    echo '<TH>Date Lost/Found</TH>';
    echo '<TH>Time Lost/Found</TH>';
	echo '<TH>Status</TH>';
	echo '<TH>Item</TH>';
	echo '<TH>Contact Email</TH>';
    echo '<TH>Contact Phone</TH>';
    echo '</TR>';

    # For each row result, generate a table row
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
    {
      echo '<TR>' ;
      echo '<TD>' . $row['id'] . '</TD>' ;
      echo '<TD>' . $row['description'] . '</TD>' ;
      echo '<TD>' . $row['model'] . '</TD>' ;
      echo '<TD>' . $row['color'] . '</TD>' ;
      echo '<TD>' . $row['dt'] . '</TD>' ;
      echo '<TD>' . $row['limbo_date'] . '</TD>' ;
      echo '<TD>' . $row['limbo_time'] . '</TD>' ;
      echo '<TD>' . $row['status'] . '</TD>' ;
      echo '<TD>' . $row['item'] . '</TD>' ;
      echo '<TD>' . $row['contact_email'] . '</TD>' ;
      echo '<TD>' . $row['contact_phone'] . '</TD>' ;
      echo '</TR>' ;
    }

    # End the table
    echo '</TABLE>';

    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
  else
  {
    # If we get here, something has gone wrong
    echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
  }

  # Close the connection
  mysqli_close( $dbc ) ;

}

#Makes a table of stuff with delete and edit buttons for limbo-admin-1
function show_record_admin($dbc) {
  
  # Create a query to get the 
  $query = 'SELECT id, item, status FROM stuff ORDER BY id DESC' ;

  # Execute the query
  $results = mysqli_query( $dbc , $query ) ;

  # Show results
  if( $results )
  {
    # Top of table
    echo '<TABLE border = \'1\'>';
    echo '<TR>';
    echo '<TH>Inventory</TH>';
    echo '</TR>';

    # For each row result, generate a table row
  	while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
    {
  	  echo '<TR>' ;
      echo '<TD>' . 'ID: ' . $row['id'] . '   |   Item Name: ' . $row['item'] . '   |   Status: ' . $row['status'] ;
  	  echo '<DIV ALIGN=right>' ;
  	  echo '<INPUT TYPE="button" VALUE="Delete" ONCLICK=\'remove_record($dbc, $id)\'>' ;
  	  echo '<INPUT TYPE="button" VALUE="Finalize Status" ONCLICK=\'finalize_status($dbc, $id)\'>' ;
  	  echo '</DIV>' ;
  	  echo '</TD>' ;	
      echo '</TR>' ;   
    }
	
    # End the table
    echo '</TABLE>';

    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
  else
  {
    # If we get here, something has gone wrong
    echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
  }

  # Close the connection
  mysqli_close( $dbc ) ;
}

#Removes a record from the stuff table
function remove_record($dbc, $id) {
  $query = 'DELETE FROM stuff WHERE id = ' . $id ;
  show_query($query);
  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;
  return $results ;
}

function finalize_status($dbc, $id) {
  $query = 'UPDATE stuff SET status = "Claimed" WHERE id = ' . $id ;
  show_query($query);
  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;
  return $results ;
}

function search_lost($dbc, $model) {
	$query = 'SELECT id, dt, status, item FROM stuff WHERE model = "' . $model . '" AND status = "Found"';
	
	#Execute the query
	
	$results = mysqli_query( $dbc , $query ) ;

    # Show results
   if( $results )
    {
    # But...wait until we know the query succeeded before
    # starting the table.
    echo '<H1></H1>' ;
    echo '<TABLE border = \'1\'>';
    echo '<TR>';
    echo '<TH>Date/Time</TH>';
	  echo '<TH>Status</TH>';
	  echo '<TH>Stuff</TH>';
    echo '</TR>';

    # For each row result, generate a table row
	
  	while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
    {
  	  $alink = '<a href=limbo-home.php?id=' . $row['id'] . '>' . $row['item'] . '</A>' ;
  	  echo '<TR>' ;
      echo '<TD>' . $row['dt'] . '</TD>' ;
      echo '<TD>' . $row['status'] . '</TD>' ;
  	  echo '<TD ALIGN=right>' . $alink . '</TD>' ;	
      echo '</TR>' ;   
    }
	
	
	
    # End the table
    echo '</TABLE>';

    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
  else
  {
    # If we get here, something has gone wrong
    echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
  }

  # Close the connection
  mysqli_close( $dbc ) ;
}

function search_found($dbc, $model) {
	$query = 'SELECT id, dt, status, item FROM stuff WHERE model = "' . $model . '" AND status = "Lost"';
	
	#Execute the query
	
	$results = mysqli_query( $dbc , $query ) ;

    # Show results
   if( $results )
    {
    # But...wait until we know the query succeeded before
    # starting the table.
    echo '<H1></H1>' ;
    echo '<TABLE border = \'1\'>';
    echo '<TR>';
    echo '<TH>Date/Time</TH>';
	  echo '<TH>Status</TH>';
	  echo '<TH>Stuff</TH>';
    echo '</TR>';

    # For each row result, generate a table row
	
  	while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
    {
  	  $alink = '<a href=limbo-home.php?id=' . $row['id'] . '>' . $row['item'] . '</A>' ;
  	  echo '<TR>' ;
      echo '<TD>' . $row['dt'] . '</TD>' ;
      echo '<TD>' . $row['status'] . '</TD>' ;
  	  echo '<TD ALIGN=right>' . $alink . '</TD>' ;	
      echo '</TR>' ;   
    }
	
	
	
    # End the table
    echo '</TABLE>';

    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
  else
  {
    # If we get here, something has gone wrong
    echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
  }

  # Close the connection
  mysqli_close( $dbc ) ;
}

# Inserts a new lost item into the stuff table
function insert_lost_item($dbc, $location_id, $description, $model, $color, $limbo_date, $limbo_time, $item, $contact_email, $contact_phone) {
   $query = 'INSERT INTO stuff(location_id, description, model, color, dt, limbo_date, limbo_time, status, item, contact_email, contact_phone) 
			VALUES ("' . $location_id . '" , "' . $description . '", "' . $model . '", "' . $color . '", Now(), "' . $limbo_date . '",
			"' . $limbo_time . '", "Lost", "' . $item . '", "' . $contact_email . '", "' . $contact_phone . '" )' ;
   show_query($query);
   $results = mysqli_query($dbc,$query) ;
   check_results($results) ;

   return $results ;
}

# Inserts a new found item into the stuff table
function insert_found_item($dbc, $location_id, $description, $model, $color, $limbo_date, $limbo_time, $item, $contact_email, $contact_phone) {
   $query = 'INSERT INTO stuff(location_id, description, model, color, dt, limbo_date, limbo_time, status, item, contact_email, contact_phone) 
			VALUES ("' . $location_id . '" , "' . $description . '", "' . $model . '", "' . $color . '", Now(), "' . $limbo_date . '",
			"' . $limbo_time . '", "Found", "' . $item . '", "' . $contact_email . '", "' . $contact_phone . '" )' ;
   show_query($query);
   $results = mysqli_query($dbc,$query) ;
   check_results($results) ;

   return $results ;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;   
}

// function valid_number($num) {
//   if(empty($num) || !is_numeric($num))
//     return false ;
//   else {
//     $num = intval($num) ;
//     if($num <= 0)
//       return false ;
//   }
//   return true ;
// }

// function valid_name($name){
//   if (empty($name))
//     return false;
//   else
//     return true;
// }
?>