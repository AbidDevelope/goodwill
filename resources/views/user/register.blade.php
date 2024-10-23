<!DOCTYPE html>
<html>

<head>
@include('user.include.headerlink')
    <title>Register Form</title>
    
    <style>
    .log_in_form {
        position: relative;
        top: 50px;
    }

    .Forgotten-account {
        text-align: center;
        display: flex;
        justify-content: center;
        gap: 4px;
    }

    .Forgotten_in {
        font-size: 16px;
        line-height: 24px;
        font-weight: 500;
    }

  
    </style>
</head>

<body>
    <section class="sign_page">
        <div class="login-form-box--in log_in_form  d-row  -gcol">
            <div class="row_content-container ">
                <div class="sign_logo">
                    <img src="{{asset('/user/assets/images/goodwilllogo.jpeg')}}">
                </div>
                <div class="card">
                <div class="sing_text" style="margin-bottom: 20px;">
                    <h2>SIGN UP</h2>
                </div>
                <form action="{{route('user/register')}}" method="post" id="login-form">
                    @csrf
                    <div class="sign_box_in">
             <div class="form-box g-bottom-margin">
             <div class="form-outline ">
                            <input type="text" name="name" id="typeName" class="form-control form-control-lg"
                                placeholder="Enter your Name" />

                            <label class="form-label" for="typeName"> Name</label>

                        </div>
                        <div class="error_ms">
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            </div>
             </div>

                       <div class="form-box g-bottom-margin">
                       <div class="form-outline ">
                            <input type="number" name="mobile" id="typeMobile" class="form-control form-control-lg"
                                placeholder="Enter your Name" />
                            <label class="form-label" for="typeMobile"> Mobile</label>

                        </div>
                        <div class="error_ms">
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                       </div>
                    </div>
                   <div class="form-box g-bottom-margin">
                   <div class="form-outline ">
                        <input type="email" name="email" id="typeEmail-2" class="form-control form-control-lg"
                            placeholder=" Enter your email id" />

                        <label class="form-label" for="typeEmail-2">Email </label>

                    </div>
                    <div class="error-ms">
                    @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                     @endif
                    </div>
                   </div>

               <div class="form-box g-bottom-margin ">
               <div class="form-outline ">
                            <input type="password" name="password" id="typePassword"
                                class="form-control form-control-lg" placeholder="Enter your  Password" />
                                <label class="form-label" for="typePassword">password</label>
                        </div>
                        <div class="error-ms">

                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
               </div>


                    <div class="sign_btn-j" id="myDiv">
                        <button class="btn_in_ mdc-button btn-g " id="loginButton">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Sign Up</span>
                            <span class="mdc-button__touch"></span>
                        </button>
                        <span class="text-C  d-row g-col-conter g-bottom-margin  text-C padding-p" style="font-size: 21px;">Already a Member?<a href="{{ route('user/login') }}" style="font-size: 21px;">Login</a></span>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
   
    <script>
    document.getElementById("loginButton").addEventListener("click", function() {
        var myDiv = document.getElementById("myDiv");


        if (myDiv.classList.contains("clicked")) {

            myDiv.classList.remove("clicked");
        } else {

            myDiv.classList.add("clicked");
        }
    });
    </script>
</body>

</html>