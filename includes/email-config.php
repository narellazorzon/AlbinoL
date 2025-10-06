<?php
/**
 * Configuración de Email para Albino Luis Zorzon
 * Sistema mejorado de envío de emails
 */

// Configuración SMTP (puedes cambiar estos valores según tu proveedor)
define('SMTP_HOST', 'smtp.gmail.com'); // Para Gmail
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'alzorzon@gmail.com');
define('SMTP_PASSWORD', 'katw nhrz vrtn zadj'); // Usar App Password de Gmail
define('SMTP_ENCRYPTION', 'tls'); // tls o ssl

// Configuración del remitente
define('FROM_EMAIL', 'alzorzon@gmail.com');
define('FROM_NAME', 'Albino Luis Zorzon e hijos');

// Configuración del destinatario
define('TO_EMAIL', 'alzorzon@gmail.com');
define('TO_NAME', 'Albino Luis Zorzon');

// Configuración adicional
define('EMAIL_CHARSET', 'UTF-8');
define('EMAIL_ENCODING', '8bit');

/**
 * Función para enviar email usando la función mail() nativa de PHP
 * con configuración mejorada para XAMPP
 */
function enviarEmail($nombre, $email, $telefono, $asunto, $mensaje) {
    // Validar datos
    if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
        return ['success' => false, 'message' => 'Faltan datos obligatorios'];
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Email inválido'];
    }
    
    // Configurar headers mejorados para XAMPP
    $headers = array(
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=' . EMAIL_CHARSET,
        'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>',
        'Reply-To: ' . $nombre . ' <' . $email . '>',
        'X-Mailer: PHP/' . phpversion(),
        'X-Priority: 3',
        'Return-Path: ' . FROM_EMAIL
    );
    
    // Crear el contenido HTML del email
    $html_content = crearContenidoEmail($nombre, $email, $telefono, $asunto, $mensaje);
    
    // Asunto del email
    $email_subject = '[Contacto Web] ' . $asunto . ' - ' . $nombre;
    
    // Configurar parámetros adicionales para mail()
    $additional_parameters = '-f' . FROM_EMAIL;
    
    // Intentar enviar el email
    $mail_sent = @mail(TO_EMAIL, $email_subject, $html_content, implode("\r\n", $headers), $additional_parameters);
    
    if ($mail_sent) {
        return ['success' => true, 'message' => 'Email enviado correctamente'];
    } else {
        // Log del error para debugging
        $error_msg = error_get_last();
        $error_log = date('Y-m-d H:i:s') . " - Error email: " . ($error_msg['message'] ?? 'Error desconocido') . "\n";
        file_put_contents(__DIR__ . '/email-errors.log', $error_log, FILE_APPEND | LOCK_EX);
        
        return ['success' => false, 'message' => 'Error al enviar email. XAMPP requiere configuración SMTP.'];
    }
}

/**
 * Crear el contenido HTML del email
 */
function crearContenidoEmail($nombre, $email, $telefono, $asunto, $mensaje) {
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
            body { font-family: 'Arial', sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 20px; background-color: #f4f4f4; }
            .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
            .header { background: linear-gradient(135deg, #2d5016, #4a6b2a); color: white; padding: 30px; text-align: center; }
            .header h1 { margin: 0; font-size: 24px; }
            .content { padding: 30px; }
            .field { margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; border-left: 4px solid #2d5016; }
            .field-label { font-weight: bold; color: #2d5016; margin-bottom: 5px; }
            .field-value { color: #555; }
            .message-content { background: #e8f5e8; padding: 20px; border-radius: 8px; border: 1px solid #c3e6cb; margin: 20px 0; }
            .footer { background: #f8f9fa; padding: 20px; text-align: center; color: #666; font-size: 14px; border-top: 1px solid #dee2e6; }
            .meta { font-size: 12px; color: #888; margin-top: 20px; padding-top: 15px; border-top: 1px solid #eee; }
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
 * Función para guardar mensaje en archivo (backup)
 */
function guardarMensajeEnArchivo($nombre, $email, $telefono, $asunto, $mensaje) {
    $mensajes_dir = __DIR__ . '/mensajes';
    
    // Crear directorio si no existe
    if (!is_dir($mensajes_dir)) {
        mkdir($mensajes_dir, 0755, true);
    }
    
    // Crear nombre de archivo único
    $timestamp = date('Y-m-d_H-i-s');
    $filename = $mensajes_dir . '/mensaje_' . $timestamp . '_' . uniqid() . '.txt';
    
    // Contenido del archivo
    $contenido = "=== MENSAJE DE CONTACTO ===\n";
    $contenido .= "Fecha: " . date('d/m/Y H:i:s') . "\n";
    $contenido .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "\n";
    $contenido .= "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'No disponible') . "\n\n";
    $contenido .= "- Nombre: " . $nombre . "\n";
    $contenido .= "- Email: " . $email . "\n";
    $contenido .= "- Teléfono: " . ($telefono ?: 'No proporcionado') . "\n";
    $contenido .= "- Asunto: " . $asunto . "\n";
    $contenido .= "- Mensaje:\n" . $mensaje . "\n";
    
    // Guardar archivo
    file_put_contents($filename, $contenido);
    
    // También guardar en log
    $log_entry = date('Y-m-d H:i:s') . " - Mensaje de: $nombre ($email) - Asunto: $asunto\n";
    file_put_contents(__DIR__ . '/contactos.log', $log_entry, FILE_APPEND | LOCK_EX);
    
    return $filename;
}
?>