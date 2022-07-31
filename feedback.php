<?php
require ("includes/common.php");

$name=$_POST['name1'];
$email=$_POST['email'];
$message=$_POST['message'];



// Submitting it to the database


$sql = "INSERT INTO `feedback` (`feedback_id`, `name`, `email_id`, `message`, `date_time`) VALUES (NULL, '$name', '$email', '$message', current_timestamp());";
$result=mysqli_query($con,$sql);

if($result){
    header('location:feedback_submission.php');
}
else{
    echo "We are facing technical issues, and hence your submission was not succesful";
}

?>