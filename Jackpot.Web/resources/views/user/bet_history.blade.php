@extends('layouts.main')
@section('content')
    <div class="card mt-1">
        <div class="card-header"><h4 class="mb-0">Profit Loss </h4></div>
        <div class="card-body container-fluid container-fluid-5">
            <!-- Filter Form -->
            <form id="filter_form" method="GET" action="{{ route('bet-history')}}" class="">
                <div class="row row5 mt-2">
                    <div class="col-md-2">
                        <div class="form-group mb-0">
                            <select name="event_type_id" id="event_type_id" class="custom-select">
                                <option value="ALL">All Sports</option>
                                @foreach($allSports['data']['menu'] as $sport)
                                    <option value="{{ $sport['id'] }}">{{ $sport['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-0">
                            <select  name="reportType" id="is_matched" class="custom-select">
                                <option  value="" disabled="disabled">Bet Status</option>
                                <option  value="1">Matched</option><option  value="0">Un Matched</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div  class="form-group mb-0">
                            <div  class="mx-datepicker">
                                <div  class="mx-input-wrapper">
                                    <input  formcontrolname="start_date" name="date" type="date" autocomplete="off" placeholder="Select Date" class="mx-input ng-untouched ng-pristine ng-valid">
                                    <span  class="mx-input-append mx-clear-wrapper"><i  class="mx-input-icon mx-clear-icon"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div  class="form-group mb-0">
                            <div  class="mx-datepicker">
                                <div  class="mx-input-wrapper">
                                    <input  formcontrolname="end_date" name="date" type="date" autocomplete="off" placeholder="Select Date" class="mx-input ng-untouched ng-pristine ng-valid">
                                    <span  class="mx-input-append mx-clear-wrapper"><i  class="mx-input-icon mx-clear-icon"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button  class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>
            </form>
            <div class="row row5 mt-2">
                <div class="row row5">
                    <div class="col-12 account-statement-tbl">
                        <div class="table-responsive">
                            <table  role="table" aria-busy="false" aria-colcount="6" class="table b-table table-striped table-bordered">
                                <thead  role="rowgroup">
                                    <tr  role="row">
                                        <th  role="columnheader" scope="col" aria-colindex="1" class="text-center">Event Name</th>
                                        <th  role="columnheader" scope="col" aria-colindex="1" class="text-center">Nation</th>
                                        <th  role="columnheader" scope="col" aria-colindex="1" class="text-center">Bet Type</th>
                                        <th  role="columnheader" scope="col" aria-colindex="1" class="text-center">User Rate</th>
                                        <th  role="columnheader" scope="col" aria-colindex="1" class="text-center">Amount</th>
                                        <th  role="columnheader" scope="col" aria-colindex="1" class="text-center">Profit/loss</th>
                                        <th  role="columnheader" scope="col" aria-colindex="1" class="text-center">Place Date</th>
                                        <th  role="columnheader" scope="col" aria-colindex="1" class="text-center">Match Date</th><!---->
                                    </tr>
                                </thead>
                                @if($events && !empty($events['data']))

                                    <tbody  role="rowgroup">
                                        @foreach($events['data'] as $event)
                                            <tr>
                                                <td>{{ $event['event_name'] }}</td>
                                                <td>{{ $event['selection_name'] }}</td>
                                                <td>{{ ($event['bet_type'])?'back':'lay' }}</td>
                                                <td>{{ $event['rate'] }}</td>
                                                <td>{{ $event['stake'] }}</td>
                                                <td>{{ $event['result'] }}</td>
                                                <td>{{ $event['matched_at'] }}</td>
                                                <td>{{ $event['matched_at'] }}</td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <tbody><tr ><td  colspan="8">No Data To Display</td></tr></tbody>
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
$(document).ready(function () {
    $('#event_type_id').change(function (event) {
        event.preventDefault();
        var eventTypeId = $(this).val();

        $.ajax({
            url: "{{ route('bet-history') }}",
            type: 'GET',
            data: {
                event_type_id: eventTypeId,
            },
            success: function (data) {
                // Check if the API returned data and populate the table
                if (data && data.data && data.data.length > 0) {
                    var tableRows = '';
                    $.each(data.data, function(index, event) {
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

                    $('table tbody').html(tableRows); // Insert the rows into the table
                } else {
                    // If no data, display a message in the table
                    $('table tbody').html('<tr><td colspan="8">No Data To Display</td></tr>');
                }
            },
            error: function (error) {
                console.error(error); // Log any error in the console
            }
        });
    });
});

    </script>
@endsection
