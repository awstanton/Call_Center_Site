
<form method='post' action='signintesting.php'> <!-- html form to store input in $_POST and go to testing for sign in -->
<table>
	<tr><td>enter agent name</td>
		<td><input type='text' name='personname' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>
	<tr><td>enter agent email</td>
		<td><input type='text' name='personemail' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>
	<tr><td>enter agent mailing address</td>
		<td><input type='text' name='personmailingaddress' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>
	
	<tr><td>enter agent phone</td>
		<td><input type='text' name='personphone' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>
	
	<tr><td>enter agent person ID</td>
		<td><input type='text' name='personid' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>

	<tr><td>enter agent ID</td>
		<td><input type='text' name='newagentid' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>
	
	<tr><td>enter agent hourly rate</td>
		<td><input type='text' name='newagenthourlyrate' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>
	
	<tr><td>enter agent username</td>
		<td><input type='text' name='newagentusername' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>
	
	<tr><td>enter agent password</td>
		<td><input type='password' name='newagentpassword' size='20' tabindex='1' /></td> <!-- takes input -->
	</tr>
		
</table>
	<br>
	enter agent team <!-- takes input by using drop down with two options -->
	<select name="newagentteam">
		<option value="ia">in agent team</option>
		<option value="oa">out agent team</option>
	</select>
	
<table>
	<tr><td><input type ='submit' value ='sign in new agent'/></td> <!-- submit button with label -->
	</tr>
</table>

</form>