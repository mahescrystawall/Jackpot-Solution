@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="mt-200 text-white">
    <div class="p-2 pt-6 sm:ml-64 mt-14 h-screen">

        @include('layouts.marquee')

        <section class="w-full ">
            <div class="flex flex-row w-full py-2 mb-2 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-[#1B1B1B]">
                <div class="flex items-center gap-2 text-white text-sm w-full px-2">
                    <h2>Unsettled Bets</h2>
                </div>
            </div>
            {{-- Filter --}}

            @include('user.unsettle_bet.search_filter')
            @include('user.unsettle_bet.section_01')
        </section>
    </div>
</div>
@endsection