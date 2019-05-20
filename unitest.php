<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>F jobs</title>
<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap" rel="stylesheet">
</head>
<style>
body{
	font-family: 'Source Code Pro', monospace;
	background-color: #d8d8d8;
}
</style>

<?php
include('database.php');

echo "<h4>Login Unitest : </h4>";
echo 'checking currect user : tomer1 , psswords : 1';

if(unitestUserLogin("tomer1","1")){
	echo '<img border="0" alt="W3Schools" src="check-mark-md.png" width="20" height="20">';
	echo "<br>";
	
	//echo ' V'."<br>";
}
else {
	echo '<img border="0" alt="W3Schools" src="1469716_thumb.png" width="20" height="20">';
	echo "<br>";
}
//echo 'dsfsd';
echo "<br>".'checking uncurrect user : (empty string) , psswords : 1';
if (!(unitestUserLogin(" ",1)))
{
	echo '<img border="0" alt="W3Schools" src="check-mark-md.png" width="20" height="20">';
	echo "<br>";
}
else {
	echo '<img border="0" alt="W3Schools" src="1469716_thumb.png" width="20" height="20">';
	echo "<br>";
}
echo "<h4>checking validsion :</h4> ";
$firstemail="amit@@gmail.com";
echo "<br>".'checking uncurrect email '. $firstemail;
if (filter_var($firstemail, FILTER_VALIDATE_EMAIL)) {
	echo '<img border="0" alt="W3Schools" src="1469716_thumb.png" width="20" height="20">';
	echo "<br>";
}
else {
	echo '<img border="0" alt="W3Schools" src="check-mark-md.png" width="20" height="20">';
	echo "<br>";
}
$firstemail="amit@gmail.com";
echo "<br>".'checking currect email '. $firstemail;
if (filter_var($firstemail, FILTER_VALIDATE_EMAIL)) {
	echo '<img border="0" alt="W3Schools" src="check-mark-md.png" width="20" height="20">';
	echo "<br>";
}
else {
	echo '<img border="0" alt="W3Schools" src="1469716_thumb.png" width="20" height="20">';
	echo "<br>";
	
	
}

 $name="tomer332as";
 echo "<br>"."checking uncurrect firstName ". $name;
            if(preg_match("/^([a-zA-Z]{2,12}+)$/",$name))
            {
                echo '<img border="0" alt="W3Schools" src="1469716_thumb.png" width="20" height="20">';
	echo "<br>";
            }
			else{
				echo '<img border="0" alt="W3Schools" src="check-mark-md.png" width="20" height="20">';
	echo "<br>";
			}
$name="tomer";
 echo "<br>"."checking currect firstName ". $name;
            if(preg_match("/^([a-zA-Z]{2,12}+)$/",$name))
            {
               echo '<img border="0" alt="W3Schools" src="check-mark-md.png" width="20" height="20">';
	echo "<br>";
            }
			else{
				echo '<img border="0" alt="W3Schools" src="1469716_thumb.png" width="20" height="20">';
	echo "<br>";		
			}
 $name="c 5ohen";
 echo "<br>"."checking uncurrect lastName ". $name;
            if(preg_match("/^([a-zA-Z]{2,12}+)$/",$name))
            {
               echo '<img border="0" alt="W3Schools" src="1469716_thumb.png" width="20" height="20">';
	echo "<br>";
            }
			else{
				echo '<img border="0" alt="W3Schools" src="check-mark-md.png" width="20" height="20">';
	echo "<br>";
			}
$name="cohen";
 echo "<br>"."checking currect lastName ". $name;
            if(preg_match("/^([a-zA-Z]{2,12}+)$/",$name))
            {
                echo '<img border="0" alt="W3Schools" src="check-mark-md.png" width="20" height="20">';
	echo "<br>";
            }
			else{
				echo '<img border="0" alt="W3Schools" src="1469716_thumb.png" width="20" height="20">';
	echo "<br>";		
			
			}
//shuld return true;
//shuld return false;



	
?>