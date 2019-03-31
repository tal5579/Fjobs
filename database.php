<?php

$servername = "localhost";
$username = "amit91_tomerp";
$password = "NTig9cjzx";

// Create connection
$conn = new mysqli($servername, $username, $password,"amit91_tomerp");

		
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
///echo "Connected successfully";

if(isset($_POST["username"])){
	//echo $_POST["username"] . '<br>';
	//echo $_POST["password"] . '<br>';
	$sql = "SELECT *FROM Users where username='".$_POST["username"]."' AND passwords='".$_POST['password']."'";
	$result = $conn->query($sql);
		

if($result->num_rows==1){
	echo " ".$_POST["username"]." Welcome To The system !!!!";
	
	//echo 'We are in !!';
}
else
	echo "password Or User name Not Match !!!";
	
}

if(isset($_POST['name']))
	
	{
		
		$num=0;
		$sql="SELECT *FROM Users where username='".$_POST['name']."'";
		$result = $conn->query($sql);
		if($result->num_rows!=0)
		{
			$num=$num+1;
			echo '['.$num.']'.'this user name already exist choose another one <br>';
		}
		if($_POST['repeat-password']!=$_POST['password'])
		{
			$num=$num+1;
			echo '['.$num.']'.'the pass is not match <br>';
		}
		
		if($_POST['repeat-password']=='' || $_POST['password']=='' || $_POST['name']=='' )
		{
			$num=$num+1;
			echo '['.$num.']'.'One or more input is empty <br>';
		}
		
		if($num==0)
		{
			$qly="INSERT INTO Users (username,passwords,premision) values('".$_POST['name']."','".$_POST['password']."',".$_POST['p'].");";
			//echo $qly;
			
			if($result=$conn->query($qly))
			{
				//echo 'Done!!';
				session_start();
				
				 $_SESSION['username']=$_POST['name'];
			if (isset($_SESSION['username'])){
					 echo 'good!!'.$_SESSION['username'];
					 ///header("Location : profile.php");
					 echo "<script>location.href = 'http://amitnet.info/tomerjobs/profile.php'</script>";
			}
				 
			}
			else
				echo 'not work !!';
			
		}
		
	}
	
	if(isset($_POST['firstname1'])){
		session_start();

		$qly="SELECT userID from Users where username='".$_SESSION['username']."'";
		$result=$conn->query($qly);
		$value = mysqli_fetch_object($result);
		//echo $value->userID;
		
		$qly="INSERT INTO DProfile (userid,firstname,lastname,Mobility,skils,experience) VALUES (".$value->userID.",'".$_POST['firstname1']."','".$_POST['lastname1']."','".$_POST['skils1']."','".$_POST['choose1']."','".$_POST['experience1']."');";
		//echo $qly;
		if($result=$conn->query($qly))
		{
			echo 'its innnnnnn';
		}
		//echo 'im hereeeeeeeeeeeeeeee';
		
	}
	  
?>

<!DOCTYPE html>
<html>
<br>
<br>
<br>
<a href = "sign-in.html"> חזור חזרה</a>

</html>