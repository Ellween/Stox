<nav class="navbar navbar-expand-lg p-0">
    <div class ='d-flex align-items-center'>
        <a class="navbar-brand m-0" href="/"><img src="/images/logo.svg" alt=""></a>
        <a style ='text-decoration:none;' href='/'><h1>STOXTRADES</h1></a>
    </div>
    <button class="hamburger hamburger--spin navbar-toggler" type="button" aria-label="Menu" aria-controls="navigation" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto d-flex justify-content-end w-100">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            @foreach ($menu as $menu)
                <li class="nav-item">
                    <a class="nav-link" href="/page/{{ $menu->slug }}"> {{ $menu->title }}</a>
                </li>
            @endforeach
            <li class="nav-item">
                <a class="nav-link" href="/glossary">GLOSSARY</a>
            </li>
             <li class="nav-item">
                <div class="login d-flex align-items-center" data-toggle="modal" data-target="#Login-Signup">
                    <i class="fas fa-sign-out-alt"></i>
                    @if(Auth::check())
                    <a class="nav-link" href="/logout">SIGN OUT</a>
                    @else
                    <a class="nav-link" href="#">LOGIN / REGISTER</a>
                    @endif
                </div>
            </li> 
        </ul>
    </div>
</nav>






{{-- Login-Sign Up Modal --}}

  <div class="modal fade" id="Login-Signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header sign-up-header">
            <div class="sing-up-login">
                <p class='sign-up-p'>Sign Up</p>
                <p class='log-in-p active'>Log In</p>
            </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <hr>
        <div class="modal-body login-form active">
            <div class="invalid-text w-100  justify-content-center" style ='display:none;'>
                <label class='invalid'></label>
            </div>
          <form class='login-in-form form-horizontal' method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
            <div class="e-mail">
                <input type="email" id ='email' class='form-control @error('email') is-invalid @enderror' placeholder="E-Mail" name='email'>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="password">
                <input type="password" id='password' class='form-control @error('password') is-invalid @enderror' placeholder="Password" name ='password'>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="submit-btn">
                <button type="submit" class='login-btn'>Enter Account</button>
            </div>
          </form>
        </div>

        <div class="modal-body  sing-up-block">
            <form class='sign-up-form' id='myform' style ='padding: 0px 0px 50px 0px !important;' method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="first_name">
                    <input type="text" class='form-control' placeholder="First Name" name ='name'>
                </div>
                <div class="last_name">
                    <input type="text" class='form-control' placeholder="Last Name" name ='last_name'>
                </div>
                <div class="email">
                    <input type="email" class='form-control' placeholder="E-mail" name ='email'>
                </div>
                <div class="phone">
                    <input type="text" class='form-control' placeholder="Phone" name ='phone'>
                </div>
                <div class="country">
                    <input type="text" class='form-control' placeholder="Country" name ='country'>
                </div>
                <div class="password">
                    <input id ='password' type="password" class='form-control' placeholder="Password" name ='password'>
                </div>
                <div class="conf-password">
                    <input type="password" class='form-control' placeholder="Confirm Password" name ='password_confirm'>
                </div>
                <div class="submit-btn">
                    <button type="submit">Open Account For Free</button>
                </div>
            </form>
        </div>
        {{-- <div class="modal-footer sign-up-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>