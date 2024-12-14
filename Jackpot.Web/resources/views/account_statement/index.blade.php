@extends('layouts.main')

@section('content')
<div class="card mt-1">
    <div class="card-header">
        <h4 class="mb-0">Account Statement</h4>
    </div>
    <!-- Form for filtering data -->
    <form method="GET" action="{{ route('account-statement') }}">
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
                    <option value="">All</option> <!-- Default option for All categories -->
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
                <!-- Clear Button -->
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
            @if(isset($paginationData) && is_array($paginationData))
            @foreach($paginationData['data'] as $index => $statement)
            <tr>
                <td class="text-center">{{ $statement['id'] }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($statement['created_at'])->format('Y-m-d') }}</td>
                <td class="text-center">{{ $statement['total'] > 0 ? $statement['total'] : '0.00' }}</td>
                <td class="text-center">{{ $statement['total'] < 0 ? $statement['total'] : '0.00' }}</td>
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
                <td colspan="7" class="text-center">No data available</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div>

    
</div>

<div class="pagination d-flex flex-column align-items-center">
    @if (!empty($paginationData) && $paginationData['total_pages'] > 0)
        <!-- Buttons for navigation -->
        <div class="button-group d-flex">
            <!-- Previous Button -->
            @if ($paginationData['prev_page'])
                <a href="{{ route('account-statement', [
                        'page' => $paginationData['prev_page'], 
                        'start_date' => request('start_date'), 
                        'end_date' => request('end_date'), 
                        'category' => request('category')
                    ]) }}" 
                    class="btn btn-primary btn-sm btn-prev me-2">
                    <i class="fas fa-arrow-left"></i> Previous
                </a>
            @else
                <span class="btn btn-secondary btn-sm btn-prev me-2" disabled>
                    <i class="fas fa-arrow-left"></i> Previous
                </span>
            @endif

            <!-- Next Button -->
            @if ($paginationData['next_page'])
                <a href="{{ route('account-statement', [
                        'page' => $paginationData['next_page'], 
                        'start_date' => request('start_date'), 
                        'end_date' => request('end_date'), 
                        'category' => request('category')
                    ]) }}" 
                    class="btn btn-primary btn-sm btn-next">
                    Next <i class="fas fa-arrow-right"></i>
                </a>
            @else
                <span class="btn btn-secondary btn-sm btn-next" disabled>
                    Next <i class="fas fa-arrow-right"></i>
                </span>
            @endif
        </div>

        <!-- Page Information -->
        <div class="page-info mt-2">
            <span class="page-info-text">
                Total Page <strong>{{ $paginationData['current_page'] }}</strong> of <strong>{{ $paginationData['total_pages'] }}</strong>
            </span>
        </div>
    @else
        <!-- No Data Available -->
        <div class="no-data mt-3">
            <p>No data available for the selected filters.</p>
        </div>
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
                    <form id="betHistoryForm" action="{{ route('fetchCasinoBetHistory') }}" method="POST">
                        @csrf
                        <!-- Table to display Bet History -->
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
                    </form>
                </div>
                <div class="modal-footer">
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
                            if (
                                data &&
                                data.data &&
                                data.data.data &&
                                data.data.data.bet_history &&
                                data.data.data.bet_history.data &&
                                data.data.data.bet_history.data.length > 0
                            ) {
                                // Get all bet history items
                                const betHistories = data.data.data.bet_history.data;

                                // Create the table content
                                let content = '';

                                // Loop over each bet history and create a table row for each
                                betHistories.forEach((betHistory, index) => {
                                    const createdDate = new Date(betHistory.created_at).toISOString().split('T')[0];
                                    content += `
                                <tr>
                                    <td class="text-center">${index + 1}</td> <!-- Increment Sr.No dynamically -->
                                    <td class="text-center">${betHistory.round_id}</td>
                                    <td class="text-center">${betHistory.side}</td>
                                    <td class="text-center">${betHistory.game_id}</td>
                                    <td class="text-center">${betHistory.game_code}</td>
                                    <td class="text-center">${betHistory.amount}</td>
                                    <td class="text-center">${createdDate}</td>
                                </tr>
                            `;
                                });

                                // Update the modal content with the table data
                                document.getElementById('modal-description-content').innerHTML = content;
                            } else {
                                // If no data is available, show an error message
                                document.getElementById('modal-description-content').innerHTML = `No data available for this bet.`;
                            }
                        })
                        .catch(error => {
                            // If the fetch fails, show an error message
                            console.error('Error fetching casino bet history:', error);
                            document.getElementById('modal-description-content').innerHTML = `Failed to fetch casino bet history.`;
                        });
                });
            });
        });

        // Clear button function to reset form
        function resetForm() {
            // Reset form fields to empty values
            document.getElementById('start_date').value = '';
            document.getElementById('end_date').value = '';
            document.getElementById('category').value = '';

            // Optionally, submit the form or reload the page to clear the query parameters
            // This will reload the page without any query parameters (no filters)
            window.location.href = "{{ route('account-statement') }}";
        }
    </script>
    @endsection