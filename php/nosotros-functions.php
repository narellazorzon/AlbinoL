<?php
/**
 * Funciones específicas para la página Nosotros
 * Albino Luis Zorzon e Hijos
 */

/**
 * Obtiene las imágenes de la galería histórica
 * @return array Array de imágenes con sus metadatos
 */
function getGalleryImages() {
    return [
        [
            'src' => '../assets/images/imagenes_albino_page-0002_small.webp',
            'alt' => 'Historia familiar Albino Luis Zorzon',
            'caption' => 'Historia familiar Albino Luis Zorzon',
            'label' => 'Campo La Lola, Santa Fe'
        ],
        [
            'src' => '../assets/images/imagenes_albino_page-0004_small.webp',
            'alt' => 'Cosecha de tabaco y producción agropecuaria',
            'caption' => 'Tabaco y producción agropecuaria',
            'label' => 'Cosecha de tabaco'
        ],
        [
            'src' => '../assets/images/imagenes_albino_page-0008_small.webp',
            'alt' => 'Producción agropecuaria familiar',
            'caption' => 'Producción agropecuaria familiar',
            'label' => 'Campo familiar'
        ],
        [
            'src' => '../assets/images/imagenes_albino_page-0009_small.webp',
            'alt' => 'Tradición en el campo',
            'caption' => 'Tradición en el campo',
            'label' => 'Tradición y modernidad'
        ],
        [
            'src' => '../assets/images/imagenes_albino_page-0010_small.webp',
            'alt' => 'Compromiso con la tierra y la familia',
            'caption' => 'Compromiso con la tierra y la familia',
            'label' => 'Compromiso familiar'
        ]
    ];
}

/**
 * Obtiene los valores de la empresa
 * @return array Array de valores con iconos y descripciones
 */
function getCompanyValues() {
    return [
        [
            'icon' => '🌱',
            'title' => 'Sustentabilidad',
            'description' => 'Compromiso con prácticas agrícolas y ganaderas que respetan el medio ambiente.'
        ],
        [
            'icon' => '👨‍👩‍👧‍👦',
            'title' => 'Tradición Familiar',
            'description' => 'Más de cinco décadas de experiencia transmitida de generación en generación.'
        ],
        [
            'icon' => '🚜',
            'title' => 'Innovación',
            'description' => 'Adopción de tecnologías modernas para optimizar la producción agropecuaria.'
        ]
    ];
}

/**
 * Obtiene las certificaciones de la empresa
 * @return array Array de certificaciones
 */
function getCertifications() {
    return [
        'Certificación de Buenas Prácticas Agrícolas',
        'Trazabilidad completa del ganado',
        'Manejo integrado de plagas',
        'Uso responsable de agroquímicos',
        'Conservación del suelo'
    ];
}

/**
 * Genera el HTML de la galería de imágenes
 * @return string HTML de la galería
 */
function generateGalleryHTML() {
    $images = getGalleryImages();
    $html = '<div class="gallery-container" style="margin: 2rem 0; position: relative;">';
    $html .= '<div class="gallery-wrapper" style="overflow-x: auto; overflow-y: hidden; scroll-behavior: smooth; padding: 15px 0; scrollbar-width: thin; scrollbar-color: var(--primary-color) transparent;">';
    $html .= '<div class="gallery-track" style="display: flex; gap: 1.5rem; padding: 0 2rem; min-width: max-content; align-items: center;">';
    
    foreach ($images as $image) {
        $html .= '<div class="gallery-item" onclick="openModal(\'' . $image['src'] . '\', \'' . $image['caption'] . '\')" style="cursor: pointer; flex-shrink: 0; width: 280px; height: 200px; position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;">';
        $html .= '<img src="' . $image['src'] . '" alt="' . $image['alt'] . '" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform=\'scale(1.05)\'" onmouseout="this.style.transform=\'scale(1)\'">';
        $html .= '<div class="gallery-label" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 15px; font-size: 14px; font-weight: 500; opacity: 0; transform: translateY(100%); transition: all 0.3s ease;">' . $image['label'] . '</div>';
        $html .= '</div>';
    }
    
    $html .= '</div></div>';
    $html .= '<div style="text-align: center; margin-top: 1.5rem; color: var(--text-light); font-size: 14px;">';
    $html .= '<span style="background: var(--primary-color); color: #8B4513; padding: 8px 16px; border-radius: 20px; font-weight: 500;">← Desliza para ver más imágenes →</span>';
    $html .= '</div></div>';
    
    return $html;
}

/**
 * Genera el HTML de los valores de la empresa
 * @return string HTML de los valores
 */
function generateValuesHTML() {
    $values = getCompanyValues();
    $html = '<div class="cards-grid">';
    
    foreach ($values as $value) {
        $html .= '<div class="card">';
        $html .= '<span class="card-icon">' . $value['icon'] . '</span>';
        $html .= '<h3>' . $value['title'] . '</h3>';
        $html .= '<p>' . $value['description'] . '</p>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}
?>
