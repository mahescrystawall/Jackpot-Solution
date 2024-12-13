<style>
    .datepicker-picker span {
        color: #fff !important;
        font-size: 12px !important;
    }
    .datepicker-picker, .datepicker-picker button, .datepicker-picker svg {
        color: #fff !important;
        background-color: #1b1b1b !important;
        font-size: 12px !important;
    }

    .datepicker-picker {
        border: 0.5px solid #525252 !important;
        font-size: 12px !important;
    }
  </style>
  <div class="px-2 md:px-0">
    <form class="flex flex-wrap gap-5  mt-5 leading-none  max-md:max-w-full" action="{{ route('stakes.update')}}" method="post">
        @csrf
        
        <div class="relative w-[100vw] md:max-w-sm md:w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input id="datepicker-fromDate" name="fromDate" datepicker placeholder="From Date" type="text" class="bg-transparent border border-solid border-jcolor1 text-gray-900 text-sm rounded-lg focus:ring-jblue2 focus:rounded-md focus:border-jblue2 block w-full ps-10 p-2.5 " >
        </div>

        <div class="relative w-[100vw] md:max-w-sm md:w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input id="datepicker-toDate" name="toDate" datepicker placeholder="To Date" type="text" class="bg-transparent border border-solid border-jcolor1 text-gray-900 text-sm rounded-lg focus:ring-jblue2 focus:rounded-md focus:border-jblue2 block w-full ps-10 p-2.5 " >
        </div>

        
        

        <div class="flex gap-10  justify-between items-start rounded-md border border-1 border-jcolor1 w-[100vw] md:w-full md:max-w-sm">
            <label for="category" class="sr-only">Category</label>
            <select id="category" class="dropdown-search gap-2.5 bg-transparent border-none text-white w-full md:w-full focus:ring-jblue2 focus:rounded-md focus:border-jblue2">
            <option value="all">All</option>
            <option value="4">Cricket</option>
            <option value="9999">Football</option>
            <option value="Casino">All</option>
            </select>
        </div>

        
        <button type="submit" class="flex p-2.5 justify-center items-center font-semibold bg-jblue1 text-white rounded-md shadow-[2px_3px_0px_rgba(3,119,124,1)] w-[100vw] md:w-full md:max-w-sm">
            <span class="gap-2.5">Submit</span>
        </button>
    </form>

</div>