<?php
// using $_POST personid variable
if(isset($_POST['personid'])) {
	$person_id = $_POST['personid']; // used in $queryp
	$newmanager_personid = $_POST['personid']; // used in $querym
}
else {
echo "please enter the person id again.<br>"; // if for some reason $_POST was not set
echo "<meta http-equiv='refresh' content='1; url=managersignin.php'>"; // goes back to sign in page to try again
}

if(isset($_POST['personname'])) {
	$person_name = $_POST['personname']; // used in $queryp
}
else {
echo "please enter the person name again.<br>";
echo "<meta http-equiv='refresh' content='1; url=managersignin.php'>"; // goes back to sign in page to try again
}
if(isset($_POST['personemail'])) {
	$person_email = $_POST['personemail']; // ued in $queryp
}
else {
echo "please enter the person email again.<br>";
echo "<meta http-equiv='refresh' content='1; url=managersignin.php'>"; // goes back to sign in page to try again
}
if(isset($_POST['personmailingaddress'])) {
	$person_mailingaddress = $_POST['personmailingaddress']; // used in $queryp
}
else {
echo "please enter the person mailing address again.<br>";
echo "<meta http-equiv='refresh' content='1; url=managersignin.php'>"; // goes back to sign in page to try again
}
if(isset($_POST['personphone'])) {
	$person_phone = $_POST['personphone']; // used in $queryp
}
else {
echo "please enter the person phone number again.<br>";
echo "<meta http-equiv='refresh' content='1; url=managersignin.php'>"; // goes back to sign in page to try again
}
if(isset($_POST['newmanagerid'])) {
	$newmanager_id = $_POST['newmanagerid']; // used in $querym
}
else {
echo "please enter the manager id again.<br>";
echo "<meta http-equiv='refresh' content='1; url=managersignin.php'>"; // goes back to sign in page to try again
}

if(isset($_POST['newmanagerusername'])) {
	$newmanager_username = $_POST['newmanagerusername']; // called agentlogin in the agents table in database
}
else {
	echo "please enter the manager username again.<br>";
	echo "<meta http-equiv='refresh' content='1; url=managersignin.php'>"; // goes back to sign in page to try again
}
if(isset($_POST['newmanagerpassword'])) {
	$newmanager_password = $_POST['newmanagerpassword']; // used in $querym
}
else {
	echo "please enter the manager password again.<br>";
	echo "<meta http-equiv='refresh' content='1; url=managersignin.php'>"; // goes back to sign in page to try again
}

	///// connect to database /////
	$db_host = '127.0.0.1:3306';
	$db_user = 'root';
	$db_passwd = '87KLs97!6249P7';
	$db_name = 'thecallcenter';
	
	$mysqli = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); // make connection
	
	if(mysqli_connect_errno($mysqli))
	{
		print "fail<br>";
	
	} else {
		print "Success<br>";
	}
	///// end connect to database /////

// create SQL INSERT queries
$queryp = "INSERT INTO persons VALUES(".$person_id.",'".$person_name."','".$person_email."','".$person_mailingaddress."',".$person_phone.")";
$querym = "INSERT INTO managers VALUES(".$newmanager_id.",'".$newmanager_username."','".$newmanager_password."',".$newmanager_personid.")";

// execute SQL INSERT queries
mysqli_query($mysqli,$queryp);
mysqli_query($mysqli,$querym);

echo "<a href='managerpage.php'>return to manager page</a>"; // link to return to manager page

// close DB connection
mysqli_close($mysqli);


?>
