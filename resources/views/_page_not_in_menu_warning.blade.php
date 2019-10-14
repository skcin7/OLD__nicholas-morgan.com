@if(! Setting::get('show_' . $page) && admin())
    <div class="alert alert-warning">NOTE: The link for this page is not showing in the menubar.</div>
@endif
