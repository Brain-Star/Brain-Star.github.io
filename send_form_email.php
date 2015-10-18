<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "brainstar6@gmail.com";
 
    $email_subject = "Tutor Request";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['email']) ||
 
        !isset($_POST['firstName']) ||
 
        !isset($_POST['lastName']) ||
 
        !isset($_POST['subject']) ||
        
        !isset($_POST['zipcode']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $email = $_POST['email']; // required
 
    $firstName = $_POST['firstName']; // required
 
    $lastName = $_POST['lastName']; // required
 
    $subject = $_POST['subject']; // required
 
    $zipcode = $_POST['zipcode']; // required
 
    $message = $_POST['message']; //required
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$firstName)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$lastName)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
  
  if(!preg_match($string_exp,$subject)) {
 
    $error_message .= 'The Subject you entered does not appear to be valid.<br />';
 
  }
  
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($firstName)."\n";
 
    $email_message .= "Last Name: ".clean_string($lastName)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Subject: ".clean_string($subject)."\n";
 
    $email_message .= "Zip Code: ".clean_string($zipcode)."\n";
    
    $email_message .= "Message: ".clean_string($message)."\n";
 
     
 
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>