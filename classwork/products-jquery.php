<!--   

Put link to your products-jquery.php file on stargate HERE!!!!!
https://stargate.ncc.edu/~jun0785/products-jquery.php

-->

<html>
<head>

<title>ITE254 Exam #3</title>

<style type="text/css">

body {
	color: white;
	font-family: arial;
	text-align: center;
	font-weight: bold;
	background-image: url("https://newton.ncc.edu/gansonj/ite254/img/stars.jpg");
}

#contentwrap {
	width: 600px;
	min-height: 400px;
	margin: 20px auto 20px auto;
	border: 2px orange solid;
	border-radius: 15px;
	background-image: url("https://newton.ncc.edu/gansonj/ite254/img/nebula.jpg");
	background-repeat: no-repeat;
	background-position: right;
}

#formwrap {
	background: lightyellow;
	color: darkblue;
	margin: 30px;
	font-size: 1em;
	padding: 10px;
	border-radius: 15px;
	border: 4px solid darkblue;
	opacity:0.8;
}

#titlewrap {
	color: darkred;
	font-size: 1.75em;
}

#output {
	background: lightblue;
	color: green;
	padding: 10px;
	border-radius: 15px;
	border: 4px solid darkred;
	opacity: 1.0;
	font-size: 1.35em;
	min-height: 100px;
}

input {
	font-weight: bold;
	font-size: 1em;
	padding: 2px 5px 2px 5px;
	border: 1px solid darkred;
}

.spacer {
	margin-top: 20px;
}

</style>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">

$("document").ready( function() {

	// assign event handler to the form
	$("#purchaseform").submit( function() {

        var quantity = $("#quantity").val();
        var prod_id = $("#prod_id").val();

        $.ajax({
            url: "products-ajax.php",
            type: "POST",
            // if more than one data field is needed, use brackets {}
            // and make sure post variables (left side in "") is set to same values as shown in products-ajax.php
            data: {"quantity": quantity, "prod_id": prod_id},

            // unable to change the color of the div based on the value of the total
            success: function(msg) {
                $("#output").html(msg);
                if ( msg >= 100) {
                    $("#output").html(msg + "<div style='color:purple;'></div>");
                }
                else{
                    $("#output").html(msg + "<div style='color:green;'></div>");
                }
            } // ends success code


        }); // ends ajax call

		
		
		
		
		
	} ); // ends submit handler

} );

</script>

</head>
<body>

<div id="contentwrap">

	<div id="formwrap">
	
		<div id="titlewrap">
			Puchase a Product
		</div>

		<form id="purchaseform" action="javascript:void(0);">
		
			<div class="spacer">Enter Quantity to Purchase</div>
			<div>
				<input type="text" size="20" id="quantity">
			</div>

			<div class="spacer">Select a Product</div>
			<div>
			
				<select id="prod_id">
			
					<?php
			
					$db = mysqli_connect( "localhost", "ite254ka", "ite254ka", "ite254ka" );
					
					$prod_query = "select * from products order by name";
					
					$prod_results = mysqli_query( $db, $prod_query )
						or die( "Error getting products ->". mysqli_error( $db ) );
					
					for( $i = 0; $i < mysqli_num_rows( $prod_results ); $i++ ) {
						
						$prod_data = mysqli_fetch_array( $prod_results );
						
						echo "<option value='". $prod_data['id'] ."'>";
						echo $prod_data['name'];
						echo "</option>\n";
						
					} // ends FOR loop
			
					?>
				
				</select>
				
			</div>

			<div class="spacer">
				<input type="submit" value="Puchase Item">
			</div>
			
		</form>
		
		<div id="resultswrap" class="spacer">
		
			<div id="output"></div>
		
		</div>

	</div> <!-- closes formwrap div -->

</div> <!-- closes pagewrap div -->

</body>
</html>
