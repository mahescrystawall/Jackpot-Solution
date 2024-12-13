@extends('layouts.main')
@section('content')
    <div class="card mt-1">
        <div class="card-header">
            <h4 class="mb-0">Unsettled Bets</h4>
        </div>
        <div class="card-body container-fluid container-fluid-5">
            <!-- Filter Form -->
            <form id="filter_form" class="mb-3">
                <div class="row row5 mt-2">
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <div class="d-flex align-items-center gap-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input filter-radio" type="radio" id="matched" name="reportType" value="1">
                                    <label class="form-check-label" for="matched">Matched</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input filter-radio" type="radio" id="unmatched" name="reportType" value="0">
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
                        <table id="bets-table" class="table b-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Event Name</th>
                                    <th class="text-center">Nation</th>
                                    <th class="text-center">Bet Type</th>
                                    <th class="text-center">User Rate</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Event Market Name</th>
                                    <th class="text-center">Place Date</th>
                                    <th class="text-center">Match Date</th>
                                </tr>
                            </thead>
                            <tbody id="bets-body">
                                <!-- Rows will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Simulate the loaded data
            const data = @json($events);

            // Function to render table rows based on filtered data
            function renderTable(filteredData) {
                const tableBody = document.getElementById("bets-body");
                tableBody.innerHTML = ""; // Clear previous rows

                if (filteredData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="8" class="text-center">No Data To Display</td></tr>`;
                    return;
                }

                filteredData.forEach(event => {
                    const row = `
                        <tr>
                            <td>${event.event_name}</td>
                            <td>${event.selection_name}</td>
                            <td>${event.bet_type ? 'back' : 'lay'}</td>
                            <td>${event.rate}</td>
                            <td>${event.stake}</td>
                            <td>${event.market_type_id}</td>
                            <td>${event.requested_at}</td>
                            <td>${event.matched_at}</td>
                        </tr>
                    `;
                    tableBody.insertAdjacentHTML("beforeend", row);
                });
            }

            // Initial render with all data
            renderTable(data);

            // Event listener for filter change
            document.querySelectorAll(".filter-radio").forEach(radio => {
                radio.addEventListener("change", function () {
                    const filterValue = this.value;
                    const filteredData = data.filter(event => event.is_matched == filterValue);
                    renderTable(filteredData);
                });
            });
        });
    </script>
@endsection
