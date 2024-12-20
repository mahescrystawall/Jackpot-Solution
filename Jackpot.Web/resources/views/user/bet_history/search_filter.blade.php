@section('css_content')
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
  @endsection
   <div class="px-2 md:px-0">
        <form class="grid grid-cols-5 gap-5  mt-5 leading-none  max-md:max-w-full" id="filter_form">
            <div class="flex gap-10  justify-between items-start rounded-md border border-1 border-jcolor1 w-full md:w-60">
                <label for="category" class="sr-only">Category</label>
                <select class="dropdown-search gap-2.5 bg-transparent border-none text-white  focus:ring-jblue2 focus:rounded-md focus:border-jblue2 w-full md:w-60" name="event_type_id" id="event_type_id">
                    <option value="ALL">All</option>
                    <option value="4">Cricket</option>
                    <option value="9999">Football</option>
                    <option value="Casino">Casino</option>
                </select>
            </div>
            <div class="flex gap-10  justify-between items-start rounded-md border border-1 border-jcolor1 w-full md:w-60">
                <select  class="dropdown-search gap-2.5 bg-transparent border-none text-white  focus:ring-jblue2 focus:rounded-md focus:border-jblue2 w-full md:w-60" name="reportType" id="is_matched" >
                    <option value="" disabled="disabled">Bet Status</option>
                    <option value="1">Matched</option>
                    <option value="0">UnMatched</option>
                </select>
            </div>
            <div class="relative w-[100vw] md:w-60">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none w-full md:w-60">

                </div>
                <input name="start_date" id="start_date"  value="{{ old('start_date', $startDate) }}"  class="bg-transparent border border-solid border-jcolor1 text-gray-900 text-sm rounded-lg focus:ring-jblue2 focus:rounded-md focus:border-jblue2 block ps-10 p-2.5 w-full md:w-60" >
            </div>
            <div class="relative w-[100vw] md:w-60">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none w-full md:w-60">

                </div>
                <input type="date" name="end_date" id="end_date"  value="{{ old('end_date', $endDate) }}" class="bg-transparent border border-solid border-jcolor1 text-gray-900 text-sm rounded-lg focus:ring-jblue2 focus:rounded-md focus:border-jblue2 block  w-full md:w-60 ps-10 p-2.5 " >
            </div>

            <button type="submit" class="flex p-2.5 justify-center items-center font-semibold bg-jblue1 text-white rounded-md shadow-[2px_3px_0px_rgba(3,119,124,1)] w-full md:w-60">
                <span class="gap-2.5">Submit</span>
            </button>


        </form>

   </div>
