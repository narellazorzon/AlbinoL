<?php
// Archivo de prueba para verificar cambios
echo "<h1>🧪 Test de Cambios - " . date('Y-m-d H:i:s') . "</h1>";

echo "<h2>✅ Archivos modificados recientemente:</h2>";
$files = [
    'index.php',
    'pages/agricultura.php', 
    'pages/ganaderia.php',
    'pages/nosotros.php',
    'pages/contacto.php',
    '.htaccess'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        $time = filemtime($file);
        echo "<p>📄 $file - Última modificación: " . date('Y-m-d H:i:s', $time) . "</p>";
    } else {
        echo "<p>❌ $file - No encontrado</p>";
    }
}

echo "<h2>🔗 URLs amigables:</h2>";
echo "<p><a href='agricultura'>Agricultura</a></p>";
echo "<p><a href='ganaderia'>Ganadería</a></p>";
echo "<p><a href='nosotros'>Nosotros</a></p>";
echo "<p><a href='contacto'>Contacto</a></p>";

echo "<h2>📊 Información del servidor:</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Server: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p>Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
?>
