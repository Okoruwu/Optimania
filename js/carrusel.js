let currentIndex = 0;

function moveSlide(direction) {
    const carouselInner = document.querySelector(".carousel-inner");
    const totalItems = document.querySelectorAll(".carousel-item").length;

    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = totalItems - 1;
    } else if (currentIndex >= totalItems) {
        currentIndex = 0;
    }

    const offset = -currentIndex * 100;
    carouselInner.style.transform = `translateX(${offset}%)`;
}