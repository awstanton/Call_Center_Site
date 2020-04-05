<?php
if(isset($_POST['agentpersonid'])) {
$agentperson_id = $_POST['agentpersonid']; // used in each query to identify agent account to delete

///// connect to database /////
$db_host = '127.0.0.1:3306';
$db_user = 'root';
$db_passwd = '87KLs97!6249P7';
$db_name = 'thecallcenter';

$mysqli = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); // makes connection

if(mysqli_connect_errno($mysqli))
{
	print "fail";

} else {
	print "Success";
}
///// end connect to database /////

// queries to delete agent information from both persons and agents tables
$query0 = "DELETE FROM persons WHERE personId = ".$agentperson_id;
mysqli_query($mysqli,$query0); // executes query

$query1 = "DELETE FROM agents WHERE personId = ".$agentperson_id;
mysqli_query($mysqli,$query1); // executes query

$query2 = "SELECT FROM persons WHERE personId = ".$agentperson_id;
mysqli_query($mysqli,$query2); // executes query

$query3 = "SELECT FROM agents WHERE personId = ".$agentperson_id;
mysqli_query($mysqli,$query3); // executes query


$result2 = mysqli_query($mysqli,$query2); // executes query
$data2 = @mysqli_fetch_row($result2); // fetches rows from table

$result3 = mysqli_query($mysqli,$query3); // executes query
$data3 = @mysqli_fetch_row($result3); // fetches rows from table

if(!isset($data2[0]) && !isset($data3[0])) { // checks if the rows in the table are NULL or not
	echo "success or that agent does not exist"; // either agent was deleted or input was wrong
}
else {
	if(!isset($data2[0])) { // if for some reason only part of the data was deleted
		echo "agent only deleted from person table";
	}
	else if(!isset($data3[0])) { // if for some reason only part of the data was deleted
		echo "agent only deleted from agent table";
	}
	else {
		echo "agent account was not deleted";  // if the rows that should have been deleted are still detected in the database
	}
}
	
	mysqli_close($mysqli); // close connection
	echo "<meta http-equiv='refresh' content='3; url=managerpage.php'>"; // go back to manager page

}
?>
