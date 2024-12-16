@extends('layouts.main')

@section('content')
<div class="card mt-2">
    <div class="card-header">
        <h4 class="mb-0">Profit Loss</h4>
    </div>

    <!-- Form for filtering data -->
    <form method="POST" action="{{ route('profit-loss') }}">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date"
                    value="{{ request()->get('start_date', \Carbon\Carbon::now()->subMonth()->toDateString()) }}"
                    class="form-control">
            </div>
            <div class="col-md-3">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date"
                    value="{{ request()->get('end_date', \Carbon\Carbon::now()->toDateString()) }}"
                    class="form-control">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                <a href="{{ route('profit-loss') }}" class="btn btn-secondary mt-4">Clear</a>
            </div>
        </div>
    </form>

    <!-- Display filtered data in a table -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-center">S.No</th>
                <th class="text-center">Date</th>
                <th class="text-center">Event Type</th>
                <th class="text-center">Event</th>
                <th class="text-center">Amount</th>
            </tr>
        </thead>
    
        
        <tbody>
            @forelse ($profitData['data'] ?? [] as $index => $pfData)
                <tr>
                <td class="text-center">{{ (($profitData['pagination']['current_page'] - 1) * $profitData['pagination']['per_page']) + $loop->iteration }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($pfData['created_at'])->format('Y-m-d') }}</td>
                <td class="text-center">{{ $pfData['event_type_name'] }}</td>
                <td class="text-center">
                    <a href="">
                        {{ $pfData['event_name'] }}
                    </a>
                </td>
                <td class="text-center">
                    {{ $pfData['amount'] }}
                </td>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No records found for the selected filters.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if(isset($profitData['pagination']['total_pages']) && (int) $profitData['pagination']['total_pages'] > 1)
    <div class="pagination d-flex justify-content-center mt-3">
        <nav>
            <ul class="pagination">
                <!-- Previous Button -->
                <li class="page-item {{ $profitData['pagination']['prev_page'] ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $profitData['pagination']['prev_page'] ? route('profit-loss', [
                            'page' => $profitData['pagination']['prev_page'],
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                        ]) : '#' }}">
                        Previous
                    </a>
                </li>

                <!-- Current Page Information -->
                <li class="page-item disabled">
                    <span class="page-link">Page {{ $profitData['pagination']['current_page'] }} of {{ $profitData['pagination']['total_pages'] }}</span>
                </li>

                <!-- Next Button -->
                <li class="page-item {{ $profitData['pagination']['next_page'] ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $profitData['pagination']['next_page'] ? route('profit-loss', [
                            'page' => $profitData['pagination']['next_page'],
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                        ]) : '#' }}">
                        Next
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endif



@endsection