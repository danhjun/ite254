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
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/space_invaders.jpg");
	font-family: arial;
	color: #454F8C;
}

#contentwrap {
	background: #FFFFFF;
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/spyro.jpg");
	background-repeat: no-repeat;
	background-position: 90% 150;	
	border: 8px #FF9E01 solid;
	padding: 20px;
	width: 900px;
	margin: 20px auto 150px auto;
	border-radius: 25px;
	min-height: 400px;
}

#heading {
	font-size: 2.2em;
	border-bottom: 6px maroon double;
	padding: 10px 0px 10px 0px;
	text-align: center;
	margin-bottom: 20px;
	color: maroon;
}

#numgames {
 	margin-bottom: 20px;
 	font-weight: bold;
}
 
.spacer {
	margin-top: 10px;
}
 
#error {
	color: red;
	font-size: 1.25em;
}
</style>
 
</head>
<body>

<div id="contentwrap">

	<div id="heading">Search Video Games in Inventory</div>
	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
		<div>Enter game to search for</div>
		<input type="text" size="30" name="gamename">
		
		<div style="margin-top:10px;">
			<input type="submit" value="Search Inventory">
		</div>

	</form>
	
	<!-- PHP code to process form goes here -->
	<?php	
        if ( isset( $_POST['gamename'])) {

			error_reporting(E_ALL);
			ini_set('display_errors','On');
			// require_once("../pw/.htpasswd");
            $db = mysqli_connect( "localhost", "jun0785", "jun0785", "jun0785");

            $query = "SELECT * FROM inventory WHERE title LIKE '" . $_POST['gamename'] . "%' ORDER BY title";

            $results = mysqli_query( $db, $query )
                or die("An error occured -> " . mysqli_error($db));

            if ( mysqli_num_rows($results) == 0 ) {
                echo "<div id='error'>No games found</div>";
            } else {
                echo "<div id='numgames'>Number of games found: " . mysqli_num_rows($results) . "</div>";
                for ($i = 0; $i < mysqli_num_rows($results); $i++) {
                    $row = mysqli_fetch_array($results);
                    echo "<div>" . $row['title'] . "</div>\n";
                    echo "<div class='spacer'>" . $row['genre'] . "</div>\n";
                    if ( $row['quantity'] < 15 ) {
                        echo "<div style='color: red;' class='spacer'>Running low, order more </div>\n";
                    }
                }   
            }








        }

	
		
	?>
		
</div> <!-- ends div#contentwrap -->
		<div>


		</div>

</body>
</html>



