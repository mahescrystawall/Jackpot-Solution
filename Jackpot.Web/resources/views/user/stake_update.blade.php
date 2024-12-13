@extends('layouts.app')

@section('content')
    <div class="mt-200">
        <div class="p-2 pt-6 sm:ml-64 mt-14 h-screen">

             @include('layouts.marquee')


            <section class="w-full text-white">
                <div class="flex flex-row w-full py-2 mb-2 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-[#1B1B1B]">
                    <div class="flex items-center gap-2 text-white text-sm w-full px-2">
                        <h2>Change Button Values</h2>
                    </div>
                </div>
                <div class="card-body container-fluid button-value">
                    <div class="grid grid-cols-2 w-full md:w-1/3 gap-2">
                        <div class="">
                            <span>Price Label</span>

                        </div>
                        <div class="">
                            <span>Price Value</span>

                        </div>
                    </div>



                    <form id="stakeupdateform" method="post" enctype="multipart/form-data"
                        action="{{ route('stakes.update') }}">
                        @csrf <!-- CSRF Protection -->
                        @php
                            $stakes = session('stakes');
                        @endphp
                        @foreach ($stakes as $key => $value)
                            @if (strpos($key, 'stake_name_') === 0)
                                @php
                                    $index = substr($key, -1);
                                @endphp

                                    <div class="grid grid-cols-2 w-full md:w-1/3 gap-2">
                                        <div class="">

                                            <input type="text" name="stake_name_{{ $index }}" maxlength="7"
                                            class="block w-full p-3 text-white border border-bg-jblue2 bg-transparent rounded-lg text-sm focus:border-jblue2 focus:ring-jblue2"
                                            value="{{ old('stake_name_' . $index, $stakes['stake_name_' . $index]) }}"
                                            placeholder="stackVal{{ $index }}">

                                        </div>
                                        <div class="">

                                            <input type="number" name="stake_amount_{{ $index }}" min="1"
                                            max="99999999" maxlength="9"
                                            class="block w-full p-3 text-white border border-bg-jblue2 bg-transparent rounded-lg text-sm focus:border-jblue2 focus:ring-jblue2"
                                            value="{{ old('stake_amount_' . $index, $stakes['stake_amount_' . $index]) }}"
                                            placeholder="stackVal{{ $index }}">

                                        </div>
                                    </div>

                                {{-- <div class="flex mb-4 space-x-4">

                                    <div class="flex-1 md:w-[320px]">
                                        <input type="text" name="stake_name_{{ $index }}" maxlength="7"
                                            class="block  p-3 text-white border border-bg-jblue2 bg-transparent rounded-lg text-sm focus:border-jblue2 focus:ring-jblue2"
                                            value="{{ old('stake_name_' . $index, $stakes['stake_name_' . $index]) }}"
                                            placeholder="stackVal{{ $index }}">
                                    </div>
                                    <div class="flex-1">
                                        <input type="number" name="stake_amount_{{ $index }}" min="1"
                                            max="99999999" maxlength="9"
                                            class="block w-1/2 p-3 text-white border border-bg-jblue2 bg-transparent rounded-lg text-sm focus:border-jblue2 focus:ring-jblue2"
                                            value="{{ old('stake_amount_' . $index, $stakes['stake_amount_' . $index]) }}"
                                            placeholder="stackVal{{ $index }}">
                                    </div>
                                </div> --}}
                            @endif
                        @endforeach
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-[#00ADB5] text-[#EEEEEE] shadow-[3px_3px_0px_0_rgba(3,119,124,1)] flex items-center gap-2 p-3 rounded-md hover:text-jwhite2 focus:ring-4 focus:outline-none focus:ring-jblue2 text-sm w-[200px] px-5 py-2.5 text-center">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
