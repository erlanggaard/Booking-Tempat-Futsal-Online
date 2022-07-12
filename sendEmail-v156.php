<?php
// send email using PERL
function email_localhost($to, $subject, $message, $sender, $password){
    $currentDir = getcwd();
 
    chdir('sendEmail-v156');
    $send_email = shell_exec('sendEmail.exe -f '.$sender.' -t '.$to.' -u '.escapeshellarg($subject).' -m '.escapeshellarg($message).' -s smtp.gmail.com:587 -xu '.$sender.' -xp '.escapeshellarg($password).' -o message-content-type=html message-charset=utf-8 tls=yes');
    chdir($currentDir);
     
    if($send_email){
        return true;
    }else{
        return false;
    }
}
?>