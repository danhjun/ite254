<?php

if( isset( $_POST['un'] ) && isset( $_POST['pw'] ) ) {

	if( $_POST['un'] == "final" && $_POST['pw'] == "exam" ) {
		
		echo "yes";
	} 
	else { 
	
		echo "no";
		
	}

} // ends isset IF check

?>