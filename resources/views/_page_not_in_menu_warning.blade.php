@if(! Setting::get('show_' . $page) && admin())
    <div class="alert alert-warning">NOTE: This page is not showing in the menubar.</div>
@endif
