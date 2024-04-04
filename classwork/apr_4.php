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
	background-image: url("https://newton.ncc.edu/gansonj/ite254/img/spyro.jpg");
	background-repeat: no-repeat;
	background-position: right 150;	
	border: 8px #FF9E01 solid;
	padding: 20px;
	width: 800px;
	margin: 20px auto 0px auto;
	border-radius: 25px;
	min-height: 400px;
}

#heading {
	font-size: 1.75em;
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
 
th {
 	color: red;
 	background-color: lightblue;
 }
 
tr:nth-child(even) {
	background: #CCC
}
tr:nth-child(odd) {
	background: #FFF
}
</style>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

<script type="text/javascript">
$(document).ready( function() {



} );
</script>


</head>

<body>

<div id="contentwrap">

	<div id="heading">Video Game Inventory Management Page</div>
	
	<div> <!-- table goes here -->
	
        <table border="3" bordercolor="red" width="100%">

            <tr>
                <th> Game Title </th>
                <th> Console </th>
                <th> Quantity </th>
                <th> Action </th>
            </tr>

            <?php
                $gamequery = "SELECT * FROM inventory ORDER BY title";
                $gameresults = mysqli_query( $db, $gamequery )
                            or die("An error occured -> " . mysqli_error($db));
                for( $i = 0; $i < mysqli_num_rows($gameresults); $i++ ) {
                    $row = mysqli_fetch_array($gameresults);
                    echo "<tr>\n";
                    echo "<td>" . $row['title'] . "</td>\n";
                    echo "<td>Console name</td>\n";
                    echo "<td>" . $row['quantity'] . "</td>\n";
                    echo "<td>Button goes here</td>\n";
                    echo "</tr>\n";
                }
            ?>

        </table>
		
		
				
	</div>	
	
</div> <!-- ends div#contentwrap -->

</body>
</html>



