@extends('layouts.main')

@section('content')
<div class="card mt-1">
    <div class="card-header">
        <h4 class="mb-0">Account Statement</h4>
    </div>
    <form method="POST" action="{{ route('account-statement') }}">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date"
                value="{{ request('start_date', \Carbon\Carbon::now()->submonth(1)->format('Y-m-d')) }}"
                class="form-control"
                min="{{ \Carbon\Carbon::now()->subYear(15)->format('Y-m-d') }}">
        </div>
        <div class="col-md-3">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date"
                value="{{ request('end_date', \Carbon\Carbon::now()->format('Y-m-d')) }}"
                class="form-control"
                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
        </div>
        <div class="col-md-3">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
                <option value="">All</option>
                @foreach ($allSports['data']['menu'] as $sport)
                    <option value="{{ $sport['id'] }}"
                        {{ request('category') == $sport['id'] ? 'selected' : '' }}>
                        {{ $sport['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <button type="button" class="btn btn-secondary mt-4" onclick="resetForm()">Clear</button>
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
        @if (isset($paginationData) && is_array($paginationData['data']) && count($paginationData['data']) > 0)
            @foreach ($paginationData['data'] as $index => $statement)
            <tr>
                <td class="text-center">{{ $statement['id'] }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($statement['created_at'])->format('Y-m-d') }}</td>
                <td class="text-center">{{ $statement['total'] > 0 ? $statement['total'] : '0.00' }}</td>
                <td class="text-center">{{ $statement['total'] < 0 ? abs($statement['total']) : '0.00' }}</td>
                <td class="text-center">{{ $statement['balance'] }}</td>
                <td class="text-center">{{ $statement['sports'] }}</td>
                <td class="text-center">
                    <button
                        class="btn btn-link text-decoration-none remarks-link"
                        casino_bet_id="{{ '803d0e34-8b1e-434b-a714-b5641d92da08' }}">
                        {{ $statement['description'] }}
                    </button>
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">No records found for the selected filters.</td>
            </tr>
        @endif
    </tbody>
</table>

<div class="pagination d-flex justify-content-center mt-3">
    @if ($paginationData['total_pages'] > 1)
        <nav>
            <ul class="pagination">
                <!-- Previous Page -->
                <li class="page-item {{ $paginationData['prev_page'] ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $paginationData['prev_page'] ? route('account-statement', [
                        'page' => $paginationData['prev_page'], 
                        'start_date' => request('start_date'), 
                        'end_date' => request('end_date'), 
                        'category' => request('category')
                    ]) : '#' }}">
                        Previous
                    </a>
                </li>

                <!-- Page Info -->
                <li class="page-item disabled">
                    <span class="page-link">
                        Page {{ $paginationData['current_page'] }} of {{ $paginationData['total_pages'] }}
                    </span>
                </li>

                <!-- Next Page -->
                <li class="page-item {{ $paginationData['next_page'] ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $paginationData['next_page'] ? route('account-statement', [
                        'page' => $paginationData['next_page'], 
                        'start_date' => request('start_date'), 
                        'end_date' => request('end_date'), 
                        'category' => request('category')
                    ]) : '#' }}">
                        Next
                    </a>
                </li>
            </ul>
        </nav>
    @endif
</div>




<!-- Modal for Remarks Details -->
<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">Bet History</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="betStatus" id="matched" value="matched" checked>
                        <label class="form-check-label" for="matched">Matched</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="betStatus" id="deleted" value="deleted">
                        <label class="form-check-label" for="deleted">Deleted</label>
                    </div>
                </div>
                <div id="remarks-content">
                    <!-- Dynamic Remarks content will go here -->
                </div>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">Sr.No</th>
                            <th class="text-center">Round ID</th>
                            <th class="text-center">Side</th>
                            <th class="text-center">Game ID</th>
                            <th class="text-center">Game Code</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Created At</th>
                        </tr>
                    </thead>
                    <tbody id="modal-description-content">
                        <!-- Bet history data will be inserted dynamically here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Remarks Button Click
        document.querySelectorAll('.remarks-link').forEach(button => {
            button.addEventListener('click', function() {
                const casinoBetId = this.getAttribute('casino_bet_id');

                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('descriptionModal'));
                modal.show();

                // Fetch Casino Bet History (POST)
                fetch("{{ route('fetchCasinoBetHistory') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token
                        },
                        body: JSON.stringify({
                            casino_bet_id: casinoBetId
                        })
                    })
                    .then(response => response.json()) // Convert the response to JSON
                    .then(data => {
                        // Check if data contains the necessary keys
                        if (data && data.data && data.data.data && data.data.data.bet_history &&
                            data.data.data.bet_history.data.length > 0) {
                            // Get all bet history items
                            const betHistories = data.data.data.bet_history.data;
                            let content = '';

                            betHistories.forEach((betHistory, index) => {
                                const createdDate = new Date(betHistory.created_at).toISOString().split('T')[0];
                                content += `
                                    <tr>
                                        <td class="text-center">${index + 1}</td>
                                        <td class="text-center">${betHistory.round_id}</td>
                                        <td class="text-center">${betHistory.side}</td>
                                        <td class="text-center">${betHistory.game_id}</td>
                                        <td class="text-center">${betHistory.game_code}</td>
                                        <td class="text-center">${betHistory.amount}</td>
                                        <td class="text-center">${createdDate}</td>
                                    </tr>
                                `;
                            });

                            document.getElementById('modal-description-content').innerHTML = content;
                        } else {
                            document.getElementById('modal-description-content').innerHTML = `No data available for this bet.`;
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching casino bet history:', error);
                        document.getElementById('modal-description-content').innerHTML = `Failed to fetch casino bet history.`;
                    });
            });
        });
    });

    // Clear button function to reset form
    function resetForm() {
        document.getElementById('start_date').value = '';
        document.getElementById('end_date').value = '';
        document.getElementById('category').selectedIndex = 0;
        window.location.href = "{{ route('account-statement') }}";
    }
</script>
@endsection
