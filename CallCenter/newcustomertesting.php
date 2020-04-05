<?php

if(isset($_POST['personid'])) {
	$person_id = $_POST['personid']; // used in $queryp
	$customer_personid = $_POST['personid']; // used in $queryc
}
else {
echo "please enter the person id again.<br>";
echo "<meta http-equiv='refresh' content='1; url=newcustomer.php'>"; // go back to customer sign in page to try again
}

if(isset($_POST['personname'])) {
	$person_name = $_POST['personname']; // used in $queryp
}
else {
echo "please enter the person name again.<br>";
echo "<meta http-equiv='refresh' content='1; url=newcustomer.php'>"; // go back to customer sign in page to try again
}
if(isset($_POST['personemail'])) {
	$person_email = $_POST['personemail']; // used in $queryp
}
else {
echo "please enter the person email again.<br>";
echo "<meta http-equiv='refresh' content='1; url=newcustomer.php'>"; // go back to customer sign in page to try again
}
if(isset($_POST['personmailingaddress'])) {
	$person_mailingaddress = $_POST['personmailingaddress']; // used in $queryp
}
else {
echo "please enter the person mailing address again.<br>";
echo "<meta http-equiv='refresh' content='1; url=newcustomer.php'>"; // go back to customer sign in page to try again
}
if(isset($_POST['personphone'])) {
	$person_phone = $_POST['personphone']; // used in $queryp
}
else {
echo "please enter the person phone number again.<br>";
echo "<meta http-equiv='refresh' content='1; url=newcustomer.php'>"; // go back to customer sign in page to try again
}
if(isset($_POST['customerid'])) {
	$customer_id = $_POST['customerid']; // used in $queryc
}
else {
echo "please enter the customer id again.<br>";
echo "<meta http-equiv='refresh' content='1; url=newcustomer.php'>"; // go back to customer sign in page to try again
}

if(isset($_POST['accountstartdate'])) {
	$accountstartdate = $_POST['accountstartdate']; // called agentlogin in the agents table in database
}													// used in $queryp
else {
	echo "please enter the account start date again.<br>";
	echo "<meta http-equiv='refresh' content='1; url=newcustomer.php'>"; // go back to customer sign in page to try again
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
$queryc = "INSERT INTO customers VALUES(".$customer_id.",'".$accountstartdate."',".$customer_personid.")";

// execute SQL INSERT queries
mysqli_query($mysqli,$queryp);
mysqli_query($mysqli,$queryc);

// close DB connection
mysqli_close($mysqli);

echo "<meta http-equiv='refresh' content='1; url=inagentpage.php'>"; // goes back to in agent page


?>
