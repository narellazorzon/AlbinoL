<?php
/**
 * Funciones específicas para la página de inicio (index.php)
 */

/**
 * Obtiene las estadísticas principales
 * @return array Array de estadísticas
 */
function getIndexStats() {
    return [
        [
            'number' => '8000+',
            'label' => 'Hectáreas Agrícolas'
        ],
        [
            'number' => '12000+',
            'label' => 'Hectáreas sembradas por año'
        ],
        [
            'number' => '50+',
            'label' => 'Años de Experiencia'
        ],
        [
            'number' => '3000+',
            'label' => 'Cabezas de Ganado'
        ]
    ];
}

/**
 * Obtiene los servicios principales
 * @return array Array de servicios
 */
function getIndexServicios() {
    return [
        [
            'icon' => '🌱',
            'title' => 'Agricultura',
            'description' => 'Producción sustentable de cereales y oleaginosas integrando toda la cadena agrícola con tecnología, maquinaria propia y sustentabilidad.'
        ],
        [
            'icon' => '🐄',
            'title' => 'Ganadería',
            'description' => 'Cría y engorde de ganado bovino con manejo integral y alimentación balanceada.'
        ]
    ];
}

/**
 * Obtiene los compromisos de la empresa
 * @return array Array de compromisos
 */
function getIndexCompromisos() {
    return [
        [
            'icon' => '🌍',
            'title' => 'Sostenibilidad',
            'description' => 'Prácticas agrícolas que respetan el medio ambiente y preservan los recursos naturales para las futuras generaciones.'
        ],
        [
            'icon' => '👨‍👩‍👧‍👦',
            'title' => 'Trabajo Familiar',
            'description' => 'Valores familiares que se transmiten de generación en generación.'
        ],
        [
            'icon' => '🔬',
            'title' => 'Innovación',
            'description' => 'Adopción de nuevas tecnologías y técnicas que nos permiten ser más eficientes y competitivos.'
        ]
    ];
}

/**
 * Genera el HTML de las estadísticas
 * @return string HTML de las estadísticas
 */
function generateIndexStatsHTML() {
    $stats = getIndexStats();
    $html = '<div class="stats-grid">';
    
    foreach ($stats as $stat) {
        $html .= '<div class="stat-item">';
        $html .= '<span class="stat-number">' . $stat['number'] . '</span>';
        $html .= '<span class="stat-label">' . $stat['label'] . '</span>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}

/**
 * Genera el HTML de los servicios
 * @return string HTML de los servicios
 */
function generateIndexServiciosHTML() {
    $servicios = getIndexServicios();
    $html = '<div class="cards-grid">';
    
    foreach ($servicios as $servicio) {
        $html .= '<div class="card">';
        $html .= '<span class="card-icon">' . $servicio['icon'] . '</span>';
        $html .= '<h3>' . $servicio['title'] . '</h3>';
        $html .= '<p>' . $servicio['description'] . '</p>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}

/**
 * Genera el HTML de los compromisos
 * @return string HTML de los compromisos
 */
function generateIndexCompromisosHTML() {
    $compromisos = getIndexCompromisos();
    $html = '<div class="cards-grid">';
    
    foreach ($compromisos as $compromiso) {
        $html .= '<div class="card">';
        $html .= '<span class="card-icon">' . $compromiso['icon'] . '</span>';
        $html .= '<h3>' . $compromiso['title'] . '</h3>';
        $html .= '<p>' . $compromiso['description'] . '</p>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}
?>
