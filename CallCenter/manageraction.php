<?php

// retrieve person id from session
session_start();
if(isset($_SESSION['personId'])) {
	$manager_personId = $_SESSION['personId'];
}


///// connecting to database /////
$db_host = '127.0.0.1:3306';
$db_user = 'root';
$db_passwd = '87KLs97!6249P7';
$db_name = 'thecallcenter';

$mysqli = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); // connecting

if(mysqli_connect_errno($mysqli))
{
	print "fail";

} else {
	print "Success<br>";
}
///// end connecting to database /////


if(isset($_POST['keyword'])) {
$keyword = $_POST['keyword']; // uses $_POST value

// queries
$query1 = "SELECT agentId, agentHourlyRate, personId FROM agents"; // allagentpay
$query2 = "SELECT agentId, agentHourlyRate, personId FROM agents WHERE agentteam = 'ia'"; // iateaminfo
$query3 = "SELECT agentId, agentHourlyRate, personId FROM agents WHERE agentteam = 'oa'"; // ioteaminfo
$query4 = "SELECT agentId, agentHourlyRate, persons.personId, agentTeam, personName, personEmail, personMailingAddress, personPhone FROM agents, persons WHERE persons.personId = agents.personId"; // allagentinfo
// query 5 through 8 use ORDER BY to sort the rows based on the specified attribute
$query5 = "SELECT agents.agentId, interactions.interactionId FROM agents, interactions WHERE agents.agentId = interactions.agentId ORDER BY agents.agentId"; // intbyag
$query6 = "SELECT agents.agentId, customers.customerId, interactions.interactionId FROM agents, interactions, customers WHERE interactions.agentID = agents.agentID AND interactions.customerId = customers.customerId ORDER BY agents.agentid"; // intcustbyag
$query7 = "SELECT surveycomments, surveyscore, agents.agentId FROM surveys, agents WHERE surveys.agentId = agents.agentId ORDER BY agents.agentId"; // surveybyag
$query8 = "SELECT callProblem, callResolution, aftercallwork.agentId FROM agents, aftercallwork WHERE agents.agentId = aftercallwork.agentId ORDER BY agents.agentid"; //acwbyag


if($keyword == "allagentpay") {					// checks first keyword
	$result = mysqli_query($mysqli,$query1); // performs query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) { // loops through each column (field) name
		echo "<th>";
		echo $column->name; // prints column name
		echo "&nbsp&nbsp&nbsp&nbsp</th>"; // indents for spacing
	}
	echo "</tr>";
	while($data = @mysqli_fetch_row($result)) {		// loops through each row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) {			// loops through each cell of each row
			echo "<td>";
			echo $data[$i];							// prints the cells of each row
			echo "</td>";
		}
		echo "</tr><br>";
	}
	echo "</table>";
}

else if($keyword == "iateaminfo") {						// checks second keyword
	$result = mysqli_query($mysqli,$query2); // performs the query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) {		// loops through each column (field) name
		echo "<th>";
		echo $column->name; // prints the column names
		echo "&nbsp&nbsp&nbsp&nbsp</th>"; // indents for spacing
	}
	echo "</tr>";
	while($data = @mysqli_fetch_row($result)) { // loops through each row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) { 		// loops through each row cell
			echo "<td>";
			echo $data[$i];						// prints each row cell
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

else if($keyword == "ioteaminfo") {							// checks third keyword
	$result = mysqli_query($mysqli,$query3); // performs query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) { // loops through the name of each column (field)
		echo "<th>";
		echo $column->name; // prints each column name
		echo "&nbsp&nbsp&nbsp&nbsp</th>"; // indents
	}
	echo "</tr>";
	while($data = @mysqli_fetch_row($result)) {		// loops through each row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) {			// loops through each row cell
			echo "<td>";
			echo $data[$i];							// prints each row cell
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

else if($keyword == "allagentinfo") {							// checks fourth keyword
	$result = mysqli_query($mysqli,$query4); // performs query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) {		// loops through each column (field) name
		echo "<th>";
		echo $column->name;	// prints column name
		echo "&nbsp&nbsp&nbsp&nbsp</th>"; // indents
	}
	echo "</tr>";
	while($data = @mysqli_fetch_row($result)) {			// loops through each row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) {				// loops through each row cell
			echo "<td>";
			echo $data[$i];								// prints each row cell
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

else if($keyword == "intbyag") {								// checks fifth keyword
	$result = mysqli_query($mysqli,$query5); // performs query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) {		// loops through each column (field) name
		echo "<th>";
		echo $column->name; // prints each column name
		echo "&nbsp&nbsp&nbsp&nbsp</th>"; // indent for spacing
	}
	echo "</tr>";
	while($data = @mysqli_fetch_row($result)) { // loops through each row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) { // loops through each cell
			echo "<td>";
			echo $data[$i];					// prints each cell
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

else if($keyword == "intcustbyag") {							// checks sixth keyword
	$result = mysqli_query($mysqli,$query6); // performs query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) {			// loops through column (field) name
		echo "<th>";
		echo $column->name; // prints column name
		echo "&nbsp&nbsp&nbsp&nbsp</th>"; // indent for spacing
	}
	echo "</tr>";
	while($data = @mysqli_fetch_row($result)) { // loops through each row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) {		// loops through each row cell
			echo "<td>";
			echo $data[$i];						// prints each row cell
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

else if($keyword == "surveybyag") {								// checks seventh keyword
	$result = mysqli_query($mysqli,$query7); // performs query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) { // loops through each column (field) name
		echo "<th>";
		echo $column->name; // prints each column name
		echo "&nbsp&nbsp&nbsp&nbsp</th>"; // indent for spacing
	}
	echo "</tr>";
	while($data = @mysqli_fetch_row($result)) { // loops throguh each row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) {		// loops through each row cell
			echo "<td>";
			echo $data[$i];						// prints each row cell
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

else if($keyword == "acwbyag") {							// checks eighth keyword
	$result = mysqli_query($mysqli,$query8); // performs query
	echo "<table>";
	echo "<tr>";
	while($column = mysqli_fetch_field($result)) { // loops through column (field) names
		echo "<th>";
		echo $column->name; // prints column name
		echo "&nbsp&nbsp&nbsp&nbsp</th>"; // indent for spacing
	}
	echo "</tr>";
	while($data = @mysqli_fetch_row($result)) { // loops through each row
		echo "<tr>";
		for($i=0;$i<(count($data));$i++) { 		// loops through each row cell
			echo "<td>";
			echo $data[$i];						// prints each row cell
			echo "&nbsp&nbsp&nbsp</td>"; // indent for spacing
		}
		echo "</tr>";
	}
	echo "</table>";
}


mysqli_close($mysqli); // close connection
echo "<br><tr><td><a href='managerpage.php'>Return to manager page</a></td></tr>"; // link to manager page

}