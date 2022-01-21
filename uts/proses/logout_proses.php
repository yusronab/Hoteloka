<?php

include('../util/connection.php');
session_destroy();
header("location:../login.php");

?>