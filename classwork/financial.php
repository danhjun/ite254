<?php

session_start();

if (isset ($_SESSION['idnum'])) {

    echo "You are logged in</p>";
    echo "Your current balance is $900000.32";
}
else {
    echo "You are not logged in";
}
?>