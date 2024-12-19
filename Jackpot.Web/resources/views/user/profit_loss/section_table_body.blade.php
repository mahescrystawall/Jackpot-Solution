@if($profitData && !empty($profitData))

<?php  $serial = ($pagination['current_page'] - 1) * $pagination['per_page'] + 1; ?>

@foreach($profitData as $event)
    <tr class="border border-jcolor1 px-4 py-2">
        <td  class="text-center">{{ $serial++ }}</td>
        <td class="overflow-hidden whitespace-nowrap">{{ \Carbon\Carbon::parse($event['created_at'])->format('Y-m-d H:i:s') }}</td>
        <td class="text-center">{{ $event['event_type_name'] }}</td>
        <td class="text-ellipsis overflow-hidden whitespace-nowrap">{{ $event['event_name'] }}</td>
        <td class="text-red-600 text-center">{{ number_format($event['amount'], 2) }}</td>
     

    </tr>
@endforeach
@else
    <tr ><td  colspan="5">No Data To Display</td></tr>
    @endif