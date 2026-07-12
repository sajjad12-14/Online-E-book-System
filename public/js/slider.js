const slides = document.querySelectorAll(".book-slide");

let current = 0;

setInterval(() => {

    slides[current].classList.remove("d-block");
    slides[current].classList.add("d-none");

    current++;

    if (current >= slides.length) {
        current = 0;
    }

    slides[current].classList.remove("d-none");
    slides[current].classList.add("d-block");

}, 200);