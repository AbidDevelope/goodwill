<!DOCTYPE html>
<html lang="en">
<head>
    @include('vendor.include.headerlink')
    <title>Vendor Register</title>
</head>
<body>
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        <div class="login">
            <div class="login-triangle"></div>
            
            <h2 class="login-header">Register</h2>
          
            <form action="{{ route('register') }}" method="POST" class="login-container" enctype="multipart/form-data">
                @csrf
                <p><input type="file" name="file" id="file" value="{{ old('file') }}" class="@error('file') is-invalid @enderror" ></p>
                @error('file')
                 <span class="text-danger">{{ $message }}</span>
                @enderror

              <p><input type="name" name="name" id="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror"  placeholder="name" ></p>
              @error('name')
               <span class="text-danger">{{ $message }}</span>
              @enderror

              <p><input type="email" name="email" id="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror"  placeholder="Email" ></p>
              @error('email')
               <span class="text-danger">{{ $message }}</span>
              @enderror

              <p><input type="mobile" name="mobile" id="mobile" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{ old('mobile') }}" class="@error('mobile') is-invalid @enderror"  placeholder="mobile" ></p>
              @error('mobile')
               <span class="text-danger">{{ $message }}</span>
              @enderror

              <p><input type="password" name="password" id="password" class="@error('password') is-invalid @enderror"  placeholder="Password"  ></p>
              @error('password')
               <span class="text-danger">{{ $message }}</span>
              @enderror

              <p><input type="submit" value="Register"></p>
              <div class="sign-up p-4 text-center">
                <label for="not-member">Already a Member?</label>&nbsp;<a href="{{ route('vendor/login') }}">Log in</a>
             </div>
            </form>
          </div>
    </div>
</body>
</html>