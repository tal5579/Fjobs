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
	session_start();
	$_SESSION['username']=$_POST["username"];
	$sql1="SELECT userid from Users where username='".$_POST["username"]."'";
	$result2=$conn->query($sql1);
	$value = mysqli_fetch_object($result2);
	
	$_SESSION['connectedid'] = $value->userid;
	echo "<script>location.href = 'http://amitnet.info/tomerjobs/feed.php'</script>";
	
	
	//echo " ".$_POST["username"]." Welcome To The system !!!!";
	
	
	//echo 'We are in !!';
}
else
	echo "password Or User name Not Match !!!";
	
}

if(isset($_POST['name']))//הרשמה//
	
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
	
	if(isset($_POST['firstname1'])){//הוספת פרופיל למשתמש חדש
		session_start();

		$qly="SELECT userID from Users where username='".$_SESSION['username']."'";
		$result=$conn->query($qly);
		$value = mysqli_fetch_object($result);
		//echo $value->userID;
		
		$qly="INSERT INTO DProfile (userid,firstname,lastname,Mobility,skils,experience) VALUES (".$value->userID.",'".$_POST['firstname1']."','".$_POST['lastname1']."','".$_POST['choose1']."','".$_POST['skils1']."','".$_POST['experience1']."');";
		//echo $qly;
		if($result=$conn->query($qly))
		{
			echo 'its innnnnnn';
			
		}
		//echo 'im hereeeeeeeeeeeeeeee';
		
	}
	//מערך חיפוש
	function arryuser($userid){
		
		$servername = "localhost";
$username = "amit91_tomerp";
$password = "NTig9cjzx";

// Create connection
$conn = new mysqli($servername, $username, $password,"amit91_tomerp");


		$query1="SELECT * FROM DProfile WHERE userid=".$userid;
		//echo $query1;
		if ($result = $conn->query($query1)) {
	///echo "yes";
    /* fetch object array */
    while ($row = $result->fetch_row()) {
		
		$connecteduser = array("profileid"=>$row[0],"userid"=>$row[1],"firstname"=>$row[2],"lastname"=>$row[3],"Mobility"=>$row[4],"skils"=>$row[5],"experience"=>$row[6]);
		
		
        //printf ("%s (%s)\n", $row[0], $row[1]);
    }
	
	return  $connecteduser;
	
	
	}
	
	//return $connecteduser;
		
	}
	
	function CheckIFfollow($userid1,$userid2){
		
			$servername = "localhost";
			$username = "amit91_tomerp";
			$password = "NTig9cjzx";

			$conn = new mysqli($servername, $username, $password,"amit91_tomerp");
		
			$qly1="SELECT * FROM FOLLOWERS WHERE followingid=".$userid1." AND followerid=".$userid2;
			//echo $qly1;
			if ($result1 = $conn->query($qly1)  ) {
				
				if($result1->num_rows>0){
					return true;
				}
				else
					return false;
				
 
	
	
	
	
				}
			//SELECT * FROM FOLLOWERS WHERE followingid=49 AND followerid=52
			
			
	}
	
	//follow1
	function Followers($userid){
				$servername = "localhost";
				$username = "amit91_tomerp";
				$password = "NTig9cjzx";

	// Create connection
				$conn = new mysqli($servername, $username, $password,"amit91_tomerp");


	$qly1="SELECT *from FOLLOWERS where followerid = ".$userid;
	$qly2="SELECT *from FOLLOWERS where followingid = ".$userid;
	
	if ($result1 = $conn->query($qly1)  ) {
	$arry1 = array("followeridnum"=>$result1->num_rows);
 
	
	
	
	
	}
		if ($result2 = $conn->query($qly2)  ) {
	$arry2 = array("followingidnum"=>$result2->num_rows);
 
	
	
	
	
	}
	
	
	
	
	return  $arry1 + $arry2;
	
	
		
	}
	
	
//follow2 
if(isset($_GET['to']))
{
		$servername = "localhost";
		$username = "amit91_tomerp";
		$password = "NTig9cjzx";

		// Create connection
$conn = new mysqli($servername, $username, $password,"amit91_tomerp");

$qly="INSERT INTO FOLLOWERS (followingid,followerid) values(".$_GET['who'].",".$_GET['to'].")";
	//echo $_GET['to'];
	$result = $conn->query($qly);
}

	
		function Serchres($textoserch){//חיפוש משתמש
		
		$servername = "localhost";
$username = "amit91_tomerp";
$password = "NTig9cjzx";

// Create connection
$conn = new mysqli($servername, $username, $password,"amit91_tomerp");
$myvalue = $textoserch;
$arr = explode(' ',trim($myvalue));
 $arr[0]; // will print Test

		$query1="SELECT userid,firstname,lastname,skils from DProfile where firstname LIKE '" . $arr[0] ."%'";
		//echo $query1;
		if ($result = $conn->query($query1)) {
			
	///echo "yes";
    /* fetch object array */
	$serchres = array();
    while ($row = $result->fetch_row()) {
		$sec=array();
		array_push($sec,$row[0]);
		array_push($sec,$row[1]);
		array_push($sec,$row[2]);
		array_push($sec,$row[3]);
		
		array_push($serchres, $sec);

		
		
		
		
		
        //printf ("%s (%s)\n", $row[0], $row[1]);
    }
	
	 
	return $serchres;
	
	}
	
	//return $connecteduser;
		
	}
	
function PostsByID($id)
{
		$servername = "localhost";
			$username = "amit91_tomerp";
			$password = "NTig9cjzx";

			$conn = new mysqli($servername, $username, $password,"amit91_tomerp");
		
		$qly="SELECT * FROM Posts where WriterID=".$id." LIMIT 5";
		$posts=array();
		$result = $conn->query($qly);
		  while ($row = $result->fetch_row()) {
		$post=array();
		array_push($post,$row[0]);
		array_push($post,$row[1]);
		array_push($post,$row[2]);
		array_push($post,$row[3]);
		array_push($post,$row[4]);
		array_push($post,$row[5]);
		array_push($post,$row[6]);
		array_push($post,$row[7]);
		array_push($post,$row[8]);
		array_push($post,$row[9]);
		array_push($posts, $post);

		
		
		
		
		
        //printf ("%s (%s)\n", $row[0], $row[1]);
    }
	
	return $posts;
}	

	  if(isset($_POST['title']))
	  {
		  $servername = "localhost";
			$username = "amit91_tomerp";
			$password = "NTig9cjzx";

// Create connection
		$conn = new mysqli($servername, $username, $password,"amit91_tomerp");
			session_start();
			$wid=$_SESSION['connectedid'];
		  $whoname=$_SESSION["Cname"];
		  $title=$_POST['title'];
		  $category=$_POST['category'];
		  $skills=$_POST['skills'];
		  $price1=$_POST['price1'];
		  $description=$_POST['description'];
		  $Fulltime=$_POST['Fulltime'];
		  $st=(string)date("Y-m-d H:i:s");
		  $qly="INSERT INTO Posts (WriterName,PostTitel,PostCategory,WriterSkils,JobPrice,JobTime,JobDescription,UploadTime,WriterID) values ('".$whoname."','".$title."','".$category."','".$skills."','".$price1."','".$Fulltime."','". $description."','".$st."',".$wid.");";
		//  date("Y-m-d H:i:s")
		  		if($result = $conn->query($qly))
				{
					echo '<script>location.href="http://amitnet.info/tomerjobs/feed.php";</script>';

				}

		  
	  }
?>

