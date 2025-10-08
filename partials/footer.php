</main>
<?php
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
<footer>
  <div class="footer-content">
    <div class="footer-section">
      <h3>Albino Luis Zorzon e hijos</h3>
      <p>Empresa familiar dedicada a la producción agropecuaria de alto rendimiento, con más de cinco décadas de experiencia en el sector.</p>
    </div>
    
    <div class="footer-section">
      <h3>📍 Ubicación</h3>
      <p><?= SITE_ADDRESS ?><br>
      <?= SITE_CITY ?><br>
      <?= SITE_COUNTRY ?></p>
    </div>
    
        <div class="footer-section">
          <h3>📧 Contacto</h3>
          <p>Email: <?= SITE_EMAIL ?></p>
        </div>
    
    <div class="footer-section">
      <h3>🔗 Enlaces</h3>
      <p>
        <a href="<?= $basePath ?>pages/agricultura.php">Agricultura</a><br>
        <a href="<?= $basePath ?>pages/ganaderia.php">Ganadería</a><br>
        <a href="<?= $basePath ?>pages/contacto.php">Contacto</a>
      </p>
    </div>
  </div>
  
  <div class="footer-bottom">
    <p>© <?= date('Y') ?> <?= SITE_NAME ?> — Todos los derechos reservados.</p>
  </div>
</footer>
<script src="<?= $basePath ?>assets/js/app.js"></script>
<script>
// Menú hamburguesa
document.addEventListener('DOMContentLoaded', function() {
  const mobileToggle = document.querySelector('.mobile-menu-toggle');
  const navMenu = document.querySelector('.nav-menu');
  
  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', function() {
      mobileToggle.classList.toggle('active');
      navMenu.classList.toggle('active');
    });
    
    // Cerrar menú al hacer clic en un enlace
    const navLinks = navMenu.querySelectorAll('a');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        mobileToggle.classList.remove('active');
        navMenu.classList.remove('active');
      });
    });
    
    // Cerrar menú al hacer clic fuera
    document.addEventListener('click', function(e) {
      if (!mobileToggle.contains(e.target) && !navMenu.contains(e.target)) {
        mobileToggle.classList.remove('active');
        navMenu.classList.remove('active');
      }
    });
  }
});
</script>
</body>
</html>
