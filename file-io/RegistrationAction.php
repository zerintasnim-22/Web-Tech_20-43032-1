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
		<legend> Basic Information</legend>		
	<?php 
	   

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{			
			$firstname = test($_POST['firstname']);
			$lastname = test($_POST['lastname']);
			$DOB = $_POST['dob'];
			$Religion = test($_POST['religion']);
			$count=0;
			
         
			if (empty($firstname)){
				echo " Please Fill up your Fisrt name";
				echo "<br><br>";
			}
			else{
				echo "First Name: " . $firstname;
				echo "<br><br>";
				$count++;
			}

			if (empty($lastname)){
				echo " Please Fill up your Last name";
				echo "<br><br>";
			}
			else{
				echo "Last Name: " . $lastname;
				echo "<br><br>";
				$count++;
			}

			if(!isset($_POST['gender'])){
				echo " Please Fill up your Gender";
				echo "<br><br>";
			}
			else{
				echo "Gender: " . $_POST['gender'];
				echo "<br><br>";
				$count++;
			}

			if(empty('$DOB')){
				echo " Please Fill up your Date Of Birth";
				echo "<br><br>";
			}
			else{
				echo "Date of Birth: " . $DOB;
				echo "<br><br>";
				$count++;
			}

			if(!isset($Religion)){
				echo " Please Fill up your Religion";
				echo "<br><br>";
			}
			else{

				echo "Religion: " . $Religion;
				$count++;
			}

					
		}	
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
	?>
	</fieldset>
	<br>
	<fieldset>
		<legend> Contact Information</legend>
	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$Present_Address = test($_POST['present_address']);
			$Permanent_Address = test($_POST['permanent_address']);
			$Email = test($_POST['email']);
            $Phone = test($_POST['tel']);
			$pwl = test($_POST['personal_web']);
			if (empty($Present_Address) ) 
			{	
				echo "Fill up your Present Address";
				echo "<br><br>";
				
			}
			else{
				echo "Present Address: " . $Present_Address;
				echo "<br><br>";
				$count++;
			}

			if (empty($Permanent_Address) ) 
			{	
				
				
			}
			else{
				echo "Permanent Address: " . $Permanent_Address;
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
				$count++;
			}

			if (empty($Phone)) 
				{
					
				}
				else
				{
					
					echo "Phone: " . $Phone;
					echo "<br><br>";			
				}

				if (empty($pwl)) {
					
				}
				else
				{
				
				echo "Personal Website Link: " . $pwl;			
				}
			
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
	?>
	</fieldset>
	<br>
	<fieldset>
		<legend><b> Credentials</b></legend>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{	
			$uname = test($_POST['uname']);
			$pass=test($_POST['password']);
			if (empty($uname) )
			{
				echo "Fill up Username";				
				echo "<br><br>";
			}
			else
			{	
				if(strlen($uname) <5) {
					echo "Please fill up a user name upto 5 character";
					echo "<br><br>";
					$count++;
				}	
				else{		
				echo "Username: " . $uname;
				echo "<br><br>";
				$count++;
				}					
				
			}	
			if (empty($pass) )
			{
				echo "Fill up password";				
				echo "<br><br>";
			}
			else{
				$count++;
			}
			
			$confirm=$_POST['confirm'];
			if (empty($confirm))
			{
				echo "Fill up confirm password";				
				echo "<br><br>";
			}
			else
			{						
					if($pass == $confirm)	{
						echo "Password matched";
						echo "<br><br>";
						$count++;
					}		
					else{
						echo "Please enter a valid Password";
						echo "<br><br>";
					}	
				
			}	

		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}	
		
		


		if($count ==10 ){
			$formdata = array(
				'firstName'=> $firstname,
				'lastName'=> $lastname,
				'gender'=>$_POST["gender"],
				'dateOfBirth'=>$DOB,
				'religion'=>$religion,
				'permanentAdress'=>$Permanent_Address,
				'presentAddress'=>$Present_Address,
				'email'=>$Email,
				'phone'=> $Phone,
				'personalWebLink'=>$pwl,
				'uname'=>$uname,
				'pass'=>$pass

			 );
			 $existingdata = file_get_contents('users.json');
			 $tempJSONdata = json_decode($existingdata);
			 $tempJSONdata[] =$formdata;
			 $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
			 
			
			 if(file_put_contents("users.json", $jsondata)) {
				  echo "Data successfully saved <br>";
				  header('location: login.php');

			  }
			 else 
				  echo "no data saved";






		}
	?>
	</fieldset>	
	<br>
	
</body>
</html>