@extends('layouts.app')

@section('content')
<div class="mt-200">
    <div class="p-2 pt-6 sm:ml-64 mt-14 ">

        @include('layouts.marquee')

        <h2 class="text-4xl text-white font-extrabold dark:text-white">
            New Client
        </h2>

        <section class="w-full ">
        <div id="success-message" class="hidden bg-green-500 text-white p-2 mt-4 rounded"></div>
        <div id="error-message" class="hidden bg-red-500 text-white p-2 mt-4 rounded"></div>
            <form id="clientForm" method="post" action="{{route('add-Client')}}">
                @csrf
                <div class="mb-6">
                    <label for="large-input" class="block mb-2 text-sm font-medium text-white">First Name</label>
                    <input type="text" id="large-input first_name" name="first_name"
                        class="block w-full md:w-1/2 p-3 text-white border bg-dark bg-transparent border-bg-jblue2 rounded-lg  text-sm  focus:border-jblue2 focus:ring-jblue2">

                    <span class="error-message text-red-500"></span>
                </div>

                <div class="mb-6">
                    <label for="large-input" class="block mb-2 text-sm font-medium text-white">Last Name</label>
                    <input type="text" id="large-input last_name" name="last_name"
                        class="block w-full md:w-1/2 p-3 text-white border bg-dark bg-transparent border-bg-jblue2 rounded-lg  text-sm  focus:border-jblue2 focus:ring-jblue2">

                    <span class="error-message text-red-500"></span>
                </div>
                <div class="mb-6">
                    <label for="large-input" class="block mb-2 text-sm font-medium text-white">Username</label>
                    <input type="text" id="large-input username" name="username"
                        class="block w-full md:w-1/2 p-3 text-white border bg-dark bg-transparent border-bg-jblue2 rounded-lg  text-sm  focus:border-jblue2 focus:ring-jblue2">
                    <span class="error-message text-red-500"></span>
                </div>
                <div class="mb-6">
                    <label for="large-input" class="block mb-2 text-sm font-medium text-white">Email</label>
                    <input type="text" id="large-input email" name="email"
                        class="block w-full md:w-1/2 p-3 text-white border bg-dark bg-transparent border-bg-jblue2 rounded-lg  text-sm  focus:border-jblue2 focus:ring-jblue2">
                    <span class="error-message text-red-500"></span>
                </div>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-white">New Password</label>
                    <input type="text" id="default-input password" name="password"
                        class="password block w-full md:w-1/2 p-3 text-white border bg-transparent border-bg-jblue2 rounded-lg text-sm  focus:border-jblue2 focus:ring-jblue2">
                    <span class="error-message text-red-500"></span>
                </div>
                <div class="mb-6">
                    <label for="small-input" class="block mb-2 text-sm font-medium text-white">Confirm New Password</label>
                    <input type="text" id="small-input password_confirmation" name="password_confirmation"
                        class="block w-full md:w-1/2 p-3 text-white border bg-transparent border-bg-jblue2 rounded-lg text-sm  focus:border-jblue2 focus:ring-jblue2">
                    <span class="error-message text-red-500"></span>
                </div>

                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-white">Withdrawal Password</label>
                    <input type="text" id="default-input withdrawal_password" name="withdrawal_password"
                        class="block w-full md:w-1/2 p-3 text-white border bg-transparent border-bg-jblue2 rounded-lg text-sm  focus:border-jblue2 focus:ring-jblue2">
                    <span class="error-message text-red-500"></span>
                </div>
                <div class="mb-6">
                    <label for="small-input" class="block mb-2 text-sm font-medium text-white">Referal Code</label>
                    <input type="text" id="small-input referral_code" name="referral_code"
                        class="block w-full md:w-1/2 p-3 text-white border bg-transparent border-bg-jblue2 rounded-lg text-sm  focus:border-jblue2 focus:ring-jblue2">
                    <span class="error-message text-red-500"></span>
                </div>
                <button id="submitBtn" type="button" class="bg-[#00ADB5] text-[#EEEEEE] shadow-[3px_3px_0px_0_rgba(3,119,124,1)] flex items-center gap-2 p-3 rounded-md hover:text-jwhite2  mt-4 focus:ring-4 focus:outline-none focus:ring-jblue2 text-sm w-[200px] px-5 py-2.5 text-center">Submit</button>
            </form>

            
        </section>





    </div>
</div>
@endsection

@section('js_content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        // jQuery Validation for all required fields
        $("#clientForm").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                username: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: ".password"
                },
                withdrawal_password: {
                    required: true
                },
                referral_code: {
                    required: true,
                    minlength: 5

                }
            },
            messages: {
                first_name: {
                    required: "Please enter your first name"
                },
                last_name: {
                    required: "Please enter your last name"
                },
                username: {
                    required: "Please enter your username"
                },
                email: {
                    required: "Please enter a valid email",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                password_confirmation: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                withdrawal_password: {
                    required: "Please enter your withdrawal password"
                },
                referral_code: {
                    required: "Please enter a referral code",
                    minlength: "Your password must be at least 5 characters long"

                }
            },
            errorPlacement: function(error, element) {
               // alert(element.parent());
                error.appendTo(element.parent().find(".error-message"));
            }
        });

        // Handle Submit Button Click
        $("#submitBtn").click(function() {
            if ($("#clientForm").valid()) {
                var formData = $("#clientForm").serialize();

                $.ajax({
                    url: $("#clientForm").attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#success-message').text('Client added successfully').removeClass('hidden');
                        $('#error-message').addClass('hidden');
                        $("#clientForm")[0].reset(); // Reset form after submission
                    },
                    error: function(xhr, status, error) {
                        $('#error-message').text('An error occurred. Please try again.').removeClass('hidden');
                        $('#success-message').addClass('hidden');
                    }
                });
            } else {
                $('#error-message').text('Please fill out all required fields.').removeClass('hidden');
            }
        });
    });
</script>

@endsection