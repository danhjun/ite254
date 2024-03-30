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
	margin-bottom: 10px;
 }
</style>

</head>
<body>

<div id="contentwrap">

	<div id="heading">Display Some Video Games in Inventory</div>
	
	<div>
	
	<?php
	// establish connection with DB
    $db = mysqli_connect( "localhost", "jun0785", "jun0785", "jun0785");

    $query = "SELECT * FROM inventory WHERE quantity > 10 ORDER BY title";

    $results = mysqli_query( $db, $query )
                or die("An error occured -> " . mysqli_error($db));

    // display results
        if ( mysqli_num_rows($results) == 0 ) {
        echo "<div>No games found</div>";
    } else {
        echo "<div class='spacer'>Number of games found with a quantity > 10 is " . mysqli_num_rows($results) . "</div>";
        for ($i = 0; $i < mysqli_num_rows($results); $i++) {
            $row = mysqli_fetch_array($results);
            echo "<div>Title of game is " . $row['title'] . "</div>\n";
            echo "<div>Quantity in stock is " . $row['quantity'] . "</div>\n";
            if ( $row['score'] > 7 ) {
                echo "<div style='color: red;' class='spacer'>With a critic score of "  . $row['score'] . " This game is a hot pick </div>\n";
            }
            else {
                echo "<div style='color: green;' class='spacer'>With a critic score of "  . $row['score'] . " This game is NOT HOT </div>\n";
            }
        }   
    }
		
	?>	
	
	</div>	
	
</div> <!-- ends div#contentwrap -->

</body>
</html>
