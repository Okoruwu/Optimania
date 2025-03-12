const countDownDate = new Date().getTime() + (5 * 24 * 60 * 60 * 1000);

const timer = setInterval(() => {
    const now = new Date().getTime();
    const distance = countDownDate - now;

    document.getElementById('dias').innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
    document.getElementById('horas').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    document.getElementById('minutos').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    document.getElementById('segundos').innerText = Math.floor((distance % (1000 * 60)) / 1000);
}, 1000);


$(document).ready(function () {
    $('.promo-carousel').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});