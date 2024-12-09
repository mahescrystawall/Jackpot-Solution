@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Change Button Values</h4>
    </div>
    <!-- <div id="toaster-container"></div> -->

    <div class="card-body container-fluid button-value">
        <div class="row mb-1">
            <div class="col-3">
                <div class="button-title">
                    <span>
                        <b>Price Label</b>
                    </span>
                </div>
            </div>
            <div class="col-3">
                <div class="button-title">
                    <span>
                        <b>Price Value</b>
                    </span>
                </div>
            </div>
        </div>
        <div id="loading-spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <form id="stakeupdateform" method="post" enctype="multipart/form-data" action="{{ route('stakes.update') }}">
            @csrf <!-- Ensure CSRF protection -->
            <!-- Loop through each stake and generate input fields -->
            @php
            $stakes = session('stakes'); // Retrieve the stakes from the session
            @endphp
            @foreach ($stakes as $key => $value)
            <!-- Check if the key starts with "stake_name_" -->
            @if (strpos($key, 'stake_name_') === 0)
            @php
            // Extract the index from the key
            $index = substr($key, -1);
            @endphp
            <div class="row mb-1">
                <div class="col-3">
                    <div class="form-group mb-0">
                        <input type="text" name="stake_name_{{ $index }}" maxlength="7" class="form-control" value="{{ old('stake_name_' . $index, $stakes['stake_name_' . $index]) }}" placeholder="stackVal{{ $index }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group mb-0">
                        <input type="number" name="stake_amount_{{ $index }}" min="1" max="99999999" maxlength="9" class="form-control" value="{{ old('stake_amount_' . $index, $stakes['stake_amount_' . $index]) }}" placeholder="stackVal{{ $index }}">
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <div class="row mt-2">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<!-- jQuery and AJAX script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle the form submission
        $('#stakeupdateform').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Show the loading spinner
            $('#loading-spinner').show();

            // Serialize the form data
            var formData = $(this).serialize();

            // Send AJAX request to update the stakes
            $.ajax({
                url: $(this).attr('action'), // Use the action attribute of the form
                method: "POST",
                data: formData,
                success: function(response) {

                    // Hide the loading spinner once the request is complete
                    $('#loading-spinner').hide();
                    var successMessage = response.message;
                    if (response.success) {
                       
                        // Append the message to a div or use it as needed
                          $('#toaster-container').html('<div class="toast success " role="alert" style="display: block;">' + successMessage + '</div>');
                      
                    } else {
                        $('#toaster-container').html('<div class="toast error " role="alert" style="display: block;">' + successMessage + '</div>');

                       // alert(response.message); // Show error message
                    }
                },
                error: function(xhr, status, error) {
                    alert('Something went wrong. Please try again.');
                }
            });
        });
    });
</script>
@endsection