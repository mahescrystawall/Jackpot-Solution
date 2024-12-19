<div class="w-full">
    <div class="grid grid-cols-3 md:grid-cols-6 gap-2">
       @foreach($popular_games as $image)
          @php
                // Remove all characters up to and including the first hyphen
                $filename = preg_replace('/^[^-]+-/', '', pathinfo($image, PATHINFO_FILENAME));
                // $filename = str_replace('-', ' ', $filename);
          @endphp
          <div class="max-w-sm bg-jcolor8 group">
             <a href="#">
                <img class="rounded-t-lg w-full" src="{{ asset('assets/images/CASINO/POPULAR_GAMES/'.$image)}}" alt="{{$filename}}" />
             </a>
             <div class="p-2 group-hover:bg-gradient-to-r group-hover:from-[#00ADB5] group-hover:via-[#19383a] group-hover:via-30% group-hover:via-[#19383a] group-hover:via-50% group-hover:to-[#00ADB5]  bg-gradient-to-r from-[#19383a] via-[#1B1B1B] to-[#19383a]">
                <a href="#">
                   <p class="font-semibold tracking-tight text-center text-white">
                      {{$filename}}
                   </p>
                </a>
             </div>
          </div>
       @endforeach
       
       
 
    </div>
  </div>