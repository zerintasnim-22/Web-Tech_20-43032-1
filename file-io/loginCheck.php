<?php 
session_start();
$count2=0;

if(isset($_REQUEST['submit'])){
	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];

	if($username != null && $password != null){
		
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
		
		}
		$data = file_get_contents("users.json");
        $mydata = json_decode($data);
        foreach($mydata as $myobject){
                if($myobject->uname== $username && $myobject->pass == $password){
                   $count2++;}
				}
            

		
}
if($count2==1){
           
	header("location: home.php");
}
else{
   echo "Wrong User Id or Password!! Login Failed!!";
 
}
}



?>