<?php

class contactoController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    //modulo/forms/contacto
    public function index() {
        if ($_POST) {
            
            $this->getLibrary("class.phpmailer");
            $this->getLibrary("class.smtp");
            $mail = new PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true;  // authentication enabled
            //$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = 'mail.cibelesgroup.net';
            $mail->Port = 25;
            $mail->Username = "autentificador@mailman.cibelesgroup.net"; // SMTP account username
            $mail->Password = "t9xMnDmu8H7gbBx";        // SMTP account password


            $mail->SetFrom('cmsum.com@cibeles.net', 'Formulario de contacto cmsum.com');

            //$mail->From     = "ediba.paint@cibeles.net";
            $mail->AddAddress($_POST['email']);

            $mail->Subject = "Mensaje contacto desde cmsum.com";
            $mail->Body = ' Nombre: '
                    . ' '.$_POST['nombre'].''
                    . ' '
                    . ' Comentario:'
                    . ' '.$_POST['comentario'];

            if (!$mail->Send()) 
                header('location:' . BASE_URL . 'contacto/error');
             else 
                header('location:' . BASE_URL . 'contacto/success');
        }
        exit;
    }

}

?>