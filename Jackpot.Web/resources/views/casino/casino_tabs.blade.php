<div class="mb-4 mt-2" x-data="{ activeTab: 'mac88' }">
   <ul
      class="grid grid-cols-2 md:grid-cols-4 items-center w-full text-sm text-center gap-3"
      role="tablist"
   >
      <li class="flex items-center justify-center w-full" role="presentation">
      <button
         @click="activeTab = 'mac88'"
         :class="activeTab === 'mac88' 
            ? 'bg-[#03777C] text-[#EEEEEE] shadow-[2px_2px_0px_0_rgba(0,173,181,1)]' 
            : 'bg-jcolor7 text-jcolor9 shadow-[2px_2px_0px_0_rgba(54,54,54,1)]'"
         class="flex items-center justify-center gap-2 p-3 w-full rounded-md text-center hover:shadow-[2px_2px_0px_0_rgba(74,74,74,1)] hover:text-jwhite2"
      >
         MAC88
      </button>
      </li>
   
      <li class="flex items-center justify-center w-full" role="presentation">
      <button
         @click="activeTab = 'fun_games'"
         :class="activeTab === 'fun_games' 
            ? 'bg-[#03777C] text-[#EEEEEE] shadow-[2px_2px_0px_0_rgba(0,173,181,1)]' 
            : 'bg-jcolor7 text-jcolor9 shadow-[2px_2px_0px_0_rgba(54,54,54,1)]'"
         class="flex items-center justify-center gap-2 p-3 w-full rounded-md text-center hover:shadow-[2px_2px_0px_0_rgba(74,74,74,1)] hover:text-jwhite2"
      >
         FUN GAMES
      </button>
      </li>
   
      <li class="flex items-center justify-center w-full" role="presentation">
      <button
         @click="activeTab = 'mac88_virtuals'"
         :class="activeTab === 'mac88_virtuals' 
            ? 'bg-[#03777C] text-[#EEEEEE] shadow-[2px_2px_0px_0_rgba(0,173,181,1)]' 
            : 'bg-jcolor7 text-jcolor9 shadow-[2px_2px_0px_0_rgba(54,54,54,1)]'"
         class="flex items-center justify-center gap-2 p-3 w-full rounded-md text-center hover:shadow-[2px_2px_0px_0_rgba(74,74,74,1)] hover:text-jwhite2"
      >
         MAC88 VIRTUALS
      </button>
      </li>
   
      <li class="flex items-center justify-center w-full" role="presentation">
      <button
         @click="activeTab = 'color_prediction'"
         :class="activeTab === 'color_prediction' 
            ? 'bg-[#03777C] text-[#EEEEEE] shadow-[2px_2px_0px_0_rgba(0,173,181,1)]' 
            : 'bg-jcolor7 text-jcolor9 shadow-[2px_2px_0px_0_rgba(54,54,54,1)]'"
         class="flex items-center justify-center gap-2 p-3 w-full rounded-md text-center hover:shadow-[2px_2px_0px_0_rgba(74,74,74,1)] hover:text-jwhite2"
      >
         COLOR PREDICTION
      </button>
      </li>
   </ul>
 

    <!-- Tab Content -->
    <div class="mt-4 text-white">
       <div x-show="activeTab === 'mac88'" class="">
             @include('casino.mac88.casino_mac88')
       </div>
       <div x-show="activeTab === 'fun_games'" class="">
          @include('casino.fun_games.casino_fun_games')
       </div>
       <div x-show="activeTab === 'mac88_virtuals'" class="">
        @include('casino.mac88_virtuals.casino_mac88_virtuals')
     </div>
     <div x-show="activeTab === 'color_prediction'" class="">
        @include('casino.color_prediction.casino_color_prediction')
     </div>
    </div>
 </div>