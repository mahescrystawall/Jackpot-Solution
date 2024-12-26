<!-- Modal Structure -->
<div id="custom-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
    <div class="bg-white text-black rounded-lg shadow-lg w-1/3">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-lg font-semibold" id="custom-modal-title">{{ $content }}</h3> <!-- Modal Title -->
            <button onclick="closePopup('custom-modal')" class="text-gray-400 hover:text-gray-900">
                &times;
            </button>
        </div>
        <!-- Modal Body -->
        <div id="custom-modal-content" class="p-4">
            {!! $content !!} <!-- Content dynamically passed and rendered here -->
        </div>
    </div>
</div>
