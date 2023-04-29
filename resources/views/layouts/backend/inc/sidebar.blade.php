<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
    @if (Auth::user()->role == 2)
        <a href="{{ route('admin.dashboard') }}" class="brand-wrap">
            <img src="{{ asset('frontend/assets') }}/images/logo/logo.png" class="logo" alt="Nest Dashboard" />
        </a>
    @elseif (Auth::user()->role ==3)
        <a href="{{ route('vendor.dashboard') }}" class="brand-wrap">
            <img src="{{ asset('frontend/assets') }}/images/logo/logo.png" class="logo" alt="Nest Dashboard" />
        </a>
    @else
        <a href="{{ route('user.dashboard') }}" class="brand-wrap">
            <img src="{{ asset('frontend/assets') }}/images/logo/logo.png" class="logo" alt="Nest Dashboard" />
        </a>
    @endif
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item @yield('dashboard')">
            @if (Auth::user()->role == 2)
                <a class="menu-link" href="{{ route('admin.dashboard') }}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            @elseif (Auth::user()->role == 3)
                <a class="menu-link" href="{{ route('vendor.dashboard') }}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            @else
                <a class="menu-link" href="{{ route('user.dashboard') }}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            @endif
            </li>

        @if (Auth::user()->role == 2)
            <li class="menu-item has-submenu @yield('vendor')">
                <a class="menu-link" href="{{ route('vendor.index') }}">
                    <i class="icon material-icons md-store"></i>
                    <span class="text">Vendor</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('vendor.index') }}" class="@yield('vendor.index')">Vendor List</a>
                    <a href="{{ route('vendor.create') }}" class="@yield('vendor.create')">Add Vendor</a>
                </div>
            </li>

            <li class="menu-item @yield('email-offer')">
                <a class="menu-link" href="{{ route('email_offer') }}">
                    <i class="icon icon material-icons md-person"></i>
                    <span class="text">Email Offer</span>
                </a>
            </li>

            <li class="menu-item has-submenu @yield('banner')">
                <a class="menu-link" href="{{ route('banner.index') }}">
                    <i class="icon material-icons md-store"></i>
                    <span class="text">Banner</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('banner.index') }}" class="@yield('banner.index')">Banner List</a>
                    <a href="{{ route('banner.create') }}" class="@yield('banner.add')">Add Banner</a>
                </div>
            </li>

            <li class="menu-item has-submenu @yield('category')">
                <a class="menu-link" href="{{ route('category.index') }}">
                    <i class="icon material-icons md-store"></i>
                    <span class="text">Category</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('category.index') }}" class="@yield('category.index')">Category List</a>
                    <a href="{{ route('category.create') }}" class="@yield('category.add')">Add Category</a>
                </div>
            </li>

            <li class="menu-item has-submenu @yield('coupon')">
                <a class="menu-link" href="{{ route('coupon.index') }}">
                    <i class="icon material-icons md-store"></i>
                    <span class="text">Coupon</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('coupon.index') }}" class="@yield('coupon.index')">Coupon List</a>
                    <a href="{{ route('coupon.create') }}" class="@yield('coupon.add')">Add Coupon</a>
                </div>
            </li>

            <li class="menu-item @yield('order')">
                <a class="menu-link" href="{{ route('all.orders') }}">
                    <i class="icon icon material-icons md-shopping_cart"></i>
                    <span class="text">All Order</span>
                </a>
            </li>

            <li class="menu-item @yield('contact')">
                <a class="menu-link" href="{{ route('contact.index') }}">
                    <i class="icon icon material-icons md-message"></i>
                    <span class="text">Contact Message</span>
                </a>
            </li>

            <li class="menu-item @yield('setting')">
                <a class="menu-link" href="{{ route('setting.index') }}">
                    <i class="icon icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
            </li>

        @elseif(Auth::user()->role == 3)
            <li class="menu-item has-submenu @yield('product')">
                <a class="menu-link" href="{{ route('product.index') }}">
                    <i class="icon material-icons md-add_box"></i>
                    <span class="text">product</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('product.index') }}" class="@yield('product.index')">product List</a>
                    <a href="{{ route('product.create') }}" class="@yield('product.add')">Add product</a>
                </div>
            </li>
{{--
            <li class="menu-item has-submenu @yield('size')">
                <a class="menu-link" href="{{ route('size.index') }}">
                    <i class="icon material-icons md-add_box"></i>
                    <span class="text">Size</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('size.index') }}" class="@yield('size.index')">Size List</a>
                    <a href="{{ route('size.create') }}" class="@yield('size.add')">Add Size</a>
                </div>
            </li> --}}

            <li class="menu-item @yield('vendorOrder')">
                <a class="menu-link" href="{{ route('singleVendorOrder.index') }}">
                    <i class="icon icon material-icons md-shopping_cart"></i>
                    <span class="text">All Order</span>
                </a>
            </li>

        @else
            <li class="menu-item @yield('myOrder')">
                <a class="menu-link" href="{{ route('my_order.index') }}">
                    <i class="icon icon material-icons md-shopping_cart"></i>
                    <span class="text">My Order</span>
                </a>
            </li>
        @endif

            {{-- <li class="menu-item has-submenu">
                <a class="menu-link" href="page-products-list.html">
                    <i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Products</span>
                </a>
                <div class="submenu">
                    <a href="page-products-list.html">Product List</a>
                    <a href="page-products-grid.html">Product grid</a>
                    <a href="page-products-grid-2.html">Product grid 2</a>
                    <a href="page-categories.html">Categories</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-orders-1.html">
                    <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Orders</span>
                </a>
                <div class="submenu">
                    <a href="page-orders-1.html">Order list 1</a>
                    <a href="page-orders-2.html">Order list 2</a>
                    <a href="page-orders-detail.html">Order detail</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-sellers-cards.html">
                    <i class="icon material-icons md-store"></i>
                    <span class="text">Sellers</span>
                </a>
                <div class="submenu">
                    <a href="page-sellers-cards.html">Sellers cards</a>
                    <a href="page-sellers-list.html">Sellers list</a>
                    <a href="page-seller-detail.html">Seller profile</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-form-product-1.html">
                    <i class="icon material-icons md-add_box"></i>
                    <span class="text">Add product</span>
                </a>
                <div class="submenu">
                    <a href="page-form-product-1.html">Add product 1</a>
                    <a href="page-form-product-2.html">Add product 2</a>
                    <a href="page-form-product-3.html">Add product 3</a>
                    <a href="page-form-product-4.html">Add product 4</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-transactions-1.html">
                    <i class="icon material-icons md-monetization_on"></i>
                    <span class="text">Transactions</span>
                </a>
                <div class="submenu">
                    <a href="page-transactions-1.html">Transaction 1</a>
                    <a href="page-transactions-2.html">Transaction 2</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-person"></i>
                    <span class="text">Account</span>
                </a>
                <div class="submenu">
                    <a href="page-account-login.html">User login</a>
                    <a href="page-account-register.html">User registration</a>
                    <a href="page-error-404.html">Error 404</a>
                </div>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="page-reviews.html">
                    <i class="icon material-icons md-comment"></i>
                    <span class="text">Reviews</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="page-brands.html"> <i class="icon material-icons md-stars"></i> <span class="text">Brands</span> </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" disabled href="#">
                    <i class="icon material-icons md-pie_chart"></i>
                    <span class="text">Statistics</span>
                </a>
            </li> --}}
        </ul>
        {{-- <hr />
        <ul class="menu-aside">
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
                <div class="submenu">
                    <a href="page-settings-1.html">Setting sample 1</a>
                    <a href="page-settings-2.html">Setting sample 2</a>
                </div>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="page-blank.html">
                    <i class="icon material-icons md-local_offer"></i>
                    <span class="text"> Starter page </span>
                </a>
            </li>
        </ul> --}}
        <br />
        <br />
    </nav>
</aside>
