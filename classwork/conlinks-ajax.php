<?php
if( isset( $_POST['conid'] ) ) {

	require_once( "../pw/.htpasswd" );

	$game_query = "select * from inventory where console_id=". $_POST['conid'] ." order by title";
	$game_results = mysqli_query( $db, $game_query )
		or die( "Could not connect -->". mysqli_error($db) );

	if( mysqli_num_rows( $game_results ) == 0 ) {

		echo "<div style='color:red;'>No games in stock for this console</div>";
	}
	else {
		
		for( $i= 0; $i < mysqli_num_rows( $game_results ); $i++ ) {
	
			$game_data = mysqli_fetch_array( $game_results );
			echo "<div class='gamedivs'>";
			echo $game_data["title"];
			echo "</div>\n";
		
		} // ends FOR loop
		
	} // ends else

}
?>