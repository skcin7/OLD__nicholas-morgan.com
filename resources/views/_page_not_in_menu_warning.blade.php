@if(! Setting::get('show_' . $page) && admin())
    <div class="alert alert-warning">NOTE: The link to this page is not showing in the menu, but is showing for you, because you're an admin.</div>
@endif
