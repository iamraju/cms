<?php
include dirname(__FILE__) . "/../lib/database.php";

session_destroy();
header("Location: login.php?success=Successfully logged out.");
die;
