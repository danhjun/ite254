<?php
// Turn on error reporting and display errors
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Require the password file
require_once("../pw/.htpasswd");

// SQL to update count
$updateSql = "UPDATE pagecounter SET count = count + 1 WHERE id = 1";

// Execute the update query
mysqli_query($db, $updateSql);

// SQL to select the updated count
$selectSql = "SELECT count FROM pagecounter WHERE id = 1";

$result = mysqli_query($db, $selectSql);

// Fetching the updated count
$row = mysqli_fetch_array($result);

// Message to display based on whether the count was fetched successfully
if ($row) {
    $message = "The page has been loaded and the counter has increase to " . $row["count"] . " times.";
} else {
    $message = "Error: Could not retrieve the updated count.";
}

?>

<html>
  <head>
    <title></title>
    <style type="text/css">
      body {
        background-color: #454F8C;
        font-family: arial;
        color: #454F8C;
      }

      #pagewrap {
        background: #F4F5E7;
        border: 8px #FF9E01 solid;
        padding: 20px;
        width: 500px;
        height: 400px;
        margin: 20px auto 0px auto;
        border-radius: 25px;
        text-align: center;
      }

      #heading {
        font-size: 2em;
        border-bottom: 6px #484452 double;
        padding: 10px 0px 10px 0px;
      }

      #contentwrap {
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <div id="pagewrap">
      <div id="heading"> When this page loads, the value of the count field is increased by 1 </div>
      <div id="contentwrap">
        <div> <?php echo $message; ?> </div>
      </div>
      <!--ends div#contentwrap-->
    </div>
    <!--ends div#pagewrap-->
  </body>
</html>


