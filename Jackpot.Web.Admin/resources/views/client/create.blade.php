@extends('layouts.app')

@section('content')
<div class="mt-200">
    <div class="p-2 pt-6 sm:ml-64 mt-14 ">

        @include('layouts.marquee')

        <h2 class="text-4xl text-white font-extrabold dark:text-white">
            New Client
        </h2>

        <section class="w-full ">
            <div class="mb-6">
                <label for="large-input" class="block mb-2 text-sm font-medium text-white">First Name</label>
                <input type="text" id="large-input"
                    class="block w-full md:w-1/2 p-3 text-white border bg-dark bg-transparent border-bg-jblue2 rounded-lg  text-sm  focus:border-jblue2 focus:ring-jblue2">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 text-sm font-medium text-white">Last Name</label>
                <input type="text" id="large-input"
                    class="block w-full md:w-1/2 p-3 text-white border bg-dark bg-transparent border-bg-jblue2 rounded-lg  text-sm  focus:border-jblue2 focus:ring-jblue2">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 text-sm font-medium text-white">Username</label>
                <input type="text" id="large-input"
                    class="block w-full md:w-1/2 p-3 text-white border bg-dark bg-transparent border-bg-jblue2 rounded-lg  text-sm  focus:border-jblue2 focus:ring-jblue2">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 text-sm font-medium text-white">Email</label>
                <input type="text" id="large-input"
                    class="block w-full md:w-1/2 p-3 text-white border bg-dark bg-transparent border-bg-jblue2 rounded-lg  text-sm  focus:border-jblue2 focus:ring-jblue2">
            </div>
            <div class="mb-6">
                <label for="default-input" class="block mb-2 text-sm font-medium text-white">New Password</label>
                <input type="text" id="default-input"
                    class="block w-full md:w-1/2 p-3 text-white border bg-transparent border-bg-jblue2 rounded-lg text-sm  focus:border-jblue2 focus:ring-jblue2">
            </div>
            <div class="mb-6">
                <label for="small-input" class="block mb-2 text-sm font-medium text-white">Confirm New Password</label>
                <input type="text" id="small-input"
                    class="block w-full md:w-1/2 p-3 text-white border bg-transparent border-bg-jblue2 rounded-lg text-sm  focus:border-jblue2 focus:ring-jblue2">
            </div>

            <button type="button" class="bg-[#00ADB5] text-[#EEEEEE] shadow-[3px_3px_0px_0_rgba(3,119,124,1)] flex items-center gap-2 p-3 rounded-md hover:text-jwhite2  mt-4 focus:ring-4 focus:outline-none focus:ring-jblue2 text-sm w-[200px] px-5 py-2.5 text-center">Update</button>

        </section>





    </div>
</div>
@endsection