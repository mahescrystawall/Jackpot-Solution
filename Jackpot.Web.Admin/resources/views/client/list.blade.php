@extends('layouts.app')

@section('content')
<div class="mt-200">
    <div class="p-2 pt-6 sm:ml-64 mt-14 ">

        @include('layouts.marquee')

        <h2 class="text-4xl text-white font-extrabold dark:text-white">
            Clients
        </h2>

        <main>
  <div class="container mx-auto px-4 py-6">
    <!-- Search Form -->
    <div class="flex flex-wrap -mx-2 mb-6">
      <form method="GET" class="w-full flex items-center space-x-4">
        <!-- Username Search Field -->
        <div class="w-full md:w-1/2 px-2">
          <div class="relative">
            <input type="text" id="search-user" name="username" class="block w-full p-3 text-white border bg-dark bg-transparent border-jblue2 rounded-lg text-sm focus:border-jblue2 focus:ring-jblue2 dark:bg-dark-800 dark:border-dark-700 dark:focus:border-jblue2" placeholder="Search Username">
            <i class="material-icons absolute left-3 top-3 text-gray-400">search</i>
          </div>
        </div>

        <!-- Sorting Dropdown -->
        <div class="w-full md:w-1/2 px-2">
          <div class="relative">
            <select name="sorting" class="block w-full p-3 text-white border bg-dark bg-transparent border-jblue2 rounded-lg text-sm focus:border-jblue2 focus:ring-jblue2 dark:bg-dark-800 dark:border-dark-700 dark:focus:border-jblue2">
              <option value="">Select</option>
              <option value="pl-asc">PL ASC</option>
              <option value="pl-desc">PL DESC</option>
              <option value="expose-asc">Expose ASC</option>
              <option value="expose-desc">Expose DESC</option>
            </select>
          </div>
        </div>

        <!-- Search Button -->
        <div class="w-full md:w-1/2 px-2">
          <button type="submit" class="w-full py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">Search</button>
        </div>
      </form>
    </div>

    <!-- User Table -->
    <div class="overflow-x-auto bg-dark-700 shadow-md rounded-lg">
      <table class="min-w-full table-auto text-white">
        <thead class="bg-dark-600">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400">Username</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400">Balance</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400">P/L</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400">Exp</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400 hidden md:table-cell">Client Share</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400 hidden md:table-cell">Up-line</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400">Status</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400">Bet</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-400 hidden md:table-cell">Options</th>
          </tr>
        </thead>
        <tbody>
          <!-- User Row 1 -->
           
          <tr>
            <td class="px-4 py-2 text-sm text-gray-300">
              <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs">C</span>
              <a href="#" class="ml-2">DEEPZ <span class="hidden md:inline">[DEEPZ]</span></a>
            </td>
            <td class="px-4 py-2 text-sm text-gray-300">812.55</td>
            <td class="px-4 py-2 text-sm text-gray-300">812.55</td>
            <td class="px-4 py-2 text-sm text-gray-300"><a href="https://admin.99hub.live/backend/get_expose_detail/1522305">0</a></td>
            <td class="px-4 py-2 text-sm text-gray-300 hidden md:table-cell">100.00</td>
            <td class="px-4 py-2 text-sm text-gray-300 hidden md:table-cell"><a href="https://admin.99hub.live/backend/users/child_by_type/3/Master3">Master3</a></td>
            <td class="px-4 py-2">
              <a href="#" class="bg-green-500 text-white rounded-full py-1 px-2">Lock</a>
            </td>
            <td class="px-4 py-2">
              <a href="#" class="bg-green-500 text-white rounded-full py-1 px-2">Lock</a>
            </td>
            <td class="px-4 py-2 text-sm text-gray-300 hidden md:table-cell">
              <div class="flex space-x-2">
                <a href="https://admin.99hub.live/backend/users/1522305/edit-profile" class="bg-gray-200 text-gray-800 py-1 px-2 rounded-lg">Edit</a>
                <a href="https://admin.99hub.live/backend/users/1522305/bank-deposit" class="bg-green-500 text-white py-1 px-2 rounded-lg">Deposit</a>
                <a href="https://admin.99hub.live/backend/users/1522305/bank-withdraw" class="bg-red-500 text-white py-1 px-2 rounded-lg">Withdraw</a>
                <a href="https://admin.99hub.live/backend/account/new-statement/1522305" class="bg-blue-500 text-white py-1 px-2 rounded-lg">Statement</a>
              </div>
            </td>
          </tr>

          <!-- User Row 2 -->
          <tr>
            <td class="px-4 py-2 text-sm text-gray-300">
              <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs">C</span>
              <a href="#" class="ml-2">DEVDEEPZ <span class="hidden md:inline">[DEV]</span></a>
            </td>
            <td class="px-4 py-2 text-sm text-gray-300">1000.00</td>
            <td class="px-4 py-2 text-sm text-gray-300">1000.00</td>
            <td class="px-4 py-2 text-sm text-gray-300"><a href="https://admin.99hub.live/backend/get_expose_detail/1538588">0</a></td>
            <td class="px-4 py-2 text-sm text-gray-300 hidden md:table-cell">100.00</td>
            <td class="px-4 py-2 text-sm text-gray-300 hidden md:table-cell"><a href="https://admin.99hub.live/backend/users/child_by_type/3/Master3">Master3</a></td>
            <td class="px-4 py-2">
              <a href="#" class="bg-green-500 text-white rounded-full py-1 px-2">Lock</a>
            </td>
            <td class="px-4 py-2">
              <a href="#" class="bg-green-500 text-white rounded-full py-1 px-2">Lock</a>
            </td>
            <td class="px-4 py-2 text-sm text-gray-300 hidden md:table-cell">
              <div class="flex space-x-2">
                <a href="https://admin.99hub.live/backend/users/1538588/edit-profile" class="bg-gray-200 text-gray-800 py-1 px-2 rounded-lg">Edit</a>
                <a href="https://admin.99hub.live/backend/users/1538588/bank-deposit" class="bg-green-500 text-white py-1 px-2 rounded-lg">Deposit</a>
                <a href="https://admin.99hub.live/backend/users/1538588/bank-withdraw" class="bg-red-500 text-white py-1 px-2 rounded-lg">Withdraw</a>
                <a href="https://admin.99hub.live/backend/account/new-statement/1538588" class="bg-blue-500 text-white py-1 px-2 rounded-lg">Statement</a>
              </div>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td class="px-4 py-2 text-sm text-gray-300 font-medium">Total :</td>
            <td class="px-4 py-2 text-sm text-gray-300">1812.55</td>
            <td class="px-4 py-2 text-sm text-gray-300">1812.55</td>
            <td class="px-4 py-2 text-sm text-gray-300">0</td>
            <td class="px-4 py-2 text-sm text-gray-300"></td>
            <td class="px-4 py-2 text-sm text-gray-300"></td>
            <td class="px-4 py-2 text-sm text-gray-300"></td>
            <td class="px-4 py-2 text-sm text-gray-300"></td>
            <td class="px-4 py-2 text-sm text-gray-300"></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</main>


    </div>
</div>
@endsection