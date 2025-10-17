<?php
require_once __DIR__ . '/../includes/config.php';

// Obtener parámetros de la URL
$status = isset($_GET['status']) ? $_GET['status'] : 'success';
$message = isset($_GET['message']) ? urldecode($_GET['message']) : 'Mensaje enviado correctamente';

$title_page = $status === 'success' ? 'Mensaje Enviado' : 'Error en el Envío';
$class = $status === 'success' ? 'success' : 'error';
$icon = $status === 'success' ? '✅' : '❌';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación - Albino Luis Zorzon</title>
    <link rel="icon" href="https://albinozorzonehijos.com.ar/assets/images/favicon.png" type="image/png">
    <style>
* { margin: 0; padding: 0; box-sizing: border-box; }

body { 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    background: linear-gradient(135deg, #2d5016 0%, #4a6b2a 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    position: relative;
    overflow: hidden;
}

body::before {
    content: '🌱 🌿 🌾 🌻  🌻 🌱 🌿 🌾 🌻  🌻 🌱 🌿 🌾 🌻';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-size: 24px;
    opacity: 0.1;
    animation: float 20s infinite linear;
    pointer-events: none;
    z-index: 0;
}

@keyframes float {
    0% { transform: translateY(100vh) rotate(0deg); }
    100% { transform: translateY(-100vh) rotate(360deg); }
}

.container { 
    max-width: 500px; 
    width: 100%;
    background: white; 
    padding: 40px; 
    border-radius: 20px; 
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    text-align: center;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #2d5016, #4a6b2a);
}

.icon { 
    font-size: 64px; 
    margin-bottom: 20px;
    display: block;
    animation: bounce 0.6s ease-in-out;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

h1 { 
    color: #2c3e50; 
    margin-bottom: 20px; 
    font-size: 28px;
    font-weight: 600;
}

.message { 
    padding: 20px; 
    border-radius: 12px; 
    margin: 25px 0; 
    font-size: 16px;
    line-height: 1.5;
}

.success { 
    background: linear-gradient(135deg, #d4edda, #c3e6cb); 
    border: 1px solid #c3e6cb; 
    color: #155724;
    box-shadow: 0 4px 15px rgba(21, 87, 36, 0.1);
}

.error { 
    background: linear-gradient(135deg, #f8d7da, #f5c6cb); 
    border: 1px solid #f5c6cb; 
    color: #721c24;
    box-shadow: 0 4px 15px rgba(114, 28, 36, 0.1);
}

.btn { 
    display: inline-block; 
    padding: 14px 28px; 
    margin: 8px; 
    background: linear-gradient(135deg, #2d5016, #4a6b2a);
    color: #f5f1e8; 
    text-decoration: none; 
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(45, 80, 22, 0.3);
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.btn:hover { 
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(45, 80, 22, 0.4);
    background: linear-gradient(135deg, #4a6b2a, #2d5016);
}

.btn:active {
    transform: translateY(0);
}

.btn-secondary {
    background: linear-gradient(135deg, #f5f1e8, #e6e0d4);
    color: #2d5016;
    box-shadow: 0 4px 15px rgba(245, 241, 232, 0.3);
}

.btn-secondary:hover {
    background: linear-gradient(135deg, #e6e0d4, #d4d0c4);
    color: #4a6b2a;
    box-shadow: 0 6px 20px rgba(245, 241, 232, 0.4);
}

.buttons-container {
    margin-top: 30px;
}

/* Responsive Design */
@media (max-width: 768px) {
    body { padding: 15px; }
    .container { 
        padding: 30px 25px; 
        margin: 20px auto;
        max-width: 90%;
    }
    h1 { font-size: 26px; }
    .icon { font-size: 56px; }
    .message { padding: 18px; font-size: 15px; }
    .btn { 
        padding: 12px 24px; 
        margin: 6px; 
        font-size: 13px;
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }
    .buttons-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
}

@media (max-width: 480px) {
    body { padding: 10px; }
    .container { 
        padding: 25px 20px; 
        margin: 10px auto;
        max-width: 95%;
        border-radius: 15px;
    }
    h1 { font-size: 22px; margin-bottom: 15px; }
    .icon { font-size: 48px; margin-bottom: 15px; }
    .message { 
        padding: 15px; 
        font-size: 14px; 
        margin: 20px 0;
        border-radius: 8px;
    }
    .btn { 
        padding: 14px 20px; 
        margin: 5px 0; 
        font-size: 13px;
        border-radius: 20px;
    }
    .buttons-container {
        margin-top: 25px;
    }
}

@media (max-width: 360px) {
    .container { 
        padding: 20px 15px; 
        margin: 5px auto;
    }
    h1 { font-size: 20px; }
    .icon { font-size: 40px; }
    .message { 
        padding: 12px; 
        font-size: 13px; 
    }
    .btn { 
        padding: 12px 18px; 
        font-size: 12px;
    }
}

/* Landscape orientation for mobile */
@media (max-height: 500px) and (orientation: landscape) {
    body { padding: 10px; }
    .container { 
        padding: 20px; 
        margin: 10px auto;
    }
    .icon { font-size: 40px; margin-bottom: 10px; }
    h1 { font-size: 20px; margin-bottom: 10px; }
    .message { padding: 12px; margin: 15px 0; }
    .buttons-container { margin-top: 15px; }
}
</style>

<div class="container">
    <div class="icon"><?= $icon ?></div>
    <h1><?= $title_page ?></h1>
    <div class="message <?= $class ?>">
        <strong><?= htmlspecialchars($message) ?></strong>
    </div>
    <div class="buttons-container">
        <a href="contacto.php" class="btn">Volver al Formulario</a>
        <a href="../index.php" class="btn btn-secondary">Ir al Inicio</a>
    </div>
</div>

</body>
</html>
