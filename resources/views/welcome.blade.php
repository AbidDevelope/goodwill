<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/style.css')}}">
	<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>

<div id="particles-js"></div>

<div class="login-box">
  <h2>Admin Login</h2>
    <form action="{{ route('sample.validate_login') }}" method="post">
					@csrf
          @if(!empty(Session::get('error')))  
            <div class="alert text-danger pl-2" style="color:red;font-size:20px;">
               {{Session::get('error')}}
            </div>
            <br>
           @endif 
					<div class="user-box">
                    <input type="text" name="email" required="">
                    <label>Email Id</label>
						@if($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
					</div>
					<div class="user-box">
                    <input type="password" name="password" required="">
                    <label>Password</label>
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
						<button type="submit" class="btn btn-primary">Login</button>	
    </form>


  <!-- <form action="{{ route('sample.validate_login') }}" method="post">
    <div class="user-box">
      <input type="text" name="email" required="">
      <label>Email Id</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <button type="subit" class="btn btn-primary">Login</button>
    
  </form> -->
  <script src="particles.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@dazzle/particles@2.11.1@particles.js"></script>

  <script type="text/javascript">
  	function login() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (username === "" || password === "") {
    alert("Please fill in all fields");
    return false;
  } else if (password !== "correctpassword") {
    // Replace "correctpassword" with the actual correct password
    var email = prompt(
      "Incorrect password. Please enter your email to reset your password."
    );
    if (email !== null && email !== "") {
      // Call a function to send a password reset email to the user's email address
      sendResetPasswordEmail(email);
    }
    return false;
  } else {
    // Perform login check here
  }
}

function sendResetPasswordEmail(email) {
  // Implement the logic for sending an email here
  alert(
    "An email has been sent to " +
      email +
      " with instructions to reset your password."
  );
}

particlesJS.load("particles-js", "./particles.json");

function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
particlesJS("particles-js", {
  particles: {
    number: {
      value: 80,
      density: {
        enable: true,
        value_area: 800
      }
    },
    color: {
      value: "#ffffff"
    },
    shape: {
      type: "circle",
      stroke: {
        width: 0,
        color: "#000000"
      },
      polygon: {
        nb_sides: 5
      },
      image: {
        src: "img/github.svg",
        width: 100,
        height: 100
      }
    },
    opacity: {
      value: 0.5,
      random: false,
      anim: {
        enable: false,
        speed: 1,
        opacity_min: 0.1,
        sync: false
      }
    },
    size: {
      value: 5,
      random: true,
      anim: {
        enable: false,
        speed: 40,
        size_min: 0.1,
        sync: false
      }
    },
    line_linked: {
      enable: true,
      distance: 150,
      color: "#ffffff",
      opacity: 0.4,
      width: 1
    },
    move: {
      enable: true,
      speed: 8,
      direction: "none",
      random: true,
      straight: false,
      out_mode: "out",
      bounce: true,
      attract: {
        enable: false,
        rotateX: 600,
        rotateY: 1200
      }
    }
  },
  interactivity: {
    detect_on: "canvas",
    events: {
      onhover: {
        enable: true,
        mode: "repulse"
      },
      onclick: {
        enable: true,
        mode: "push"
      },
      resize: true
    },
    modes: {
      grab: {
        distance: 400,
        line_linked: {
          opacity: 1
        }
      },
      bubble: {
        distance: 400,
        size: 40,
        duration: 2,
        opacity: 8,
        speed: 3
      },
      repulse: {
        distance: 200,
        duration: 0.4
      },
      push: {
        particles_nb: 4
      },
      remove: {
        particles_nb: 2
      }
    }
  },
  retina_detect: true
});

  </script>
</div>
</body>
</html>