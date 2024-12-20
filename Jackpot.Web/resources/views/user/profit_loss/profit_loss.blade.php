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
           // alert(startDate);
            // Trigger AJAX call to get the data with the selected dates
            getData('', startDate, endDate);
        });

        // Handle pagination link clicks
        $(document).on('click', '.page-link', function(event) {
            event.preventDefault();

            const page = $(this).data('page');
            const startDate = $('#start_date').val();
            const endDate = $('#end_date').val();

            // Trigger AJAX call to get data for the clicked page
            getData(page, startDate, endDate);
        });

        // Function to fetch data based on page, start date, and end date
        function getData(page, startDate, endDate) {
            $.ajax({
                url: "{{route('profit-loss')}}", // Adjust to your controller's route
                method: "GET",
                data: {
                    page: page,
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {

                   // console.log(response.data);
                    // Update the table with the new data
                    $('#data-table-body').html(response.data); // Populate the table
                    // Update the pagination
                    $('#pagination-links').html(response.pagination); // Populate pagination links
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data: " + error);
                }
            });
        }

        // Initial data load with the default page and dates
        //  const startDate = $('#start_date').val();
        //  const endDate = $('#end_date').val();
        // getData('', startDate, endDate); // Default load with page 1
    });
</script>

@endsection