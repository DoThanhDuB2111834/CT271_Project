<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{route('dashboard.index')}}" class="logo">
                <img src="{{asset('admin/assets/img/kaiadmin/logo_light.svg')}}" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
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
                @hasrole('superadmin')
                <li class="nav-item {{request()->url() == route('role.index') ? 'active' : ''}}">
                    <a href="{{route('role.index')}}">
                        <i class="fas fa-user-shield"></i>
                        <p>Role</p>
                    </a>
                </li>
                @endhasrole
                <li class="nav-item {{request()->url() == route('product.index') ? 'active' : ''}}">
                    <a href="{{route('product.index')}}">
                        <i class="fab fa-product-hunt"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item {{request()->url() == route('category.index') ? 'active' : ''}}">
                    <a href="{{route('category.index')}}">
                        <i class="fas fa-layer-group"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item {{request()->url() == route('supplier.index') ? 'active' : ''}}">
                    <a href="{{route('supplier.index')}}">
                        <i class="fas fa-industry"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item {{request()->url() == route('goods_receipt.index') ? 'active' : ''}}">
                    <a href="{{route('goods_receipt.index')}}">
                        <i class="fas fa-receipt"></i>
                        <p>Receipt</p>
                    </a>
                </li>
                <li class="nav-item {{request()->url() == route('discount.index') ? 'active' : ''}}">
                    <a href="{{route('discount.index')}}">
                        <i class="fas fa-arrow-alt-circle-down"></i>
                        <p>discount</p>
                    </a>
                </li>
                <li class="nav-item {{request()->url() == route('coupon.index') ? 'active' : ''}}">
                    <a href="{{route('coupon.index')}}">
                        <i class="fas fa-ticket-alt"></i>
                        <p>coupon</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>