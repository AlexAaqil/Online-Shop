<aside>
    <div class="header">
        <h1>Online Shop</h1>
    </div>

    <div class="body">
        <ul>
            <li><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route("admin_categories") }}">Categories</a></li>
            <li><a href="{{ route('admin_products') }}">Products</a></li>
        </ul>
    </div>

    <div class="footer">
        <p>Admin</p>
        <p class="logout_btn"><i class="fas fa-sign-out-alt"></i> <a href="{{ route('admin_logout') }}">Logout</a></p>
    </div>
</aside>
