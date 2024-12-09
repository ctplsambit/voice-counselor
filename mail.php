<?php
//get data from form  

$name = $_POST['name'];
$email= $_POST['email'];
$mobile= $_POST['mobile'];
$message= $_POST['message'];
$to = "ctplsam@gmail.com";
$subject = "Mail From website";
$txt ="Name = ". $name . "\r\n  Email = " . $email .  "\r\n  Mobile = " . $mobile ."\r\n Message =" . $message;
$headers = "From: noreply@aiotx.in" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:voice-co.html");
?>