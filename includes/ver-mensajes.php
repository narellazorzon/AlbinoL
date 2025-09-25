<?php
/**
 * Script para revisar mensajes de contacto
 * Accede desde: http://localhost/AlbinoL/includes/ver-mensajes.php
 */

// Protección básica (puedes agregar autenticación)
$mensajes_dir = __DIR__ . '/mensajes';
$log_file = __DIR__ . '/contactos.log';

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Mensajes de Contacto - Albino Luis Zorzon</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #2d5016; color: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; }
        .mensaje { border: 1px solid #ddd; margin: 10px 0; padding: 15px; border-radius: 5px; background: #f9f9f9; }
        .mensaje h3 { color: #2d5016; margin-top: 0; }
        .mensaje .meta { color: #666; font-size: 0.9em; margin-bottom: 10px; }
        .mensaje .content { white-space: pre-wrap; }
        .stats { background: #e8f5e8; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .refresh { background: #2d5016; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .refresh:hover { background: #1a3009; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>📧 Mensajes de Contacto</h1>
            <p>Albino Luis Zorzon e hijos - Sitio Web</p>
        </div>";

// Mostrar estadísticas
$total_mensajes = 0;
if (is_dir($mensajes_dir)) {
    $archivos = glob($mensajes_dir . '/*.txt');
    $total_mensajes = count($archivos);
}

echo "<div class='stats'>
    <h3>📊 Estadísticas</h3>
    <p><strong>Total de mensajes:</strong> $total_mensajes</p>
    <p><strong>Última actualización:</strong> " . date('d/m/Y H:i:s') . "</p>
    <button class='refresh' onclick='location.reload()'>🔄 Actualizar</button>
</div>";

// Mostrar mensajes
if (is_dir($mensajes_dir)) {
    $archivos = glob($mensajes_dir . '/*.txt');
    rsort($archivos); // Más recientes primero
    
    if (empty($archivos)) {
        echo "<p>No hay mensajes aún.</p>";
    } else {
        foreach ($archivos as $archivo) {
            $contenido = file_get_contents($archivo);
            $nombre_archivo = basename($archivo);
            
            // Extraer información del mensaje
            $lineas = explode("\n", $contenido);
            $fecha = isset($lineas[1]) ? trim(str_replace('Fecha:', '', $lineas[1])) : 'No disponible';
            $nombre = isset($lineas[6]) ? trim(str_replace('- Nombre:', '', $lineas[6])) : 'No disponible';
            $email = isset($lineas[7]) ? trim(str_replace('- Email:', '', $lineas[7])) : 'No disponible';
            $asunto = isset($lineas[9]) ? trim(str_replace('- Asunto:', '', $lineas[9])) : 'No disponible';
            
            // Encontrar el mensaje (después de "Mensaje:")
            $mensaje_inicio = false;
            $mensaje_contenido = '';
            foreach ($lineas as $linea) {
                if (strpos($linea, 'Mensaje:') !== false) {
                    $mensaje_inicio = true;
                    continue;
                }
                if ($mensaje_inicio && trim($linea) !== '') {
                    $mensaje_contenido .= $linea . "\n";
                }
            }
            
            echo "<div class='mensaje'>
                <h3>📨 $asunto</h3>
                <div class='meta'>
                    <strong>De:</strong> $nombre ($email)<br>
                    <strong>Fecha:</strong> $fecha<br>
                    <strong>Archivo:</strong> $nombre_archivo
                </div>
                <div class='content'>" . htmlspecialchars(trim($mensaje_contenido)) . "</div>
            </div>";
        }
    }
} else {
    echo "<p>No se encontró el directorio de mensajes.</p>";
}

echo "</div></body></html>";
?>
