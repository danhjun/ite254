<?php

session_start();
unset( $_SESSION['idnum'] );

session_destroy();

echo "You are logged out!";


?>