<form class="flex flex-wrap gap-5  mt-5 leading-none  max-md:max-w-full">
    <div class="flex gap-10 justify-between items-start rounded-md border border-solid border-neutral-700">
        <label for="fromDate" class="sr-only">From Date</label>
        <input type="date" id="fromDate" value="2024-11-13" class="gap-2.5  bg-transparent text-white border-none w-64" />
    </div>
    <div class="flex gap-10 justify-between items-start rounded-md border border-solid border-neutral-700 ">
        <label for="fromDate" class="sr-only">From Date</label>
        <input type="date" id="fromDate" value="2024-11-13" class="gap-2.5  bg-transparent text-white border-none w-64" />
    </div>
    <div class="flex gap-10 justify-between items-start rounded-md border border-solid border-neutral-700 w-64">
        <label for="category" class="sr-only">Category</label>
        <select id="category" class="gap-2.5 bg-transparent text-white border-none w-64">
          <option value="all">All</option>
        </select>
    </div>
    <button type="submit" class="flex p-2.5 justify-center items-center font-semibold bg-jblue2 text-white rounded-md shadow-[2px_3px_0px_rgba(3,119,124,1)] w-64">
        <span class="gap-2.5">Submit</span>
      </button>
</form>