@if(!empty($events))
@foreach($events as $event)

<tr class="border border-jcolor1 px-4 py-3">
    <td class="overflow-hidden whitespace-nowrap">{{ $event['event_name'] }}</td>
    <td class="overflow-hidden whitespace-nowrap">{{ $event['nation'] }}</td>
    <td>{{ ($event['is_back']) ? 'back' : 'lay' }}</td>
    <td>{{ $event['odd'] }}</td>
    <td>{{ $event['stake'] }}</td>
    <td>{{ $event['type'] }}</td>
    <td class="overflow-hidden whitespace-nowrap">{{ $event['created_on'] }}</td>
    <td class="overflow-hidden whitespace-nowrap">{{ $event['match_date'] }}</td>
</tr>
@endforeach
@endif