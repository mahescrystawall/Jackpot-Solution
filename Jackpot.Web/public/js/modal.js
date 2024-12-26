// Open Modal and Set Content Dynamically
function openPopup(button) {
    const modalId = button.getAttribute('data-modal-target'); // Modal ID

    const description = button.getAttribute('data-description'); // Static content
    const modal = document.getElementById(modalId); // Get modal by ID
    const content = modal.querySelector(`#${modalId}-content`); // Target content section


    // Update content dynamically
    content.innerHTML = description;

    // Show modal
    modal.classList.remove('hidden');
}

// Close Modal Function
function closePopup(id) {
    const modal = document.getElementById(id); // Get modal by ID
    modal.classList.add('hidden'); // Hide modal
}
