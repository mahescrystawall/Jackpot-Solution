@extends('layouts.app')

@section('css_content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js" defer></script>
<style>
   body {
       background-color: #111827;
       color: white;
       font-family: Arial, sans-serif;
   }
   .swiper-slide{
      min-width: 400px;
   }
</style>
@endsection

@php
   use Illuminate\Support\Collection;
   
   // $popular_sports_cricket = collect([
   //    [
   //       'id' => 1,
   //       'team2' => 'South Africa',
   //       'team2_score' => '81 / 1 (11.0)',
   //       'team1' => 'Bangladesh',
   //       'team1_score' => '163 / 4 (20.0)',
   //    ],

   //    [
   //       'id' => 2,
   //       'team2' => 'Sri Lanka',
   //       'team2_score' => '81 / 1 (11.0)',
   //       'team1' => 'India',
   //       'team1_score' => '163 / 4 (20.0)',
   //    ],

   //    [
   //       'id' => 3,
   //       'team2' => 'Australia',
   //       'team2_score' => '81 / 1 (11.0)',
   //       'team1' => 'Pakistan',
   //       'team1_score' => '163 / 4 (20.0)',
   //    ],

   //    [
   //       'id' => 4,
   //       'team2' => 'England',
   //       'team2_score' => '81 / 1 (11.0)',
   //       'team1' => 'West Indies',
   //       'team1_score' => '163 / 4 (20.0)',
   //    ],

   //    [
   //       'id' => 5,
   //       'team2' => 'Afghanistan',
   //       'team2_score' => '81 / 1 (11.0)',
   //       'team1' => 'Canada',
   //       'team1_score' => '163 / 4 (20.0)',
   //    ],
   // ])


   // Create a Laravel Collection with predefined data
   $collection = collect([
        [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '123-456-7890',
            'address' => '123 Main St, Springfield',
        ],
        [
            'id' => 2,
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'phone' => '987-654-3210',
            'address' => '456 Elm St, Springfield',
        ],
        [
            'id' => 3,
            'name' => 'Alice Johnson',
            'email' => 'alicej@example.com',
            'phone' => '555-123-4567',
            'address' => '789 Oak St, Springfield',
        ],
        [
            'id' => 3,
            'name' => 'Alice Johnson',
            'email' => 'alicej@example.com',
            'phone' => '555-123-4567',
            'address' => '789 Oak St, Springfield',
        ],
        [
            'id' => 3,
            'name' => 'Alice Johnson',
            'email' => 'alicej@example.com',
            'phone' => '555-123-4567',
            'address' => '789 Oak St, Springfield',
        ],
    ]);

@endphp

@section('content')
<div class="mt-200">
   <div class="p-2 pt-0 sm:ml-64 mt-14 h-screen">
      @include('layouts.marquee')

      @include('casino.popular_sports')

      <h1>fdjslpfdaspofas</h1>
   </div>
</div>
@endsection