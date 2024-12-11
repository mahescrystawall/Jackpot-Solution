@extends('layouts.app')
@section('content')
<div class="mt-200">
   <div class="p-2 pt-0 sm:ml-64 mt-14 h-screen">
      @include('layouts.marquee')

      @include('casino.popular_sports')
   </div>
</div>
@endsection