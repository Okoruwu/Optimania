document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', (e) => {
        if (e.target.value < 1) e.target.value = 1;
    });
});