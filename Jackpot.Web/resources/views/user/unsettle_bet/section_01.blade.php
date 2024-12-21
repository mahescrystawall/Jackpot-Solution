<style>
    table,
    th,
    td {
        border: 0.5px solid #393E46 !important;
    }
</style>
<div class="overflow-x-auto mt-5">
    <table class="w-full text-xs text-white border-collapse">
        <!-- Table Header -->
        <thead class="text-sm table-th text-left">
            <tr>
                <th>No.</th>
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
        <tbody class="table-td" id="table-body">
            @if($events && !empty($events))
            @foreach($events as $event)
            <tr class="border border-jcolor1 px-4 py-3" id="matched_status">
                <td>{{$loop->iteration}}</td>
                <td>{{ $event['event_name'] }}</td>
                <td>{{ $event['nation'] }}</td>
                <td>{{ $event['EventType'] }}</td>
                <td>{{ $event['market_name'] }}</td>
                <td>{{ ($event['is_back']) ? 'back' : 'lay' }}</td>
                <td>{{ $event['odd'] }}</td>
                <td>{{ $event['amount'] }}</td>
                <td>{{ $event['place_date'] }}</td>
                <td>{{ $event['match_date'] }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<script>
    // function filterTable(filterValue) {
    //     const rows = document.querySelectorAll('tbody tr');
    //     rows.forEach(row => {
    //         const isMatched = row.getAttribute('data-is-matched');
    //         if (filterValue == 2) {
    //             row.style.display = 'none';
    //         } else if (isMatched == filterValue) {
    //             row.style.display = '';
    //         } else {
    //             row.style.display = 'none';
    //         }
    //     });
    // }


    function filterTable(status) {

        const url = '/unsettled_bets_filtered';

        // Perform the fetch request
        fetch(url, {
                method: 'POST', // Use POST for sending data
                headers: {
                    'Content-Type': 'application/json', // Indicate JSON payload
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content // For Laravel CSRF protection
                },
                body: JSON.stringify({
                    status
                }) // Send the status value
            })
            .then(response => response.json())
            // Parse the JSON response
            .then(data => {
                // Handle the response data (e.g., populate a table)
                const tableBody = document.querySelector('#table-body');
                tableBody.innerHTML = '';
                data.forEach((item, index) => {
                    const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.event_name}</td>
                        <td>${item.nation}</td>
                        <td>${item.EventType}</td>
                        <td>${item.market_name}</td>
                        <td>${item.is_back ? 'back' : 'lay'}</td>
                        <td>${item.odd}</td>
                        <td>${item.amount}</td>
                        <td>${item.place_date}</td>
                        <td>${item.match_date}</td>
                    </tr>`;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error); // Handle errors
            });
    }
</script>

</script>

</script>