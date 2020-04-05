<html>
<body>

<h2>In Agent</h2> <!-- header -->

<?php
session_start(); // start session to access session variables
echo "In Agent: ".$_SESSION['name']."<br><br>";	// displays agent name from session on page
echo "Username: ".$_SESSION['username'];		// displays agent username from session on page
?>

<form method='post' action=''> <!-- form -->

	<table>
		<tr><td><a href='newcustomer.php'>Create new customer account</a></td></tr> <!-- link to sign in page -->
	</table>

	

</form>

<form method='post' action='inagentaction.php'> <!-- form that stores to $_POST and then goes to in agent action page -->
	<table>
		<tr>
			<td>Type in a keyword to execute an action:<br></td> <!-- prompts user for input -->
		</tr>
		<tr>
			<td>Choices: myacct, myacw</td> <!-- keyword choices -->
			<td><input type='text' name='keyword' size='20' tabindex='1' /></td> <!-- input box -->
			<td><input type = 'submit' value = 'in agent action'/></td> <!-- submmit button -->
		</tr>
	</table>
</form>

<table>
	<tr>
	<td><a href='logout.php'>Log Out</a></td> <!-- link to log out -->
	</tr>
</table>

</body>
</html>