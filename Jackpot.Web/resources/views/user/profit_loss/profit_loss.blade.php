@extends('layouts.app')

@section('content')
<div class="mt-200 text-white">
    <div class="p-2 pt-6 sm:ml-64 mt-14 h-screen">

        @include('layouts.marquee')
        <section class="w-full ">
            <div class="flex flex-row w-full py-2 mb-2 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-[#1B1B1B]">
                <div class="flex items-center gap-2 text-white text-sm w-full px-2">
                    <h2>Profit Loss</h2>
                </div>
            </div>
            {{-- Filter --}}

            @include('user.profit_loss.search_filter')

            @include('user.profit_loss.section_01')

        </section>
    </div>
</div>
@endsection

@section('js_content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const userId = "{{ session('user_id') }}";
        const DEFAULT_PAGE_SIZE = "{{ \App\Constants\Constants::DEFAULT_PAGE_SIZE }}";
        const DEFAULT_ORDER_DIRECTION = "{{ \App\Constants\Constants::DEFAULT_ORDER_DIRECTION }}";
        const DEFAULT_ORDER_BY = "{{ \App\Constants\Constants::DEFAULT_ORDER_BY }}";
        const API_URL = "{{ env('API_URL') }}";

        // Handle form submission (filter by start and end date)
        $('#filter_form').on('submit', function(event) {
            event.preventDefault();

            const startDate = $('#start_date').val();
            const endDate = $('#end_date').val();

            // Perform validation
            if (!startDate || !endDate) {
                alert('Please select both start and end date.');
                return;
            }

            const endDateObj = new Date(endDate);

            // Calculate the difference between the start and end date
            const startDateObj = new Date(startDate);
            const dateDiff = Math.floor((endDateObj - startDateObj) / (1000 * 60 * 60 * 24)); // in days
            if (dateDiff > 15) {
                alert('Max Date Range of 15 days is allowed!');
                return;
            }

            // If validation passes, call the getData function
            getData('', startDate, endDate);
        });

        // Handle pagination link clicks
        $(document).on('click', '.page-link', function(event) {
            event.preventDefault();
            const page = $(this).data('page');
            const startDate = $('#start_date').val();
            const endDate = $('#end_date').val();
            getData(page, startDate, endDate);
        });

        // Function to fetch data based on page, start date, and end date
        function getData(page, startDate, endDate) {
            $.ajax({
                url: `${API_URL}/api/profit-loss`,
                method: "POST",
                data: {
                    page: page || 1,
                    user_id: userId,
                    page_size: DEFAULT_PAGE_SIZE,
                    order_direction: DEFAULT_ORDER_DIRECTION,
                    order_by: DEFAULT_ORDER_BY,
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {
                    const data = response.data || [];
                    const pagination = response.pagination || '';

                    if (data.length > 0) {
                        const rows = data.map((item, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.created_on}</td>
                        <td>${item.event_type_name}</td>
                        <td>${item.event_name}</td>
                        <td>${item.amount}</td>
                    </tr>
                `).join('');
                        $('#data-table-body').html(rows);
                    } else {
                        $('#data-table-body').html(
                            '<tr><td colspan="5" class="text-center">No data available</td></tr>'
                        );
                    }

                    // Update the pagination links
                    $('#pagination-links').html(pagination);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data: " + error);
                    $('#data-table-body').html(
                        '<tr><td colspan="5" class="text-center">Error loading data</td></tr>'
                    );
                }
            });
        }
        // Handle pagination link clicks
        $(document).on('click', '.page-link', function(event) {
            event.preventDefault();
            const page = $(this).data('page');
            const startDate = $('#start_date').val();
            const endDate = $('#end_date').val();
            getData(page, startDate, endDate);
        });

        function getData(page, startDate, endDate) {
            $.ajax({
                url: `${API_URL}/api/profit-loss`,
                method: "POST",
                data: {
                    page: page || 1,
                    user_id: userId,
                    page_size: DEFAULT_PAGE_SIZE,
                    order_direction: DEFAULT_ORDER_DIRECTION,
                    order_by: DEFAULT_ORDER_BY,
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {
                    const data = response.data || [];
                    const pagination = response.pagination || '';

                    if (data.length > 0) {
                        const rows = data.map((item, index) => `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.created_on}</td>
                            <td>${item.event_type_name}</td>
                            <td>${item.event_name}</td>
                            <td>${item.amount}</td>
                        </tr>
                    `).join('');
                        $('#data-table-body').html(rows);
                    } else {
                        $('#data-table-body').html(
                            '<tr><td colspan="5" class="text-center">No data available</td></tr>'
                        );
                    }

                    // Update the pagination links
                    $('#pagination-links').html(pagination);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data: " + error);
                    $('#data-table-body').html(
                        '<tr><td colspan="5" class="text-center">Error loading data</td></tr>'
                    );
                }
            });
        }
    });
</script>
@endsection