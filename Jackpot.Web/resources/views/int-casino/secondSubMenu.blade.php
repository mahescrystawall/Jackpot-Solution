<div class="mt-2" x-data="{ activeTab: '' }">
    <ul
       class="items-center w-full text-sm text-center gap-3"
       role="tablist"
    >
       <li class="flex items-center justify-center w-full" role="presentation">
            <button
                class="flex flex-col items-center px-3 py-6 w-full rounded-tl-md border border-jcolor1 hover:border-jblue2 hover:text-jwhite2 gap-1"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                    <path
                        d="M13.0469 1.47786C12.7421 1.17314 12.3288 1.00195..."
                        fill="white"
                    />
                </svg>
                <span>{{$category}}</span>
            </button>
       </li>
    </ul>


     <!-- Tab Content -->
     <div class="mt-4 text-white">
        <div x-show="activeTab === ''" class="">
              @foreach ($category as $category => $cat)

                <div class="max-w-sm bg-jcolor8 group rounded-lg overflow-hidden">
                    <a href="#">
                        <img
                            class="rounded-t-lg w-full h-40 object-cover"
                            src="{{ $cat['url_thumb'] }}"
                            alt="{{ $cat['name'] }}"
                        />
                    </a>
                    <div
                        class="p-2 bg-gradient-to-r from-[#19383a] via-[#1B1B1B] to-[#19383a] group-hover:from-[#00ADB5] group-hover:via-[#19383a] group-hover:to-[#00ADB5]"
                    >
                        <p class="font-semibold text-center text-white">{{ $cat['name'] }}</p>
                    </div>
                </div>
              @endforeach
        </div>
     </div>
  </div>
