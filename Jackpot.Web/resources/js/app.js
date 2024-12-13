import 'flowbite';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Splide from '@splidejs/splide';
import '@splidejs/splide/dist/css/themes/splide-sea-green.min.css';

function initializeSlider(selector, options = {}) {
    new Splide(selector, {
        pagination: false, // Disable pagination dots
        ...options          // merge passed options with defaults
    }).mount();
}

document.addEventListener('DOMContentLoaded', function () {
    initializeSlider('#menu-slider', {
        type      : 'slide',      // Infinite loop
        arrows    : false, // Disable arrows
        autoWidth : true,        // Automatically determine width based on content       
    });

    initializeSlider('#casino-popular-live-sports', {
        type       : 'loop', // Infinite loop
        arrows    : true, // Disable arrows
        perPage    : 3, // Number of slides per page
        perMove    : 1,  // Number of slides to move on arrow click
        gap        : '1rem', // Space between slides
        loop       : false,
        autoplay  : true,            // Enable autoplay
        interval  : 2000,            // Set the time interval (in milliseconds) for the slide transition
        breakpoints : {
            1024 : { perPage: 2 }, // For larger screens
            600  : { perPage: 1 }, // For mobile screens
        },
    });

    initializeSlider('#casino-popular-games', {
        type       : 'slide', // Infinite loop
        arrows    : true, // Disable arrows
        perPage    : 6, // Number of slides per page
        perMove    : 1,  // Number of slides to move on arrow click
        gap        : '0.5rem', // Space between slides
        loop       : false,
        autoplay  : false,            // Enable autoplay
        interval  : 2000,            // Set the time interval (in milliseconds) for the slide transition
        breakpoints : {
            1024 : { 
                type: 'slide', 
                perPage: 2 
            }, // For larger screens
            600  : { 
                type: 'loop',
                perPage: 2, // Show two slides per page
                focus: 'center', // Center active slide
                padding: '10%',  // Add space on the left and right to show partial slides
                gap: '0.5rem', // Adjust spacing between slides
            },
        },
    
    });

    initializeSlider('#casino-slot-games', {
        type       : 'slide', // Infinite loop
        perPage    : 6, // Number of slides per page
        perMove    : 1,  // Number of slides to move on arrow click
        gap        : '0.5rem', // Space between slides
        loop       : false,
        autoplay  : false,            // Enable autoplay
        interval  : 2000,            // Set the time interval (in milliseconds) for the slide transition
        breakpoints : {
            1024 : { 
                type: 'slide', 
                perPage: 2 
            }, // For larger screens
            600  : { 
                type: 'loop',
                perPage: 2, // Show two slides per page
                focus: 'center', // Center active slide
                padding: '10%',  // Add space on the left and right to show partial slides
                gap: '0.5rem', // Adjust spacing between slides
            },
        },
    
    });
});
