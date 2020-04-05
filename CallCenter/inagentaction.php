<?php

if(isset($_POST['keyword'])) {
$keyword = $_POST['keyword']; // stores input from form using $_POST superglobal

// retrieve person id from session
session_start();						// starts session so previously initialized variables can be used
if(isset($_SESSION['personId'])) {
	$agent_personId = $_SESSION['personId']; // stores session variable value
}


///// connecting to database /////
	// information for connecting
$db_host = '127.0.0.1:3306';
$db_user = 'root';
$db_passwd = '87KLs97!6249P7';
$db_name = 'thecallcenter';


$mysqli = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); // makes connection

if(mysqli_connect_errno($mysqli))
{
	print "fail";

} else {
	print "Success<br>";
}
///// end connecting to database /////


///// SQL Queries /////
// selects the agent's personal information
$query1 = "SELECT * FROM agents, persons WHERE agents.personId = ".$agent_personId." AND persons.personId = agents.personId"; // allagentpay
// selects the after call work the agent has performed
$query2 = "SELECT * FROM agents, aftercallwork WHERE agents.personId = ".$agent_personId." AND aftercallwork.agentId = agents.agentId"; // myacw



if($keyword == "myacct") {						// checks if first keyword was entered
	$result = mysqli_query($mysqli,$query1);
	echo "<table>";
	// echo "table {	border-spacing: 10px}";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) {  // loops through each successive column (field) name
		echo "<th>";
		echo $column->name; 						// prints column name
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp</th>";		// indents so there is apce between column
	}
	echo "</tr><br><tr>";
	while($data = @mysqli_fetch_row($result)) {	    // loops through each successive row
		for($i=0;$i<(count($data));$i++) {			// loops through each record in the given row
			echo "<td>";
			echo $data[$i];							// prints the record
			echo "</td>";
		}
	}
	echo "</tr>";
	echo "</table>";
}

else if($keyword == "myacw") {					// checks if second keyword was entered
	$result = mysqli_query($mysqli,$query2);
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) {	// loops through each successive column (field) name
		echo "<th>";
		echo $column->name;							// prints column name
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp</th>";
	}
	echo "</tr><br>";
	while($data = @mysqli_fetch_row($result)) {		// loops through each successive row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) {			// loops through each record in the given row
			echo "<td>";
			echo $data[$i]."<br>";					// prints each record
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "<br></tr>";
	echo "</table>";
}
else {
	echo "try again";
	mysqli_close($mysqli); // close connection
	echo "<meta http-equiv='refresh' content='1; url=inagentpage.php'>"; // goes back to the in agent page
}


mysqli_close($mysqli); // close connection
echo "<tr><td><a href='inagentpage.php'>Return to in agent page</a></td></tr>"; // if keyword wroong link to in agent page
}

?>