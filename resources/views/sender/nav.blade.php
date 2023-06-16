@if( auth()->user() )
@if( auth()->user()->role_id == 5 )
<a href="{{ route('home') }}" class="navbar-item font-weight-700">
    INVOICES
</a>

<div class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link font-weight-700">
        PARCELS
    </a>
    <div class="navbar-dropdown">
        <a href="{{ action('Sender\Parcels@index') }}" class="navbar-item">
            VIEW PARCELS
        </a>
        <a href="{{ action('Sender\Parcels@create') }}" class="navbar-item">
            ADD PARCEL
        </a>
        <a href="{{ action('Sender\Parcels@upload') }}" class="navbar-item">
            UPLOAD EXCEL
        </a>
        <a href="{{ action('Sender\Pricings@index') }}" class="navbar-item">
            PRICING
        </a>
    </div>
</div>
@endif
@endif