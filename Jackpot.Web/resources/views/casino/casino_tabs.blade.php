<div class="mb-4" x-data="{ activeTab: 'mac88' }">
    <ul class="flex items-center w-full text-sm text-center gap-3 px-3" role="tablist">
       <li class="flex-auto w-full" role="presentation">
             <button
                @click="activeTab = 'mac88'"
                :class="activeTab === 'mac88' 
                   ? 'bg-[#00ADB5] text-[#EEEEEE] shadow-[3px_3px_0px_0_rgba(3,119,124,1)]' 
                   : 'bg-jcolor5 text-jcolor9 shadow-[4px_4px_0px_0_rgba(94,94,94,1)]'"
                class="flex items-center gap-2 p-3 w-full rounded-md hover:text-jwhite2 "
             >
                MAC88
             </button>
       </li>

       <li class="flex-auto w-full" role="presentation">
             <button
                @click="activeTab = 'fun_games'"
                :class="activeTab === 'fun_games' 
                   ? 'bg-[#00ADB5] text-[#EEEEEE] shadow-[3px_3px_0px_0_rgba(3,119,124,1)]' 
                   : 'bg-jcolor5 text-jcolor9 shadow-[4px_4px_0px_0_rgba(94,94,94,1)]'"
                class="flex items-center gap-2 p-3 w-full rounded-md hover:text-jwhite2"
             >
                FUN GAMES
             </button>
       </li>

       <li class="flex-auto w-full" role="presentation">
            <button
            @click="activeTab = 'mac88_virtuals'"
            :class="activeTab === 'mac88_virtuals' 
                ? 'bg-[#00ADB5] text-[#EEEEEE] shadow-[3px_3px_0px_0_rgba(3,119,124,1)]' 
                : 'bg-jcolor5 text-jcolor9 shadow-[4px_4px_0px_0_rgba(94,94,94,1)]'"
            class="flex items-center gap-2 p-3 w-full rounded-md hover:text-jwhite2"
            >
            MAC88 VIRTUALS
            </button>
        </li>

        <li class="flex-auto w-full" role="presentation">
            <button
            @click="activeTab = 'win_go_games'"
            :class="activeTab === 'win_go_games' 
                ? 'bg-[#00ADB5] text-[#EEEEEE] shadow-[3px_3px_0px_0_rgba(3,119,124,1)]' 
                : 'bg-jcolor5 text-jcolor9 shadow-[4px_4px_0px_0_rgba(94,94,94,1)]'"
            class="flex items-center gap-2 p-3 w-full rounded-md hover:text-jwhite2"
            >
            WIN GO GAMES
            </button>
        </li>
       
    </ul>

    <!-- Tab Content -->
    <div class="mt-4">
       <div x-show="activeTab === 'mac88'" class="">
             @include('casino.casino_mac88')
       </div>
       <div x-show="activeTab === 'fun_games'" class="">
          @include('casino.casino_fun_games')
       </div>
       <div x-show="activeTab === 'mac88_virtuals'" class="">
        @include('casino.casino_mac88_virtuals')
     </div>
     <div x-show="activeTab === 'win_go_games'" class="">
        @include('casino.casino_win_go_games')
     </div>
    </div>
 </div>