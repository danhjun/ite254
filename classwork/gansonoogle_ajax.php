<?php
if( isset( $_POST['gamename'] ) ) {

	// ****************************************//
	// put your connection to database code here
	// ****************************************//
	require_once( "../pw/.htpasswd" ); 
	
	
	$gamequery = "select * from inventory where title like '%". $_POST['gamename'] ."%'";
	$game_results = mysqli_query( $db, $gamequery )
		or die( "Could not connect". mysqli_error($db) );
		
	if( mysqli_num_rows( $game_results ) == 0 ) {
		
		// no matches found, return some indicator for this. 
		// I am returning the text "error"
		echo "error";
	}
	else {
	
		echo "Number of games found is ". mysqli_num_rows( $game_results) ."<p />\n";
		
		for( $i = 0; $i < mysqli_num_rows( $game_results); $i++ ) {
		
			$gamearray = mysqli_fetch_array( $game_results );
			echo "<div><a href='javascript:void(0);'>". $gamearray["title"] ."</a></div>\n";
			
			$conquery = "select * from consoles where id=". $gamearray['console_id'];
			$conresults = mysqli_query( $db, $conquery ) 
				or die( "An error happened ". mysqli_error( $db ) );
			
			$conarray = mysqli_fetch_array( $conresults );
			
			echo "<div >Console: ". $conarray['company'] ." ". $conarray['console_name'] ."</div>\n";
			
			
			echo "<div>Price: $". $gamearray["price"] ."</div>\n";
			echo "<div style='margin-bottom:15px;'>Quantity: ". $gamearray["quantity"] ."</div>\n";
			
		}	
	}
}
?>