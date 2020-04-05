<?php

if(isset($_POST['keyword'])) {
$keyword = $_POST['keyword']; // stores input in keyword variable

session_start(); // starts session to use session values
if(isset($_SESSION['personId'])) {
	$agent_personId = $_SESSION['personId']; // used in $query1
}

///// connecting to database /////
$db_host = '127.0.0.1:3306';
$db_user = 'root';
$db_passwd = '87KLs97!6249P7';
$db_name = 'thecallcenter';


$mysqli = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); // make connection

if(mysqli_connect_errno($mysqli))
{
	print "fail";

} else {
	print "Success<br>";
}
///// end connecting to database /////

 #MYACCT

// Create SQL Queries
$query1 = "SELECT * FROM agents, persons WHERE agents.personId = ".$agent_personId." AND agents.personId = persons.personId"; // myacct
$query2 = "SELECT agents.agentId, customers.customerId, interactions.startTime, customers.accountStartDate FROM agents, customers, interactions WHERE agents.personId = ".$agent_personId." AND interactions.agentId = agents.agentId AND customers.customerId = interactions.customerId ORDER BY agents.agentId"; // myint




if($keyword == "myacct") {						// check if input matches first keyword
	$result = mysqli_query($mysqli,$query1); // performs query
	echo "<table>";
	// echo "table {border-spacing: 10px}";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) { // loops through column (field) names
		echo "<th>";
		echo $column->name; // prints column names
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp</th>"; // indents for spacing

	}
	echo "</tr><br>";
	while($data = @mysqli_fetch_row($result)) { // loop through fetched rows
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) {		// loops through row cells
			echo "<td>";
			echo $data[$i];						// prints row cells
			echo "</td>";

		}
	}
	echo "</table>";
}

else if($keyword == "myint") {								// check if input matches second keyword
	$result = mysqli_query($mysqli,$query2); // performs query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) { // loops through column (field) names
		echo "<th>";
		echo $column->name; // prints column names
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp</th>"; // indents for spacing

	}
	echo "</tr>";
	echo "<br>";
	while($data = @mysqli_fetch_row($result)) { // loops through rows
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) { // loops through row cells
			echo "<td>";
			echo $data[$i]; // prints row cells
			echo "&nbsp&nbsp</td>"; // indent for spacing

		}
	}
	echo "</tr>";
	echo "<br>";
	echo "</table>";
}
else {						// if input does not match keywords
	echo "try again";
	mysqli_close($mysqli); // close connection
	echo "<meta http-equiv='refresh' content='1; url=outagentpage.php'>"; // returns to out agent page
}


mysqli_close($mysqli); // closes connection

echo "<tr><td><a href='outagentpage.php'>Return to out agent</a></td></tr>"; // link to out agent page
}

?>