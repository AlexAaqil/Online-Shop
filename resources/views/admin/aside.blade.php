<aside>
    <div class="header">
        <h1>Online Shop</h1>
    </div>

    <div class="body">
        <ul>
            <li><a href="{{ route('admin_dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('list_admins') }}"><i class="fas fa-users-cog"></i> Admins</a></li>
            <li><a href="{{ route("admin_categories") }}"><i class="fas fa-tags"></i> Categories</a></li>
            <li><a href="{{ route('admin_products') }}"><i class="fas fa-cart-plus"></i> Products</a></li>
        </ul>
    </div>

    <div class="footer">
        <p>Admin</p>
        <p class="logout_btn"><i class="fas fa-sign-out-alt"></i> <a href="{{ route('admin_logout') }}">Logout</a></p>
    </div>
</aside>
