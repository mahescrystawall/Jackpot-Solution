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


<div class="flex items-center m-0 p-0 text-white overflow-auto scrollbar-none mb-2">
    @foreach($slider_games as $game)
        <div class="flex text-nowrap capitalize  items-center m-0 px-3 py-2 text-white border border-jblue2">
            {{$game[1]}}
        </div>
    @endforeach
</div>