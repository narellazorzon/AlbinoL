<?php
/**
 * Funciones específicas para la página de Agricultura
 */

/**
 * Obtiene los cultivos principales
 * @return array Array de cultivos
 */
function getAgriculturaCultivos() {
    return [
        [
            'icon' => '🌾',
            'title' => 'Trigo',
            'description' => 'Producción de variedades adaptadas a la región con manejo integrado.',
            'features' => [
                'Alto rendimiento',
                'Suelo sustentable',
                'Control de malezas'
            ]
        ],
        [
            'icon' => '🌽',
            'title' => 'Maíz',
            'description' => 'Cultivo con tecnología de punta y fertilización precisa.',
            'features' => [
                'Híbridos modernos',
                'Siembra directa',
                'Fertilización balanceada'
            ]
        ],
        [
            'icon' => '🌻',
            'title' => 'Girasol',
            'description' => 'Producción para aceite con rotación de cultivos.',
            'features' => [
                'Variedades oleaginosas',
                'Rotación sustentable',
                'Manejo integrado de plagas'
            ]
        ],
        [
            'icon' => '🌿',
            'title' => 'Soja',
            'description' => 'Cultivo sustentable con semillas inoculadas.',
            'features' => [
                'Inoculación de semillas',
                'Sustentabilidad'
            ]
        ],
        [
            'icon' => '',
            'title' => 'Algodón',
            'description' => 'Producción de rollos de algodón con técnicas modernas.',
            'features' => [
                'Fibra de calidad',
                'Manejo especializado',
                'Producción premium'
            ]
        ]
    ];
}

/**
 * Obtiene las tecnologías agrícolas
 * @return array Array de tecnologías
 */
function getAgriculturaTecnologia() {
    return [
        [
            'icon' => '🚜',
            'title' => 'Maquinaria Moderna',
            'description' => 'Equipos de última generación para siembra, cosecha y laboreo del suelo.'
        ],
        [
            'icon' => '📊',
            'title' => 'Agricultura de Precisión',
            'description' => 'Uso de GPS, sensores y análisis de datos para optimizar cada metro cuadrado.'
        ],
        [
            'icon' => '🌱',
            'title' => 'Siembra Directa',
            'description' => 'Práctica sustentable que preserva el suelo y reduce la erosión.'
        ]
    ];
}

/**
 * Obtiene las estadísticas agrícolas
 * @return array Array de estadísticas
 */
function getAgriculturaStats() {
    return [
        [
            'number' => '8000+',
            'label' => 'Hectáreas Cultivadas'
        ],
        [
            'number' => '5',
            'label' => 'Cultivos Principales'
        ],
        [
            'number' => '50%',
            'label' => 'Siembra Directa'
        ],
        [
            'number' => '50%',
            'label' => 'Siembra Convencional'
        ]
    ];
}

/**
 * Obtiene los compromisos sustentables
 * @return array Array de compromisos
 */
function getAgriculturaSustentabilidad() {
    return [
        [
            'icon' => '🌍',
            'title' => 'Conservación del Suelo',
            'description' => 'Prácticas que mantienen la fertilidad y estructura del suelo a largo plazo.'
        ],
        [
            'icon' => '🦋',
            'title' => 'Biodiversidad',
            'description' => 'Rotación de cultivos y corredores biológicos para preservar la fauna local.'
        ],
        [
            'icon' => '💚',
            'title' => 'Energía Renovable',
            'description' => 'Uso de energías limpias en nuestras operaciones agrícolas.'
        ]
    ];
}

/**
 * Genera el HTML de los cultivos
 * @return string HTML de los cultivos
 */
function generateCultivosHTML() {
    $cultivos = getAgriculturaCultivos();
    $html = '<div class="crops-grid-uniform">';
    
    foreach ($cultivos as $cultivo) {
        $html .= '<div class="crop-card">';
        $html .= '<div class="crop-card-header">';
        $html .= '<span class="crop-icon">' . $cultivo['icon'] . '</span>';
        $html .= '<h3>' . $cultivo['title'] . '</h3>';
        $html .= '</div>';
        $html .= '<p>' . $cultivo['description'] . '</p>';
        $html .= '<ul class="crop-list">';
        foreach ($cultivo['features'] as $feature) {
            $html .= '<li>' . $feature . '</li>';
        }
        $html .= '</ul>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}

/**
 * Genera el HTML de la tecnología
 * @return string HTML de la tecnología
 */
function generateTecnologiaHTML() {
    $tecnologias = getAgriculturaTecnologia();
    $html = '<div class="cards-grid">';
    
    foreach ($tecnologias as $tecnologia) {
        $html .= '<div class="card">';
        $html .= '<span class="card-icon">' . $tecnologia['icon'] . '</span>';
        $html .= '<h3>' . $tecnologia['title'] . '</h3>';
        $html .= '<p>' . $tecnologia['description'] . '</p>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}

/**
 * Genera el HTML de las estadísticas
 * @return string HTML de las estadísticas
 */
function generateAgriculturaStatsHTML() {
    $stats = getAgriculturaStats();
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
 * Genera el HTML de la sustentabilidad (versión legacy para compatibilidad)
 * @return string HTML de la sustentabilidad
 */
function generateSustentabilidadHTML() {
    // Esta función se mantiene para compatibilidad con el código existente
    // La nueva sección de sustentabilidad se renderiza directamente en agricultura.php
    return '<div class="legacy-sustentabilidad-notice" style="display: none;">
        <p>La sección de sustentabilidad se ha actualizado con un nuevo diseño.</p>
    </div>';
}

/**
 * Obtiene los datos de sustentabilidad para la nueva sección
 * @return array Array con los datos de sustentabilidad
 */
function getSustentabilidadData() {
    return [
        [
            'icon' => '📊',
            'title' => 'Medición de Huella de Carbono',
            'description' => 'Realizamos la medición de huella de carbono en nuestros principales cultivos —soja, maíz y algodón— para conocer las emisiones generadas y el carbono capturado en el suelo, optimizando así el uso de insumos y la eficiencia productiva.'
        ],
        [
            'icon' => '🌾',
            'title' => 'Trazabilidad y Programas de Sustentabilidad',
            'description' => 'Implementamos trazabilidad digital con UCrop.it y participamos del programa ProCarbono de Bayer, garantizando transparencia, innovación y compromiso ambiental en cada lote.'
        ],
        [
            'icon' => '🧪',
            'title' => 'Manejo Responsable de Agroquímicos',
            'description' => 'Evaluamos el Índice de Impacto Ambiental de los Agroquímicos (EIQ) para seleccionar los productos más seguros, reduciendo riesgos sobre el ambiente, los trabajadores y la comunidad.'
        ],
        [
            'icon' => '♻️',
            'title' => 'Enmiendas Orgánicas y Mejora del Suelo',
            'description' => 'Incorporamos cama de pollo, digestato y digesto provenientes de plantas de biogás y etanol, aportando carbono y nutrientes naturales que mejoran la estructura, fertilidad y balance del suelo.'
        ]
    ];
}

/**
 * Genera el HTML de las cards de sustentabilidad
 * @return string HTML de las cards
 */
function generateSustentabilidadCardsHTML() {
    $data = getSustentabilidadData();
    $html = '<div class="sustentabilidad-cards">';
    
    foreach ($data as $item) {
        $html .= '<article class="sustentabilidad-card fade-in-up">';
        $html .= '<div class="card-icon">' . $item['icon'] . '</div>';
        $html .= '<h3>' . htmlspecialchars($item['title']) . '</h3>';
        $html .= '<p>' . htmlspecialchars($item['description']) . '</p>';
        $html .= '</article>';
    }
    
    $html .= '</div>';
    return $html;
}
?>
