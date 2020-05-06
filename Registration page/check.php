<?php


/*This script is used to check for vaild input being used by the user*/


include_once("connection.php");
if(isset($_POST['user_name']) && $_POST['user_name']!='')
    {
		$response = array();
		$username = mysqli_real_escape_string($conn,$_POST['user_name']);
        $sql = "select username from user_registration where user_registration.username='".$username."'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count > 0)
		{
			$response['status'] = false;
			$response['msg'] = 'Username already exists.';
		}
		else if(strlen($username) < 6 || strlen($username) > 15){
			$response['status'] = false;
			$response['msg'] = 'Username must be 6 to 15 characters';
		}
		else if (!preg_match("/^[a-zA-Z1-9]+$/", $username))
		{
			$response['status'] = false;
			$response['msg'] = 'Use alphanumeric characters only.';
		}
		else
		{
			$response['status'] = true;
			$response['msg'] = 'Username is available.';
		}
		echo json_encode($response);
    }?>