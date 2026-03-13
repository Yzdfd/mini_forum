<?php

session_start();

/* destroy session */

session_unset();
session_destroy();

/* redirect */

header("Location: index.php");
exit;