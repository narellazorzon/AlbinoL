<?php
echo "<h1>🔍 Diagnóstico de Modo Mantenimiento</h1>";
echo "<p><strong>Fecha/Hora:</strong> " . date('Y-m-d H:i:s') . "</p>";

echo "<h2>📄 Verificar .htaccess:</h2>";
if (file_exists('.htaccess')) {
    $htaccess = file_get_contents('.htaccess');
    
    // Buscar líneas de mantenimiento
    $maintenance_lines = [
        'RewriteCond %{REMOTE_ADDR} !^190\.2\.96\.145$',
        'RewriteRule ^(.*)$ /maintenance.html [R=302,L]'
    ];
    
    foreach ($maintenance_lines as $line) {
        if (strpos($htaccess, $line) !== false) {
            if (strpos($htaccess, '# ' . $line) !== false) {
                echo "<p>✅ <code>$line</code> - <strong>COMENTADA</strong> (Mantenimiento DESACTIVADO)</p>";
            } else {
                echo "<p>❌ <code>$line</code> - <strong>ACTIVA</strong> (Mantenimiento ACTIVO)</p>";
            }
        } else {
            echo "<p>⚠️ <code>$line</code> - No encontrada</p>";
        }
    }
} else {
    echo "<p>❌ Archivo .htaccess no encontrado</p>";
}

echo "<h2>🌐 URLs de prueba:</h2>";
echo "<p><a href='/' target='_blank'>Página principal</a></p>";
echo "<p><a href='agricultura' target='_blank'>Agricultura</a></p>";
echo "<p><a href='ganaderia' target='_blank'>Ganadería</a></p>";

echo "<h2>📊 Información del servidor:</h2>";
echo "<p><strong>Server:</strong> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'No disponible') . "</p>";
echo "<p><strong>Document Root:</strong> " . ($_SERVER['DOCUMENT_ROOT'] ?? 'No disponible') . "</p>";
echo "<p><strong>Script Name:</strong> " . ($_SERVER['SCRIPT_NAME'] ?? 'No disponible') . "</p>";

echo "<h2>🔄 Instrucciones:</h2>";
echo "<ol>";
echo "<li>Si ves 'COMENTADA' arriba, el mantenimiento está DESACTIVADO</li>";
echo "<li>Si ves 'ACTIVA' arriba, el mantenimiento está ACTIVO</li>";
echo "<li>Prueba los enlaces para verificar que funcionan</li>";
echo "<li>Si los usuarios siguen viendo mantenimiento, puede ser caché del servidor</li>";
echo "</ol>";
?>
