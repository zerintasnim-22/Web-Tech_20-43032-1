<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
</head>
<body>
	<h1 >Registration Action</h1>	
	
	<?php
		function test($data)	
		{
			$date = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
	?>
	<fieldset>
		
	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{	

		
			
			
            $userid = test($_POST['userid']);
			$firstname = test($_POST['firstname']);
			$lastname = test($_POST['lastname']);
			$Email = test($_POST['email']);
            $Phone = test($_POST['tel']);
            $uname = test($_POST['uname']);
			$pass=test($_POST['password']);
			$confirm=test($_POST['confirm']);
			$Gender=test($_POST['gender']);

			if (empty($userid)){
				echo " Please Fill up your User Id";
				echo "<br><br>";
			}
			else{
				echo "User Id: " . $userid;
				echo "<br><br>";
			}
         
			if (empty($firstname)){
				echo " Please Fill up your Fisrt name";
				echo "<br><br>";
			}
			else{
				echo "First Name: " . $firstname;
				echo "<br><br>";
			}

			if (empty($lastname)){
				echo " Please Fill up your Last name";
				echo "<br><br>";
			}
			else{
				echo "Last Name: " . $lastname;
				echo "<br><br>";
			}

			if(!isset($_POST['gender'])){
				echo " Please Fill up your Gender";
				echo "<br><br>";
			}
			else{
				echo "Gender: " . $_POST['gender'];
				echo "<br><br>";
			}
			if(empty($Email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$Email)) 
			{	
				echo "Fill up a valid Email Address";
				echo "<br><br>";
				
			}
			else{
				echo "Email: " . $Email;
				echo "<br><br>";
			}

			if (empty($Phone)) 
				{
					
				}
				else
				{
					
					echo "Phone: " . $Phone;
					echo "<br><br>";			
				}
				if (empty($uname) )
			{
				echo "Fill up Username";				
				echo "<br><br>";
			}
			else
			{	
						
				echo "Username: " . $uname;
				echo "<br><br>";
				}					
				
				
			if (empty($pass) )
			{
				echo "Fill up password";				
				echo "<br><br>";
			}
			
			if (empty($confirm)  )
			{
				echo "Fill up confirm password";				
				echo "<br><br>";
			}
			else
			{						
					if($pass === $confirm)	
					{
						echo "Password matched";
						echo "<br><br>";
					}		
					else{
						echo "Please enter a valid Password";
						echo "<br><br>";
					}	
				
			}
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "user";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "INSERT INTO user_list  VALUES('$userid', '$firstname','$lastname', '$Gender', '$Phone', $Email','$uname','$pass','$confirm')";
			

			if ($conn->query($sql) === TRUE) {
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
		}	
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
				
	?>
	</fieldset>	
	<br>
	<a href="registration.php">Go Back
</body>
</html>