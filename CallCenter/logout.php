<?php
session_start();
session_destroy(); // ends the session
echo "<meta http-equiv='refresh' content='1; url=callcenterspace.php'>"; // goes to main space
?>