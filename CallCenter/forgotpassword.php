<html>
<body>
<form  method='post' action='forgotpasswordtesting.php'> <!-- HTML form that stores variables in superglobal $_POST -->
														 <!-- and that goes to the testing page using action -->
<h3>Password Retrieval Page</h3> <!-- header -->

<table>
	<tr>
		<td>Please type in your username</td>
		<td><input type='text' name='usernamefp' size='20' tabindex='1' /></td> <!-- take input -->
	</tr>
	<tr>
		<td><input type = 'submit' value = 'find password'/></td> <!-- button with label that submits input -->
	</tr>
</table>

</form>
</body>
</html>