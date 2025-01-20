 
var swiper = new Swiper(".slide-content", {
  slidesPerView: 1,
  spaceBetween: 25,
  loop: true,
  centeredSlides: true, // Center the slides
  effect: 'fade', // Use fade effect
  grabCursor: true, // Enable grab cursor

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
      0: {
          slidesPerView: 1,
      },
      520: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 3,
      },
  },

  // Optional: Add fade effect options if needed
  fadeEffect: {
    crossFade: true,
  },
});
