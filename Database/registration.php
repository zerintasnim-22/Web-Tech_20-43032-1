<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Validation</title>
</head>
<body>

	<h1>Registration Form</h1>

	<form id="form1" name="form1" action="RegistrationAction.php" method="post" novalidate
	enctype="application/x-www-form-urlencoded">

	<fieldset>

		<lable for= "userid">User Id:</lable>
		<input type="text" name="userid" id="userid">

		<br><br>

		<lable for= "fname">First Name:</lable>
		<input type="text" name="firstname" id="fname">

		<br><br>

		<lable for= "lname">Last Name:</lable>
		<input type="text" name="lastname" id="lname">

		<br><br>

		<label>Gender:</label>
		<input type="radio" name="gender" id="male" value="male"><label for="male">Male</label>
		<input type="radio" name="gender" id="female" value="female"><label for="female">Female</label>
		<input type="radio" name="gender" id="other" value="other"><label for="other">Other</label>

		<br><br>

	 

		

		<label for="tel">Phone:</label>
		<input type="text" name="tel" id="tel">

		<br><br>

		<label for="email">Email:</label>
		<input type="text" name="email" id="email">

		<br><br>

		
	

		<label for="username">Username:</label>
		<input type="text" name="uname" id="username">

		<br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password">

		<br><br>

		<label for="confirm">Confirm Password:</label>
		<input type="password" name="confirm" id="confirm">

	</select>

	<br><br>

	<input type="submit" name="submit" value="Submit">

	</fieldset>
</form>

</body>
</html>