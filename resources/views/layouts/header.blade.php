<div id="header">
    <div class="navbar-info">
      <div id="wrapper-website">
        <ul class="list-item-navbar-info">
            <li class="item-navbar-info">
                <a href="1#"><span class="icon ion-ios-location-outline change"> Chung cư Hateco, đường Vành đai 3, P.Yên Sở, Q.Hoàng Mai, TP. Hà Nội</span></a>
            </li>
            <li class="item-navbar-info">
                <a href="2#"><span class="icon ion-ios-telephone-outline change"> 0967 193 281 - 0913 21 1139</span></a>
            </li>
            <li class="item-navbar-info">
               <a href="3#"><span class="icon ion-social-twitter-outline right change"></span></a>
            </li>
            <li class="item-navbar-info">
                <a href="4#"><span class="icon ion-social-youtube-outline right change"></span></a>
            </li>
            <li class="item-navbar-info">
                 <a href="5#"><span class="icon ion-social-googleplus-outline right change"></span></a>
            </li>
            <li class="item-navbar-info">
                <a href="6#"><span class="icon ion-social-facebook-outline right change"></span></a>
            </li>
        </ul>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-top">
      <div id="wrapper-website">
        <div class="row" >
        <a class="navbar-brand col-md-2" href="/"><img src="{{ asset('upload/img/logo.png') }}" id="logo-top" alt="logo công ty"></a>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">  
            <li class="nav-item">
              <a class="nav-link" href="{{route('home',['locale' => App::getLocale()])}}">Trang chủ</a>
             <a href="{!! route(Route::currentRouteName(),['locale' => "en"]) !!}">English</a>
              <a href="{!! route(Route::currentRouteName(),['locale' => "vi"]) !!}">Vietnam</a>
               <a href="{!! route(Route::currentRouteName(),['locale' => "jp"]) !!}">Japanese</a>              
            </li>          
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/product" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Sản phẩm
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/products">Tất cả sản phẩm</a>
                <a class="dropdown-item" href="/products/CNC">Đèn nội thất</a>
                <a class="dropdown-item" href="/products/LED">Biển quảng cáo led</a>
                <a class="dropdown-item" href="/products/GC">Gia công chữ quảng cáo</a>
                <a class="dropdown-item" href="/products/TT">Trang trí tòa nhà</a>
                <a class="dropdown-item" href="/products/TL">Biển tấm lớn các loại</a>
                <a class="dropdown-item" href="/products/CD">Đèn phong cách Nhật-和風ランプ</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dịch vụ
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/services/CNC">Đèn nội thất</a>
                <a class="dropdown-item" href="/services/LED">Biển quảng cáo led</a>
                <a class="dropdown-item" href="/services/GC">Gia công chữ quảng cáo</a>
                <a class="dropdown-item" href="/services/TT">Trang trí tòa nhà</a>
                <a class="dropdown-item" href="/services/TL">Biển tấm lớn các loại</a>
                <a class="dropdown-item" href="/services/CD">Đèn phong cách Nhật-和風ランプ</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('news')}}">Tin tức</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('About',['locale' => App::getLocale()])}}">Giới thiệu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Contact">Liên hệ</a>
            </li>
            <li>
              <a class="nav-link" href="/search">Tìm kiếm</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            @if (Auth::guard('customer')->check() == 'Guest')
            <div class="dropdown">
              <div id="name-user">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::guard('customer')->user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('customer.dashboard') }}" class="">
                          {{ __('Khách hàng') }}
                      </a>

                      <a class="dropdown-item" href="{{ route('customer.changepassword') }}" class="">
                          {{ __('Đổi mật khẩu') }}
                      </a>
                      
                      <a class="dropdown-item" href="{{ route('customer.logout') }}" class="logout-btn">
                          {{ __('Đăng xuất') }}
                      </a>
                      <form id="logout-form" action="{{ route('customer.logout') }}" method="GET" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </div> 
            </div>
            @else
            <div class="dropdown">
              <div id="name-user">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="icon ion-person"></i> Tài khoản <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('customer.dashboard') }}" class="">
                          {{ __('Đăng nhập') }}
                      </a>
                      
                      <a class="dropdown-item" href="{{ route('customer.register') }}">
                          {{ __('Đăng ký') }}
                      </a>
                  </div>
              </div> 
            </div>
            @endif
            <div class="btn-group cart-group">
              <button type="button" class="btn btn-primary" onclick="javascript:location.href='/cart'">
                <i class="icon ion-android-cart"></i>
                Giỏ hàng 
                @if(Cart::instance('default')->count() >0)
                <span class="badge badge-light">{{ Cart::instance('default')->count() }}</span>
                @endif
              </button>
            </div> 
          </form>
          </div>
        </div>
      </div>
    </nav>
</div>
