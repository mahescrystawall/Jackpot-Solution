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
                    value="{{ request('start_date', now()->subMonth()->format('Y-m-d')) }}"
                    class="form-control"
                    min="{{ now()->subYears(15)->format('Y-m-d') }}">
            </div>
            <div class="col-md-3">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date"
                    value="{{ request('end_date', now()->format('Y-m-d')) }}"
                    class="form-control"
                    max="{{ now()->format('Y-m-d') }}">
            </div>
            <div class="col-md-3">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">All</option>
                    @foreach ($allSports['data']['menu'] as $sport)
                    <option value="{{ $sport['id'] }}" {{ request('category') == $sport['id'] ? 'selected' : '' }}>
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
            @forelse ($paginationData['data'] ?? [] as $index => $statement)
            <tr>
                <td class="text-center">
                {{ ($paginationData['current_page'] - 1) * $paginationData['perPage'] + $loop->iteration }}
                </td>
                <td class="text-center">{{ \Carbon\Carbon::parse($statement['created_at'])->format('Y-m-d') }}</td>
                <td class="text-center">{{ $statement['total'] > 0 ? $statement['total'] : '0.00' }}</td>
                <td class="text-center">{{ $statement['total'] < 0 ? abs($statement['total']) : '0.00' }}</td>
                <td class="text-center">{{ $statement['balance'] }}</td>
                @php
                $menuItem = collect($menuData)->firstWhere('id', $statement['event_type_id']);
                @endphp
                <td class="text-center">{{ $menuItem['name'] ?? 'N/A' }}</td>
                <td class="text-center">
                    @if($statement['event_type_id'] == 99994 || $statement['event_type_id'] == 311 || $statement['event_type_id'] == 99991)
                    <a href="javascript:void(0);"
                        class="btn btn-link text-decoration-none static-modal-link"
                        data-start-date="{{ request('start_date', now()->subMonth()->format('Y-m-d')) }}"
                        data-end-date="{{ request('end_date', now()->format('Y-m-d')) }}"
                        data-event-type-id="{{ $statement['event_type_id'] ?? '' }}"
                        data-type="MARKET"
                        data-market-id="{{ $statement['market_id'] ?? '' }}"
                        data-is-matched="1">
                        {{ $statement['description'] }}
                    </a>
                    @elseif($statement['event_type_id'] != 99994 || $statement['event_type_id'] != 311 || $statement['event_type_id'] != 99991)
                    <button class="btn btn-link text-decoration-none remarks-link"
                        data-bs-toggle="modal"
                        data-bs-target="#descriptionModal"
                        data-casino-bet-id="{{ $statement['market_type_id'] ?? '' }}">
                        {{ $statement['description'] }}
                    </button>
                </td>
                @endif


            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No records found for the selected filters.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination d-flex justify-content-center mt-3">
        @if ($paginationData['total_pages'] > 1)
        <nav>
            <ul class="pagination">
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
                <li class="page-item disabled">
                    <span class="page-link">Page {{ $paginationData['current_page'] }} of {{ $paginationData['total_pages'] }}</span>
                </li>
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

    <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Bet History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Radio Buttons -->
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
                    <!-- Table -->
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="betDetailsModalLabel">Bet Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <!-- Body -->
                <div class="modal-body">
                    <!-- Radio Buttons -->
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="betType" id="wonBets" value="won" checked>
                            <label class="form-check-label" for="wonBets">Matched</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="betType" id="lostBets" value="lost">
                            <label class="form-check-label" for="lostBets">Deleted</label>
                        </div>
                    </div>
                    <!-- Table -->
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Nation</th>
                                <th class="text-center">Side</th>
                                <th class="text-center">Rate</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Win/Loss</th>
                                <th class="text-center">Place Date</th>
                                <th class="text-center">Match Date</th>
                            </tr>
                        </thead>


                        <tbody id="bet-details-content">
                            <!-- Dynamic Content Will Go Here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.remarks-link').forEach(button => {
            button.addEventListener('click', function() {
                const casinoBetId = this.getAttribute('data-casino-bet-id');

                // Fetch the data
                fetch("{{ route('fetchCasinoBetHistory') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            casino_bet_id: casinoBetId
                        })
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.json();
                    })
                    .then(data => {
                        const betHistory = data.data || {};

                        // Generate table row for single data entry
                        const content = `
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">${betHistory.round_id ?? 'N/A'}</td>
                            <td class="text-center">${betHistory.side ?? 'back'}</td>
                            <td class="text-center">${betHistory.game_id ?? 'N/A'}</td>
                            <td class="text-center">${betHistory.game_code ?? 'N/A'}</td>
                            <td class="text-center">${betHistory.amount ?? '0.00'}</td>
                            <td class="text-center">${new Date(betHistory.created_at).toISOString().split('T')[0] ?? 'N/A'}</td>
                        </tr>
                    `;

                        // Inject the content into the modal
                        document.getElementById('modal-description-content').innerHTML = content;
                    })
                    .catch(error => {
                        console.error('Error fetching casino bet history:', error);
                        document.getElementById('modal-description-content').innerHTML =
                            '<tr><td colspan="6" class="text-center">Failed to fetch casino bet history.</td></tr>';
                    });
            });
        });

        // Clear modal content when it is closed
        document.getElementById('descriptionModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('modal-description-content').innerHTML = '';
        });
    });

    function resetForm() {
        document.getElementById('start_date').value = '';
        document.getElementById('end_date').value = '';
        document.getElementById('category').selectedIndex = 0;
        window.location.href = "{{ route('account-statement') }}";
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Select all links with the class 'static-modal-link'
        document.querySelectorAll('.static-modal-link').forEach(link => {
            link.addEventListener('click', function() {
                // Show the modal
                const modalElement = document.getElementById('staticModal');
                const modal = new bootstrap.Modal(modalElement);
                modal.show();

                // Fetch data attributes from the clicked link
                const startDate = this.getAttribute('data-start-date');
                const endDate = this.getAttribute('data-end-date');
                const eventTypeId = this.getAttribute('data-event-type-id');
                const marketId = this.getAttribute('data-market-id');
                const type = this.getAttribute('data-type');
                const isMatched = this.getAttribute('data-is-matched');

                // Prepare data for API call
                const requestData = {
                    start_date: startDate,
                    end_date: endDate,
                    event_type_id: eventTypeId,
                    type: type,
                    market_id: marketId,
                    is_matched: isMatched
                };

                if (!startDate || !endDate || !eventTypeId || !marketId) {
                    console.error('Missing required parameters');
                    return; // Prevent the fetch call if any data is missing
                }
                // Call the API
                fetch("{{ route('fetchOrderHistory') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Failed to fetch data.');
                        return response.json();
                    })
                    .then(data => {
                        const betDetails = data.data.data[0] || {};

                        // Populate modal with data
                        const row = `
                    <tr>
                     <td class="text-center">1</td>
                      <td class="text-center">${betDetails.selection_name ?? 'N/A'}</td>
                        <td class="text-center">${betDetails.side ?? 'back'}</td>
                        <td class="text-center">${betDetails.rate ?? 'N/A'}</td>
                        <td class="text-center">${betDetails.stake ?? '0.00'}</td>
                        <td class="text-center">${betDetails.result ?? '0.00'}</td>
                         <td class="text-center">${betDetails.requested_at ?? '0.00'}</td>
                          <td class="text-center">${betDetails.requested_at ?? '0.00'}</td>
                    </tr>
                `;
                        document.getElementById('bet-details-content').innerHTML = row || '<tr><td colspan="4" class="text-center">No data found.</td></tr>';
                    })
                    .catch(error => {
                        console.error('Error fetching bet details:', error);
                        document.getElementById('bet-details-content').innerHTML = '<tr><td colspan="4" class="text-center">Failed to load data. Please try again.</td></tr>';
                    });
            });
        });
    });
</script>
@endsection