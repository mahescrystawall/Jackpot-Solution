import 'flowbite';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Splide from '@splidejs/splide';
import '@splidejs/splide/dist/css/themes/splide-sea-green.min.css';

function initializeSlider(selector, options = {}) {
    new Splide(selector, {
        arrows    : false, // Disable arrows
        pagination: false, // Disable pagination dots
        breakpoints : {
            1024 : { perPage: 2 }, // For larger screens
            600  : { perPage: 1 }, // For mobile screens
        },
        ...options          // merge passed options with defaults
    }).mount();
}

document.addEventListener('DOMContentLoaded', function () {
    initializeSlider('#splide-slider', {
        type       : 'loop', // Infinite loop
        perPage    : 3, // Number of slides per page
        perMove    : 1,  // Number of slides to move on arrow click
        gap        : '1rem', // Space between slides
        autoplay  : true, // Enable autoplay
        interval  : 5000, // Time between slide changes in ms
        loop       : false,
        autoplay  : true,            // Enable autoplay
        interval  : 2000,            // Set the time interval (in milliseconds) for the slide transition
    });
});
