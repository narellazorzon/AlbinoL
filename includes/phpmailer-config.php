<?php
/**
 * Configuración de PHPMailer para Albino Luis Zorzon
 * Sistema profesional de envío de emails
 */

// Incluir PHPMailer
require_once __DIR__ . '/../PHPMailer-master/src/Exception.php';
require_once __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Configuración de Gmail
define('GMAIL_USERNAME', 'alzorzon@gmail.com');
define('GMAIL_PASSWORD', 'lfre pxjv ouem tiax'); // Cambiar por tu contraseña de aplicación
define('GMAIL_FROM_NAME', 'Albino Luis Zorzon e hijos');

// Configuración del destinatario
define('TO_EMAIL', 'alzorzon@gmail.com');
define('TO_NAME', 'Albino Luis Zorzon');

/**
 * Función para enviar email usando PHPMailer con Gmail
 */
function enviarEmailPHPMailer($nombre, $email, $telefono, $asunto, $mensaje) {
    // Validar datos
    if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
        return ['success' => false, 'message' => 'Faltan datos obligatorios'];
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Email inválido'];
    }
    
    $mail = new PHPMailer(true);
    
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = GMAIL_USERNAME;
        $mail->Password = GMAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        // Configuración SSL para XAMPP
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        // Configuración de debug (solo para desarrollo)
        $mail->SMTPDebug = 0; // 0 = off, 1 = client messages, 2 = client and server messages
        $mail->Debugoutput = 'error_log';
        
        // Configuración de caracteres
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        
        // Remitente
        $mail->setFrom(GMAIL_USERNAME, GMAIL_FROM_NAME);
        $mail->addReplyTo($email, $nombre);
        
        // Destinatario
        $mail->addAddress(TO_EMAIL, TO_NAME);
        
        // Contenido
        $mail->isHTML(true);
        $mail->Subject = '[Contacto Web] ' . $asunto . ' - ' . $nombre;
        
        // Crear contenido HTML del email
        $html_content = crearContenidoEmailPHPMailer($nombre, $email, $telefono, $asunto, $mensaje);
        $mail->Body = $html_content;
        
        // Versión en texto plano
        $text_content = crearContenidoTextoPHPMailer($nombre, $email, $telefono, $asunto, $mensaje);
        $mail->AltBody = $text_content;
        
        // Enviar email
        $mail->send();
        
        return ['success' => true, 'message' => 'Email enviado correctamente via PHPMailer'];
        
    } catch (Exception $e) {
        // Log del error
        $error_log = date('Y-m-d H:i:s') . " - Error PHPMailer: " . $mail->ErrorInfo . "\n";
        file_put_contents(__DIR__ . '/phpmailer-errors.log', $error_log, FILE_APPEND | LOCK_EX);
        
        return ['success' => false, 'message' => 'Error al enviar email: ' . $mail->ErrorInfo];
    }
}

/**
 * Crear contenido HTML del email para PHPMailer
 */
function crearContenidoEmailPHPMailer($nombre, $email, $telefono, $asunto, $mensaje) {
    $fecha = date('d/m/Y H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'No disponible';
    
    $html = "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Nuevo Mensaje de Contacto</title>
        <style>
            body { 
                font-family: 'Arial', sans-serif; 
                line-height: 1.6; 
                color: #333; 
                margin: 0; 
                padding: 20px; 
                background-color: #f4f4f4; 
            }
            .container { 
                max-width: 600px; 
                margin: 0 auto; 
                background: white; 
                border-radius: 10px; 
                overflow: hidden; 
                box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
            }
            .header { 
                background: linear-gradient(135deg, #2d5016, #4a6b2a); 
                color: white; 
                padding: 30px; 
                text-align: center; 
            }
            .header h1 { margin: 0; font-size: 24px; }
            .content { padding: 30px; }
            .field { 
                margin-bottom: 20px; 
                padding: 15px; 
                background: #f8f9fa; 
                border-radius: 8px; 
                border-left: 4px solid #2d5016; 
            }
            .field-label { 
                font-weight: bold; 
                color: #2d5016; 
                margin-bottom: 5px; 
            }
            .field-value { color: #555; }
            .message-content { 
                background: #e8f5e8; 
                padding: 20px; 
                border-radius: 8px; 
                border: 1px solid #c3e6cb; 
                margin: 20px 0; 
            }
            .footer { 
                background: #f8f9fa; 
                padding: 20px; 
                text-align: center; 
                color: #666; 
                font-size: 14px; 
                border-top: 1px solid #dee2e6; 
            }
            .meta { 
                font-size: 12px; 
                color: #888; 
                margin-top: 20px; 
                padding-top: 15px; 
                border-top: 1px solid #eee; 
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>🌾 Nuevo Mensaje de Contacto</h1>
                <p>Albino Luis Zorzon e hijos - Sitio Web</p>
            </div>
            
            <div class='content'>
                <div class='field'>
                    <div class='field-label'>👤 Nombre:</div>
                    <div class='field-value'>" . htmlspecialchars($nombre) . "</div>
                </div>
                
                <div class='field'>
                    <div class='field-label'>📧 Email:</div>
                    <div class='field-value'><a href='mailto:" . htmlspecialchars($email) . "'>" . htmlspecialchars($email) . "</a></div>
                </div>";
    
    if (!empty($telefono)) {
        $html .= "
                <div class='field'>
                    <div class='field-label'>📞 Teléfono:</div>
                    <div class='field-value'><a href='tel:" . htmlspecialchars($telefono) . "'>" . htmlspecialchars($telefono) . "</a></div>
                </div>";
    }
    
    $html .= "
                <div class='field'>
                    <div class='field-label'>📋 Asunto:</div>
                    <div class='field-value'>" . htmlspecialchars($asunto) . "</div>
                </div>
                
                <div class='message-content'>
                    <div class='field-label'>💬 Mensaje:</div>
                    <div class='field-value'>" . nl2br(htmlspecialchars($mensaje)) . "</div>
                </div>
                
                <div class='meta'>
                    <p><strong>📅 Fecha:</strong> $fecha</p>
                    <p><strong>🌐 IP:</strong> $ip</p>
                </div>
            </div>
            
            <div class='footer'>
                <p>Este mensaje fue enviado desde el formulario de contacto del sitio web de Albino Luis Zorzon e hijos.</p>
                <p>Para responder, simplemente responde a este email.</p>
            </div>
        </div>
    </body>
    </html>";
    
    return $html;
}

/**
 * Crear contenido en texto plano para PHPMailer
 */
function crearContenidoTextoPHPMailer($nombre, $email, $telefono, $asunto, $mensaje) {
    $fecha = date('d/m/Y H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'No disponible';
    
    $text = "NUEVO MENSAJE DE CONTACTO\n";
    $text .= "Albino Luis Zorzon e hijos - Sitio Web\n";
    $text .= "=====================================\n\n";
    $text .= "Nombre: " . $nombre . "\n";
    $text .= "Email: " . $email . "\n";
    if (!empty($telefono)) {
        $text .= "Teléfono: " . $telefono . "\n";
    }
    $text .= "Asunto: " . $asunto . "\n\n";
    $text .= "Mensaje:\n";
    $text .= $mensaje . "\n\n";
    $text .= "Fecha: " . $fecha . "\n";
    $text .= "IP: " . $ip . "\n\n";
    $text .= "---\n";
    $text .= "Este mensaje fue enviado desde el formulario de contacto del sitio web.";
    
    return $text;
}
?>
