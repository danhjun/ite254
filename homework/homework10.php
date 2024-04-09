<!-- https://stargate.ncc.edu/~jun0785/homework10.php -->
<?php
// Turn on error reporting and display errors
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
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
	margin-bottom: 10px;
 }

</style>

</head>

<body>

<div id="pagewrap">

	<div id="heading">ITE254 Exam #2</div>
	
	<div id="contentdiv">
	
		<!-- php code to display student grades from database goes here -->
		<?php

 		// Accessing stargate table
		$db = mysqli_connect( "localhost", "ite254ka", "ite254ka", "ite254ka" );

		// Query to pull all of ITE254 students
        $roster_query = "SELECT * FROM roster WHERE course = 'ite254'";
		$result = mysqli_query($db, $roster_query)
            or die("An error occured -> " . mysqli_error($db));

		// mysqli_num_rows() Returns the number of rows in the result set. 
        if ( mysqli_num_rows($result) == 0 ) {
			echo "<div>No students found</div>";
		} else {
			// Printing the amount of students found in search
			echo "<div class='spacer'>Students found in search: " . mysqli_num_rows($result) . "</div>";
			for ($i = 0; $i < mysqli_num_rows($result); $i++) {
				// mysqli_fetch_array()Fetches one row of data from the result set and returns it as an array
				$row = mysqli_fetch_array($result);
				// Printing the name of each student
				echo "<div>Student name: " . $row['name'] . "</div>\n";
				// Printing the course name
				echo "<div>Course: " . $row['course'] . "</div>\n";
				// Computing the average
				$average = round(($row['exam1'] + $row['exam2'] + $row['exam3'])/3,2);
				// Logic to print passing students in green, failing students in red
				if ( $average >= 65 ) {
					echo "<div style='color: green;' class='spacer'>Average: " . $average . "</div>\n";
				}
				else {
					echo "<div style='color: red;' class='spacer'>Average: " . $average . "</div>\n";
				}
			}   
		}
		?>		
		
	</div> <!-- ends div#contentdiv -->

</div> <!-- ends div#pagewrap -->

</body>
</html>