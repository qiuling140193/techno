<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Taman Kanak-kanak</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-image:url(image/Taman.jpg);
            background-color:#FFFFFF;
            background-repeat: no-repeat;
        }
        .login-sidebar{
            border-top:5px solid 
            border-color:#22A7F0};
        }
        @media (max-width: 767px) {
            .login-sidebar {
                border-top:0px !important;
                border-left:5px solid ;
                border-color: #22A7F0 ;
            }
        }
        body.login .form-group-default.focused{
            border-color:#22A7F0;
        }
        .login-button, .bar:before, .bar:after{
            background:#22A7F0;
        }
        .login-container{
          padding-top: 150px;
        }

    </style>

    
</head>
<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-9">
            <div class="clearfix">
                <div class="col-sm-9 col-md-5 col-md-offset-12">
                    <div class="logo-title-container">
                        <div class="copy animated fadeIn">
                            <h1>Taman Kanak Kanak</h1>
                            
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-8 col-md-3">
            
            <div class="login-container">
                
                <h2>Login</h2>

                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Email" class="form-control" required>
                         </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>Password</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-8">
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember Me
                          </label>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-block login-button">
                        <span class="signingin hidden"><span class="voyager-refresh"></span></span>
                        <span class="signin">Login</span>
                    </button>

              </form>

              <div style="clear:both"></div>

              @if(!$errors->isEmpty())
              <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
              </div>
              @endif

            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div>
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="email"]');
    var password = document.querySelector('[name="password"]');
    btn.addEventListener('click', function(ev){
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    email.focus();
    document.getElementById('emailGroup').classList.add("focused");
    
    // Focus events for email and password fields
    email.addEventListener('focusin', function(e){
        document.getElementById('emailGroup').classList.add("focused");
    });
    email.addEventListener('focusout', function(e){
       document.getElementById('emailGroup').classList.remove("focused");
    });

    password.addEventListener('focusin', function(e){
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function(e){
       document.getElementById('passwordGroup').classList.remove("focused");
    });

</script>
</body>
</html>
