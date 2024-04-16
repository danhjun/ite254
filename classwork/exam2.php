<!-- https://stargate.ncc.edu/~jun0785/exam2.php -->

<html>
<head>
<title>ITE254 Exam #2</title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/bk2.jpg");
	color: darkblue;
	font-family: arial;
	text-align: center;
}

#pagewrap {
	border: 6px red double;
	padding: 20px;
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/swirls.jpg");
	width: 600px;
	margin: 25px auto 0px auto;
}

#heading {
	border: 6px red double;
	background-color: darkblue;
	font-size: 1.75em;
	padding: 15px;
	color: white;
}

#contentdiv {
	margin-top: 15px;
	border: 6px darkblue double;
	padding: 20px;
}

.spacer {
	margin-bottom: 20px;
}

</style>

</head>

<body>

<div id="pagewrap">

	<div id="heading">ITE254 Exam #2</div>
	
	<div id="contentdiv">
	
		<!-- php code to display basseball players from database goes here -->
		<?php
		
			$db = mysqli_connect( "localhost", "ite254ka", "ite254ka", "ite254ka" );
			
            $query = "SELECT * FROM baseball WHERE team = 'Yankees'";

            $results = mysqli_query( $db, $query )
                or die("An error occured -> " . mysqli_error($db));

                if ( mysqli_num_rows($results) == 0 ) {
                    echo "<div>No games found</div>";
                } else {
                    echo "<div class='spacer'>Number of players found who play for YANKEES: " . mysqli_num_rows($results) . "</div>";
                    for ($i = 0; $i < mysqli_num_rows($results); $i++) {
                        $row = mysqli_fetch_array($results);
                        echo "<div>Player name: " . $row['name'] . "</div>\n";
                        $average = round(($row['num_hits'] / $row['at_bats']),3);
                        echo "<div>Batting Average: " . $average . "</div>\n";
                        echo '<div class="spacer"><a href=" ' . $row['url'] . '">' . $row['url'] . "</a></div>\n";             
                    }  
                }


		?>		
		
	</div> <!-- ends div#contentdiv -->

</div> <!-- ends div#pagewrap -->

</body>
</html>