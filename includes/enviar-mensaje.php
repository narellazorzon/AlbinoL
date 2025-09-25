<?php
require_once __DIR__ . '/config.php';

// Configurar headers para respuesta JSON
header('Content-Type: application/json; charset=utf-8');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Método no permitido'
    ]);
    exit;
}

// Obtener datos del formulario
$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$asunto = trim($_POST['asunto'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

// Validar datos requeridos
$errores = [];

if (empty($nombre)) {
    $errores[] = 'El nombre es requerido';
} elseif (strlen($nombre) < 2 || strlen($nombre) > 100) {
    $errores[] = 'El nombre debe tener entre 2 y 100 caracteres';
} elseif (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\.]+$/', $nombre)) {
    $errores[] = 'El nombre solo puede contener letras, espacios y puntos';
}

if (empty($email)) {
    $errores[] = 'El email es requerido';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'El email debe ser válido';
} elseif (strlen($email) > 100) {
    $errores[] = 'El email es demasiado largo';
}

if (!empty($telefono)) {
    if (strlen($telefono) < 10 || strlen($telefono) > 20) {
        $errores[] = 'El teléfono debe tener entre 10 y 20 caracteres';
    } elseif (!preg_match('/^[\+]?[0-9\s\-\(\)]+$/', $telefono)) {
        $errores[] = 'El teléfono contiene caracteres no válidos';
    }
}

if (empty($asunto)) {
    $errores[] = 'El asunto es requerido';
} elseif (!in_array($asunto, ['agricultura', 'ganaderia', 'maquinaria', 'logistica', 'trabajo', 'general'])) {
    $errores[] = 'El asunto seleccionado no es válido';
}

if (empty($mensaje)) {
    $errores[] = 'El mensaje es requerido';
} elseif (strlen($mensaje) < 5 || strlen($mensaje) > 2000) {
    $errores[] = 'El mensaje debe tener entre 5 y 2000 caracteres';
}

// Si hay errores, devolver respuesta de error
if (!empty($errores)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Errores de validación',
        'errors' => $errores
    ]);
    exit;
}

// Sanitizar datos para seguridad
$nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$telefono = htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');
$asunto = htmlspecialchars($asunto, ENT_QUOTES, 'UTF-8');
$mensaje = htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');

// Configurar datos del mensaje
$fecha = date('d/m/Y H:i:s');
$ip = $_SERVER['REMOTE_ADDR'] ?? 'No disponible';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'No disponible';

// Mapear asuntos a texto legible
$asuntos_map = [
    'agricultura' => 'Consulta sobre Agricultura',
    'ganaderia' => 'Consulta sobre Ganadería',
    'maquinaria' => 'Consulta sobre Maquinaria',
    'logistica' => 'Consulta sobre Logística',
    'trabajo' => 'Oportunidades Laborales',
    'general' => 'Consulta General'
];

$asunto_texto = $asuntos_map[$asunto] ?? $asunto;

// Crear el contenido del email
$email_content = "
Nuevo mensaje de contacto recibido

Fecha: $fecha
IP: $ip
User Agent: $user_agent

Datos del contacto:
- Nombre: $nombre
- Email: $email
- Teléfono: " . ($telefono ?: 'No proporcionado') . "
- Asunto: $asunto_texto

Mensaje:
$mensaje

---
Este mensaje fue enviado desde el formulario de contacto del sitio web.
Sitio: " . SITE_URL . "
";

// Configurar headers del email
$headers = [
    'From: ' . SITE_EMAIL,
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8',
    'MIME-Version: 1.0'
];

// Configurar para envío a Gmail
$email_enviado = false;
$mensaje_guardado = false;

// Configurar headers para Gmail
$headers_gmail = [
    'From: Sitio Web <noreply@albinoluis.com>',
    'Reply-To: ' . $nombre . ' <' . $email . '>',
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8',
    'MIME-Version: 1.0'
];

// Siempre guardar mensaje en archivo
$mensaje_guardado = false;
try {
    $mensajes_dir = __DIR__ . '/mensajes';
    if (!is_dir($mensajes_dir)) {
        mkdir($mensajes_dir, 0755, true);
    }
    
    $archivo_mensaje = $mensajes_dir . '/mensaje_' . date('Y-m-d_H-i-s') . '_' . uniqid() . '.txt';
    $mensaje_guardado = file_put_contents($archivo_mensaje, $email_content, LOCK_EX);
    
} catch (Exception $e) {
    error_log('Error guardando mensaje: ' . $e->getMessage());
}

// Intentar enviar email (opcional, ya que los mensajes se guardan en archivos)
$email_enviado = false;
try {
    // Configurar para que no muestre warnings
    $old_error_reporting = error_reporting(0);
    
    $email_enviado = mail(
        'alzorzon@gmail.com',
        'Nuevo mensaje de contacto - ' . $asunto_texto,
        $email_content,
        implode("\r\n", $headers_gmail)
    );
    
    error_reporting($old_error_reporting);
    
} catch (Exception $e) {
    error_log('Error enviando email: ' . $e->getMessage());
    $email_enviado = false;
}

// Guardar en log general
try {
    $log_entry = date('Y-m-d H:i:s') . " - $nombre ($email) - $asunto_texto - IP: $ip - Email: " . ($email_enviado ? 'Enviado' : 'Falló') . "\n";
    file_put_contents(__DIR__ . '/contactos.log', $log_entry, FILE_APPEND | LOCK_EX);
} catch (Exception $e) {
    error_log('Error guardando log: ' . $e->getMessage());
}

// Responder con JSON
if ($email_enviado || $mensaje_guardado) {
    echo json_encode([
        'success' => true,
        'message' => 'Mensaje enviado correctamente. Te contactaremos pronto.'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error al enviar el mensaje. Intenta nuevamente o contactanos por teléfono.'
    ]);
}
?>
