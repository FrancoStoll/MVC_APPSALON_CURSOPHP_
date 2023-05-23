<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion()
    {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = 'francostoll2@gmail.com';
        $mail->Password = '2grxqIXLYFp6tz1G';
       
        $mail->setFrom('from@appsalon.com');
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu Cuenta';

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has Creado tu cuenta en App Salón, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://applicationsalon.alwaysdata.net/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";
        $contenido .= "<p>Si tu no solicitaste este cambio, ignora el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = 'francostoll2@gmail.com';
        $mail->Password = '2grxqIXLYFp6tz1G';
       
        $mail->setFrom('from@appsalon.com');
        $mail->addAddress($this->email);
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> para reestablecer tu password</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://applicationsalon.alwaysdata.net/recuperar?token=" . $this->token . "'>Reestablecer Password</a>";
        $contenido .= "<p>Si tu no solicitaste este cambio, ignora el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}
