<?php


namespace App\Service;

//require 'vendor/autoload.php';

use App\Entity\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMailService
{
    /**
     *@var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function sendMail()
    {

//        echo '<pre>'; \Doctrine\Common\Util\Debug::dump($this->user->getEmail());die();
        $mail = new PHPMailer(true);

        try {

            $mail->SMTPDebug = 0;                                 // Use value 2 for server debug
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'biudixteste@gmail.com';            // SMTP username
            $mail->Password = 'biudix2019';                         // SMTP password
            $mail->SMTPSecure = false;                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('biudixteste@gmail.com', "Recuperar senha");
            $mail->addAddress($this->user->getEmail());     // Add a recipient


            $newPassword = $this->generatePassword();
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Nova senha!';
            $mail->Body = "Olá! Sua nova senha é: " . $newPassword;

            $mail->AltBody = "Olá! Sua nova senha é: " . $newPassword;

            $mail->send();
            if (http_response_code(200) || http_response_code((204))) {
                echo("E-mail enviado com sucesso");
                return $newPassword;
            }
        } catch
        (Exception $e) {
            return "Erro ao enviar o e-mail -> " . $e;

        }
    }

    public function generatePassword(){
        $word = array_merge(range('a', 'z'), range('A', 'Z'));
        shuffle($word);

//        echo '<pre>'; \Doctrine\Common\Util\Debug::dump(substr(implode($word), 0, 10));die();
        return substr(implode($word), 0, 10);
    }

}