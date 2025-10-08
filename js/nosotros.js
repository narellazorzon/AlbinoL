// Funciones para el modal de imágenes
function openModal(imageSrc, caption) {
  const modal = document.getElementById('imageModal');
  const modalImg = document.getElementById('modalImage');
  const modalCaption = document.getElementById('modalCaption');
  
  modal.style.display = 'block';
  modalImg.src = imageSrc;
  modalCaption.textContent = caption;
  
  // NO bloquear el scroll del body - permitir scroll libre
  // document.body.style.overflow = 'hidden'; // Comentado para permitir scroll
}

function closeModal() {
  const modal = document.getElementById('imageModal');
  modal.style.display = 'none';
  
  // NO es necesario restaurar scroll ya que no lo bloqueamos
  // document.body.style.overflow = 'auto';
}

// Event listeners cuando el DOM esté cargado
document.addEventListener('DOMContentLoaded', function() {
  // Cerrar modal al hacer clic fuera de la imagen
  document.getElementById('imageModal').onclick = function(event) {
    if (event.target === this) {
      closeModal();
    }
  }

  // Cerrar modal con tecla ESC
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      closeModal();
    }
  });

  // Prevenir que el modal se cierre al hacer clic en la imagen
  document.getElementById('modalImage').onclick = function(event) {
    event.stopPropagation();
  }

  // Prevenir que el modal se cierre al hacer clic en el caption
  document.getElementById('modalCaption').onclick = function(event) {
    event.stopPropagation();
  }
});
