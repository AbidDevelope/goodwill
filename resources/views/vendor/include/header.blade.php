<!-- ===== start  header =========-->
<header class="main-header navbar">
    <div class="col-search">
         {{-- <form class="searchform">
            <div class="input-group">
                <input list="search_terms" type="text" class="form-control" placeholder="Search term">
                <button class="btn btn-light bg" type="button"> <i class="material-icons md-search"></i></button>
            </div>
            <datalist id="search_terms">
                <option value="Products">
                <option value="New orders">
                <option value="Apple iphone">
                <option value="Ahmed Hassan">
            </datalist>
        </form>  --}}
    </div>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="fa-solid fa-bars"></i> </button>
        <ul class="nav">
           
           
            
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="fa fa-language  fa-2x" aria-hidden="true"></i></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                    <a class="dropdown-item text-brand" href="#"><img src="assets/images/theme/flag-us.png" alt="English">English</a>
                    <a class="dropdown-item" href="#"><img src="{{ asset('vendor/assets/images/theme/flag-fr.png') }}" alt="Français">Français</a>
                    <a class="dropdown-item" href="#"><img src="{{ asset('vendor/assets/images/theme/flag-jp.png') }}" alt="Français">日本語</a>
                    <a class="dropdown-item" href="#"><img src="{{ asset('vendor/assets/images/theme/flag-cn.png') }}" alt="Français">中国人</a>
                </div>
            </li>
            <li class="dropdown nav-item">
                
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ asset('uploads/admin_create_vendor/'.Auth::guard('vendor')->user()->file) }}" alt="">{{ Auth::guard('vendor')->user()->name }}</a>
                
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="material-icons md-perm_identity"></i>Profile</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('vendor/logout') }}"><i class="material-icons md-exit_to_app"></i>Logout</a>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- ===== end header =========-->