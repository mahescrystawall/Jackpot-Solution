@extends('layouts.main')
@section('content')
    <div class="card mt-1">
        <div class="card-header">
            <h4 class="mb-0">Unsettled Bets</h4>
        </div>
        <div class="card-body container-fluid container-fluid-5">
            <!-- Filter Form -->
            <form id="filter_form" method="GET" action="{{ route('unsettled_bets') }}" class="mb-3">
                <div class="row row5 mt-2">
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <div class="d-flex align-items-center gap-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="matched" name="reportType" value="1">
                                    <label class="form-check-label" for="matched">Matched</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="unmatched" name="reportType" value="0">
                                    <label class="form-check-label" for="unmatched">Unmatched</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>



            <div class="row row5 mt-2">
                <div class="col-12 account-statement-tbl">
                    <div class="table-responsive">
                        <table role="table" aria-busy="false" aria-colcount="6"
                            class="table b-table table-striped table-bordered">
                            <thead role="rowgroup">
                                <tr role="row">
                                    <th role="columnheader" scope="col" class="text-center">Event Name</th>
                                    <th role="columnheader" scope="col" class="text-center">Nation</th>
                                    <th role="columnheader" scope="col" class="text-center">Bet Type</th>
                                    <th role="columnheader" scope="col" class="text-center">User Rate</th>
                                    <th role="columnheader" scope="col" class="text-center">Amount</th>
                                    <th role="columnheader" scope="col" class="text-center">Event Market Name</th>
                                    <th role="columnheader" scope="col" class="text-center">Place Date</th>
                                    <th role="columnheader" scope="col" class="text-center">Match Date</th>
                                </tr>
                            </thead>
                            @if ($events)
                                <tbody role="rowgroup">
                                    @foreach ($events as $event)
                                        <tr class="lay">
                                            <td>{{ $event['event_name'] }}</td>
                                            <td>{{ $event['selection_name'] }}</td>
                                            <td>{{ $event['bet_type'] ? 'back' : 'lay' }}</td>
                                            <td>{{ $event['rate'] }}</td>
                                            <td>{{ $event['stake'] }}</td>
                                            <td>{{ $event['market_type_id'] }}</td>
                                            <td>{{ $event['matched_at'] }}</td>
                                            <td>{{ $event['matched_at'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="8">No Data To Display</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const submitButton = document.querySelector('#submitBtn');

            // Attach an event listener to the submit button
            submitButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default form submission
                const betStatus = document.querySelector('input[name="reportType"]:checked')?.value;

                if (!betStatus) {
                    alert('Please select a Bet Status!');
                    return;
                }

                // Prepare the payload for the POST request
                const payload = { is_matched: betStatus };

                fetch('http://127.0.0.1:8081/api/unsettled_bets', {
                        method: 'POST', // HTTP method
                        headers: {
                            'Content-Type': 'application/json' // Set content type as JSON
                        },
                        body: JSON.stringify(payload) // Convert the payload to JSON
                    })
                    .then(response => response.json()) // Parse the JSON response
                    .then(data => {
                        console.log(data);
                        if (data && data.length > 0) {
                            let tableRows = '';
                            data.forEach(event => {
                                tableRows += `<tr>
                                    <td>${event.event_name}</td>
                                    <td>${event.selection_name}</td>
                                    <td>${event.bet_type ? 'back' : 'lay'}</td>
                                    <td>${event.rate}</td>
                                    <td>${event.stake}</td>
                                    <td>${event.result}</td>
                                    <td>${event.matched_at}</td>
                                    <td>${event.matched_at}</td>
                                </tr>`;
                            });
                            document.querySelector('table tbody').innerHTML = tableRows;
                        } else {
                            document.querySelector('table tbody').innerHTML =
                                '<tr><td colspan="8">No Data To Display</td></tr>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            });
        });
    </script>
@endsection
