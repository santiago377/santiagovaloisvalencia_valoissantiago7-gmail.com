document.addEventListener('DOMContentLoaded', () => {

    const mensaje = document.getElementById('mensaje');

    const botones = document.querySelectorAll('.inactivar-btn');

    botones.forEach(boton => {

        boton.addEventListener('click', async () => {

            const id = boton.dataset.id;

            if (!confirm("¿Deseas eliminar este producto?")) return;

            const formData = new FormData();
            formData.append('id', id);

            try {

                const response = await fetch(
                    'http://localhost/inventario2/controller/eliminar/controller_eliminar.php?valor=eliminar',
                    {
                        method: 'POST',
                        body: formData
                    }
                );

                const data = await response.json();

                if (data.success) {

                    mensaje.textContent = "✅ Producto eliminado correctamente";
                    mensaje.style.color = "green";

                    setTimeout(() => {
                        location.reload();
                    }, 1200);

                } else {

                    mensaje.textContent = "❌ " + data.message;
                    mensaje.style.color = "red";
                }

            } catch (error) {

                mensaje.textContent = "❌ Error al conectar con el servidor";
                mensaje.style.color = "red";

                console.error(error);
            }

        });

    });

});