@extends('layouts.main')
@section('content')
    <div class="card mt-1">
        <div class="card-header">
            <h4 class="mb-0">Bet History </h4>
        </div>
        <div class="card-body container-fluid container-fluid-5">
            <!-- Filter Form -->
            <form id="filter_form" method="POST" action="{{ route('bet-history') }}" class="">
                <div class="row row5 mt-2">
                    <div class="col-md-2">
                        <div class="form-group mb-0">
                            <select name="event_type_id" id="event_type_id" class="custom-select">
                                <option value="ALL">All Sports</option>
                                @foreach ($allSports['data']['menu'] as $sport)
                                    <option value="{{ $sport['id'] }}">{{ $sport['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-0">
                            <select name="reportType" id="is_matched" class="custom-select">
                                <option value="" disabled="disabled">Bet Status</option>
                                <option value="1">Matched</option>
                                <option value="0">Un Matched</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-0">
                            <div class="mx-datepicker">
                                <div class="mx-input-wrapper">
                                    <input formcontrolname="start_date" name="start_date" type="date" autocomplete="off"
                                        value={{$startDatecal}} "Select Date" class="mx-input ng-untouched ng-pristine ng-valid">
                                    <span class="mx-input-append mx-clear-wrapper"><i
                                            class="mx-input-icon mx-clear-icon"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-0">
                            <div class="mx-datepicker">
                                <div class="mx-input-wrapper">
                                    <input formcontrolname="end_date" name="end_date" type="date" autocomplete="off"
                                    value={{$endDatecal}} placeholder="Select Date" class="mx-input ng-untouched ng-pristine ng-valid">
                                    <span class="mx-input-append mx-clear-wrapper"><i
                                            class="mx-input-icon mx-clear-icon"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

            <div class="col-md-2">
                <button id="submitBtn" class="btn btn-primary btn-block">Submit</button>
            </div>
            <div class="row row5 mt-2">
                <div class="row row5">
                    <div class="col-12 account-statement-tbl">
                        <div class="table-responsive">
                            <table role="table" aria-busy="false" aria-colcount="6"
                                class="table b-table table-striped table-bordered">
                                <thead role="rowgroup">
                                    <tr role="row">
                                        <th role="columnheader" scope="col" aria-colindex="1" class="text-center">Event
                                            Name</th>
                                        <th role="columnheader" scope="col" aria-colindex="1" class="text-center">Nation
                                        </th>
                                        <th role="columnheader" scope="col" aria-colindex="1" class="text-center">Bet
                                            Type</th>
                                        <th role="columnheader" scope="col" aria-colindex="1" class="text-center">User
                                            Rate</th>
                                        <th role="columnheader" scope="col" aria-colindex="1" class="text-center">Amount
                                        </th>
                                        <th role="columnheader" scope="col" aria-colindex="1" class="text-center">
                                            Profit/loss</th>
                                        <th role="columnheader" scope="col" aria-colindex="1" class="text-center">Place
                                            Date</th>
                                        <th role="columnheader" scope="col" aria-colindex="1" class="text-center">Match
                                            Date</th><!---->
                                    </tr>
                                </thead>
                                @if ($events)
                                    <tbody role="rowgroup">
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{ $event['event_name'] }}</td>
                                                <td>{{ $event['selection_name'] }}</td>
                                                <td>{{ $event['bet_type'] ? 'back' : 'lay' }}</td>
                                                <td>{{ $event['rate'] }}</td>
                                                <td>{{ $event['stake'] }}</td>
                                                <td>{{ $event['result'] }}</td>
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
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const eventTypeSelect = document.getElementById('event_type_id');
            const betStatusSelect = document.getElementById('is_matched');
            const startDateInput = document.querySelector('input[name="start_date"]');
            const endDateInput = document.querySelector('input[name="end_date"]');
            const filterForm = document.getElementById('filter_form');
            const submitButton = document.querySelector('#submitBtn');

            // Attach an event listener to the submit button
            submitButton.addEventListener('click', function(event) {
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
                fetch('http://127.0.0.1:8081/api/bet_history', {
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
