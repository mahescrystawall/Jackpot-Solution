@section('css_content')
<style>
    .datepicker-picker span {
        color: #fff !important;
        font-size: 12px !important;
    }

    .datepicker-picker,
    .datepicker-picker button,
    .datepicker-picker svg {
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
<form class="flex flex-wrap gap-5  mt-5 leading-none  max-md:max-w-full" id="filter_form"  >
    <div class="flex gap-10 justify-between items-start rounded-md border border-solid border-neutral-700">
        <label for="fromDate" class="sr-only">From Date</label>
        <input type="date" name="start_date" id="start_date"  value="{{ old('start_date', $startDate) }}" class="gap-2.5 bg-transparent focus:ring-jblue2 focus:border-jblue2 text-white border-none w-64" />
    </div>
    <div class="flex gap-10 justify-between items-start rounded-md border border-solid border-neutral-700 ">
        <label for="fromDate" class="sr-only">From Date</label>
        <input type="date" name="end_date" id="end_date"  value="{{ old('end_date', $endDate) }}" class="gap-2.5 bg-transparent text-white border-none w-64 focus:ring-jblue2 focus:border-jblue2" />
    </div>
    <!-- <div class="flex gap-10 justify-between items-start rounded-md border border-solid border-neutral-700 w-64">
        <label for="category" class="sr-only">Category</label>
        <select id="category" class="dropdown-search gap-2.5 bg-transparent text-white border-none w-64 focus:ring-jblue2 focus:border-jblue2">
          <option value="all">All</option>
          <option value="4">Cricket</option>
          <option value="9999">Football</option>
          <option value="Casino">All</option>
        </select>
    </div> -->
    <button type="submit" class="flex p-2.5 justify-center items-center font-semibold bg-jblue1 text-white rounded-md shadow-[2px_3px_0px_rgba(3,119,124,1)] w-64">
        <span class="gap-2.5">Submit</span>
      </button>
</form>