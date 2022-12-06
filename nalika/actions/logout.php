<?php
session_start();

//function to check for logout
    unset ($_SESSION["customer_id"]);
    unset ($_SESSION["user_role"]);
    session_destroy();
    header('Location: ../../index.php');

?>