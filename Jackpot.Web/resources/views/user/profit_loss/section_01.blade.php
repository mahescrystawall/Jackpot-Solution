<style>
    table,
    th,
    td {
        border: 0.5px solid #393E46 !important;
    }
</style>
<div class="overflow-x-auto mt-5">
    <table class="w-full text-xs text-white border-collapse ">
        <!-- Table Header -->
        <thead class="text-sm table-th">
            <tr>
                <th class=" w-[47px]">No.</th>
                <th class=" w-[114px]">Date</th>
                <th class=" w-[111px]">Event Type</th>
                <th class=" w-[109px]">Event</th>
                <th class=" w-[109px]">Amount</th>
            </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="table-td" id="data-table-body">    

            @include('user.profit_loss.section_table_body')
         
           
        </tbody>
    </table>
    @include('pagination.index')
</div>