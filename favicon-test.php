<?php
// Archivo de diagnóstico para el favicon
echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Diagnóstico Favicon</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; padding: 2rem; }";
echo ".test-box { border: 2px solid #2d5016; padding: 1rem; margin: 1rem 0; border-radius: 10px; }";
echo "</style>";
echo "</head>";
echo "<body>";

echo "<h1>🔍 Diagnóstico del Favicon</h1>";

// Verificar si el archivo existe
$favicon_path = "assets/images/favicon.png";
if (file_exists($favicon_path)) {
    echo "<div class='test-box' style='background: #d4edda;'>";
    echo "<h2>✅ Archivo encontrado</h2>";
    echo "<p><strong>Ruta:</strong> $favicon_path</p>";
    echo "<p><strong>Tamaño:</strong> " . filesize($favicon_path) . " bytes</p>";
    echo "<p><strong>Fecha modificación:</strong> " . date('Y-m-d H:i:s', filemtime($favicon_path)) . "</p>";
    echo "</div>";
} else {
    echo "<div class='test-box' style='background: #f8d7da;'>";
    echo "<h2>❌ Archivo NO encontrado</h2>";
    echo "<p><strong>Ruta buscada:</strong> $favicon_path</p>";
    echo "</div>";
}

// Verificar directorio
echo "<div class='test-box'>";
echo "<h2>📁 Contenido del directorio assets/images/</h2>";
$files = scandir("assets/images/");
echo "<ul>";
foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        $highlight = ($file == 'favicon.png') ? " style='background: yellow;'" : "";
        echo "<li$highlight>$file</li>";
    }
}
echo "</ul>";
echo "</div>";

// Mostrar el favicon directamente
echo "<div class='test-box'>";
echo "<h2>🖼️ Imagen del Favicon</h2>";
echo "<p>Si puedes ver la imagen abajo, el archivo está bien:</p>";
echo "<img src='$favicon_path' alt='Favicon' style='border: 2px solid #ccc; max-width: 64px; max-height: 64px;'>";
echo "</div>";

// Mostrar las rutas absolutas
echo "<div class='test-box'>";
echo "<h2>📍 Rutas del Sistema</h2>";
echo "<p><strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p><strong>Script Name:</strong> " . $_SERVER['SCRIPT_NAME'] . "</p>";
echo "<p><strong>Ruta absoluta del favicon:</strong> " . realpath($favicon_path) . "</p>";
echo "</div>";

// Mostrar el HTML del favicon
echo "<div class='test-box'>";
echo "<h2>🔗 Código HTML del Favicon</h2>";
echo "<p>Este es el código que debería estar en el &lt;head&gt;:</p>";
echo "<pre>";
echo "&lt;link rel=\"icon\" type=\"image/png\" href=\"$favicon_path\"&gt;\n";
echo "&lt;link rel=\"apple-touch-icon\" href=\"$favicon_path\"&gt;";
echo "</pre>";
echo "</div>";

echo "<p><a href='index.php'>← Volver al sitio</a></p>";
echo "</body>";
echo "</html>";
?>
