@extends('layouts.app')

@section('css_content')
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js" defer></script>
   <style>
      #splide-slider {
         padding: 0 !important; /* Removes all padding */
      }
   </style>
@endsection

@php
   use Illuminate\Support\Collection;

   $images = ['image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg'];
   
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
   ])
@endphp

@section('content')
   <div class="mt-200">
      <div class="p-2 pt-6 sm:ml-64 mt-14 h-screen">
         @include('layouts.marquee')

         @include('layouts.slider')

         @include('casino.popular_sports')

         @include('casino.popular_games')

      </div>
   </div>
@endsection