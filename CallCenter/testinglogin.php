<?php
// if user has tried to login
if(isset($_POST['agentlogin']) && isset($_POST['agentpassword']) ) {
	$agent_login = $_POST['agentlogin']; // used in queries 1,3,4, and 5
	$agent_password = $_POST['agentpassword']; // used in query 2
	$type_login = "agentLogin"; // used in queries 1,3,4, and 5
	$type_password = "agentPassword"; // used in query2
	$type_team = "agentTeam";
	
	///// connect to database /////
	$db_host = '127.0.0.1:3306';
	$db_user = 'root';
	$db_passwd = '87KLs97!6249P7';
	$db_name = 'thecallcenter';
	
	$mysqli = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); // making connection
	
	if(mysqli_connect_errno($mysqli))
	{
		print "fail";
	
	} else {
		print "Success<br>";
	}
	///// end connect to database /////
		
	//telling it which database to use
	mysqli_select_db($mysqli, $db_name);
	
	// Seeing if agentlogin is in the database
	$query1 = "SELECT agentLogin FROM agents WHERE ".$type_login." = '".$agent_login."'";
	$result1 = mysqli_query($mysqli,$query1); // performs query
	$data1 = @mysqli_fetch_row($result1); // fetches rows from database
		
	if(isset($data1[0])) { // if agent username is correct
		$query2 = "SELECT agentPassword FROM agents WHERE ".$type_password." = '".$agent_password."'";
		$result2 = mysqli_query($mysqli,$query2); // performs query
		$data2 = @mysqli_fetch_row($result2); // fetches rows from database
		if(isset($data2[0])) { // if agent password if correct
			$query3 = "SELECT personName FROM persons, agents WHERE agents.".$type_login." = '".$agent_login."' AND agents.personId = persons.personId";
			$result3 = mysqli_query($mysqli,$query3); // performs query
			$data3 = @mysqli_fetch_row($result3); // fetches rows from database
			
			// find out what team the agent is on
			$query4 = "SELECT agentTeam FROM agents WHERE ".$type_login." = '".$agent_login."'";
			$result4 = mysqli_query($mysqli,$query4); // performs query
			$data4 = @mysqli_fetch_row($result4); // fetches rows from database
			
			// find the agent's person ID
			
			$query5 = $query4 = "SELECT personId FROM agents WHERE ".$type_login." = '".$agent_login."'";
			$result5 = mysqli_query($mysqli,$query5); // performs query
			$data5 = @mysqli_fetch_row($result5); // fetches rows from database
			
			if($data4[0] == 'ia') { // if the agent is on the in team
				echo "Welcome in agent ".$data3[0];
				session_start(); // start session
				$_SESSION['name'] = $data3[0]; // stores user's name
				$_SESSION['username'] = $data1[0]; // stores user's username
				$_SESSION['personId'] = $data5[0]; // stores the user's person ID
				
				mysqli_close($mysqli); // close connection
				echo "<meta http-equiv='refresh' content='2; url=inagentpage.php'>"; // proceed to in agent page
			}
			else if($data4[0] == 'oa'){ // if the agent is on the out team
				echo "Weclome out agent ".$data3[0];
				session_start(); // start session
				$_SESSION['name'] = $data3[0]; // stores user's name
				$_SESSION['username'] = $data1[0]; // stores user's username
				$_SESSION['personId'] = $data5[0]; // stores the user's person ID
				
				mysqli_close($mysqli); // close connection
				echo "<meta http-equiv='refresh' content='2; url=outagentpage.php'>"; // proceed to out agent page
			}
			
		}
		else { // wrong password for the user
			echo "password is incorrect<br>";
			mysqli_close($mysqli); // close connection
			echo "<meta http-equiv='refresh' content='1; url=loginpage.php'>"; // return to login page
		}
	}
	else { // username not in database
		echo "username is incorrect<br";
		mysqli_close($mysqli);
		echo "<meta http-equiv='refresh' content='1; url=loginpage.php'>"; // return to login page
	}
	

	mysqli_close($mysqli); // close connection
}




/// manager login ///
if(isset($_POST['managerlogin']) && isset($_POST['managerpassword']) ) {
	$manager_login = $_POST['managerlogin']; // used in $querym1, $querym3, and $query5
	$manager_password = $_POST['managerpassword']; // used in $querym2
	$type_login = "managerLogin"; // used in queries m1, m3, and 5
	$type_password = "managerPassword"; // used in query m2
	
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
		print "Success<br>";
	}
	///// end connect to database /////
	
	//telling it which database to use
	mysqli_select_db($mysqli, $db_name);
	
	
	$querym1 = "SELECT managerLogin FROM managers WHERE ".$type_login." = '".$manager_login."'";
	$resultm1 = mysqli_query($mysqli,$querym1); // performs querym1
	$datam1 = @mysqli_fetch_row($resultm1); // fetches rows from database
	
	if(isset($datam1[0])) { // if manager username is correct
		$querym2 = "SELECT managerPassword FROM managers WHERE ".$type_password." = '".$manager_password."'";
		$resultm2 = mysqli_query($mysqli,$querym2); // performs querym2
		$datam2 = @mysqli_fetch_row($resultm2); // fetches rows from database
		if(isset($datam2[0])) { // if manager password if correct
			$querym3 = "SELECT personName FROM persons, managers WHERE managers.".$type_login." = '".$manager_login."' AND managers.personId = persons.personId";
			$resultm3 = mysqli_query($mysqli,$querym3); // performs querym3
			$datam3 = @mysqli_fetch_row($resultm3); // fetches rows from database
			
			// retrieve manager person ID
			$query5 = $query4 = "SELECT personId FROM managers WHERE ".$type_login." = '".$manager_login."'";
			$result5 = mysqli_query($mysqli,$query5); // performs query5
			$data5 = @mysqli_fetch_row($result5);	// fetches rows from database
			
			session_start();
			$_SESSION['name'] = $datam3[0]; // stores user's name
			$_SESSION['username'] = $datam1[0]; // stores user's username
			$_SESSION['personId'] = $data5[0]; // stores the user's person ID
			echo "Welcome ".$datam3[0]; // displays name
			echo "<meta http-equiv='refresh' content='1; url=managerpage.php'>"; // proceed to manager page
		}
		else { // wrong password for the user
			echo "password is incorrect<br>";
			mysqli_close($mysqli); // close connection
			echo "<meta http-equiv='refresh' content='1; url=loginpage.php'>"; // return to login page
		}
	}
	else { // username not in database
		echo "username is incorrect<br";
		mysqli_close($mysqli); // close connection
		echo "<meta http-equiv='refresh' content='1; url=loginpage.php'>"; // go back to login page
	}
	mysqli_close($mysqli); // close connection
	
}

mysqli_close($mysqli); // close connection
?>