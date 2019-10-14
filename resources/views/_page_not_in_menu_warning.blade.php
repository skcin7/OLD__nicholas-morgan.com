@if(! Setting::get('show_' . $page) && admin())
    <div class="alert alert-warning">NOTE: The link to this page ({{ $page }}') is not showing publicly, but is showing to you, because you're an admin.</div>
@endif
