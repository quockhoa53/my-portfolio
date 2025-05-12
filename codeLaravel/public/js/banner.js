let currentIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    if (index < 0) {
        currentIndex = slides.length - 1; // Loop back to the last slide
    } else if (index >= slides.length) {
        currentIndex = 0; // Loop back to the first slide
    } else {
        currentIndex = index;
    }

    // Move the slides to show the current one
    const offset = -currentIndex * 100; // Each slide takes up 100% width
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}

function moveSlide(step) {
    showSlide(currentIndex + step);
}

// Initialize the first slide
showSlide(currentIndex);
