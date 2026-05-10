document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('actualizar');
  const msg = document.getElementById('mensaje');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    msg.textContent = 'Verificando...';
    msg.style.color = 'gray';

    const formData = new FormData(form);
    try {
      
      const response = await fetch('http://localhost/inventario2/controller/actualizar/controller_actualiar.php?valor=actualizar', {
        method: 'POST',
        body: formData
      });

      const data = await response.json();

      if (data.success) {
        msg.textContent = '✅ ' + data.message;
        msg.style.color = 'green';
        setTimeout(() => {
          window.location.href = data.redirect;
        }, 1000);
      } else {
        msg.textContent = '❌ ' + data.message;
        msg.style.color = 'red';
      }
    } catch (err) {
      msg.textContent = 'Error de conexión o servidor.';
      msg.style.color = 'red';
      console.error(err);
    }
  });
});
