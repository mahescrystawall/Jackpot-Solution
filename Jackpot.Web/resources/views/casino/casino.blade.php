@extends('layouts.app')

@section('css_content')
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js" defer></script>
   <style>
      #casino-popular-games, #casino-popular-live-sports, #casino-slot-games {
         padding: 0 !important; /* Removes all padding */
      }
      
   </style>
@endsection

@php
   use Illuminate\Support\Collection;

   $popular_games = [ 
      "AVIATOR X2.webp", 
      "AVIATOR.webp", 
      "CRASH.webp", 
      "DIAMONDS.webp", 
      "DICE.webp", 
      "HILO.webp", 
      "LIMBO.webp", 
      "MINES.webp", 
      "PLINKO.webp", 
      "X-ROULETTE.webp", 
   ]; 

   $mac88 = [ 
      "1-ANDAR-BAHAR.webp", 
      "10-20-20-POKER.webp", 
      "11-POKER-ONE-DAY.webp", 
      "12-LUCKY-7.webp", 
      "13-TEEN-PATTI-ONE-DAY.webp", 
      "14-TEST-TEEN-PATTI.webp", 
      "15-TWO-CARD-TEEN-PATTI.webp", 
      "16-MUFLIS-TEEN-PATTI.webp", 
      "17-TEEN-PATTI-20-20.webp", 
      "18-TWO-CARD-TEEN-PATTI-ONE-DAY.webp", 
      "19-OPEN-TEEN-PATTI.webp", 
      "2-DRAGON-TIGER.webp", 
      "20-THIRTY-TWO-CARDS.webp", 
      "21-AMAR-AKBAR-ANTHONY.webp", 
      "22-THREE-CARD-JUDGEMENT.webp", 
      "23-QUEEN-RACE.webp", 
      "24-RACE-20-20.webp", 
      "25-CASINO-WAR.webp", 
      "26-WORLI-MATKA.webp", 
      "27-THE-TRAP.webp", 
      "28-TRIO.webp", 
      "29-BOLLYWOOD-CASINO.webp", 
      "3-DRAGON-TIGER-LION.webp", 
      "30-TEN-KA-DUM.webp", 
      "31-ONE-CARD-20-20.webp", 
      "32-ONE-CARD-METER.webp", 
      "33-ONE-CARD-ONE-DAY.webp", 
      "34-RACE-TO-17.webp", 
      "35-CASINO-METER.webp", 
      "36-NOTE-NUMBER.webp", 
      "37-KAUN-BANEGA-CROREPATI.webp", 
      "38-RACE-TO-2ND.webp", 
      "39-CENTER-CARD-ONE-DAY.webp", 
      "4-DRAGON-TIGER-ONE-DAY.webp", 
      "40-LOTTERY.webp", 
      "41-SUPER-OVER.webp", 
      "42-FIVE-CRICKET.webp", 
      "43-CRICKET-2020.webp", 
      "44-HIGH-LOW.webp", 
      "45-SIX-PLAYER-POKER.webp", 
      "5-BACCARAT.webp", 
      "6-29-BACCARAT.webp", 
      "7-BACCARAT-ONE-DAY.webp", 
      "8-SICBO.webp", 
      "9-ROULETTE.webp",  
   ]; 
   
   
   $popular_sports_cricket = collect([
      [
         'id' => 1,
         'team2' => 'South Africa',
         'team2_score' => '81 / 1 (11.0)',
         'team1' => 'Bangladesh',
         'team1_score' => '163 / 4 (20.0)',
      ],

      [
         'id' => 2,
         'team2' => 'Sri Lanka',
         'team2_score' => '81 / 1 (11.0)',
         'team1' => 'India',
         'team1_score' => '163 / 4 (20.0)',
      ],

      [
         'id' => 3,
         'team2' => 'Australia',
         'team2_score' => '81 / 1 (11.0)',
         'team1' => 'Pakistan',
         'team1_score' => '163 / 4 (20.0)',
      ],

      [
         'id' => 4,
         'team2' => 'England',
         'team2_score' => '81 / 1 (11.0)',
         'team1' => 'West Indies',
         'team1_score' => '163 / 4 (20.0)',
      ],

      [
         'id' => 5,
         'team2' => 'Afghanistan',
         'team2_score' => '81 / 1 (11.0)',
         'team1' => 'Canada',
         'team1_score' => '163 / 4 (20.0)',
      ],
]);
@endphp

@section('content')
   <div class="mt-200 text-white">
      <div class="p-2 pt-6 sm:ml-64 mt-14 ">
         @include('layouts.marquee')

         @include('layouts.slider')

         @include('casino.popular_sports')

         {{-- @include('casino.popular_games') --}}

         {{-- @include('casino.slot_games') --}}

         @include('casino.casino_tabs')

      </div>
   </div>
@endsection