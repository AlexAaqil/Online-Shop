<aside>
    <div class="header">
        <h1>Online Shop</h1>
    </div>

    <div class="body">
        <ul>
            <li><a href="{{ route('admin_dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('list_admins') }}"><i class="fas fa-users-cog"></i> Admins</a></li>
            <li><a href="{{ route("list_categories") }}"><i class="fas fa-tags"></i> Categories</a></li>
            <li><a href="{{ route('list_brands') }}"><i class="far fa-copyright"></i> Brands</a></li>
            <li><a href="{{ route('list_products') }}"><i class="fas fa-list-alt"></i> Products</a></li>
        </ul>
    </div>

    <div class="footer">
        <div class="image">
            <img src="{{ asset('/assets/images/default_profile.png') }}" alt="{{Auth::user()->first_name}}'s profile image">
        </div>
        <p>{{ Auth::user()->first_name }}</p>
        <p class="logout_btn"><i class="fas fa-sign-out-alt"></i> <a href="{{ route('admin_logout') }}">Logout</a></p>
    </div>
</aside>
