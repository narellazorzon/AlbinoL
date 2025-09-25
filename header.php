<?php
  $title = $title ?? "Albino Luis Zorzon e hijos SH";
  $desc  = $desc  ?? "Empresa agropecuaria familiar: agricultura, ganadería, logística y maquinaria.";
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($desc) ?>">
  <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">
</head>
<body>
<header>
  <div class="header-container">
    <a href="index.php" class="logo">
      <img src="assets/images/logo.png" alt="Albino Luis Zorzon e hijos SH" class="logo-img">
      <span class="logo-text">Albino Luis Zorzon e hijos SH</span>
    </a>
    <nav>
      <a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Inicio</a>
      <a href="agricultura.php" class="<?= basename($_SERVER['PHP_SELF']) == 'agricultura.php' ? 'active' : '' ?>">Agricultura</a>
      <a href="ganaderia.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ganaderia.php' ? 'active' : '' ?>">Ganadería</a>
      <a href="maquinaria-logistica.php" class="<?= basename($_SERVER['PHP_SELF']) == 'maquinaria-logistica.php' ? 'active' : '' ?>">Maquinaria & Logística</a>
      <a href="nosotros.php" class="<?= basename($_SERVER['PHP_SELF']) == 'nosotros.php' ? 'active' : '' ?>">Nosotros</a>
      <a href="rrhh.php" class="<?= basename($_SERVER['PHP_SELF']) == 'rrhh.php' ? 'active' : '' ?>">RR.HH.</a>
      <a href="contacto.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contacto.php' ? 'active' : '' ?>">Contacto</a>
    </nav>
  </div>
</header>
<main>
