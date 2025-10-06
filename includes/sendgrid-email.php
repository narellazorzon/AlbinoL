<?php
/**
 * Sistema de email alternativo usando SendGrid
 * Para usar cuando la función mail() de XAMPP no funciona
 */

// Configuración de SendGrid (gratis hasta 100 emails/día)
define('SENDGRID_API_KEY', 'tu_sendgrid_api_key_aqui');
define('SENDGRID_URL', 'https://api.sendgrid.com/v3/mail/send');

/**
 * Función para enviar email usando SendGrid API
 */
function enviarEmailSendGrid($nombre, $email, $telefono, $asunto, $mensaje) {
    // Validar datos
    if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
        return ['success' => false, 'message' => 'Faltan datos obligatorios'];
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Email inválido'];
    }
    
    // Crear el contenido HTML del email
    $html_content = crearContenidoEmail($nombre, $email, $telefono, $asunto, $mensaje);
    
    // Datos para SendGrid
    $data = array(
        'personalizations' => array(
            array(
                'to' => array(
                    array(
                        'email' => 'alzorzon@gmail.com',
                        'name' => 'Albino Luis Zorzon'
                    )
                ),
                'subject' => '[Contacto Web] ' . $asunto . ' - ' . $nombre
            )
        ),
        'from' => array(
            'email' => 'alzorzon@gmail.com',
            'name' => 'Albino Luis Zorzon e hijos'
        ),
        'reply_to' => array(
            'email' => $email,
            'name' => $nombre
        ),
        'content' => array(
            array(
                'type' => 'text/html',
                'value' => $html_content
            )
        )
    );
    
    // Configurar cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, SENDGRID_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . SENDGRID_API_KEY,
        'Content-Type: application/json'
    ));
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code == 202) {
        return ['success' => true, 'message' => 'Email enviado correctamente via SendGrid'];
    } else {
        return ['success' => false, 'message' => 'Error al enviar email via SendGrid: ' . $response];
    }
}

/**
 * Función para enviar email usando Mailgun API
 */
function enviarEmailMailgun($nombre, $email, $telefono, $asunto, $mensaje) {
    // Configuración de Mailgun
    $api_key = 'tu_mailgun_api_key_aqui';
    $domain = 'tu_dominio_mailgun.mailgun.org';
    
    // Validar datos
    if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
        return ['success' => false, 'message' => 'Faltan datos obligatorios'];
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Email inválido'];
    }
    
    // Crear el contenido HTML del email
    $html_content = crearContenidoEmail($nombre, $email, $telefono, $asunto, $mensaje);
    
    // Datos para Mailgun
    $data = array(
        'from' => 'Albino Luis Zorzon e hijos <noreply@' . $domain . '>',
        'to' => 'alzorzon@gmail.com',
        'subject' => '[Contacto Web] ' . $asunto . ' - ' . $nombre,
        'html' => $html_content,
        'h:Reply-To' => $email
    );
    
    // Configurar cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/' . $domain . '/messages');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $api_key);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code == 200) {
        return ['success' => true, 'message' => 'Email enviado correctamente via Mailgun'];
    } else {
        return ['success' => false, 'message' => 'Error al enviar email via Mailgun: ' . $response];
    }
}
?>
