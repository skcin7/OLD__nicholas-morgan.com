@if(! Setting::get('show_' . $page) && admin())
    <div class="alert alert-warning">NOTE: The link to this page in the menu is showing for admins only.</div>
@endif
