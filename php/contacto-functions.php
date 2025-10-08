<?php
/**
 * Funciones específicas para la página de Contacto
 */

/**
 * Obtiene las opciones del select de asunto
 * @return array Array de opciones
 */
function getAsuntoOpciones() {
    return [
        [
            'value' => 'agricultura',
            'text' => 'Consulta sobre Agricultura'
        ],
        [
            'value' => 'ganaderia',
            'text' => 'Consulta sobre Ganadería'
        ],
        [
            'value' => 'general',
            'text' => 'Consulta General'
        ],
        [
            'value' => 'trabajo',
            'text' => 'Oportunidades Laborales'
        ]
    ];
}

/**
 * Obtiene la información de contacto
 * @return array Array con información de contacto
 */
function getContactoInfo() {
    return [
        'ubicacion' => 'Zona Rural La Lola, Santa Fe',
        'telefono' => '+54 9 11 1234-5678',
        'email' => 'info@albinozorzon.com.ar',
        'horarios' => 'Lunes a Viernes: 8:00 - 18:00'
    ];
}

/**
 * Genera el HTML de las opciones del select de asunto
 * @return string HTML de las opciones
 */
function generateAsuntoOpcionesHTML() {
    $opciones = getAsuntoOpciones();
    $html = '<option value="">Seleccione un asunto</option>';
    
    foreach ($opciones as $opcion) {
        $html .= '<option value="' . $opcion['value'] . '">' . $opcion['text'] . '</option>';
    }
    
    return $html;
}

/**
 * Genera el HTML de la información de contacto
 * @return string HTML de la información
 */
function generateContactoInfoHTML() {
    $info = getContactoInfo();
    $html = '<div class="contact-info">';
    $html .= '<h3>Información de Contacto</h3>';
    $html .= '<p><strong>Ubicación:</strong> ' . $info['ubicacion'] . '</p>';
    $html .= '<p><strong>Teléfono:</strong> ' . $info['telefono'] . '</p>';
    $html .= '<p><strong>Email:</strong> ' . $info['email'] . '</p>';
    $html .= '<p><strong>Horarios:</strong> ' . $info['horarios'] . '</p>';
    $html .= '</div>';
    
    return $html;
}

/**
 * Genera el HTML de los mensajes de éxito/error
 * @return string HTML de los mensajes
 */
function generateMensajesHTML() {
    $html = '';
    
    // Mensaje de éxito
    if (isset($_GET['success']) && $_GET['success'] == '1') {
        $html .= '<div class="alert-success">';
        $html .= '✅ ¡Mensaje enviado correctamente! Te contactaremos pronto.';
        $html .= '</div>';
    }
    
    // Mensaje de error
    if (isset($_GET['error'])) {
        $html .= '<div class="alert-error">';
        $html .= '❌ Error: ' . htmlspecialchars($_GET['error']);
        $html .= '</div>';
    }
    
    return $html;
}
?>
