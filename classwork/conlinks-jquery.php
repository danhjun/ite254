<html>
<head>
<title></title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/space_invaders.jpg");
	font-family: arial;
}

#pagewrap {
	width: 800px;
	margin: 40px auto 0px auto;
}

#header {
	text-align: center;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 1.45em;
	background: maroon;
	padding: 20px 0px 20px 0px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
}

#content {
	background: #FFFFFF;
	border: 2px #003366 solid;
	padding: 30px;
	min-height: 500px;
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/halo.png");
	background-repeat: no-repeat;
	background-position: right bottom;
}

#footer {
	background: maroon;
	color: #FFFFFF;
	height: 65px;
	border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
}

a:hover {
	color: red;
	text-decoration: none;
}

#gamedivwrap {
	margin-top: 25px;
	display: none;
}

.consoletitle {
	margin-top: 20px;
	margin-bottom: 10px;
	border-bottom: 5px blue solid;
	font-size: 1.2em;
	color: blue;
}

#output {
	margin-top: 25px;
}

.linkbkg {
	background-color: yellow;
}

.linespace {
    margin: 0px 15px 0px 15px;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">

$("document").ready( function() {

    $(".conlinks").on( "click", function() {

        // get the id of the console .substring(3) removes the con from the id
        var conid = $(this).attr("id").substring(3);

        $.ajax({
            url: "conlinks-ajax.php",
            type: "POST",
            data: "conid=" + conid,
            success: function( data ) {
                $("#output").html( data );
            }
        });
        

    });
	
	
}); // ends document.ready code

</script>

</head>
<body>

<div id="pagewrap">

	<div id="header">
		Console Links
	</div>

	<div id="content">

		<!-- links go here -->
        <?php
        require_once( "../pw/.htpasswd" );

        $conquery = "select * from consoles order by company, console_name";

        $conresults = mysqli_query( $db, $conquery )
            or die( "Error getting consoles ". mysqli_error( $db ) );

        for( $i= 0; $i < mysqli_num_rows( $conresults ); $i++ ) {
            
            $con_data = mysqli_fetch_array( $conresults );
            // adding con to id to make it unique - id's shouldn't just be numbers! - Ganson
            echo "<a href='javascript:void(0);' class='conlinks' id='con". $con_data['id'] . "'>";
            echo $con_data["company"] ." ". $con_data["console_name"];
            echo "</a>";

            if ($i < mysqli_num_rows( $conresults ) - 1) {
                echo "<span class='linespace'>|</span>";
            }

        } // ends FOR loop

        ?>

		<div id="output"></div>
			
	</div> <!-- closes div#content -->
	
	<div id="footer"></div>

</div> <!-- closes div#pagewrap -->

</body>
</html>



