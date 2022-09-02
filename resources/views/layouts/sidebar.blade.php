<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/home') }}" class="brand-link">
        {{-- <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3"> --}}
        <span class="brand-text font-weight-light">QRCode Generator</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <div class="text-white text-center">
                <p>{{ Auth::user()->name }}</p>
                <a href=""><i class="fa fa-circle text-success"></i> 
                    @if(Auth::user()->role_id == 1)
                        Admin
                    @elseif(Auth::user()->role_id == 2)
                        Moderator
                    @elseif(Auth::user()->role_id == 3)
                        Webmaster
                    @elseif(Auth::user()->role_id == 4)
                        Buyer
                    @endif
                </a>
            </div>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
