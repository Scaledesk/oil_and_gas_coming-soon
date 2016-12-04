<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail1 = new PHPMailer;


/*
       
       post_data = {'userName':user_name, 'userEmail':user_email, 'userSubject':user_subject, 'userMessage':user_message};
*/       
$Useremail=$_POST['userEmail'];
$userMessage=$_POST['userMessage'];
$name=$_POST['userName'];
$userSubject=$_POST['userSubject'];
/*$emailadmin="sanchit2411@gmail.com";
*/
$emailadmin="info@energydais.com";

//$emailadmin="sanchit2411@gmail.com";

//$emailadmin="nkscoder@gmail.com";


/*$emailadmin2="priyanka@scaledesk.com";
*/$namefrom=$_POST['pagefrom'];

$subject = "Energy Dais";
$messageUsers=file_get_contents('template.html');
$message ='<html>
<body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Name:-'.$name.'<br> Email:-'.$Useremail.'<br>Subject:-'.$userSubject.'<br>Message:-'.$userMessage.'</div>
</body>
</html>';

/*$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.scaledesk.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@scaledesk.com';                 // SMTP username
$mail->Password = 'qazplmq1w2e3r4';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  
$mail->IsHTML(true);  */
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'sub5.mail.dreamhost.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@energydais.com';                 // SMTP username
$mail->Password = 'Ganesha101';                           // SMTP password
//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;// TCP port to connect to
$mail->IsHTML(true);

$mail->setFrom('info@energydais.com', 'Energy Dais');
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@energydais.com', 'noreply');
// TCP port to connect to
/*$mail1->isSMTP();                                      // Set mailer to use SMTP
$mail1->Host = 'mail.scaledesk.com';  // Specify main and backup SMTP servers
$mail1->SMTPAuth = true;                               // Enable SMTP authentication
$mail1->Username = 'contact@scaledesk.com';                 // SMTP username
$mail1->Password = 'qazplmq1w2e3r4';                           // SMTP password
$mail1->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail1->Port = 587;
$mail1->IsHTML(true);
*/

$mail1->isSMTP();                                      // Set mailer to use SMTP
$mail1->Host = 'sub5.mail.dreamhost.com';  // Specify main and backup SMTP servers
$mail1->SMTPAuth = true;                               // Enable SMTP authentication
$mail1->Username = 'info@energydais.com';                 // SMTP username
$mail1->Password = 'Ganesha101';                           // SMTP password
//$mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail1->Port = 587;// TCP port to connect to
$mail1->IsHTML(true);

$mail1->setFrom('info@energydais.com', 'Energy Dais');


//$mail->setFrom('contact@scaledesk.com', 'Scaledesk');
$mail->addAddress($Useremail, $name);     // Add a recipient

//$mail1->setFrom('contact@scaledesk.com', 'Scaledesk');
$mail1->addAddress($emailadmin);     // Add a recipient

/*$mail1->addAddress($emailadmin2);*/     // Admin mail

$mail->Subject = $subject;
$mail->Body    = $messageUsers;

$mail1->Subject = $subject;
$mail1->Body    = $message;

if(!$mail1->send()) {
    $output = json_encode(array('type'=>'error', 'text' => '<i class="icon ion-close-round"></i> Oops! Looks like something went wrong, please check your PHP mail configuration.'));
        die($output);
        
} else {
    // return "ok";
    if($mail->send()){

    	$output = json_encode(array('type'=>'message', 'text' => '<i class="icon ion-checkmark-round"></i> Hello '.$_POST["userName"] .', Your message has been sent, we will get back to you asap !'));
        die($output);

    } else{
      $output = json_encode(array('type'=>'message', 'text' => '<i class="icon ion-checkmark-round"></i> Hello '.$_POST["userName"] .', Your message has been sent, we will get back to you asap !'));
        die($output);

    }
}



/* echo json_encode("no");*/
/*if(isset($_POST['email'])) 
{
      
$email=$_POST['email'];
$phone=$_POST['phone'];
$name=$_POST['first_name'];
$emailadmin="sanchit2411@gmail.com";
$subject = "GET IN TOUCH.";
$message ='<html>
<body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Name:-'.$name.'<br> Email:-'.$email.'<br>Phone:-'.$phone.'</div>
</body>
</html>';
   
           
            
 $messageUsers=file_get_contents('template.html');
$headers = "MIME-Version: 1.0" . "\r\n";
$headers = "From:sudo@scaledesk.com\r\n"
;
$headers = "Content-type: text/html;charset=iso-8859-1" . "\r\n";
      if(mail($emailadmin,$subject,$message,$headers))
 {
         
           if(mail($email,$subject,$messageUsers,$headers)){
      	unset($headers,$message,$email,$name,$phone,$emailadmin,$subject);
      
       		return json_encode("ok");
             } 
          else{
      			 unset($headers,$message,$email,$name,$phone,$emailadmin,$subject);
	    
           	return json_encode("ok");
                 }
       
       
  }
       else{
      			 unset($headers,$message,$email,$name,$phone,$emailadmin,$subject);
	     /* header("location: index.php?msg=Some  error Occurred");*/
  /*      	return echo json_encode("no");
         }
      
}
else{
     /* echo json_encode("singh");*/
     // echo json_encode("no");
	/*header("location: index.php");
}*/
