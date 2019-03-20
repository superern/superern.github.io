<?php
if(isset($_POST['contact_submit'])) {
/* Set e-mail recipient */
$myemail  = "yourmail@domain.com";
$subject  = "ZEOR Contact Form";

/* Check all form inputs using check_input function */
$contact_name = $_REQUEST['contact_name'];
$contact_email    = $_REQUEST['contact_email'];
$contact_message  = $_REQUEST['contact_message'];

/* Let's prepare the message for the e-mail */
$message = "<strong>Contact Form details below.</strong>
<br /><br />
<strong>Name:</strong> $contact_name
<br /><br />
<strong>Email ID:</strong> $contact_email
<br /><br />
<strong>Message:</strong> $contact_message";


$headers = "From: " . strip_tags($_REQUEST['contact_email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_REQUEST['contact_email']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
/* Send the message using mail() function */

if(mail($myemail, $subject, $message, $headers))
{
	echo '<div class="alert alert-success"><strong>Wow!</strong> Your Contact Form has been received.</div>';
}
else
{
	echo '<div class="alert alert-danger"><strong>Error!</strong> Your submission has error please try again...</div>';
}
}
else
{
 echo '<div class="alert alert-danger"><strong>Error!</strong> Your submission has error please try again...</div>';

}
?>