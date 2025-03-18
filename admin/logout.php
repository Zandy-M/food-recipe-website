<?php
session_start();
session_unset();
session_destroy();
include('../includes/functions.php');
redirect('index.php');
exit();