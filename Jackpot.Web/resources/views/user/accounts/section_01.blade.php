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
                        {{ $statement['current_balance'] > 0 ? number_format($statement['current_balance'], 2) : '0.00' }}
                    </td>
                    <td class="text-red-600 text-center">
                        {{ $statement['bet_stake'] ? number_format($statement['bet_stake'], 2) : '0.00' }}
                    </td>
                    <td class="text-green-500 text-center">
                        {{ $statement['bet_potential_payout'] ? number_format($statement['bet_potential_payout'], 2) : '0.00' }}
                    </td>
                    <td class="text-center">{{ $statement['bet_event_name'] }}</td>
                    <td class="text-ellipsis overflow-hidden whitespace-nowrap text-center">
                        <a data-modal-target="custom-modal"
                           data-description="{{ $statement['transaction_status'] }}"
                           onclick="openPopup(this)"
                           class="block text-jblue1 hover:underline cursor-pointer">
                            {{ $statement['transaction_status'] }}
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

<script>
    // Example JavaScript for dynamic AJAX content loading
    function loadData(page, startDate, endDate) {
        $.ajax({
            url: `${API_URL}/api/report/account-statement`,
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

                if (data.length > 0) {
                    const rows = data.map((item, index) => `
                        <tr class="border border-jcolor1 px-4 py-2">
                            <td class="text-center">${index + 1}</td>
                            <td class="text-center">${item.created_on}</td>
                            <td class="text-center">${item.current_balance ? parseFloat(item.current_balance).toFixed(2) : '0.00'}</td>
                            <td class="text-red-600 text-center">${item.bet_stake ? parseFloat(item.bet_stake).toFixed(2) : '0.00'}</td>
                            <td class="text-green-500 text-center">${item.bet_potential_payout ? parseFloat(item.bet_potential_payout).toFixed(2) : '0.00'}</td>
                            <td class="text-center">${item.bet_event_name}</td>
                            <td class="text-center">
                                <a data-modal-target="custom-modal"
                                   data-description="${item.transaction_status}"
                                   onclick="openPopup(this)"
                                   class="block text-jblue1 hover:underline cursor-pointer">
                                    ${item.transaction_status}
                                </a>
                            </td>
                        </tr>`).join('');
                    $('#data-table-body').html(rows);
                } else {
                    $('#data-table-body').html('<tr><td colspan="7" class="text-center">No records found for the selected filters.</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error loading data: " + error);
                $('#data-table-body').html('<tr><td colspan="7" class="text-center">Error loading data</td></tr>');
            }
        });
    }

    function openPopup(element) {
        const description = element.getAttribute('data-description');
        const modal = document.querySelector('#custom-modal');
        modal.querySelector('.modal-content').textContent = description;
        modal.classList.add('open');
    }
</script>
