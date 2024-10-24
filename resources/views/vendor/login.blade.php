<!DOCTYPE html>
<html lang="en">
<head>
  @include('vendor.include.headerlink')
  <title>vendor login</title>
</head>
<body>
   <!--start wrapper-->
   <div class="wrapper">
        <!--start content-->
        <main class="authentication-content">
         <div class="container-fluid">
           <div class="authentication-card">
             <div class="card shadow rounded-0 overflow-hidden">
               <div class="row g-0">
                 <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                   <img src="{{ asset('public/vendor/login/images/avatars/sale.png') }}" class="img-fluid" alt="">
                 </div>
                 <div class="col-lg-6">
                   <div class="card-body p-4 p-sm-5">
                    @if (Session::has('success'))
                      <div class="alert alert-success">
                         <span>{{ Session::get('success') }}</span>
                      </div>
                    @endif
                     <h5 class="card-title">Sign In</h5>
                     <p class="card-text mb-5">See your growth and get consulting support!</p>
                     <form action="{{ route('vendor/login') }}" method="POST" class="form-body">
                         @csrf
                       <div class="d-grid">
                         <a class="btn btn-white radius-30" href="javascript:;"><span class="d-flex justify-content-center align-items-center">
                             <img class="me-2" src="{{ asset('public/vendor/login/images/avatars/search.svg') }}" width="16" alt="">
                             <span>Sign in with Google</span>
                           </span>
                         </a>
                       </div>
                       <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
                         <hr>
                       </div>
                         <div class="row g-3">
                             <!-- Email Address -->
                           <div class="col-12">
                             <label for="inputEmailAddress" class="form-label">Email Address</label>
                             <div class="ms-auto position-relative">
                               <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                               
                               <input type="email" name="email" id="email"  :value="old('email')" class="form-control radius-30 ps-5" placeholder="Email Address" autofocus autocomplete="username" />
                               @if (Session::has('error'))
                                   <span class="text-danger">{{ Session::get('error') }}</span>
                               @endif
                              
                             </div>
                           </div>
                            <!-- Password -->
                           <div class="col-12">
                             <label for="inputChoosePassword" class="form-label">Enter Password</label>
                             <div class="ms-auto position-relative">
                               <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                               <input type="password" name="password" id="password"  autocomplete="current-password" class="form-control radius-30 ps-5 @error ('password') is-invalid  @enderror" placeholder="Enter Password" />
            
                             </div>
                           </div>
                              <!-- Remember Me -->
                           <div class="col-6">
                             <div class="form-check form-switch">
                               <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="" >
                               <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                             </div>
                           </div>
                           @if (Route::has('password.request'))
                           <div class="col-6 text-end">	<a href="#">Forgot Password ?</a>
                           </div>
                           @endif
                           <div class="col-12">
                             <div class="d-grid">
                               <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                             </div>
                           </div>
                           <div class="col-12">
                             <p class="mb-0">Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a></p>
                           </div>
                         </div>
                     </form>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
        </main>
         
        <!--end page main-->
 
   </div>
   <!--end wrapper-->
 
 </body>
</html>