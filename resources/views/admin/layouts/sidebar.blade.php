<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{route('dashboard.index')}}" class="logo">
                <img src="{{asset('website_logo_admin.png')}}" alt="navbar brand" class="navbar-brand" height="120"
                    width="120" />
            </a>

        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{request()->url() == route('dashboard.index') ? 'active' : ''}}">
                    <a href="{{route('dashboard.index')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                </li>
                @can('show-user')
                    <li class="nav-item {{request()->url() == route('UserRole.index') ? 'active' : ''}}">
                        <a href="{{route('UserRole.index')}}">
                            <i class="fas fa-user"></i>
                            <p>User</p>
                        </a>
                    </li>
                @endcan
                @can('show-role')
                    <li class="nav-item {{request()->url() == route('role.index') ? 'active' : ''}}">
                        <a href="{{route('role.index')}}">
                            <i class="fas fa-user-shield"></i>
                            <p>Role</p>
                        </a>
                    </li>
                @endcan
                @can('show-product')
                    <li class="nav-item {{request()->url() == route('product.index') ? 'active' : ''}}">
                        <a href="{{route('product.index')}}">
                            <i class="fab fa-product-hunt"></i>
                            <p>Products</p>
                        </a>
                    </li>
                @endcan
                @can('show-category')
                    <li class="nav-item {{request()->url() == route('category.index') ? 'active' : ''}}">
                        <a href="{{route('category.index')}}">
                            <i class="fas fa-layer-group"></i>
                            <p>Category</p>
                        </a>
                    </li>
                @endcan
                @can('show-supplier')
                    <li class="nav-item {{request()->url() == route('supplier.index') ? 'active' : ''}}">
                        <a href="{{route('supplier.index')}}">
                            <i class="fas fa-industry"></i>
                            <p>Supplier</p>
                        </a>
                    </li>
                @endcan
                @can('show-goods_receipt')
                    <li class="nav-item {{request()->url() == route('goods_receipt.index') ? 'active' : ''}}">
                        <a href="{{route('goods_receipt.index')}}">
                            <i class="fas fa-receipt"></i>
                            <p>Receipt</p>
                        </a>
                    </li>
                @endcan
                @can('show-discount')
                    <li class="nav-item {{request()->url() == route('discount.index') ? 'active' : ''}}">
                        <a href="{{route('discount.index')}}">
                            <i class="fas fa-arrow-alt-circle-down"></i>
                            <p>discount</p>
                        </a>
                    </li>
                @endcan
                @can('show-coupon')
                    <li class="nav-item {{request()->url() == route('coupon.index') ? 'active' : ''}}">
                        <a href="{{route('coupon.index')}}">
                            <i class="fas fa-ticket-alt"></i>
                            <p>coupon</p>
                        </a>
                    </li>
                @endcan
                @can('show-order')
                    <li class="nav-item {{request()->url() == route('order.index') ? 'active' : ''}}">
                        <a href="{{route('order.index')}}">
                            <i class="fas fa-box"></i>
                            <p>Order</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>