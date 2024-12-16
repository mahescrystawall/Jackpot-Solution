<div class="mb-4 mt-2" x-data="{ activeTab: 'MAC88' }">
    <!-- Tab Navigation -->
    <ul class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm text-center w-full" role="tablist">
        @foreach ($casinoData['data']['int'] as $category => $games)
        <li class="w-full" role="presentation">
            <button
                @click="activeTab = '{{ strtoupper($category) }}'"
                :class="activeTab === '{{ strtoupper($category) }}'
                    ? 'bg-[#03777C] text-[#EEEEEE] shadow-[2px_2px_0px_0_rgba(0,173,181,1)]'
                    : 'bg-jcolor7 text-jcolor9 shadow-[2px_2px_0px_0_rgba(54,54,54,1)]'"
                class="p-3 w-full rounded-md text-center hover:shadow-[2px_2px_0px_0_rgba(74,74,74,1)] hover:text-jwhite2"
            >
                {{ strtoupper($category) }}
            </button>
        </li>
        @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="mt-4 text-white">
        @foreach ($casinoData['data']['int'] as $category => $gameTypes)
        <div x-show="activeTab === '{{ strtoupper($category) }}'" class="w-full" x-cloak>
            <!-- Buttons Grid -->
            <div class="grid grid-cols-2 md:grid-cols-7 gap-3">
                @foreach ($gameTypes as $gameType => $games)
                    @foreach ($games as $game)
                    <button
                        class="flex flex-col items-center px-3 py-6 w-full rounded-tl-md border border-jcolor1 hover:border-jblue2 hover:text-jwhite2 gap-1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                            <path
                                d="M13.0469 1.47786C12.7421 1.17314 12.3288 1.00195..."
                                fill="white"
                            />
                        </svg>
                        <span>{{ $game['name'] }}</span>
                    </button>
                    @endforeach
                @endforeach
            </div>

            <!-- Games Grid -->
            <div class="grid grid-cols-3 md:grid-cols-6 gap-4 mt-4">
                @foreach ($gameTypes as $gameType => $games)
                    @foreach ($games as $game)
                    <div class="max-w-sm bg-jcolor8 group rounded-lg overflow-hidden">
                        <a href="#">
                            <img
                                class="rounded-t-lg w-full h-40 object-cover"
                                src="{{ $game['url_thumb'] }}"
                                alt="{{ $game['name'] }}"
                            />
                        </a>
                        <div
                            class="p-2 bg-gradient-to-r from-[#19383a] via-[#1B1B1B] to-[#19383a] group-hover:from-[#00ADB5] group-hover:via-[#19383a] group-hover:to-[#00ADB5]"
                        >
                            <p class="font-semibold text-center text-white">{{ $game['name'] }}</p>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
