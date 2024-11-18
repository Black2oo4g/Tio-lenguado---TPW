<?php
session_start();
session_destroy();
header("Location: /Public_html/login.html");
exit();
?>
