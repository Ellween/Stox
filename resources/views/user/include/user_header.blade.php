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
                {{-- @foreach ($menu as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="/page/{{ $menu->slug }}"> {{ $menu->title }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="/glossary">GLOSSARY</a>
                </li> --}}
                 <li class="nav-item">
                    <div class="login d-flex align-items-center" data-toggle="modal" data-target="#Login-Signup">
                        <i class="fas fa-sign-out-alt"></i>
                        @if(Session::has('user_register') === true)
                        <a class="nav-link" href="/logout">SIGN OUT</a>
                        @else
                        <a class="nav-link" href="#">LOGIN / REGISTER</a>
                        @endif
                    </div>
                </li> 
            </ul>
        </div>
    </nav>
    
    