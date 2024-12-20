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
        <tbody class="table-td">
            @if(!empty($events))
                @foreach($events as $event)
                    <tr class="border border-jcolor1 px-4 py-3">
                        <td class="overflow-hidden whitespace-nowrap">{{ $event['event_name'] }}</td>
                        <td class="overflow-hidden whitespace-nowrap">{{ $event['selection_name'] }}</td>
                        <td>{{ ($event['bet_type']) ? 'back' : 'lay' }}</td>
                        <td>{{ $event['rate'] }}</td>
                        <td>{{ $event['stake'] }}</td>
                        <td>{{ $event['result'] }}</td>
                        <td class="overflow-hidden whitespace-nowrap">{{ $event['matched_at'] }}</td>
                        <td class="overflow-hidden whitespace-nowrap">{{ $event['matched_at'] }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const submitButton = document.querySelector('button[type="submit"]');
        const eventTypeSelect = document.getElementById('event_type_id');
        const betStatusSelect = document.getElementById('is_matched');
        const startDateInput = document.querySelector('input[name="start_date"]');
        const endDateInput = document.querySelector('input[name="end_date"]');

        // Listen for the submit button click
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            const eventTypeId = eventTypeSelect.value;
            const betStatus = betStatusSelect.value;
            const startDate = startDateInput.value;
            const endDate = endDateInput.value;
            const type = "ALL";

            // Prepare the payload for the POST request
            const payload = {
                start_date: startDate,
                end_date: endDate,
                event_type_id: eventTypeId,
                type: type,
                is_matched: betStatus
            };

            // Send POST request using fetch
            fetch('http://127.0.0.1:8081/api/bet_history', {
                method: 'POST', // HTTP method
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(payload)
            })
            .then(response => response.json())
            .then(data => {
                // Check if the API returned data and populate the table
                if (data && data.length > 0) {
                    let tableRows = '';
                    data.forEach(event => {
                        tableRows += `<tr class="border border-jcolor1 px-4 py-3">
                                        <td class="overflow-hidden whitespace-nowrap">${event.event_name}</td>
                                        <td class="overflow-hidden whitespace-nowrap">${event.selection_name}</td>
                                        <td>${event.bet_type ? 'back' : 'lay'}</td>
                                        <td>${event.rate}</td>
                                        <td>${event.stake}</td>
                                        <td>${event.result}</td>
                                        <td class="overflow-hidden whitespace-nowrap">${event.matched_at}</td>
                                        <td class="overflow-hidden whitespace-nowrap">${event.matched_at}</td>
                                    </tr>`;
                    });

                    // Insert the rows into the table
                    document.querySelector('table tbody').innerHTML = tableRows;
                } else {
                    // If no data, display a message in the table
                    document.querySelector('table tbody').innerHTML = '<tr><td colspan="8">No Data To Display</td></tr>';
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        });
    });
</script>

