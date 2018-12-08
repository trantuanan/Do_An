<nav class="navbar navbar-backend">
    <a class="navbar-brand" href="/admin"><img src="{{ asset('upload/img/logo.png') }}" id="logo-top" alt="logo công ty"></span></a>
    <div class="form-inline my-2 my-lg-0">
        <div class="dropdown">
          <div id="name-user">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Đăng xuất') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </div> 

        </div>
    </div>
</nav>

