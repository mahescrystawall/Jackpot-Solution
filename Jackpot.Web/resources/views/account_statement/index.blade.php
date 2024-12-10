@extends('layouts.main')

@section('content')
<div class="card mt-1">
    <div class="card-header">
        <h4 class="mb-0">Account Statement</h4>
    </div>
    <!-- Form for filtering data -->
    <form method="GET" action="{{ url()->current() }}">
        <div class="row">
            <div class="col-md-3">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">All</option>
                    <option value="Football" {{ request('category') == 'Football' ? 'selected' : '' }}>Football</option>
                    <option value="Cricket" {{ request('category') == 'Cricket' ? 'selected' : '' }}>Cricket</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
        </div>
    </form>

    <!-- Display filtered data in a table -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
            <th class="text-center">S.No</th>
                <th class="text-center">Date</th>
                <th class="text-center">Credit</th>
                <th class="text-center">Debit</th>
                <th class="text-center">Balance</th>
                <th class="text-center">Sports</th>
                <th class="text-center">Remarks</th>
            </tr>
        </thead>
        <tbody>
        @foreach($filteredData as $index => $statement) 
                <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                    <td >{{ $statement['date'] }}</td>
                    <td>{{ $statement['credit'] }}</td>
                    <td>{{ $statement['debit'] }}</td>
                    <td>{{ $statement['balance'] }}</td>
                    <td>{{ $statement['sports'] }}</td>
                    <td>
                    <a href="#" class="remarks-link" data-remarks="{{ $statement['remarks'] }}" data-toggle="modal" data-target="#descriptionModal">
                    {{ $statement['remarks'] }}
                    </a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal for Remarks Details -->
<!-- Modal for Remarks Details -->
<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">Bet History</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <div id="remarks-content">
                    <!-- Dynamic Remarks content will go here -->
                </div>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">Sr.No</th>
                            <th class="text-center">Round Id</th>
                            <th class="text-center">Side</th>
                            <th class="text-center">Game Id</th>
                            <th class="text-center">Game Code</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Place Date</th>
                        </tr>
                    </thead>
                    <tbody id="modal-description-content">
                    <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">R001</td>
                            <td class="text-center">Left</td>
                            <td class="text-center">G123</td>
                            <td class="text-center">B01</td>
                            <td class="text-center">$500</td>
                            <td class="text-center">2024-12-09</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const remarksLinks = document.querySelectorAll('.remarks-link');
        remarksLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const remarks = this.getAttribute('data-remarks');
                document.getElementById('remarks-content');
                const modal = new bootstrap.Modal(document.getElementById('descriptionModal'));
                modal.show();
            });
        });
    });
</script>


@endsection
