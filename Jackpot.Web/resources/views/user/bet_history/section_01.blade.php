<style>
    table,
    th,
    td {
        border: 0.5px solid #393E46 !important;
    }
</style>
<div class="overflow-x-auto mt-5">
    <table class="w-full text-xs text-white border-collapse ">
        <thead class="text-sm table-th text-left">
            <tr>
                <th class=" w-[47px]">Event</th>
                <th class=" w-[114px]">Nation</th>
                <th class=" w-[111px]">Bet Type</th>
                <th class=" w-[109px]">User Rate</th>
                <th class=" w-[109px]">Amount</th>
                <th class=" w-[109px]">Profit/Loss</th>
                <th class=" w-[109px]">Place Date</th>
                <th class=" w-[109px]">Match Date</th>
            </tr>
        </thead>
        <tbody class="table-td" id="data-table-body">
        @include('user.bet_history.section_table_body')
        </tbody>
    </table>
</div>
