<?php 
// go to login page
echo "<meta http-equiv='refresh' content='1; url=loginpage.php'>"; // takes user to login page
exit;

// user has tried to login
//if(isset($_POST['agentid']) || isset($_POST['agentpassword']) ) {
//	session_start();
//	$_SESSION['agent_id'] = $_POST['agentid'];
//	$_SESSION['agent_password'] = $_POST['agentpassword'];
//}


?>