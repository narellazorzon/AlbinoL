<?php
/**
 * Script mejorado para procesar el formulario de contacto
 * Albino Luis Zorzon e hijos - Con validación anti-spam y anti-bot
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

// Función para sanitizar datos
function sanitizarDatos($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Función para validar email
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Función para validar teléfono
function validarTelefono($telefono) {
    if (empty($telefono)) return true; // Opcional
    return preg_match('/^[0-9]{7,15}$/', $telefono);
}

// Función para validar nombre
function validarNombre($nombre) {
    return preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,50}$/', $nombre);
}

// Función para validar mensaje
function validarMensaje($mensaje) {
    $length = strlen($mensaje);
    return $length >= 10 && $length <= 1000;
}

// Función para detectar spam en el mensaje
function detectarSpam($mensaje) {
    $palabrasSpam = [
        'viagra', 'casino', 'poker', 'lottery', 'winner', 'congratulations',
        'free money', 'click here', 'buy now', 'discount', 'offer',
        'urgent', 'act now', 'limited time', 'guaranteed'
    ];
    
    $mensajeLower = strtolower($mensaje);
    
    foreach ($palabrasSpam as $palabra) {
        if (strpos($mensajeLower, $palabra) !== false) {
            return true;
        }
    }
    
    return false;
}

// Función para limpiar datos
function limpiarDatos($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// ===== VALIDACIONES Y PROCESAMIENTO PRINCIPAL =====

// Verificar que sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    enviarRespuesta(false, 'Método no permitido.');
}

// Verificar honeypot (protección anti-bot)
if (!empty($_POST['empresa'])) {
    enviarRespuesta(false, 'Solicitud bloqueada por seguridad.');
}

// Obtener y sanitizar datos
$nombre = sanitizarDatos($_POST['nombre'] ?? '');
$email = sanitizarDatos($_POST['email'] ?? '');
$telefono = sanitizarDatos($_POST['telefono'] ?? '');
$asunto = sanitizarDatos($_POST['asunto'] ?? '');
$mensaje = sanitizarDatos($_POST['mensaje'] ?? '');

// ===== VALIDACIONES DEL SERVIDOR =====

// Validar campos obligatorios
if (empty($nombre)) {
    enviarRespuesta(false, 'El nombre es obligatorio.');
}

if (empty($email)) {
    enviarRespuesta(false, 'El email es obligatorio.');
}

if (empty($asunto)) {
    enviarRespuesta(false, 'Debe seleccionar un asunto.');
}

if (empty($mensaje)) {
    enviarRespuesta(false, 'El mensaje es obligatorio.');
}

// Validar formato de datos
if (!validarNombre($nombre)) {
    enviarRespuesta(false, 'El nombre debe contener solo letras y tener entre 3 y 50 caracteres.');
}

if (!validarEmail($email)) {
    enviarRespuesta(false, 'El formato del email no es válido.');
}

if (!validarTelefono($telefono)) {
    enviarRespuesta(false, 'El teléfono debe contener solo números y tener entre 7 y 15 dígitos.');
}

if (!validarMensaje($mensaje)) {
    enviarRespuesta(false, 'El mensaje debe tener entre 10 y 1000 caracteres.');
}

// Detectar spam
if (detectarSpam($mensaje)) {
    enviarRespuesta(false, 'El mensaje contiene contenido no permitido.');
}

// Validar asunto contra valores permitidos
$asuntosPermitidos = [
    'agricultura',
    'ganaderia', 
    'general',
    'trabajo'
];

if (!in_array($asunto, $asuntosPermitidos)) {
    enviarRespuesta(false, 'El asunto seleccionado no es válido.');
}

// ===== PROCESAMIENTO SEGURO =====

// Limpiar datos adicionales
$nombre = limpiarDatos($nombre);
$email = limpiarDatos($email);
$telefono = limpiarDatos($telefono);
$asunto = limpiarDatos($asunto);
$mensaje = limpiarDatos($mensaje);

// Convertir asunto a texto legible
$asuntosTexto = [
    'agricultura' => 'Consulta sobre Agricultura',
    'ganaderia' => 'Consulta sobre Ganadería',
    'general' => 'Consulta General',
    'trabajo' => 'Oportunidades Laborales'
];

$asuntoTexto = $asuntosTexto[$asunto] ?? 'Consulta General';

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

// Función para enviar email usando PHPMailer (SISTEMA ÚNICO)
function enviarEmailSimple($nombre, $email, $telefono, $asunto, $mensaje) {
    try {
        // Incluir PHPMailer directamente (sin configuraciones duplicadas)
        require_once __DIR__ . '/../PHPMailer-master/src/Exception.php';
        require_once __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
        require_once __DIR__ . '/../PHPMailer-master/src/SMTP.php';
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        // Configuración del servidor SMTP (UNA SOLA CONFIGURACIÓN)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alzorzon@gmail.com';
        $mail->Password = 'ibge ngxn jcxj rvzd'; // SOLO UNA CONTRASEÑA
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0; // Desactivado para evitar duplicados
        
        // Configuración SSL para desarrollo (XAMPP)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        // Configurar remitente y destinatario
        $mail->setFrom('alzorzon@gmail.com', 'Albino Luis Zorzon e hijos');
        $mail->addAddress('alzorzon@gmail.com', 'Albino Luis Zorzon');
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
        
        // Enviar el email (UNA SOLA VEZ)
        $mail->send();
        
        return ['success' => true, 'message' => 'Mensaje enviado correctamente. Te contactaremos pronto.'];
        
    } catch (Exception $e) {
        // Log del error
        error_log('Error al enviar email: ' . $e->getMessage());
        
        // Retornar error pero no fallar completamente
        return ['success' => false, 'message' => 'Error al enviar email: ' . $e->getMessage()];
    }
}



// ===== PROCESAMIENTO FINAL =====

// Guardar mensaje en archivo (siempre como backup)
$archivo_guardado = guardarMensajeEnArchivo($nombre, $email, $telefono, $asuntoTexto, $mensaje);

// Intentar enviar email
$email_result = enviarEmailSimple($nombre, $email, $telefono, $asuntoTexto, $mensaje);

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