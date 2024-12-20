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
    ]
@endphp

<style>
    #menu-slider {
         padding: 0 !important; /* Removes all padding */
      }
</style>
<div class="flex items-center m-0 p-0 text-white overflow-auto scrollbar-none mb-2">
    <div id="menu-slider" class="splide w-full px-1">
        <!-- Splide Track -->
        <div class="menu_list splide__track">
            <ul class="splide__list">
                @foreach($slider_games as $game)
                    <div class=" splide__slide flex text-nowrap capitalize items-center m-0 px-5 py-2 text-white text-xs border border-jblue2 rounded-none" style="border-radius: 0 !important;">
                        {{$game[1]}}
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
