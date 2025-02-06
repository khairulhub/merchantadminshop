<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="@if (Route::currentRouteNamed('admin.dashboard')) page-active @endif">
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>




        {{-- Manage Category --}}
       
        <li id="menu-category" class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Merchant</div>
            </a>
            <ul class="submenu">
        {{--  --}}
                <li class="@if (Route::currentRouteNamed('all.merchant.list')) page-active @endif">
                    <a href="{{ route('all.merchant.list') }}"><i class='bx bx-radio-circle'></i>All Merchants</a>
                </li>
             
               {{-- class="@if (Route::currentRouteNamed('all.subcategory')) page-active @endif" --}}
                <li >
                    <a href="{{ route('pending.merchants') }}"><i class='bx bx-radio-circle'></i>Pending Merchants</a>
                </li>
           
            </ul>
        </li>
     

       

     

    

       
    </ul>
    <!--end navigation-->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
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
</script> --}}
