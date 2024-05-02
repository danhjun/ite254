<?php

require_once( "../pw/.htpasswd" );

?>

<html>
<head>
<title></title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/space_invaders.jpg");
	font-family: arial;
	color: #454F8C;
}

#contentwrap {
	background: #FFFFFF;
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/spyro.jpg");
	background-repeat: no-repeat;
	background-position: right 150;	
	border: 8px #FF9E01 solid;
	padding: 20px;
	width: 650px;
	margin: 20px auto 0px auto;
	border-radius: 25px;
	min-height: 400px;
}

#heading {
	font-size: 2.2em;
	border-bottom: 6px #484452 double;
	padding: 10px 0px 10px 0px;
	text-align: center;
	margin-bottom: 20px;
}
 
.spacer1 {
	margin-bottom: 10px;
 }
 
 .spacer2 {
 	margin-bottom: 20px;		
 }
 
input[type=text], select {
	border: 2px black solid;
	background-color: yellow;
	padding: 3px;
	font-size: 1em
}
 
input[type=submit] {
	border: 2px #FF9E01 solid;
	background-color: darkblue;
	color: white;
	padding: 8px;
	border-radius: 20px;
	font-size: 1em;
}
 
 </style>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">

$(document).ready( function() {

	$("#conid").on( "change", function() {

	var conid = $("#conid").val();

	$.ajax( {
		url: "game-menu-ajax.php",
		type: "POST",
		data: "conid=" + conid,
		success: function( msg ) {
			$("#game-menu").hide().html( msg ).show("fade");
		}	
	}); // ends ajax call
		

	}); //ends change handler


} ); // ends document.ready

</script>
 
</head>
<body>

<div id="contentwrap">

	<div id="heading">Search Games by Console</div>
	
	<form  action="javascript:void(0);">
	
		<div class="spacer1">Select console to show games</div>
		
		<div class="spacer2">
			
			<select id="conid">
		
				<?php
		
				$conquery = "select * from consoles order by company, console_name";
				
				$con_results = mysqli_query( $db, $conquery )
					or die( "Error getting consoles ->". mysqli_error( $db ) );
				
				for( $i = 0; $i < mysqli_num_rows( $con_results ); $i++ ) {
					
					$con_data = mysqli_fetch_array( $con_results );
					
					echo "<option value='". $con_data['id'] ."'>";
					echo $con_data['company'] ." ". $con_data['console_name'];
					echo "</option>\n";
					
				} // ends FOR loop
		
				?>
			
			</select>
		</div>
	
	</form>
	
	<div id="game-menu"></div>
	
</div> <!-- ends div#contentwrap -->

</body>
</html>



