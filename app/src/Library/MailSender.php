<?php
namespace App\Library;
use PHPMailer\PHPMailer\PHPMailer;

require_once(__DIR__ . '/../../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once(__DIR__ . '/../../../vendor/phpmailer/phpmailer/src/SMTP.php');

class MailSender
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 2;
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 465;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = "gamificacaoufjf@gmail.com";
        $this->mail->Password = "prj#game";
    }

    public function sendMail($numeroCertificados)
    {
        $mail = $this->mail;

        $mail->setFrom('gamificacaoufjf@gmail.com', 'Gamificacao UFJF');
        $mail->addAddress('bolsistacomputacaonoturno@gmail.com', 'Bolsista');

        $mail->Subject = 'SigComp - Novos Certificados para Validação';
        $mail->Body =
            "<p> Prezado(a) bolsista, </p>
             <p>Há novos certificados no sistema <a href='http://sigcomp.nre.ice.ufjf.br'>SigComp</a> para avaliação.</p>";

        $mail->send();
    }
}