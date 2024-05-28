<!--begin:Menu item-->
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link {{ Route::is('adminPanel.dashboard') ? 'active' : '' }}"
        href="{{ route('adminPanel.dashboard') }}">
        <span class="menu-bullet">
            <i class="ki-duotone ki-profile-user fs-2 mx-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
            </i>
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
@push('scripts')
<script>
    window.setTimeout(function() {
            $('.active').closest(".menu-accordion").addClass('hover show');
        }, 200);
</script>
@endpush

<div class="menu-item">
    <a class="menu-link {{ Route::is('adminPanel.products.index') ? 'active' : '' }}"
        href="{{ route('adminPanel.products.index') }}">
        <span class="menu-bullet">
            <i class="nav-icon fas fa-home"></i>
        </span>
        <span class="menu-title">@lang('models/products.plural')</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('adminPanel.categories.index') ? 'active' : '' }}"
        href="{{ route('adminPanel.categories.index') }}">
        <span class="menu-bullet">
            <i class="nav-icon fas fa-home"></i>
        </span>
        <span class="menu-title">@lang('models/categories.plural')</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('adminPanel.carts.index') ? 'active' : '' }}"
        href="{{ route('adminPanel.carts.index') }}">
        <span class="menu-bullet">
            <i class="nav-icon fas fa-home"></i>
        </span>
        <span class="menu-title">@lang('models/carts.plural')</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('adminPanel.orders.index') ? 'active' : '' }}"
        href="{{ route('adminPanel.orders.index') }}">
        <span class="menu-bullet">
            <i class="nav-icon fas fa-home"></i>
        </span>
        <span class="menu-title">@lang('models/orders.plural')</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('adminPanel.orderitems.index') ? 'active' : '' }}"
        href="{{ route('adminPanel.orderitems.index') }}">
        <span class="menu-bullet">
            <i class="nav-icon fas fa-home"></i>
        </span>
        <span class="menu-title">@lang('models/orderitems.plural')</span>
    </a>
</div>