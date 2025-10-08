<?php
/**
 * Funciones específicas para la página de Ganadería
 */

/**
 * Obtiene las actividades ganaderas
 * @return array Array de actividades
 */
function getGanaderiaActivities() {
    return [
        [
            'icon' => '🐂',
            'title' => 'Cría de Ganado',
            'description' => 'Selección y cría de reproductores de alta calidad genética para mejorar la producción.',
            'features' => [
                'Selección genética',
                'Reproducción controlada',
                'Registro genealógico'
            ]
        ],
        [
            'icon' => '🌾',
            'title' => 'Engorde a Corral',
            'description' => 'Sistema de engorde intensivo con alimentación balanceada y control sanitario.',
            'features' => [
                'Alimentación balanceada',
                'Control sanitario',
                'Manejo del estrés'
            ]
        ],
        [
            'icon' => '🌱',
            'title' => 'Pastoreo Rotativo',
            'description' => 'Sistema de pastoreo que optimiza el uso del forraje y mantiene la calidad del pasto.',
            'features' => [
                'Rotación de potreros',
                'Mejora de pasturas',
                'Conservación del suelo'
            ]
        ]
    ];
}

/**
 * Obtiene las razas de ganado
 * @return array Array de razas
 */
function getGanaderiaRazas() {
    return [
        [
            'icon' => '🐃',
            'title' => 'Brangus',
            'description' => 'Híbrido entre Angus y Brahman, combina calidad de carne con resistencia al calor.'
        ],
        [
            'icon' => '🐄',
            'title' => 'Angus',
            'description' => 'Raza británica conocida por su excelente calidad de carne y adaptabilidad al clima.'
        ],
        [
            'icon' => '🐂',
            'title' => 'Braford',
            'description' => 'Híbrido entre Brahman y Hereford, combina resistencia al calor con buena calidad de carne.'
        ]
    ];
}

/**
 * Obtiene las estadísticas ganaderas
 * @return array Array de estadísticas
 */
function getGanaderiaStats() {
    return [
        [
            'number' => '3000+',
            'label' => 'Cabezas de Ganado'
        ],
        [
            'number' => '3',
            'label' => 'Razas Principales'
        ],
        [
            'number' => '100%',
            'label' => 'Trazabilidad'
        ],
        [
            'number' => '3204+',
            'label' => 'Días de Cuidado'
        ]
    ];
}

/**
 * Obtiene los tipos de alimentación
 * @return array Array de tipos de alimentación
 */
function getGanaderiaAlimentacion() {
    return [
        [
            'icon' => '🌾',
            'title' => 'Forrajes Propios',
            'description' => 'Producción de alfalfa, sorgo y otros forrajes de alta calidad nutricional.'
        ],
        [
            'icon' => '🌽',
            'title' => 'Granos de Calidad',
            'description' => 'Maíz y soja de nuestra propia producción para alimentación balanceada.'
        ],
        [
            'icon' => '🧪',
            'title' => 'Suplementos',
            'description' => 'Minerales y vitaminas específicas para cada etapa del desarrollo animal.'
        ]
    ];
}

/**
 * Genera el HTML de las actividades ganaderas
 * @return string HTML de las actividades
 */
function generateActivitiesHTML() {
    $activities = getGanaderiaActivities();
    $html = '<div class="cards-grid">';
    
    foreach ($activities as $activity) {
        $html .= '<div class="card">';
        $html .= '<span class="card-icon">' . $activity['icon'] . '</span>';
        $html .= '<h3>' . $activity['title'] . '</h3>';
        $html .= '<p>' . $activity['description'] . '</p>';
        $html .= '<ul style="text-align: left; margin-top: 1rem;">';
        foreach ($activity['features'] as $feature) {
            $html .= '<li>' . $feature . '</li>';
        }
        $html .= '</ul>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}

/**
 * Genera el HTML de las razas
 * @return string HTML de las razas
 */
function generateRazasHTML() {
    $razas = getGanaderiaRazas();
    $html = '<div class="cards-grid">';
    
    foreach ($razas as $raza) {
        $html .= '<div class="card">';
        $html .= '<span class="card-icon">' . $raza['icon'] . '</span>';
        $html .= '<h3>' . $raza['title'] . '</h3>';
        $html .= '<p>' . $raza['description'] . '</p>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}

/**
 * Genera el HTML de las estadísticas
 * @return string HTML de las estadísticas
 */
function generateStatsHTML() {
    $stats = getGanaderiaStats();
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
 * Genera el HTML de la alimentación
 * @return string HTML de la alimentación
 */
function generateAlimentacionHTML() {
    $alimentacion = getGanaderiaAlimentacion();
    $html = '<div class="cards-grid">';
    
    foreach ($alimentacion as $item) {
        $html .= '<div class="card">';
        $html .= '<span class="card-icon">' . $item['icon'] . '</span>';
        $html .= '<h3>' . $item['title'] . '</h3>';
        $html .= '<p>' . $item['description'] . '</p>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}
?>
