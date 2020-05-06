<?php
//get input from user and save in php variables to insert into DB
$Uname=$_POST['username'];
$First=$_POST['FName'];
$Last=$_POST['LName'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$hno=$_POST['add1'];
$area=$_POST['area'];
$dis=$_POST['dis'];
$pin=$_POST['pin'];
$Pass=$_POST['Password'];

//Connect to DB
$conn = new mysqli('localhost','root','','mini_project');
if($conn->connect_error){

die('Connection Failed : '.$conn->connect_error);

}else{
	//Insert into DB
		$sql = "INSERT INTO user_registration (UserName,FirstName,LastName,EmailID,PhoneNumber,HouseNumber,Area,District,PinCode,Password) VALUES('$Uname','$First','$Last','$Email','$Phone','$hno','$area','$dis','$pin','$Pass')";
		if ($conn->query($sql) === TRUE) {
		header("refresh:0;url=index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>