<?php
require_once __DIR__ . '/includes/config.php';

$title = "Página no encontrada - Albino Luis Zorzon";
$desc = "La página que buscas no existe. Regresa al inicio de nuestro sitio web.";
include __DIR__ . "/partials/header.php";
?>

<!-- Hero Section 404 -->
<div class="hero-404 fade-in-up">
  <div class="hero-404-content">
    <!-- Logo de la empresa -->
    <div class="logo-404">
      <img src="assets/images/logo_empresa_comp.webp" alt="Albino Luis Zorzon e hijos" class="logo-404-img">
    </div>
    
    <!-- Título principal -->
    <h1 class="error-title">404</h1>
    <h2 class="error-subtitle">Página no encontrada</h2>
    
    <!-- Explicación del error -->
    <div class="error-explanation">
      <p class="error-description">
        Lo sentimos, la página que buscas no existe o ha sido movida. 
        Esto puede suceder cuando:
      </p>
      <ul class="error-reasons">
        <li>La URL fue escrita incorrectamente</li>
        <li>La página fue eliminada o reubicada</li>
        <li>El enlace que seguiste está desactualizado</li>
      </ul>
    </div>
    
    <!-- Botones de acción -->
    <div class="error-actions">
      <a href="index.php" class="btn btn-primary">🏠 Volver al inicio</a>
      <a href="contacto.php" class="btn btn-secondary">📞 Contactarnos</a>
    </div>
  </div>
  
  <!-- Elementos decorativos -->
  <div class="error-decorations">
    <div class="decoration-1">🌾</div>
    <div class="decoration-2">🚜</div>
    <div class="decoration-3">🐄</div>
  </div>
</div>

<!-- Sección de ayuda -->
<section class="help-section fade-in-up">
  <div class="help-container">
    <h2>¿En qué podemos ayudarte?</h2>
    <div class="help-cards">
      <div class="help-card">
        <div class="help-icon">🌱</div>
        <h3>Agricultura</h3>
        <p>Producción sustentable de cereales y oleaginosas</p>
        <a href="agricultura.php" class="help-link">Ver más →</a>
      </div>
      
      <div class="help-card">
        <div class="help-icon">🐄</div>
        <h3>Ganadería</h3>
        <p>Cría y engorde de ganado bovino</p>
        <a href="ganaderia.php" class="help-link">Ver más →</a>
      </div>
      
      <div class="help-card">
        <div class="help-icon">👥</div>
        <h3>Nosotros</h3>
        <p>Conoce nuestra historia y valores</p>
        <a href="nosotros.php" class="help-link">Ver más →</a>
      </div>
      
      <div class="help-card">
        <div class="help-icon">📞</div>
        <h3>Contacto</h3>
        <p>Estamos aquí para ayudarte</p>
        <a href="contacto.php" class="help-link">Ver más →</a>
      </div>
    </div>
  </div>
</section>

<style>
/* Estilos para la página 404 */
.hero-404 {
  background: linear-gradient(135deg, #2d5016 0%, #4a6b2a 50%, #8b7355 100%);
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
  color: #ffffff;
  text-align: center;
  padding: 2rem;
}

.hero-404-content {
  position: relative;
  z-index: 2;
  max-width: 800px;
}

.logo-404 {
  margin-bottom: 2rem;
}

.logo-404-img {
  height: 80px;
  width: auto;
  filter: brightness(0) invert(1);
}

.error-title {
  font-size: 8rem;
  font-weight: 900;
  margin: 0;
  text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
  line-height: 1;
}

.error-subtitle {
  font-size: 2.5rem;
  font-weight: 600;
  margin: 1rem 0 2rem 0;
  color: #f0f0f0;
}

.error-explanation {
  background: rgba(255, 255, 255, 0.1);
  padding: 2rem;
  border-radius: 15px;
  margin: 2rem 0;
  backdrop-filter: blur(10px);
}

.error-description {
  font-size: 1.2rem;
  margin-bottom: 1.5rem;
  line-height: 1.6;
}

.error-reasons {
  text-align: left;
  max-width: 500px;
  margin: 0 auto;
  font-size: 1.1rem;
  line-height: 1.8;
}

.error-reasons li {
  margin-bottom: 0.5rem;
  position: relative;
  padding-left: 1.5rem;
}

.error-reasons li::before {
  content: "•";
  color: #a8b88a;
  font-weight: bold;
  position: absolute;
  left: 0;
}

.error-actions {
  margin-top: 3rem;
  display: flex;
  gap: 1.5rem;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-primary {
  background: #ffffff;
  color: #2d5016;
  padding: 1rem 2rem;
  border-radius: 50px;
  text-decoration: none;
  font-weight: 600;
  font-size: 1.1rem;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
  color: #1a3009;
}

.btn-secondary {
  background: transparent;
  color: #ffffff;
  border: 2px solid #ffffff;
  padding: 1rem 2rem;
  border-radius: 50px;
  text-decoration: none;
  font-weight: 600;
  font-size: 1.1rem;
  transition: all 0.3s ease;
}

.btn-secondary:hover {
  background: #ffffff;
  color: #2d5016;
  transform: translateY(-2px);
}

.error-decorations {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
}

.decoration-1, .decoration-2, .decoration-3 {
  position: absolute;
  font-size: 4rem;
  opacity: 0.1;
  animation: float 6s ease-in-out infinite;
}

.decoration-1 {
  top: 20%;
  left: 10%;
  animation-delay: 0s;
}

.decoration-2 {
  top: 60%;
  right: 15%;
  animation-delay: 2s;
}

.decoration-3 {
  bottom: 20%;
  left: 20%;
  animation-delay: 4s;
}

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-20px) rotate(10deg); }
}

.help-section {
  padding: 4rem 2rem;
  background: #faf8f3;
}

.help-container {
  max-width: 1200px;
  margin: 0 auto;
  text-align: center;
}

.help-container h2 {
  font-size: 2.5rem;
  color: #2d5016;
  margin-bottom: 3rem;
}

.help-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
}

.help-card {
  background: #ffffff;
  padding: 2rem;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  border: 1px solid #e9ecef;
}

.help-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.help-icon {
  font-size: 3rem;
  margin-bottom: 1rem;
  display: block;
}

.help-card h3 {
  color: #2d5016;
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

.help-card p {
  color: #666;
  margin-bottom: 1.5rem;
  line-height: 1.6;
}

.help-link {
  color: #2d5016;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s ease;
}

.help-link:hover {
  color: #1a3009;
}

/* Responsive */
@media (max-width: 768px) {
  .error-title {
    font-size: 6rem;
  }
  
  .error-subtitle {
    font-size: 2rem;
  }
  
  .error-actions {
    flex-direction: column;
    align-items: center;
  }
  
  .btn-primary, .btn-secondary {
    width: 100%;
    max-width: 300px;
  }
  
  .help-cards {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include __DIR__ . "/partials/footer.php"; ?>
