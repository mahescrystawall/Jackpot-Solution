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
                            <select  name="reportType" id="event_type_id" class="custom-select">
                                <option  value="ALL">All Sports</option>
                                <option  value="4">Cricket</option>
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
    $(document).ready(function() {
        // alert('dfjhj');
        $(document).on('change', '.custom-select', function(event) {
            event.preventDefault();
             var is_matched = $('#is_matched').val();
             var event_type_id = $('#event_type_id').val();

        });  
    });
    </script>
@endsection