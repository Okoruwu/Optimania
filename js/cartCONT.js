document.querySelectorAll('.form-agregar-carrito').forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        try {
            const response = await fetch('', {
                method: 'POST',
                body: new FormData(form)
            });

            const badge = document.querySelector('#cart-mini .badge');
            badge.textContent = <?= cantidadProductos() ?>;

            const button = form.querySelector('button');
            button.innerHTML = '<i class="fa fa-check mr-2"></i>¡Agregado!';
            button.classList.add('btn-success');
            button.classList.remove('btn-warning', 'btn-outline-warning');

            setTimeout(() => {
                button.innerHTML = '<i class="fa fa-cart-plus mr-2"></i>' +
                    (button.textContent.includes('Añadir') ? 'Añadir' : 'Agregar');
                button.classList.remove('btn-success');
                button.classList.add(button.classList.contains('btn-outline-warning') ?
                    'btn-outline-warning' : 'btn-warning');
            }, 2000);

        } catch (error) {
            console.error('Error:', error);
        }
    });
});