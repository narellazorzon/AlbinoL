<?php
/**
 * Configuración de Email para Albino Luis Zorzon
 * 
 * IMPORTANTE: Para que funcione el envío de emails, necesitas:
 * 1. Configurar una contraseña de aplicación de Gmail
 * 2. Habilitar la verificación en 2 pasos en tu cuenta de Gmail
 * 3. Actualizar la contraseña en este archivo
 */

// Configuración SMTP para Gmail
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'alzorzon@gmail.com');
define('SMTP_PASS', 'ibge ngxn jcxj rvzd'); // CONFIGURAR AQUÍ LA CONTRASEÑA DE APLICACIÓN DE GMAIL

// Configuración de email del sitio
define('SITE_EMAIL', 'alzorzon@gmail.com');
define('SITE_NAME', 'Albino Luis Zorzon e hijos');

// Configuración de seguridad
define('SMTP_SECURE', 'tls'); // tls o ssl
define('SMTP_DEBUG', false); // Cambiar a true para debug

/**
 * INSTRUCCIONES PARA CONFIGURAR GMAIL:
 * 
 * 1. Ve a tu cuenta de Google: https://myaccount.google.com/
 * 2. Ve a "Seguridad" > "Verificación en 2 pasos"
 * 3. Asegúrate de que esté habilitada
 * 4. Ve a "Seguridad" > "Contraseñas de aplicaciones"
 * 5. Selecciona "Correo" y "Otro (nombre personalizado)"
 * 6. Escribe "Sitio Web AlbinoL" como nombre
 * 7. Copia la contraseña generada (16 caracteres)
 * 8. Reemplaza 'TU_CONTRASEÑA_DE_APLICACION_AQUI' con esa contraseña
 * 
 * EJEMPLO:
 * define('SMTP_PASS', 'abcd efgh ijkl mnop');
 */

/**
 * CONFIGURACIÓN ALTERNATIVA - XAMPP MAIL:
 * Si prefieres usar el servidor de correo de XAMPP:
 * 
 * 1. Abre XAMPP Control Panel
 * 2. Ve a "Config" > "Mercury Mail Server"
 * 3. Configura tu cuenta de correo local
 * 4. Cambia la configuración SMTP a:
 *    - Host: localhost
 *    - Puerto: 25
 *    - Usuario: tu_usuario_local
 *    - Contraseña: tu_contraseña_local
 */

// Función para verificar la configuración de email
function verificarConfiguracionEmail() {
    $errores = [];
    
    if (empty(SMTP_PASS) || SMTP_PASS === 'TU_CONTRASEÑA_DE_APLICACION_AQUI') {
        $errores[] = 'La contraseña de SMTP no está configurada';
    }
    
    if (empty(SMTP_USER)) {
        $errores[] = 'El usuario de SMTP no está configurado';
    }
    
    if (empty(SITE_EMAIL)) {
        $errores[] = 'El email del sitio no está configurado';
    }
    
    return $errores;
}

// Función para probar la conexión SMTP
function probarConexionSMTP() {
    try {
        // Verificar que PHPMailer esté disponible
        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            require_once __DIR__ . '/../PHPMailer-master/src/Exception.php';
            require_once __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
            require_once __DIR__ . '/../PHPMailer-master/src/SMTP.php';
        }
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port = SMTP_PORT;
        $mail->SMTPDebug = SMTP_DEBUG ? 2 : 0;
        
        // Intentar conectar
        $mail->smtpConnect();
        $mail->smtpClose();
        
        return ['success' => true, 'message' => 'Conexión SMTP exitosa'];
        
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Error de conexión: ' . $e->getMessage()];
    }
}
?>