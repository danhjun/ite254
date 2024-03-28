<?php

// turn error reporting on, comment out when finished
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once( "../pw/.htpasswd" );

?>

<html>
<head>
<title></title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/152587.jpg");
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
 
.spacer {
	margin-bottom: 10px;
 }
 
#menu {
	background-color: lightblue;
	color: red;
	padding: 5px;
	width: 225px;
	border: 3px red double;
}

#searchbutton {
	background-color: red;
	color: yellow;
	padding: 6px;
	border: 2px #000000 solid;
	cursor: pointer;
	font-weight: bold;
}

#searchbutton:hover {
	background-color: yellow;
	color: maroon;
	border: 2px #000000 solid;
	cursor: pointer;
}

#nogames {
	color: red;
	font-size: 1.5em;
}
 </style>
 
</head>
<body>

<div id="contentwrap">

	<div id="heading">Search Games by Console</div>
	
	<div>
	
	<div class="spacer">Select a console</div>
	<div>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			
			<select id="menu" class="spacer" name="conid">
			<?php
			$conquery = "select * from consoles order by company, console_name";
		
			$conresults = mysqli_query( $db, $conquery )
				or die( "Error getting consoles -> ". mysqli_error( $db ) );
			
			for( $i = 0; $i < mysqli_num_rows( $conresults ); $i++ ) {
			
				$con_data = mysqli_fetch_array( $conresults );
			
				echo "<option value='". $con_data['id'] ."'>";
				echo $con_data['company'] ." ". $con_data['console_name'];
				echo "</option>\n";
			
			} // ends FOR loop
			?>
			
			</select>
					
			<div>
				<input type="submit" value="Search Consoles" id="searchbutton">
			</div>
			
		</form>


	</div>

	</div>
	
</div> <!-- ends div#contentwrap -->

</body>
</html>