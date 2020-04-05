<?php

if(isset($_POST['personid'])) {
	$person_id = $_POST['personid']; // used in $queryp
	$newagent_personid = $_POST['personid']; // used in $querya
}
else {
echo "please enter the person id again.<br>"; // prompts user if $_POST for some reason could not be set
echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // goes back to sign in page to try again
}

if(isset($_POST['personname'])) {
	$person_name = $_POST['personname']; // used in $queryp
}
else {
echo "please enter the person name again.<br>";
echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // returns to sign in page to try again
}
if(isset($_POST['personemail'])) {
	$person_email = $_POST['personemail']; // used in $queryp
}
else {
echo "please enter the person email again.<br>";
echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // returns to sign in page to try again
}
if(isset($_POST['personmailingaddress'])) {
	$person_mailingaddress = $_POST['personmailingaddress']; // used in $queryp
}
else {
echo "please enter the person mailing address again.<br>";
echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // returns to sign in page to try again
}
if(isset($_POST['personphone'])) {
	$person_phone = $_POST['personphone']; // used in $queryp
}
else {
echo "please enter the person phone number again.<br>";
echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // returns to sign in page to try again
}
if(isset($_POST['newagentid'])) {
	$newagent_id = $_POST['newagentid']; // used in $querya
}
else {
echo "please enter the agent id again.<br>";
echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // returns to sign in page to try again
}
if(isset($_POST['newagenthourlyrate'])) {
	$newagent_hourlyrate = $_POST['newagenthourlyrate']; // used in $querya
}
else {
	echo "please enter the agent hourly rate again.<br>";
	echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // returns to sign in page to try again
}
if(isset($_POST['newagentusername'])) {
	$newagent_username = $_POST['newagentusername']; // called agentlogin in the agents table in database
}													 // used in $querya
else {
	echo "please enter the agent username again.<br>";
	echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // called agentlogin in the agents table in database
}																	// returns to sign in page to try again
if(isset($_POST['newagentpassword'])) {
	$newagent_password = $_POST['newagentpassword']; // used in $querya
}
else {
	echo "please enter the agent password again.<br>";
	echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // returns to sign in page to try again
}
if(isset($_POST['newagentteam'])) {
	$newagent_team = $_POST['newagentteam']; // used in $querya
}
else {
	echo "please enter the agent team again.<br>";
	echo "<meta http-equiv='refresh' content='1; url=signin.php'>"; // returns to sign in page to try again
}

	///// connect to database /////
	$db_host = '127.0.0.1:3306';
	$db_user = 'root';
	$db_passwd = '87KLs97!6249P7';
	$db_name = 'thecallcenter';
	
	$mysqli = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); // make connection
	
	if(mysqli_connect_errno($mysqli))
	{
		print "fail";
	
	} else {
		print "Success";
	}
	///// end connect to database /////

// create SQL INSERT queries
$queryp = "INSERT INTO persons VALUES(".$person_id.",'".$person_name."','".$person_email."','".$person_mailingaddress."',".$person_phone.")";
$querya = "INSERT INTO agents VALUES(".$newagent_id.",".$newagent_hourlyrate.",'".$newagent_username."','".$newagent_password."',".$newagent_personid.",'".$newagent_team."')";

// execute SQL INSERT queries
mysqli_query($mysqli,$queryp);
mysqli_query($mysqli,$querya);

// close DB connection
mysqli_close($mysqli);

echo "<a href='managerpage.php'>return to manager page</a>"; // link back to manager page

?>
