<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.include.headerlink')
<!-- <link rel="stylesheet" href="{{ asset('/user/assets/css/login.css')}}"> -->
</head>
<body>
    <section class="sign_page">
        <div class="login-form-box--in  d-row  -gcol">
            <div class="d-row  -gcol padding-LR">
               
                @if( Session::has('message') )
                <div class="alert alert-success">
                    <span>{{ Session::get('message') }}</span>
                 </div>
                @endif
                <div class="sign_logo">
                    <img src="{{asset('/user/assets/images/goodwilllogo.jpeg')}}">
                </div>
                <div class="card">
                    <div class="sing_text">
                        <h4>Welcome to goodwill</h4>
                        <p class="name">Type your e-mail or phone number to log in or create a goodwill account.</p>
                    </div>
                    <form action="{{ route('user/login') }}" method="post">
                        @csrf
                        @if(!empty(Session::get('error')))
                        <div class="alert text-danger " style="color:red;font-size:20px;">
                            {{Session::get('error')}}
                        </div>
                        <br>
                        @endif
                        <div class="user-box form-outline g-bottom-margin">
                            <input type="email" name="email" required="" id="typeEmailX-2"
                                class="form-control form-control-lg" placeholder="Enter a valid email">
                            <label for="typeEmailX-2" class="form-label">Email Id</label>
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="user-box form-outline g-bottom-margin">
                            <input type="password" name="password" required="" id="typepassword-2"
                                class="form-control form-control-lg" placeholder="Enter a valid password">
                            <label for="typepasswordX-2" class="form-label">Password</label>
                            @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <button type="submit" button class="btn-g g-bottom-margin">Login</button>

                        <a href="{{ route('register') }}"> <button type="button" class="btn-g g-bottom-margin">Register</button></a>

                    </form>
                    <div style="margin-top:39px"></div>
                    <div class="text_in_p">
                        <p>For further support, you may visit the Help Center or contact our customer service team.</p>
                    </div>
                    <div class="bdchf_in">
                        <div class="prc d-row g-conter-items">Goodwill<div>
                        <div class="sign_logo_on-p">
                            <img src="{{asset('//user/assets/images/goodwilllogo.jpeg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
   


    function reduceOpacity() {
        var button = document.querySelector(".google_btn");
        var currentOpacity = window.getComputedStyle(button).getPropertyValue("background-color");
        currentOpacity = currentOpacity.replace("rgba(", "").replace(")", "").split(",");
        var newOpacity = "rgba(" + currentOpacity[0] + "," + currentOpacity[1] + "," + currentOpacity[2] +
        ",0.5)"; 
        button.style.backgroundColor = newOpacity;
    }
    </script>
</body>

</html>