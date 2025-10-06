<?php
/**
 * Script mejorado para procesar el formulario de contacto
 * Albino Luis Zorzon e hijos - Con PHPMailer y Gmail
 */

// Configuración de errores - CRÍTICO para JSON
error_reporting(0);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Headers para JSON - DEBE ir antes de cualquier output
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

// Función para enviar respuesta JSON
function enviarRespuesta($success, $message, $data = []) {
    $respuesta = [
        'success' => $success,
        'message' => $message
    ];
    
    if (!empty($data)) {
        $respuesta = array_merge($respuesta, $data);
    }
    
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    exit;
}

// Función para limpiar datos
function limpiarDatos($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para guardar mensaje en archivo (backup)
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

// Función para enviar email usando PHPMailer
function enviarEmailSimple($nombre, $email, $telefono, $asunto, $mensaje) {
    try {
        // Incluir configuración de email
        require_once __DIR__ . '/email-config.php';
        
        // Verificar configuración
        $errores = verificarConfiguracionEmail();
        if (!empty($errores)) {
            error_log('Configuración de email incompleta: ' . implode(', ', $errores));
            return ['success' => false, 'message' => 'Configuración de email incompleta. Contacta al administrador.'];
        }
        
        // Incluir PHPMailer
        require_once __DIR__ . '/../PHPMailer-master/src/Exception.php';
        require_once __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
        require_once __DIR__ . '/../PHPMailer-master/src/SMTP.php';
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port = SMTP_PORT;
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = SMTP_DEBUG ? 2 : 0;
        
        // Configuración SSL para desarrollo (XAMPP)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        // Configurar remitente y destinatario
        $mail->setFrom(SMTP_USER, SITE_NAME);
        $mail->addAddress(SITE_EMAIL, 'Albino Luis Zorzon');
        $mail->addReplyTo($email, $nombre);
        
        // Configurar el contenido del email
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto: ' . $asunto;
        
        // Crear el cuerpo del email
        $cuerpoEmail = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .header { background: #2d5016; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; background: #f9f9f9; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #2d5016; }
                .value { margin-left: 10px; }
                .footer { background: #4a6b2a; color: white; padding: 15px; text-align: center; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h2>🌾 Nuevo Mensaje de Contacto</h2>
                <p>Albino Luis Zorzon e hijos</p>
            </div>
            
            <div class='content'>
                <div class='field'>
                    <span class='label'>👤 Nombre:</span>
                    <span class='value'>" . htmlspecialchars($nombre) . "</span>
                </div>
                
                <div class='field'>
                    <span class='label'>📧 Email:</span>
                    <span class='value'>" . htmlspecialchars($email) . "</span>
                </div>";
        
        if (!empty($telefono)) {
            $cuerpoEmail .= "
                <div class='field'>
                    <span class='label'>📞 Teléfono:</span>
                    <span class='value'>" . htmlspecialchars($telefono) . "</span>
                </div>";
        }
        
        $cuerpoEmail .= "
                <div class='field'>
                    <span class='label'>📋 Asunto:</span>
                    <span class='value'>" . htmlspecialchars($asunto) . "</span>
                </div>
                
                <div class='field'>
                    <span class='label'>💬 Mensaje:</span>
                    <div class='value' style='background: white; padding: 15px; border-left: 4px solid #2d5016; margin-top: 10px;'>
                        " . nl2br(htmlspecialchars($mensaje)) . "
                    </div>
                </div>
                
                <div class='field'>
                    <span class='label'>🕒 Fecha:</span>
                    <span class='value'>" . date('d/m/Y H:i:s') . "</span>
                </div>
                
                <div class='field'>
                    <span class='label'>🌐 IP:</span>
                    <span class='value'>" . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "</span>
                </div>
            </div>
            
            <div class='footer'>
                <p>Este mensaje fue enviado desde el formulario de contacto del sitio web de Albino Luis Zorzon e hijos.</p>
                <p>Responder directamente a este email para contactar al cliente.</p>
            </div>
        </body>
        </html>";
        
        $mail->Body = $cuerpoEmail;
        
        // Versión de texto plano
        $textoPlano = "
NUEVO MENSAJE DE CONTACTO - ALBINO LUIS ZORZON

Nombre: " . $nombre . "
Email: " . $email . "
Teléfono: " . ($telefono ?: 'No proporcionado') . "
Asunto: " . $asunto . "

Mensaje:
" . $mensaje . "

Fecha: " . date('d/m/Y H:i:s') . "
IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "

---
Este mensaje fue enviado desde el formulario de contacto del sitio web.
        ";
        
        $mail->AltBody = $textoPlano;
        
        // Enviar el email
        $mail->send();
        
        return ['success' => true, 'message' => 'Mensaje enviado correctamente. Te contactaremos pronto.'];
        
    } catch (Exception $e) {
        // Log del error
        error_log('Error al enviar email: ' . $e->getMessage());
        
        // Retornar error pero no fallar completamente
        return ['success' => false, 'message' => 'Error al enviar email: ' . $e->getMessage()];
    }
}

// Verificar método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    enviarRespuesta(false, 'Método no permitido');
}

// Obtener datos del formulario
$nombre = isset($_POST['nombre']) ? limpiarDatos($_POST['nombre']) : '';
$email = isset($_POST['email']) ? limpiarDatos($_POST['email']) : '';
$telefono = isset($_POST['telefono']) ? limpiarDatos($_POST['telefono']) : '';
$asunto = isset($_POST['asunto']) ? limpiarDatos($_POST['asunto']) : '';
$mensaje = isset($_POST['mensaje']) ? limpiarDatos($_POST['mensaje']) : '';

// Validaciones
$errors = array();

if (empty($nombre) || strlen($nombre) < 2 || strlen($nombre) > 100) {
    $errors[] = 'El nombre debe tener entre 2 y 100 caracteres';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'El email es obligatorio y debe ser válido';
}

if (empty($asunto)) {
    $errors[] = 'El asunto es obligatorio';
}

if (empty($mensaje) || strlen($mensaje) < 5 || strlen($mensaje) > 2000) {
    $errors[] = 'El mensaje debe tener entre 5 y 2000 caracteres';
}

// Validar teléfono si se proporciona
if (!empty($telefono) && !preg_match('/^[\d\s\-\+\(\)]+$/', $telefono)) {
    $errors[] = 'El formato del teléfono no es válido';
}

// Si hay errores, devolverlos
if (!empty($errors)) {
    enviarRespuesta(false, 'Errores de validación', ['errors' => $errors]);
}

// Guardar mensaje en archivo (siempre como backup)
$archivo_guardado = guardarMensajeEnArchivo($nombre, $email, $telefono, $asunto, $mensaje);

// Intentar enviar email
$email_result = enviarEmailSimple($nombre, $email, $telefono, $asunto, $mensaje);

if ($email_result['success']) {
    enviarRespuesta(true, 'Mensaje enviado correctamente. Te contactaremos pronto.', [
        'archivo' => basename($archivo_guardado),
        'email_sent' => true
    ]);
} else {
    enviarRespuesta(true, 'Mensaje guardado correctamente. Te contactaremos pronto.', [
        'archivo' => basename($archivo_guardado),
        'email_sent' => false,
        'email_error' => $email_result['message']
    ]);
}
?>