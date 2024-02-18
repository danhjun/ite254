<html>
<head>
<title></title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/tables.jpg");
	font-family: arial;
	text-align: center;
}

#contentwrap {
	background-color: lightblue;
	border: 10px darkblue solid;
	padding: 20px;
	width: 700px;
	margin: 30px auto 0px auto;
}

#maintitle {
	background-color: darkblue;
	border: 8px darkred double;
	color: white;
	font-size: 1.75em;
	padding: 25px 0px 25px 0px;
	font-weight: bold;
}

#infowrap {
	background-color: white;
	border: 8px red double;
	padding: 20px;
	margin-top: 20px;
}

.formtext {
	font-size: 1.29em;
	margin-top: 20px;
}

.formfield {
	background-color: lightgray;
	border: 2px darkred solid;
}

#spacer {
	margin-bottom: 5px;
}

#headrow {
	background-color: black;
	color: white;
}

.oddrow {
	background-color: maroon;
	color: yellow;
}

.evenrow {
	background-color: darkblue;
	color: lightblue;
}

.headcolor {
	color: yellow;
}
</style>

</head>
<body>

<div id="contentwrap">

	<div id="maintitle">
		Create a table using PHP with<br /> 
		hard coded start and end numbers
        <?php
        $startnum = 3;
        $endnum = 30;

        echo "<div class='headcolor'>The value of startnum is " . $startnum . "</div>\n";
        echo "<div class='headcolor'>The value of endnum is " . $endnum . "</div>\n";

        // print date and time 
        echo "<div class='headcolor'>The date and time is " . date("M jS, Y") . "</div>\n";

        // print time with H:M:S am/pm
        echo "<div class='headcolor'>The time is " . date("h:i:s a") . "</div>\n";
        ?>
			
	</div>
	
	<div id="infowrap">

        <table border="3" width="100%">
            <tr>
                <th> Number </th>
                <th> Square Root </th>
                <th> Square </th>
            </tr>

            <?php
            // use PHP to construct data rows
            for ($i = $startnum; $i <= $endnum; $i++) {
                echo "<tr>\n";
                echo "<td>" . $i . "</td>\n";
                echo "<td>" . round(sqrt($i), 3) . "</td>\n";
                echo "<td>" . pow($i, 2) . "</td>\n";
                echo "</tr>\n";
            }
            ?>
        </table>
	</div> <!-- ends div#infowrap -->

</div> <!-- ends div#contentwrap -->

</body>
</html>