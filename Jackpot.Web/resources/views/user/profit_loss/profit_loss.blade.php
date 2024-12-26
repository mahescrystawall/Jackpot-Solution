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
        // Handle form submission (filter by start and end date)
        $('#filter_form').on('submit', function(event) {
            event.preventDefault();
            const startDate = $('#start_date').val();
            const endDate = $('#end_date').val();

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

        function getData(page, startDate, endDate) {
    $.ajax({
        url: "http://127.0.0.1:8081/api/profit-loss",
        method: "POST",
        data: {
            page: page || 1,
            user_id: 7,
            page_size: 2,
            order_direction: "ASC",
            order_by: "created_on",
            start_date: startDate,
            end_date: endDate
        },
        success: function(response) {
            const data = response.data;
            const pagination = response.pagination;

            if (data && Array.isArray(data)) {
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
                $('#data-table-body').html('<tr><td colspan="5">No data available</td></tr>');
            }

            // Update the pagination
            $('#pagination-links').html(pagination || '');
        },
        error: function(xhr, status, error) {
            console.error("Error loading data: " + error);
            $('#data-table-body').html('<tr><td colspan="5">Error loading data</td></tr>');
        }
    });
}

    });
</script>

@endsection
