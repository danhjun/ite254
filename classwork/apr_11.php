<?php

require_once ("../pw/.htpasswd");
if ( isset( $_POST['title'])) {

    $ins_query = "INSERT INTO inventory values (NULL,";
    $ins_query .= "'" . $_POST['title'] . "',";
    $ins_query .= "'" . $_POST['genre'] . "',";
    $ins_query .= "'" . $_POST['quantity'] . "',";
    $ins_query .= "'" . $_POST['price'] . "',";
    $ins_query .= "'" . $_POST['console_id'] . "',";
    $ins_query .= "'" . $_POST['score'] . "')";

    
    mysqli_query( $db, $ins_query )
        or die("An error occured -> " . mysqli_error($db));

    echo "<script type='text/javascript'>\n";
    echo "window.location='apr_4.php';\n";
    echo "</script>\n";
}

?>

<?php

require_once( "../pw/.htpasswd" );


?>

<html>
<head>
<title></title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/vgbkg.png");
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

.bottomdiv {
 	margin-bottom: 15px;
 }
 
 .spacer {
	margin-top: 10px;
 }
 
 input, select {
 	border: 3px solid blue;
 	padding: 5px;
 	font-weight: bold;
 	font-size: 1.15em;
 	background-color: maroon;
 	color: gold;
 }
 
 </style>

</head>

<body>

<div id="contentwrap">

		<div id="heading">Add a new game to inventory</div>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
		<div class="spacer">Enter game title</div>
		<input type="text" name="title" size="40"><p>

		<div class="spacer">Enter new price</div>
		<input type="text" name="price" size="40"><p>

		
		<div class="spacer">Select new console</div>
		<select name="console_id">

		<?php
		$platquery = "select * from consoles";
		
		$platresults = mysqli_query( $db, $platquery )
			or die( "Error with platform query ". mysqli_error($db) );
			
		for( $i = 0; $i < mysqli_num_rows( $platresults ); $i++ ) {
		
			$platarray = mysqli_fetch_array( $platresults );
			echo "\t\t<option value=\"". $platarray['id'] ."\">". $platarray['company'] . " " . $platarray['console_name'] ."</option>\n";
		}
		?>
		</select>
		<p>
		
		
		<div class="spacer">Enter Genre</div>
		<input type="text" name="genre" size="40"><p>
	
		<div class="spacer">Enter rating</div>
		<select name="rating">
		<?php
			
		for( $i = 1; $i <=10; $i++ ) {
		
			echo "\t\t<option value='". $i ."'>". $i ."</option>\n";
		}
		?>
		</select>
		<p>

		<div class="spacer">Enter new quantity</div>
		<input type="text" name="quantity" size="40"><p>

		<input type="submit" id="thebutton" value="Add new Record">
	
		</form>	
	
</div> <!-- ends div#contentwrap -->

</body>
</html>



