<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['phone'])     ||
   empty($_POST['email'])     ||
   empty($_POST['booking_date'])     ||
   empty($_POST['booking_time'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$booking_date = strip_tags(htmlspecialchars($_POST['booking_date']));
$booking_time = strip_tags(htmlspecialchars($_POST['booking_time']));

// Create the email and send the message
$to = 'oc_campos16@hotmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Booking Form:  $name";
$email_body = "You have received a new booking from your website booking form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message\nBooking Date: $booking_date\n\nBooking Time: $booking_time\n";
$headers = "From: noreply@mrwash.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
