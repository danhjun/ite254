<html>
<head>
<title></title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite154/img/fall.jpg");
	color: darkred;
	text-align: center;
	font-family: arial;
}

#contentwrap {
	background-color: lightyellow;
	border: 8px maroon double;
	width: 500px;
	margin: 40px auto 0px auto;
	padding: 20px;
	height: 300px;
}

#header {
	font-size: 1.25em;
	margin-bottom: 20px;
	border-bottom: 3px darkred solid;
	padding-bottom: 5px;
}

.formfield {
	background: lightblue;
	color: maroon;
	font-size: 1.15em;
	border: 2px darkgreen solid;
	padding: 3px;
}

.formtext {
	margin-top: 15px;
}

#filebutton {
	background-color: maroon;
	color: yellow;
	border: 2px #000000 solid;
	cursor: pointer;
	font-weight: bold;
}

#filebutton:hover {
	background-color: yellow;
	color: maroon;
	border: 2px #000000 solid;
	cursor: pointer;
}

#output {
	margin-top: 20px;
	font-size: 1.25em;
	color: darkblue;
}

</style>
</head>
<body>

<div id="contentwrap">

	<div>This program writes the user's input to a text file on the server</div>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		<div class="formtext">Enter employee name</div>
		<div><input type="text" class="formfield" name="empname"></div>
	
		<div class="formtext">Enter rate of pay</div>
		<div><input type="text" class="formfield" name="payrate"></div>
	
		<div class="formtext">Enter hours worked</div>
		<div><input type="text" class="formfield" name="hours"></div>

		<div style="margin-top:10px;">
			<input type="submit" value="Write to file" id="filebutton">
		</div>
	
	</form>

	<div id="output">
	<!-- PHP code goes here -->
    <?php
    if (isset($_POST['empname'])) {

        // output data to a file on the server
        // pre-create this file before running the script
        $fstream = fopen("payroll.txt", "a");
        $total = $_POST['payrate'] * $_POST['hours'];
        $output = $_POST['empname'] . "," . $_POST['payrate'] . "," . $_POST['hours'] . 
            "," . $total . "\n";

        // sending output to txt file


        // lock stream
        flock ( $fstream, LOCK_EX);

        // write to file
        fwrite ($fstream, $output);

        // unlock stream
        flock ( $fstream, LOCK_UN);

        // close file
        fclose($fstream);

        echo "Data written to file";
    }
    ?>



	</div> <!-- ends div#output -->

</div> <!-- ends div#contentwrap -->

</body>
</html>