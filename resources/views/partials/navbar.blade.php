<nav>
    <div class="navbar_wrapper">
        <div class="brand">
            <a href="{{ url('/') }}">Online Shop</a>
        </div>

        <ul>
            <li><a href="{{ url('/shop') }}">Shop</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            @if(empty(Auth::user()))
                <li class="navbar_btn"><a href="{{ url('/login') }}">Login</a></li>
            @else
                <li class="image">
                    <img src="{{ asset('/assets/images/default_profile.png') }}" alt="{{Auth::user()->first_name}}'s profile image" width="30" height="30">
                </li>
                <li>{{ Auth::user()->first_name }}</li>
            @endif
        </ul>
    </div>
</nav>
