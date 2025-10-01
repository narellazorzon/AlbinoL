<?php
  if (!isset($config_loaded)) {
    require_once __DIR__ . '/../includes/config.php';
    $config_loaded = true;
  }
  
  $title = $title ?? SITE_NAME;
  $desc  = $desc  ?? "Empresa agropecuaria familiar: agricultura, ganadería, logística y maquinaria.";
  
  // Detectar si estamos en la carpeta pages/ para ajustar las rutas
  $isInPages = false;
  if (isset($_SERVER['REQUEST_URI'])) {
    $isInPages = strpos($_SERVER['REQUEST_URI'], '/pages/') !== false;
  } else {
    // Detectar por la ruta del archivo actual
    $currentFile = __FILE__;
    $isInPages = strpos($currentFile, '/pages/') !== false || strpos($currentFile, '\\pages\\') !== false;
  }
  $basePath = $isInPages ? '../' : '';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($desc) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $basePath ?>assets/css/style.css?v=<?= time() ?>">
</head>
<body>
<header>
  <div class="header-container">
    <a href="<?= $basePath ?>index.php" class="logo">
        <img src="<?= $basePath ?>assets/images/logo.png?v=<?= time() ?>" alt="Albino Luis Zorzon e hijos" class="logo-img">
      <div class="logo-text">
        <div class="company-name">Albino Luis Zorzon</div>
        <div class="company-suffix">e hijos</div>
      </div>
    </a>
    <button class="mobile-menu-toggle" aria-label="Abrir menú">
      <span></span>
      <span></span>
      <span></span>
    </button>
    
    <nav class="nav-menu">
      <a href="<?= $basePath ?>index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Inicio</a>
      <a href="<?= $basePath ?>pages/agricultura.php" class="<?= basename($_SERVER['PHP_SELF']) == 'agricultura.php' ? 'active' : '' ?>">Agricultura</a>
      <a href="<?= $basePath ?>pages/ganaderia.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ganaderia.php' ? 'active' : '' ?>">Ganadería</a>
      <a href="<?= $basePath ?>pages/nosotros.php" class="<?= basename($_SERVER['PHP_SELF']) == 'nosotros.php' ? 'active' : '' ?>">Nosotros</a>
      <a href="<?= $basePath ?>pages/contacto.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contacto.php' ? 'active' : '' ?>">Contacto</a>
    </nav>
  </div>
</header>
<main>
