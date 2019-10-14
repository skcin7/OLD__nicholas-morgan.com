@if(! Setting::get('show_' . $page) && admin())
    <div class="alert alert-warning">The link to this page '{{ $page }}' is not showing in the menu publicly, but is showing for you as an authenticated admin.</div>
@endif
