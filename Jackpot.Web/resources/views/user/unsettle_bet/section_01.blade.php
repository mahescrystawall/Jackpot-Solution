<style>
    table, th, td {
        border: 0.5px solid #393E46 !important;
    }

</style>
<div class="overflow-x-auto mt-5">
    <table class="w-full text-xs text-white border-collapse ">
        <!-- Table Header -->
        <thead class="text-sm table-th text-left">
            <tr>
                <th class=" w-[47px]">No</th>
                <th class=" w-[47px]">Event</th>
                <th class=" w-[114px]">Nation</th>
                <th class=" w-[111px]">Event Type</th>
                <th class=" w-[111px]">Market Name</th>
                <th class=" w-[109px]">Side</th>
                <th class=" w-[109px]">Rate</th>
                <th class=" w-[109px]">Amount</th>
                <th class=" w-[109px]">Place Date</th>
                <th class=" w-[109px]">Match Date</th>
            </tr>
        </thead>

        <!-- Table Body -->




        <tbody class="table-td">
            @if($events && !empty($events))
                @foreach($events as $event)
                <tr class="border border-jcolor1 px-4 py-3">
                    <td class="overflow-hidden whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="overflow-hidden whitespace-nowrap">{{ $event['event_name'] }}</td>
                    <td class="overflow-hidden whitespace-nowrap">{{ $event['selection_name'] }}</td>
                    <td class="">{{ ($event['bet_type'])?'back':'lay' }}</td>
                    <td class="">{{ $event['rate'] }}</td>
                    <td class="">{{ $event['stake'] }}</td>
                    <td class="">{{ $event['event_name'] }}</td>
                    <td class="">{{ $event['event_name'] }}</td>
                    <td class="overflow-hidden whitespace-nowrap">{{ $event['matched_at'] }}</td>
                    <td class="overflow-hidden whitespace-nowrap">{{ $event['matched_at'] }}</td>
                </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</div>
