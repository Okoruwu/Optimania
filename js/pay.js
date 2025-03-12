document.querySelectorAll('input[name="metodo_pago"]').forEach(radio => {
    radio.addEventListener('change', (e) => {
        document.querySelectorAll('.metodo-pago').forEach(div => {
            div.classList.remove('active');
        });
        e.target.closest('.metodo-pago').classList.add('active');
    });
});