<?php

if( isset( $_POST['quantity'] ) && isset( $_POST['prod_id'] ) ) {

	$db = mysqli_connect( "localhost", "ite254ka", "ite254ka", "ite254ka" );

	$prod_query = "select * from products where id=". $_POST['prod_id'];

	$prod_results = mysqli_query( $db, $prod_query )
		or die( "Error getting products ->". mysqli_error( $db ) );

	$prod_data = mysqli_fetch_array( $prod_results );
	
	echo "<div>Product choosen is ". $prod_data['name'] ."</div>";
	echo "<div style='margin-top: 5px;'>Quantity choosen is ". $_POST['quantity'] ."</div>";
	echo "<div style='margin-top: 5px;'>Total is $". number_format( ($_POST['quantity'] * $prod_data['cost'] ), 2, '.', '' ) ."</div>";
		
} // ends isset IF check 

?>