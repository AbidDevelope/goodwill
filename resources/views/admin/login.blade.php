<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <title>Goodwillonline Admin login</title>
    <style>
        .login-form{
        height: 38rem;
        }
        .card-body{
          padding-top: 10px!important;
        }
        .form-heading{
          text-align: center;
          margin-top: 30px;
          margin-bottom: 5px;
        }
        .alert.text-danger.pl-2 {
    font-size: 17px!important;
    padding: 0!important;
    margin: 0!important;
  }
  .top-box-in{
    position: relative;
    top: 60px;
  }
  span.input-text-error {
    position: relative;
    top: -21px;
    left: -90px;
    font-size: 13px;
    font-weight: 400;
    line-height: 18px;
}
.login_img {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 13px;
    height: 76px;
    background-color: #508bfc;
    width: 100%;
    max-width: 80px;
    position: relative;
    border-radius: 67%;
    top: -22px;
    margin: auto;
}
.login_img_in{
  object-fit: cover;
  height: 80px;
}
        @media (max-width: 768px) {
            .login-form{
            height: 100vh;
        }
  .top-box-in{
    top: 50px;
  }

        }
             @media (max-width: 576px){
               .login-form{
            height: 100vh;
        }
        span.input-text-error{
            left: 0;
        }
             }
    </style>
  </head>
  <body>
    <section class="login-form" style="background-color:#508bfc; height: 100vh;">
      <div class="container py-5 ">
        <div class="row d-flex justify-content-center align-items-center h-100 top-box-in">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="login_img">
                <img class="login_img_in" src="{{asset('public/admin/assets/images/gw_logo.png')}}" alt="balchandra">
              </div>
            <h3 class=" form-heading">Admin Login</h3>
            <form action="{{ route('sample.validate_login') }}" method="post" class="card-body p-5 text-center">
            
          @csrf
          @if(!empty(Session::get('error')))  
            <div class="alert text-danger pl-2" style="color:red;font-size:20px;">
               {{Session::get('error')}}
            </div>
            <br>
           @endif 
          <div class="form-outline mb-4">
          <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg"  >
                   
              <label class="form-label" for="typeEmailX-2">Email</label>
            
          </div>
          @if($errors->has('email'))
              <span class="text-danger input-text-error">{{ $errors->first('email') }}</span>
            @endif
          <div class="form-outline mb-4">
          <input type="password" id="typePasswordX-2" name="password"  class="form-control form-control-lg" >
                    <label class="form-label" for="typePasswordX-2">Password</label>
            
          </div>
          @if($errors->has('password'))
              <span class="text-danger  input-text-error">{{ $errors->first('password') }}</span>
            @endif
          <button class="btn btn-primary btn-lg btn-block" id="loginButton">Login</button>
              
    </form>


            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
   
  </body>
</html>