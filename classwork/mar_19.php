<?php
// turn error reporting on, comment out when finished
error_reporting(E_ALL);
ini_set('display_errors','On');
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
	background-position: 80% 150;	
	border: 8px #FF9E01 solid;
	padding: 20px;
	width: 800px;
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
.bottomdiv {
 	margin-bottom: 15px;
 }
 .spacer {
	margin-bottom: 5px;
 }
</style>
</head>

<body>

<div id="contentwrap">

	<div id="heading">Display All Video Games in Inventory</div>
	
	<div>
	
	<?php
		
        // establish connection with DB
        $db = mysqli_connect( "localhost", "jun0785", "jun0785", "jun0785");

        // set up query
        $query = "SELECT * FROM inventory ORDER BY title";

        // send query to db
        $results = mysqli_query( $db, $query )
            or die("An error occured -> " . mysqli_error($db));

 		// display results
		for ($i = 0; $i < mysqli_num_rows($results); $i++) {
			$row = mysqli_fetch_array($results);

			echo "<div>" . $row['title'] . "</div>\n";
			echo "<div class='spacer'>" . $row['genre'] . "</div>\n";

			if ( $row['quantity'] < 15 ) {
				echo "<div style='color: red;' class='spacer'>Running low, order more </div>\n";
			}

		}
	
	
		
	?>	
	
	</div>	
	
</div> <!-- ends div#contentwrap -->
</body>
</html>

