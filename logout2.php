<?php
session_start();
session_destroy();
header("Location: loginsession2.php");
exit();
?>