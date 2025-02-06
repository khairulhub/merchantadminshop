<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Merchant</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="@if (Route::currentRouteNamed('merchant.dashboard')) page-active @endif">
            <a href="{{ route('merchant.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>




        {{-- Manage Category --}}
       
        <li id="menu-category" class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Store List</div>
            </a>
            <ul class="submenu">
                <li class="@if (Route::currentRouteNamed('all.storelist')) page-active @endif">
                    <a href="{{ route('all.storelist') }}"><i class='bx bx-radio-circle'></i>Show Store List</a>
                </li>
                <li class="@if (Route::currentRouteNamed('add.storelist')) page-active @endif">
                    <a href="{{ route('add.storelist') }}"><i class='bx bx-radio-circle'></i>Add Store</a>
                </li>
           
            </ul>
        </li>


        {{-- Manage Category --}}
       
        <li id="menu-category" class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Category List</div>
            </a>
            <ul class="submenu">
                <li class="@if (Route::currentRouteNamed('all.category')) page-active @endif">
                    <a href="{{ route('all.category') }} "><i class='bx bx-radio-circle'></i>Show Category List</a>
                </li>
                <li  class="@if (Route::currentRouteNamed('all.subcategory')) page-active @endif">
                    <a href="{{ route('add.category') }}"><i class='bx bx-radio-circle'></i>Add Category List</a>
                </li>
           
            </ul>
        </li>


     
        {{-- Manage product list --}}
       
        <li id="menu-category" class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage  Product List</div>
            </a>
            <ul class="submenu">
                <li class="@if (Route::currentRouteNamed('all.productlist')) page-active @endif">
                    <a href="{{ route('all.productlist') }}"><i class='bx bx-radio-circle'></i>Show Product List</a>
                </li>
                <li class="@if (Route::currentRouteNamed('add.productlist')) page-active @endif">
                    <a href="{{ route('add.productlist') }}"><i class='bx bx-radio-circle'></i>Add Product List </a>
                </li>
           
            </ul>
        </li>
     

       

     

    

       
    </ul>
    <!--end navigation-->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.menu-item > .has-arrow').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $menu = $this.next('.submenu');

            // Close other submenus
            $('.submenu').not($menu).slideUp();
            $('.menu-item > .has-arrow').not($this).removeClass('active');

            // Toggle the clicked submenu
            $menu.slideToggle();
            $this.toggleClass('active');
        });
    });
</script>
