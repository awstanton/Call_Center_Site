<html>
<body>

<h2>Out Agent</h2> <!-- header -->

<?php
session_start(); // start session to access stored data
echo "Out Agent: ".$_SESSION['name']."<br><br>"; // print session data
echo "Username: ".$_SESSION['username']; // print session data
?>

<form method='post' action='outagentaction.php'> <!-- form storing in $_POST superglobal and goes to out agent action page -->
	<table>
		<tr>
			<td>Type in a keyword to execute an action:<br></td> <!-- prompts user for input -->
			<td>choices: myacct, myint <br></td>
			<td><input type='text' name='keyword' size='20' tabindex='1' /></td> <!-- takes input -->
			<td><input type = 'submit' value = 'out agent action'/></td> <!-- submit button with label -->
		</tr>
	</table>
</form>

<table>
	<tr>
	<td><a href='logout.php'>Log Out</a></td> <!-- link to log out page -->
	</tr>
</table>


</body>
</html>