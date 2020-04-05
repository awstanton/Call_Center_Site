<html>
<body>

<h2>Manager</h2> <!-- header -->

<?php
session_start(); // start session to use stored values
echo "Manager: ".$_SESSION['name']."<br><br>"; // prints manager name using session
echo "Username: ".$_SESSION['username'];	   // prints manager username using session
?>

<form method='post' action='manageraction.php'> <!-- form that stores in $_POST superglobal and goes to manager action -->
	<table>
		<tr>
			<td>Type in a keyword to execute an action:<br></td> <!-- prompt for user -->
			<td>choices: allagentpay, iateaminfo, ioteaminfo, allagentinfo, intbyag, intcustbyag, surveybyag, acwbyag </td> <!-- keywords -->
			<td><input type='text' name='keyword' size='20' tabindex='1' /></td> <!-- form input -->
			<td><input type = 'submit' value = 'manager action'/></td> <!-- submit button with label -->
		</tr>
	</table>
</form>

<form method='post' action=''>
	<table>
		<tr><td><a href='signin.php'>Create new agent account</a></td></tr> <!-- link to agent sign in page -->
		<tr><td><a href='managersignin.php'>Create new manager account</a></td></tr> <!-- link to manager sign in page -->
		<!-- <tr><td><a href='signout.php'>Delete existing agent account</a></td></tr> -->
	</table>
</form>

<form method='post' action='signout.php'> <!-- stores input in $_POST superglobal and goes to signout to delete account -->
	<table>
		<tr>
			<td>Type in agent person id to delete agent account<br></td> <!-- takes input -->
			<td><input type='text' name='agentpersonid' size='20' tabindex='1' /></td> <!-- takes input -->
			<td><input type = 'submit' value = 'sign agent out'/></td> <!-- submit button with label -->
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