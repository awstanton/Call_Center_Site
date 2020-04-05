<?php

if(isset($_POST['usernamefp'])) { // uses $_POST superglobal from forgotpassword.php file to access stored input

$username_fp = $_POST['usernamefp']; // assigns the stored input to variable
$type = "agentLogin";				 // specifies if it is an agent logging in (in contrast to manager)
	
// initializing variables for database connection
$db_host = '127.0.0.1:3306';
$db_user = 'root';
$db_passwd = '87KLs97!6249P7';
$db_name = 'thecallcenter';

///// connecting to database /////
$mysqli = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); // connects to the specified database

if(mysqli_connect_errno($mysqli))
{
	print "fail";

} else {
	print "Success<br>";
}
///// end connecting to database /////

// create SQL SELECT queries
		// agents queries
$query0 = "SELECT agentLogin FROM agents WHERE ".$type." = '".$username_fp."'"; // selects username
$query1 = "SELECT agentPassword FROM agents WHERE ".$type." = '".$username_fp."'"; // finds password based on username
		
// manager queries
$querym0 = "SELECT managerLogin FROM managers WHERE managerLogin = '".$username_fp."'"; // selects username
$querym1 = "SELECT managerPassword FROM managers WHERE managerLogin = '".$username_fp."'"; // finds pswrd based on usrnm

		// for agent
$result0 = mysqli_query($mysqli,$query0); // performs first query
$result1 = mysqli_query($mysqli,$query1); // performs second query

$data = @mysqli_fetch_row($result1); // stores row in an array

		// for manager
$resultm0 = mysqli_query($mysqli,$querym0); // performs third query
$resultm1 = mysqli_query($mysqli,$querym1); // performs fourth query

$datam = @mysqli_fetch_row($resultm1); // stores row in an array

if(isset($data[0])) { 						// if agent password was successfully found
	echo "Your password is: ".$data[0]."<br>"; // displays password
	mysqli_close($mysqli); // closes connection
	echo "<a href='loginpage.php'>Login</a>";	// link back to login page
}
else if(isset($datam[0])) {					// if manager password was successfully found
	echo "Your password is: ".$datam[0]."<br>"; // displays password
	mysqli_close($mysqli); // closes connection
	echo "<a href='loginpage.php'>Login</a>"; // link back to login page
}
else {											// informs user of incorrect username
echo "That username is incorrect.<br>";
mysqli_close($mysqli);
echo "<a href='forgotpassword.php'>Try again</a><br>";	// user can try again by clicking link
echo "or <br><a href='logout.php'>Exit</a>";			// user can logout by clicking link
}
mysqli_close($mysqli); // closes connection
}


else {
echo "return to login page";
echo "<a href='loginpage.php'>Try to login</a>";  // if for some reason input could not be processed, user can try again
}
mysqli_close($mysqli); // close connection
?>