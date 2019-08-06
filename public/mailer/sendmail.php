<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    if(isset($_POST['email'])){
        $to      = $_POST['email']; 
        $subject = "Test Subject"; 
        $message = "This is test messasfdasfasdfsafage.";  
    
        require 'vendor/autoload.php';
    
        $mail = new PHPMailer(true);                             
        // try {
            $mail->SMTPDebug = 0;                                
            $mail->isSMTP();
            $mail->Host = 'mail.eehtc.sa';  
            $mail->SMTPAuth = true;                     
            $mail->Username = 'admin@eehtc.sa';               
            $mail->Password = 'System@12345';                  
            $mail->SMTPSecure = 'ssl';                      
            $mail->Port = 465;                        
    
            $mail->setFrom('nohawaii.card@gmail.com', 'Your ID and Password');
            $mail->addAddress($to, 'you');
            $mail->addReplyTo('nohawaii.card@gmail.com', 'Information');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = 'Please check it...';
            // $kkk='nostradamusimg.jpg';
            // $sss='upload/'.$kkk;
            // $mail->AddAttachment( $sss );
            $mail->send();
    
            echo 'yes';
        // } catch (Exception $e) {
        //     echo 'error';
        // }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Send Test</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email" id="">
        <button type="submit">Send</button>
    </form>
</body>
</html>