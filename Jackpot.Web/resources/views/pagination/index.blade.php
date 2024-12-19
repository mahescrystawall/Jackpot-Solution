<div id="pagination-links" class="pagination align-center">
<a href="{{ $pagination['current_page'] > 1 ? $pagination['first_page_url'] : 'javascript:void(0);' }}"
    data-page="{{ $pagination['first_page_url'] }}" class="page-link @if($pagination['current_page'] <= 1) disabled @endif">
    First
</a>

<a href="{{ $pagination['current_page'] > 1 ? $pagination['prev_page_url'] : 'javascript:void(0);' }}"
    data-page="{{ $pagination['prev_page_url'] }}" class="page-link @if($pagination['current_page'] <= 1) disabled @endif">
    Previous
</a>

<a href="{{ $pagination['current_page'] < $pagination['last_page'] ? $pagination['next_page_url'] : 'javascript:void(0);' }}"
    data-page="{{ $pagination['next_page_url'] }}" class="page-link @if($pagination['current_page'] >= $pagination['last_page']) disabled @endif">
    Next
</a>

<a href="{{ $pagination['current_page'] < $pagination['last_page'] ? $pagination['last_page_url'] : 'javascript:void(0);' }}"
    data-page="{{ $pagination['last_page_url'] }}" class="page-link @if($pagination['current_page'] >= $pagination['last_page']) disabled @endif">
    Last
</a>
</div>