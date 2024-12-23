@php
    $slider_games = [
        ['', 'inplay'],
        ['', 'featured'],
        ['', 'cricket'],
        ['', 'tennis'],
        ['', 'football'],
        ['', 'horse racing'],
        ['', 'politics'],
        ['', 'greyhound racing'],
        ['', 'binary'],
        ['', 'kabaddi'],
        ['', 'casino'],
        ['', 'int casino'],
        ['', 'sports book'],
        ['', 'mixed martial arts'],
        ['', 'volleyball'],
        ['', 'ice hockey'],
        ['', 'basket ball'],
        ['', 'baseball'],
        ['', 'darts'],
        ['', 'futsal'],
        ['', 'table tennis'],
        ['', 'rugby'],
    ];
@endphp

<style>
    #menu-slider {
         opacity: 0;
         visibility: hidden;
         transition: opacity 0.5s ease, visibility 0.5s ease;
         padding: 0 !important;
         text-align: center !important;
    }
</style>

<div class="flex items-center m-0 p-0 text-white overflow-auto scrollbar-none mb-2">
    <div id="menu-slider" class="splide w-full px-1">
        <!-- Splide Track -->
        <div class="menu_list splide__track">
            <ul class="splide__list">
                @foreach($slider_games as $game)
                    <div class="splide__slide text-nowrap capitalize items-center m-0 px-auto py-2 text-white text-xs border border-jblue2 rounded-none" style="border-radius: 0 !important;">
                        {{$game[1]}}
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script>

    document.addEventListener("DOMContentLoaded", function() {
        // Show the slider with smooth transition
        document.getElementById('menu-slider').style.opacity = '1';
        document.getElementById('menu-slider').style.visibility = 'visible';
    });

    function initializeSlider(selector, options = {}) {
        new Splide(selector, {
            pagination: false, // Disable pagination dots
            ...options          // merge passed options with defaults
        }).mount();
    }

    document.addEventListener('DOMContentLoaded', function () {
        initializeSlider('#menu-slider', {
            type      : 'slide',   // Slide type
            arrows    : false,     // Disable arrows
            autoWidth : false,      // Automatically determine width based on content
            perPage    : 10, // Number of slides per page
            perMove    : 1,  // Number of slides to move on arrow click
        });
    });
</script>
