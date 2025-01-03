<style>
    table,
    th,
    td {
        border: 0.5px solid #393E46 !important;
    }
</style>

<div class="overflow-x-auto mt-5">
    <table class="w-full text-xs text-white border-collapse">
        <!-- Table Header -->
        <thead class="text-sm table-th">
            <tr>
                <th class="w-[47px] text-center">No.</th>
                <th class="w-[114px] text-center">Date</th>
                <th class="w-[111px] text-center">Credit</th>
                <th class="w-[109px] text-center">Debit</th>
                <th class="w-[111px] text-center">Balance</th>
                <th class="w-[136px] text-center">Sports</th>
                <th class="text-center">Remark</th>
            </tr>
        </thead>

        <!-- Table Body -->
        <tbody id="data-table-body" class="table-td">
            @forelse ($menuData['data'] as $statement)
            <tr class="border border-jcolor1 px-4 py-2">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="overflow-hidden whitespace-nowrap text-center">
                    {{ \Carbon\Carbon::parse($statement['created_on'])->format('Y-m-d') }}
                </td>
                <td class="text-center">
                    @if ($statement['transaction_type'] == 'debit')
                    -
                    @else
                    {{ $statement['amount'] ? number_format($statement['amount'], 2) : '0.00' }}
                    @endif
                </td>

                <td class="text-red-600 text-center">
                    @if ($statement['transaction_type'] == 'debit')
                    - {{ $statement['amount'] ? number_format($statement['amount'], 2) : '0.00' }}
                    @else
                    -
                    @endif
                </td>
                <td class="text-green-500 text-center">
                    {{ $statement['current_balance'] ? number_format($statement['current_balance'], 2) : '0.00' }}
                </td>
                <td class="text-center">{{ $statement['bet_event_name'] }}</td>
                <td class="text-ellipsis overflow-hidden whitespace-nowrap text-center">
                    <a data-modal-target="custom-modal"
                        data-statement="{{ json_encode($statement) }}"
                        onclick="openPopup(this)"
                        class="block text-jblue1 hover:underline cursor-pointer">
                        {{ $statement['transaction_status'] }}
                    </a>
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

<!-- Include Modal Component -->
<div id="custom-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-5 rounded-lg w-3/4">
        <div class="modal-content">
            <table class="w-full text-xs text-black border-collapse">
                <thead class="text-sm table-th">
                    <tr>
                        <th class="w-[47px] text-center">No.</th>
                        <th class="w-[114px] text-center">Round ID</th>
                        <th class="w-[114px] text-center">Game ID</th>
                        <th class="w-[114px] text-center">Game Code</th>
                        <th class="w-[114px] text-center">Created On</th>
                        <th class="w-[114px] text-center">Order ID</th>
                        <th class="w-[114px] text-center">Runner ID</th>
                        <th class="w-[114px] text-center">Runner Name</th>
                        <th class="w-[114px] text-center">Bet Odds</th>
                        <th class="w-[114px] text-center">Bet Event Name</th>
                        <th class="w-[114px] text-center">Amount</th>
                    </tr>
                </thead>
                <tbody id="custom-modal-content">
                    <!-- Dynamic content will be inserted here -->
                </tbody>
            </table>
        </div>
        <button onclick="closePopup('custom-modal')" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Close</button>
    </div>
</div>

<script>
    // Example JavaScript for dynamic AJAX content loading
    // function loadData(page, startDate, endDate) {
    //     $.ajax({
    //         url: `${API_URL}/api/report/account-statement`,
    //         method: "POST",
    //         headers: {
    //             Authorization: `Bearer ${authToken}`
    //         },
    //         data: {
    //             page: page || 1,
    //             user_id: userId,
    //             page_size: DEFAULT_PAGE_SIZE,
    //             order_direction: DEFAULT_ORDER_DIRECTION,
    //             order_by: DEFAULT_ORDER_BY,
    //             start_date: startDate,
    //             end_date: endDate
    //         },
    //         success: function(response) {
    //             const data = response.data || [];

    //             if (data.length > 0) {
    //                 const rows = data.map((item, index) => `
    //                     <tr class="border border-jcolor1 px-4 py-2">
    //                         <td class="text-center">${index + 1}</td>
    //                         <td class="text-center">${item.created_on}</td>
    //                         <td class="text-center">${item.current_balance ? parseFloat(item.current_balance).toFixed(2) : '0.00'}</td>
    //                         <td class="text-red-600 text-center">${item.bet_stake ? parseFloat(item.bet_stake).toFixed(2) : '0.00'}</td>
    //                         <td class="text-green-500 text-center">${item.bet_potential_payout ? parseFloat(item.bet_potential_payout).toFixed(2) : '0.00'}</td>
    //                         <td class="text-center">${item.bet_event_name}</td>
    //                         <td class="text-center">
    //                             <a data-modal-target="custom-modal"
    //                                data-statement='${JSON.stringify(item)}'
    //                                onclick="openPopup(this)"
    //                                class="block text-jblue1 hover:underline cursor-pointer">
    //                                 ${item.transaction_status}
    //                             </a>
    //                         </td>
    //                     </tr>`).join('');
    //                 $('#data-table-body').html(rows);
    //             } else {
    //                 $('#data-table-body').html('<tr><td colspan="7" class="text-center">No records found for the selected filters.</td></tr>');
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error("Error loading data: " + error);
    //             $('#data-table-body').html('<tr><td colspan="7" class="text-center">Error loading data</td></tr>');
    //         }
    //     });
    // }

    function openPopup(button) {
        const modalId = button.getAttribute('data-modal-target');
        const statement = JSON.parse(button.getAttribute('data-statement'));
        const modal = document.getElementById(modalId);
        const content = modal.querySelector(`#custom-modal-content`);

        if (content) {
            const row = `
                <tr class="border border-jcolor1 px-4 py-2">
                    <td class="text-center">1</td>
                    <td class="text-center">${statement.round_id}</td>
                    <td class="text-center">${statement.game_id}</td>
                    <td class="text-center">${statement.game_code}</td>
                    <td class="text-center">${statement.created_on}</td>
                    <td class="text-center">${statement.order_id}</td>
                    <td class="text-center">${statement.runner_id}</td>
                    <td class="text-center">${statement.runner_name}</td>
                    <td class="text-center">${statement.bet_odds}</td>
                    <td class="text-center">${statement.bet_event_name}</td>
                    <td class="text-center">${statement.amount}</td>
                </tr>`;
            content.innerHTML = row;
            modal.classList.remove('hidden');
        } else {
            console.error("Modal content section not found");
        }
    }

    function closePopup(id) {
        const modal = document.getElementById(id);
        modal.classList.add('hidden');
    }
</script>
<script src="{{ asset('js/modal.js') }}"></script>