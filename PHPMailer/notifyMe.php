<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail1 = new PHPMailer;


$Useremail=$_POST["userEmail"];
$emailadmin="info@energydais.com";



//$emailadmin="nkscoder@gmail.com";

$namefrom=$_POST['pagefrom'];

$subject = "Energy Dais";
$messageUsers=file_get_contents('template.html');
$message ='<html>
<body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Email:-'.$Useremail.'</div>
</body>
</html>';


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
    
        $output = json_encode(array('type'=>'error'));
        die($output);
} else {
    // return "ok";
    if($mail->send()){

    	 $output = json_encode(array('type'=>'success'));
        die($output);

    } else{ 
        $output = json_encode(array('type'=>'success'));
        die($output);
     

    }
}
//return json_encode("ok");

