<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// PHONE NUMBER
if (empty($_POST["phoneno"])){
    $errorMSG .= "Phone number is required ";
}   else {
    $phoneno = $_POST["phoneno"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Subject is required ";
} else {
    $msg_subject = $_POST["msg_subject"];
}

// ADDRESS 
if (empty($_POST["address"])){
    $errorMSG .= "Address is required ";
}   else {
    $address = $_POST["address"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}


// $EmailTo = "vidya@sasthascientific.com";
$EmailTo = "vinay.valson@gmail.com";


$Subject = "SSA Website Enquiry Form";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Phone No: ";
$Body .= $phoneno;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Address: ";
$Body .= $address;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Enquiry form successfully submitted. Thank you, we will get back to you soon!";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>