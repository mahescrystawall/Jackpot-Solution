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
    <form class="flex flex-wrap gap-5 mt-5 leading-none max-md:max-w-full">
        <div class="flex gap-4 items-center">
            <div class="flex items-center">
                <input id="matched" type="radio" name="reportType" value="1"
                    class="w-4 h-4 text-jblue2 bg-transparent border-gray-300 focus:ring-jblue2 focus:ring-2"
                    onclick="filterTable(1)" checked>
                <label for="matched" class="ml-2 text-sm font-medium text-white">Matched</label>
            </div>
            <div class="flex items-center">
                <input id="unmatched" type="radio" name="reportType" value="0"
                    class="w-4 h-4 text-jblue2 bg-transparent border-gray-300 focus:ring-jblue2 focus:ring-2"
                    onclick="filterTable(0)">
                <label for="unmatched" class="ml-2 text-sm font-medium text-white">Unmatched</label>
            </div>
            <div class="flex items-center">
                <input id="deleted" type="radio" name="reportType" value="2"
                    class="w-4 h-4 text-jblue2 bg-transparent border-gray-300 focus:ring-jblue2 focus:ring-2"
                    onclick="filterTable(2)">
                <label for="deleted" class="ml-2 text-sm font-medium text-white">Deleted</label>
            </div>
        </div>
    </form>
</div>
