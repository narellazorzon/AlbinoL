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
  <!-- Viewport optimizado para móviles (reduce Document Request Latency) -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($desc) ?>">
  <meta name="keywords" content="agricultura, ganadería, producción agropecuaria, Albino Luis Zorzon, La Lola Santa Fe, Reconquista , trigo, maíz, soja, girasol, algodón, Angus, Braford, Brangus, empresa familiar, campo argentino, siembra directa, agricultura de precisión, cría de ganado, engorde a corral, pastoreo rotativo, sanidad animal">
  
  <!-- Meta tags adicionales para optimización móvil -->
  <meta name="theme-color" content="#2d5016">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="format-detection" content="telephone=no">
  
  <!-- =============================================== -->
  <!-- OPTIMIZACIÓN MÓVIL - Document Request Latency -->
  <!-- =============================================== -->
  
  <!-- Preconnect crítico para recursos externos (reduce latencia DNS) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="//www.youtube-nocookie.com">
  
  <!-- Preload de recursos críticos para FCP/LCP -->
  <link rel="preload" href="<?= $basePath ?>assets/css/style_comp.css?v=<?= time() ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" href="<?= $basePath ?>assets/images/logo_comp.png?v=<?= time() ?>" as="image" fetchpriority="high">
  
  <!-- Preload de fuentes críticas -->
  <link rel="preload" href="https://fonts.gstatic.com/s/helvetica/v1/helvetica.woff2" as="font" type="font/woff2" crossorigin>
  
  <!-- Estilos críticos inline para FCP y LCP -->
  <style>
    /* Variables CSS críticas */
    :root {
      --primary-green: #2d5016;
      --secondary-green: #4a6b2a;
      --accent-green: #8b7355;
      --light-green: #a8b88a;
      --earth-brown: #5d4037;
      --warm-beige: #f5f1e8;
      --golden-wheat: #b8860b;
      --cream-white: #faf8f3;
      --text-dark: #2c2c2c;
      --text-light: #ffffff;
      --shadow: 0 4px 6px rgba(45,80,22,0.15);
      --shadow-hover: 0 8px 15px rgba(45,80,22,0.25);
      --gradient-primary: linear-gradient(110deg, #2d5016 0%, #4a6b2a 100%);
      --gradient-warm: linear-gradient(135deg, #8b7355 0%, #a8b88a 100%);
    }
    
    /* Reset y estilos base críticos */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      line-height: 1.6;
      color: var(--text-dark);
      background: var(--warm-beige);
      min-height: 100vh;
      font-weight: 400;
      letter-spacing: 0.01em;
    }
    
    /* Header crítico para FCP */
    header {
      background: linear-gradient(135deg, #e8edbe 0%, #4a6b2a 50%, #2d5016 100%);
      color: var(--text-light);
      padding: 1.2rem 0;
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    
    .header-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }
    
    .logo {
      font-size: 1.5rem;
      text-decoration: none;
      color: var(--text-light);
      display: flex;
      align-items: center;
      gap: 1rem;
      transition: all 0.3s ease;
    }
    
    .logo:hover {
      transform: scale(1.02);
      opacity: 0.9;
    }
    
    .logo-img {
      height: 80px;
      width: auto;
      object-fit: contain;
      transition: all 0.3s ease;
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
    }
    
    .logo-text {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      font-size: 1.8rem;
      line-height: 1.2;
      text-shadow: 0 1px 3px rgba(255,255,255,0.3);
      font-weight: 700;
      letter-spacing: 0.02em;
    }
    
    .logo-text .company-name {
      font-weight: 700;
      color: #2c1810;
      letter-spacing: 0.03em;
    }
    
    .logo-text .company-suffix {
      font-weight: 400;
      color: #5d4037;
      font-size: 1.4rem;
    }
    
    /* Navegación crítica */
    .nav-menu {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
      background: rgba(255,255,255,0.1);
      padding: 0.5rem 1rem;
      border-radius: 25px;
      backdrop-filter: blur(10px);
    }
    
    .nav-menu a {
      color: var(--text-light);
      text-decoration: none;
      font-family: 'Helvetica Neue', Arial, sans-serif;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 0.8rem 1.2rem;
      border-radius: 20px;
      transition: all 0.3s ease;
      text-shadow: 0 1px 2px rgba(0,0,0,0.3);
      letter-spacing: 0.02em;
      position: relative;
      overflow: hidden;
    }
    
    .nav-menu a:hover {
      background: rgba(255,255,255,0.15);
      transform: translateY(-2px);
      color: #ffffff;
    }
    
    .nav-menu a.active {
      background: rgba(255,255,255,0.2);
      color: #ffffff;
      font-weight: 600;
    }
    
    /* Main container crítico */
    main {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem;
    }
    
    /* Hero section crítico para LCP */
    .hero {
      position: relative;
      background: linear-gradient(rgba(45,80,22,0.85), rgba(74,107,42,0.85));
      color: var(--text-light);
      text-align: center;
      padding: 4rem 2rem;
      border-radius: 15px;
      margin-bottom: 3rem;
      box-shadow: var(--shadow);
      border: 2px solid var(--accent-green);
      overflow: hidden;
      min-height: 400px;
    }
    
    .hero video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
      background: linear-gradient(rgba(45,80,22,0.1), rgba(74,107,42,0.1));
    }
    
    .hero .hero-content {
      position: relative;
      z-index: 2;
    }
    
    .hero h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
      font-family: 'Helvetica Neue', Arial, sans-serif;
      font-weight: 700;
      letter-spacing: 0.02em;
    }
    
    .hero p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: 0 auto;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }
    
    /* Botones críticos */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.8rem 2rem;
      background: var(--gradient-warm);
      color: var(--text-light);
      text-decoration: none;
      border-radius: 25px;
      font-weight: 500;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      box-shadow: var(--shadow);
      position: relative;
      min-height: 44px;
    }
    
    .btn:hover {
      background: var(--gradient-primary);
      transform: translateY(-2px);
      box-shadow: var(--shadow-hover);
    }
    
    /* Mobile menu toggle crítico */
    .mobile-menu-toggle {
      display: none;
      flex-direction: column;
      justify-content: space-around;
      width: 30px;
      height: 30px;
      background: transparent;
      border: none;
      cursor: pointer;
      padding: 0;
      z-index: 1001;
    }
    
    .mobile-menu-toggle span {
      width: 100%;
      height: 3px;
      background: #ffffff;
      border-radius: 2px;
      transition: all 0.3s ease;
      transform-origin: center;
    }
    
    /* Secciones críticas para LCP */
    section {
      background: var(--cream-white);
      padding: 2rem;
      margin-bottom: 2rem;
      border-radius: 15px;
      box-shadow: var(--shadow);
      transition: transform 0.3s ease;
      border: 1px solid var(--warm-beige);
    }
    
    section h2 {
      color: var(--earth-brown);
      font-size: 2rem;
      margin-bottom: 1rem;
      text-align: center;
      position: relative;
      font-family: 'Helvetica Neue', Arial, sans-serif;
      font-weight: 600;
      letter-spacing: 0.02em;
    }
    
    section h2::after {
      content: '';
      display: block;
      width: 50px;
      height: 3px;
      background: var(--golden-wheat);
      margin: 0.5rem auto;
      border-radius: 2px;
    }
    
    section p {
      font-size: 1.1rem;
      line-height: 1.8;
      text-align: center;
      color: var(--text-dark);
    }
    
    /* Cards críticas */
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1.5rem;
      margin: 2rem 0;
    }
    
    .card {
      background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1), 0 4px 15px rgba(0,0,0,0.05);
      text-align: center;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      border: 1px solid rgba(45,80,22,0.1);
      max-width: 320px;
      margin: 0 auto;
      position: relative;
      overflow: hidden;
    }
    
    .card-icon {
      font-size: 2.5rem;
      margin-bottom: 1.5rem;
      display: block;
      background: linear-gradient(135deg, #2d5016 0%, #4a7c2d 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      filter: drop-shadow(0 2px 4px rgba(45,80,22,0.2));
      transition: all 0.3s ease;
    }
    
    .card h3 {
      color: #2d5016;
      font-size: 1.4rem;
      margin-bottom: 1rem;
      font-weight: 600;
      font-family: 'Helvetica Neue', Arial, sans-serif;
      text-shadow: 0 1px 3px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      letter-spacing: 0.01em;
    }
    
    .card p {
      color: #555;
      line-height: 1.6;
      margin-bottom: 1.5rem;
      font-size: 0.95rem;
      font-weight: 400;
      transition: all 0.3s ease;
    }
    
    /* Stats crítico */
    .stats {
      position: relative;
      background: var(--gradient-primary);
      color: var(--text-light);
      padding: 3rem 2rem;
      border-radius: 15px;
      text-align: center;
      margin: 2rem 0;
      border: 2px solid var(--accent-green);
      overflow: hidden;
      min-height: 300px;
    }
    
    .stats video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
      background: var(--gradient-primary);
    }
    
    .stats .stats-content {
      position: relative;
      z-index: 2;
    }
    
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }
    
    .stat-item {
      padding: 1rem;
    }
    
    .stat-number {
      font-size: 2.5rem;
      font-weight: bold;
      display: block;
      color: var(--golden-wheat);
      text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }
    
    .stat-label {
      font-size: 1rem;
      margin-top: 0.5rem;
    }
    
    /* Footer crítico */
    footer {
      background: var(--gradient-primary);
      color: var(--text-light);
      padding: 3rem 2rem 1rem;
      margin-top: 3rem;
      text-align: center;
      border-top: 3px solid var(--accent-green);
    }
    
    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-bottom: 2rem;
    }
    
    .footer-section h3 {
      color: var(--golden-wheat);
      margin-bottom: 1rem;
      font-size: 1.2rem;
      font-family: 'Helvetica Neue', Arial, sans-serif;
      font-weight: 600;
      letter-spacing: 0.02em;
    }
    
    .footer-section p, .footer-section a {
      color: rgba(255,255,255,0.9);
      text-decoration: none;
      line-height: 1.6;
    }
    
    .footer-section a:hover {
      color: var(--golden-wheat);
    }
    
    .footer-bottom {
      border-top: 1px solid rgba(255,255,255,0.2);
      padding-top: 1rem;
      margin-top: 2rem;
      color: rgba(255,255,255,0.8);
    }
    
    /* Responsive crítico */
    @media (max-width: 768px) {
      .header-container {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
      }
      
      .logo-img {
        height: 65px;
      }
      
      .logo-text {
        font-size: 1.4rem;
      }
      
      .mobile-menu-toggle {
        display: flex;
      }
      
      .nav-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 80%;
        max-width: 300px;
        height: 100vh;
        background: linear-gradient(135deg, #a8c66c 0%, #4a7c2d 100%);
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding: 5rem 2rem 2rem;
        gap: 1rem;
        transition: right 0.3s ease;
        z-index: 1000;
        box-shadow: -5px 0 15px rgba(0,0,0,0.3);
      }
      
      .nav-menu.active {
        right: 0;
      }
      
      .nav-menu a {
        width: 100%;
        text-align: center;
        padding: 1rem;
        font-size: 1.1rem;
        border-radius: 10px;
      }
      
      .hero h1 {
        font-size: 2rem;
      }
      
      .hero p {
        font-size: 1rem;
      }
      
      main {
        padding: 1rem;
      }
    }
    
    @media (max-width: 480px) {
      .header-container {
        padding: 0.8rem;
      }
      
      .logo-img {
        height: 55px;
      }
      
      .logo-text {
        font-size: 1.2rem;
      }
      
      .hero {
        padding: 1rem 0.8rem !important;
      }
      
      .hero h1 {
        font-size: 1.5rem !important;
      }
      
      .hero p {
        font-size: 0.9rem !important;
      }
    }
  </style>
  
  <!-- Carga diferida de CSS no crítico -->
  <link rel="preload" href="<?= $basePath ?>assets/css/style_comp.css?v=<?= time() ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="<?= $basePath ?>assets/css/style_comp.css?v=<?= time() ?>"></noscript>
</head>
<body>
<header>
  <div class="header-container">
    <a href="<?= $basePath ?>index.php" class="logo">
        <img src="<?= $basePath ?>assets/images/logo_comp.png?v=<?= time() ?>" alt="" class="logo-img">
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
