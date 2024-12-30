// Open Modal and Set Content Dynamically
function openPopup(button) {
    const modalId = button.getAttribute('data-modal-target');
    const statement = JSON.parse(button.getAttribute('data-statement'));
    const modal = document.getElementById(modalId);
    const content = modal.querySelector('#custom-modal-content');
    const headers = modal.querySelectorAll('thead th');

    if (content) {
        // Update content dynamically
        const row = `
            <tr class="border border-jcolor1 px-4 py-2">
                <td class="text-center">1</td>
                ${statement.round_id ? `<td class="text-center">${statement.round_id}</td>` : headers[1].style.display = 'none'}
                ${statement.game_id ? `<td class="text-center">${statement.game_id}</td>` : headers[2].style.display = 'none'}
                ${statement.game_code ? `<td class="text-center">${statement.game_code}</td>` : headers[3].style.display = 'none'}
                ${statement.created_on ? `<td class="text-center">${statement.created_on}</td>` : headers[4].style.display = 'none'}
                ${statement.order_id ? `<td class="text-center">${statement.order_id}</td>` : headers[5].style.display = 'none'}
                ${statement.runner_id ? `<td class="text-center">${statement.runner_id}</td>` : headers[6].style.display = 'none'}
                ${statement.runner_name ? `<td class="text-center">${statement.runner_name}</td>` : headers[7].style.display = 'none'}
                ${statement.bet_odds ? `<td class="text-center">${statement.bet_odds}</td>` : headers[8].style.display = 'none'}
                ${statement.bet_event_name ? `<td class="text-center">${statement.bet_event_name}</td>` : headers[9].style.display = 'none'}
                ${statement.amount ? `<td class="text-center">${statement.amount}</td>` : headers[10].style.display = 'none'}
            </tr>`;
        content.innerHTML = row;

        // Show modal
        modal.classList.remove('hidden');
        modal.style.zIndex = '1000';
    } else {
        console.error("Modal content section not found");
    }
}

// Close Modal Function
function closePopup(id) {
    const modal = document.getElementById(id);
    modal.classList.add('hidden');

    // Reset table headers visibility
    const headers = modal.querySelectorAll('thead th');
    headers.forEach(header => header.style.display = '');
}
