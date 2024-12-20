<div class="mb-4 mt-2" x-data="{ activeMainCategory: 'mac88', activeSubCategory: 'all' }">
    <!-- Main Category Tabs -->
    <div id="int-casino-games" class="splide">
        <div class="splide__track">
            <ul class="splide__list "
                role="tablist">
                @foreach ($casinoGameList as $mainCategory => $subCategories)
                    <li id="" class="splide__slide" role="presentation">
                        <button
                            @click="activeMainCategory = '{{ strtolower(str_replace(' ', '_', $mainCategory)) }}'; activeSubCategory = 'all'"
                            :class="activeMainCategory === '{{ strtolower(str_replace(' ', '_', $mainCategory)) }}'
                                ?
                                'bg-[#03777C] text-[#EEEEEE] shadow-[2px_2px_0px_0_rgba(0,173,181,1)]' :
                                'bg-jcolor7 text-jcolor9 shadow-[2px_2px_0px_0_rgba(54,54,54,1)]'"
                            class="rounded-md text-center hover:shadow-[2px_2px_0px_0_rgba(74,74,74,1)] hover:text-jwhite2">
                            {{ $mainCategory }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Subcategory Tabs and Game Images -->
    <div class="mt-4 text-white">
        @foreach ($casinoGameList as $mainCategory => $subCategories)
            <div x-show="activeMainCategory === '{{ strtolower(str_replace(' ', '_', $mainCategory)) }}'">
                <!-- Subcategory Tabs -->
                <ul class="grid grid-cols-2 md:grid-cols-7 items-center w-full text-sm text-center" role="tablist">
                    <li class="flex-auto w-full" role="presentation">
                        <button @click="activeSubCategory = 'all'"
                            :class="activeSubCategory === 'all'
                                ?
                                'bg-[#03777C] text-[#EEEEEE]' :
                                'border border-jcolor1 text-jcolor9'"
                            class="flex flex-col items-center px-3 py-6 w-full rounded-tl-md hover:border-jblue2 hover:text-jwhite2 gap-1">
                            ALL
                        </button>
                    </li>
                    @foreach ($subCategories as $subCategory)
                        <li class="flex-auto w-full" role="presentation">
                            <button
                                @click="activeSubCategory = '{{ strtolower(str_replace(' ', '_', $subCategory['name'])) }}'"
                                :class="activeSubCategory === '{{ strtolower(str_replace(' ', '_', $subCategory['name'])) }}'
                                    ?
                                    'bg-[#03777C] text-[#EEEEEE]' :
                                    'border border-jcolor1 text-jcolor9'"
                                class="flex flex-col items-center px-3 py-6 w-full rounded-tl-md hover:border-jblue2 hover:text-jwhite2 gap-1">
                                {{ ucwords(strtolower($subCategory['name'])) }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                <!-- Game Images -->
                <div class="w-full mt-4">
                    <template x-if="activeSubCategory === 'all'">
                        <div class="grid grid-cols-3 md:grid-cols-6 gap-2">
                            @foreach ($subCategories as $subCategory)
                                @foreach ($subCategory['data'] as $game)
                                    <div class="max-w-sm bg-jcolor8 group">
                                        <a href="#">
                                            <img class="rounded-t-lg w-full" src="{{ $game['url_thumb'] }}"
                                                alt="{{ $game['name'] }}" />
                                        </a>
                                        <div
                                            class="p-2 group-hover:bg-gradient-to-r group-hover:from-[#00ADB5] group-hover:via-[#19383a] group-hover:via-30% group-hover:via-[#19383a] group-hover:via-50% group-hover:to-[#00ADB5]  bg-gradient-to-r from-[#19383a] via-[#1B1B1B] to-[#19383a]">
                                            <a href="#">
                                                <p class="font-semibold tracking-tight text-center text-white">
                                                    {{ $game['name'] }}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </template>

                    @foreach ($subCategories as $subCategory)
                        <div
                            x-show="activeSubCategory === '{{ strtolower(str_replace(' ', '_', $subCategory['name'])) }}'">
                            <div class="grid grid-cols-3 md:grid-cols-6 gap-2">
                                @foreach ($subCategory['data'] as $game)
                                    <div class="max-w-sm bg-jcolor8 group">
                                        <a href="#">
                                            <img class="rounded-t-lg w-full" src="{{ $game['url_thumb'] }}"
                                                alt="{{ $game['name'] }}" />
                                        </a>
                                        <div
                                            class="p-2 group-hover:bg-gradient-to-r group-hover:from-[#00ADB5] group-hover:via-[#19383a] group-hover:via-30% group-hover:via-[#19383a] group-hover:via-50% group-hover:to-[#00ADB5]  bg-gradient-to-r from-[#19383a] via-[#1B1B1B] to-[#19383a]">
                                            <a href="#">
                                                <p class="font-semibold tracking-tight text-center text-white">
                                                    {{ $game['name'] }}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
