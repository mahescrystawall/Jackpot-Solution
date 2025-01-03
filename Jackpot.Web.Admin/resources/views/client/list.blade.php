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
              <button type="submit" class="w-full py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 ">Search</button>
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

            @foreach($data as $client)
              <tr>
                <td class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <span class="badge bg-blue-100 text-blue-600 text-xs py-1 px-2 rounded-full">C</span>
                  <a href="#" class="ml-2 text-white hover:underline">
                  {{ $client['username']}}
                    <span class="hidden md:inline">[{{ $client['username']}}]</span>
                  </a>
                </td>
                <td class="px-4 py-2 tooltip" data-tooltip="Balance : 0<br />PL : 1000.00<br />Expose : 0.00">
                {{$client['balance']}}
                </td>
                <td class="px-4 py-2">
                {{$client['profit_loss']}}
                </td>
                <td class="px-4 py-2">
                  <a href="https://admin.99hub.live/backend/get_expose_detail/1538588" class="text-blue-500 hover:underline">
                  {{$client['exposure']}}
                  </a>
                </td>
                <td class="px-4 py-2 hidden md:table-cell">
                  100.00
                </td>
                <td class="px-4 py-2 hidden md:table-cell">
                  <a href="https://admin.99hub.live/backend/users/child_by_type/3/Master3" class="text-blue-500 hover:underline">
                  {{$client['parent_username']}}
                  </a>
                </td>
                <td class="px-4 py-2">
                @if($client['is_locked'])
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-jgreen1">
                    <path fill="currentColor" d="M18 8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h9V6a3 3 0 0 0-3-3a3 3 0 0 0-3 3H7a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2zm-6 9a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2" />
                  </svg>
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-jgreen1">
                    <path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z" />
                  </svg>
                  @endif
                </td>
                <td class="px-4 py-2">
                @if($client['is_blocked'])
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-jgreen1">
                    <path fill="currentColor" d="M18 8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h9V6a3 3 0 0 0-3-3a3 3 0 0 0-3 3H7a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2zm-6 9a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2" />
                  </svg>
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-jgreen1">
                    <path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z" />
                  </svg>
                  @endif
                </td>
                <td class="px-4 py-2 hidden md:table-cell break-words gap-2">
                  <div class="space-y-2">
                    <a href="https://admin.99hub.live/backend/users/1538588/edit-profile" class=" bg-gray-200 text-gray-800 px-3 py-1 rounded-lg hover:bg-gray-300">
                      Edit
                    </a>
                    <a href="https://admin.99hub.live/backend/users/1538588/bank-deposit" class=" bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                      Deposit
                    </a>
                    <a href="https://admin.99hub.live/backend/users/1538588/bank-withdraw" class=" bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                      Withdraw
                    </a>
                    <a href="https://admin.99hub.live/backend/account/new-statement/1538588" class=" bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                      Statement
                    </a>
                    <a href="https://admin.99hub.live/backend/bets/pending-history/1538588" class=" bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                      Pending Bets
                    </a>
                    <div class="grid">
                      <form action="https://admin.99hub.live/backend/users/1538588/reset_password" method="post">
                        <input type="hidden" name="_token" value="n4XJCgcUTlhZYbdsKD02kaIJK4ZqcHJ6tiycMrXZ">
                        <a href="#" class="my-2 bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600" data-username="devdeepz">
                          Reset Password
                        </a>
                      </form>
                      <div>
                        <button id="dropdownDefaultButton_{{$client['id']}}" data-dropdown-toggle="dropdown_{{$client['id']}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                          Reports
                          <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                          </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown_{{$client['id']}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton_{{$client['id']}}">
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">New Chips Statement</a>
                            </li>
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Chip Summary</a>
                            </li>
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settlement</a>
                            </li>
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profit Loss</a>
                            </li>
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settlement Report</a>
                            </li>
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sports Profit Loss</a>
                            </li>
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bet History</a>
                            </li>
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pending Bets</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>

              </tr>
          
             
              @endforeach
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