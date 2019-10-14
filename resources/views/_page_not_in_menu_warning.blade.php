@if(! Setting::get('show_' . $page) && admin())
    <div class="alert alert-warning">NOTE: In the menubar, the link to this page is showing for admins only.</div>
@endif
