<style>
    table,
    th,
    td {
        border: 0.5px solid #393E46 !important;
    }
</style>
<div class="overflow-x-auto mt-5">
    <table class="w-full text-xs text-white border-collapse ">
        <!-- Table Header -->
        <thead class="text-sm table-th">
            <tr>
                <th class=" w-[47px]">No.</th>
                <th class=" w-[114px]">Date</th>
                <th class=" w-[111px]">Credit</th>
                <th class=" w-[109px]">Debit</th>
                <th class=" w-[111px]">Balance</th>
                <th class=" w-[136px]">Sports</th>
                <th class="">Remark</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody class="table-td">
            @forelse ($paginationData['data'] ?? [] as $index => $statement)
            <tr class="border border-jcolor1 px-4 py-2">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="overflow-hidden whitespace-nowrap">{{ \Carbon\Carbon::parse($statement['created_at'])->format('Y-m-d') }}</td>
                <td class=" text-center">{{ $statement['total'] > 0 ? $statement['total'] : '0.00' }}</td>
                <td class="text-red-600 text-center">{{ $statement['total'] < 0 ? abs($statement['total']) : '0.00' }}</td>
                <td class="text-green-500 text-center">{{ $statement['balance'] }}</td>
                @php
                $menuItem = collect($menuData)->firstWhere('id', $statement['event_type_id']);
                @endphp
                <td class="text-center">{{ $menuItem['name'] ?? 'N/A' }}</td>
                <td class="text-ellipsis overflow-hidden whitespace-nowrap">
                    <a data-modal-target="custom-modal"
                        data-description="Here is some sample content that will appear in the modal."
                        onclick="openPopup(this)"
                        class="block text-jblue1 hover:underline cursor-pointer" 
                       >
                        {{ $statement['description'] }}
                    </a>

                    <!-- Include Modal Component -->
                    <x-modal id="custom-modal" />


                </td>

            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No records found for the selected filters.</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

<div class="pagination flex justify-center mt-3">
    @if ($paginationData['total_pages'] > 1)
    <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px text-sm">
            <!-- Previous Page Button -->
            <li>
                <a href="{{ $paginationData['prev_page'] ? route('account-statement', [
                            'page' => $paginationData['prev_page'],
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                            'category' => request('category')
                        ]) : '#' }}"
                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 {{ !$paginationData['prev_page'] ? 'opacity-50 cursor-not-allowed' : '' }}">
                    Previous
                </a>
            </li>

            <!-- Page Numbers -->
            @for ($i = 1; $i <= $paginationData['total_pages']; $i++)
                <li>
                <a href="{{ route('account-statement', [
                                'page' => $i,
                                'start_date' => request('start_date'),
                                'end_date' => request('end_date'),
                                'category' => request('category')
                            ]) }}"
                    class="flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 {{ $paginationData['current_page'] == $i ? 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700' }}">
                    {{ $i }}
                </a>
                </li>
                @endfor

                <!-- Next Page Button -->
                <li>
                    <a href="{{ $paginationData['next_page'] ? route('account-statement', [
                            'page' => $paginationData['next_page'],
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                            'category' => request('category')
                        ]) : '#' }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 {{ !$paginationData['next_page'] ? 'opacity-50 cursor-not-allowed' : '' }}">
                        Next
                    </a>
                </li>
        </ul>
    </nav>
    @endif
</div>