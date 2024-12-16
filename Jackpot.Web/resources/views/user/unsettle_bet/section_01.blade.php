<style>
    table, th, td {
        border: 0.5px solid #393E46 !important;
    }
</style>
<div class="overflow-x-auto mt-5">
    <table class="w-full text-xs text-white border-collapse">
        <!-- Table Header -->
        <thead class="text-sm table-th text-left">
            <tr>
                <th>No</th>
                <th>Event</th>
                <th>Nation</th>
                <th>Event Type</th>
                <th>Market Name</th>
                <th>Side</th>
                <th>Rate</th>
                <th>Amount</th>
                <th>Place Date</th>
                <th>Match Date</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody class="table-td">
            @if($events && !empty($events))
                @foreach($events as $event)
                <tr class="border border-jcolor1 px-4 py-3" data-is-matched="{{ $event['is_matched'] }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event['event_name'] }}</td>
                    <td>{{ $event['selection_name'] }}</td>
                    <td>{{ ($event['bet_type']) ? 'back' : 'lay' }}</td>
                    <td>{{ $event['rate'] }}</td>
                    <td>{{ $event['stake'] }}</td>
                    <td>{{ $event['requested_at'] }}</td>
                    <td>{{ $event['matched_at'] }}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<script>
    function filterTable(filterValue) {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const isMatched = row.getAttribute('data-is-matched');
            if (filterValue == 2) {
                row.style.display = 'none';
            } else if (isMatched == filterValue) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
