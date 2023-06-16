<!-- Hero head: will stick at the top -->
<div class="hero-head">
    <header class="navbar topbar black-border is-radiusless margin-bottom-5 z-200">
        <div class="container xs-padding-0">
            <div class="navbar-brand xs-padding-0 black-text font-size-14">
                <a href="{{ route('home') }}" class="navbar-item xs-padding-0 hidden-xs">
                    <img src="{{ settings('logo_photo') }}" alt="{{ settings('application_name') }}" class="hidden-xs">
                </a>
                <button type="button" class="button transparent-bg border-width-0 topbar-toggler padding-left-10 padding-right-10 font-weight-700 black-text hidden-tablet is-hidden-desktop" data-target="#topbar-menu">
                    <i class="fas fa-bars font-size-14"></i>
                    &nbsp;MENU
                </button>
                
            </div>
            <div class="navbar-menu xs-margin-top-0 font-size-14">
                <div class="navbar-end">
                    <a href="{{ route('home') }}" class="navbar-item font-weight-700">
                    HOME
                    </a>
                    <a href="{{ route('home') }}" class="navbar-item font-weight-700">
                    FEATURES & PRICING
                    </a>
                    <a href="{{ route('home') }}" class="navbar-item font-weight-700">
                    CONTACT
                    </a>

                    @include('sender.nav')
                    
                    <span class="navbar-item">
                        @if( auth()->user() )
                        
                        <a href="{{ route('dashboard') }}" class="button is-small orange-bg orange-border white-text font-weight-700" >
                            <span class="icon">
                                <i class="fas fa-book"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('logout') }}" class="button is-small font-weight-700 black-bg white-text black-border" >
                            <span class="icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span>Log out</span>
                        </a>
                        @else
                        <a href="{{ route('register') }}" class="button is-small orange-bg orange-border white-text font-weight-700" data-toggle="tooltip" data-placement="bottom" title="Log in with Facebook or Phone number" >
                            <span class="icon">
                                <i class="fas fa-sign"></i>
                            </span>
                            <span>SIGN UP</span>
                        </a>
                        <a href="{{ route('login') }}" class="button is-small orange-bg orange-border white-text font-weight-700" data-toggle="tooltip" data-placement="bottom" title="Log in with Facebook or Phone number" >
                            <span class="icon">
                                <i class="fas fa-sign-in-alt"></i>
                            </span>
                            <span>LOG IN</span>
                        </a>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </header>
</div>