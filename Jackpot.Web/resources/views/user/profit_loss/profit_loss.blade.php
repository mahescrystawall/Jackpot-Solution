@extends('layouts.app')
@section('content')
    @include('layouts.marquee')

    <div class="mt-200">
        <div class="p-2 pt-0 sm:ml-64 mt-16">
            <section class="w-full ">
                <div class="flex flex-row w-full py-2 mb-2 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-[#1B1B1B]">
                    <div class="flex items-center gap-2 text-white text-sm w-full px-2">
                        <h2>Profit Loss</h2>
                    </div>
                </div>
                {{-- Filter --}}
                @include('user.profit_loss.search_filter')
                @include('user.profit_loss.section_01')
            </section>  
        </div>
    </div>
@endsection