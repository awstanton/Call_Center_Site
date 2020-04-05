<html>
<body>
						<!-- Agent Section -->
<form  method='post' action='testinglogin.php'> <!-- form to take input and go to testing page -->
	<h2>Welcome to the login page</h2> <!-- header -->
	
<table>
	<tr>							
		<td>Agent Username:</td>
		<td><input type='text' name='agentlogin' size='20' tabindex='1' /></td> <!-- takes username input -->
	</tr>
	
	<tr>
		<td>Agent Password:</td>
		<td><input type='password' name='agentpassword' size ='20' tabindex='1' /></td> <!-- takes password input -->
	</tr>
	<tr> 
		<td><input type = 'submit' value = 'agent login'/></td> <!-- submit button with label -->
	</tr>
</table>
</form>
<br>
						<!-- Manager Section -->
<form method='post' action='testinglogin.php'> <!-- form that stores to $_POST and goes to testing login -->
<table>
	<tr>
		<td>Manager Username:</td>
		<td><input type='text' name='managerlogin' size='20' tabindex='1' /></td> <!-- input username -->
	</tr>
	
	<tr>
		<td>Manager Password:</td>
		<td><input type='password' name='managerpassword' size ='20' tabindex='1' /></td> <!-- input password -->
	</tr>
	<tr> 
		<td><input type = 'submit' value = 'manager login'/></td> <!-- submit button with label -->
	</tr>
</table>
</form>

<table>
	<tr>
	<td><a href='forgotpassword.php'>Forgot password?</a></td> <!-- link to forgot password page -->
	</tr>
</table>

</body>
</html>