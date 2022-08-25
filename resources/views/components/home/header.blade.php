<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">{{ config('app.name') }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li>
            @if (Route::has('login'))
                @auth
                <ul>
                    <li class="dropdown">
                        <a href="#">
                            <span>
                                @if(Str::length(Auth::guard('pengguna')->user()) > 0)
                                    {{ Auth::guard('pengguna')->user()->name }}
                                @endif
                            </span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                      <ul>
                        <li>
                            <a  href="{{ route('penggunalogout') }}">
                                {{ __('Logout') }}
                                <ion-icon name="exit" style="font-size: 23px"> </ion-icon>
                            </a>
                            <form id="logout-form" action="{{ route('penggunalogout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                      </ul>
                    </li>
                  </ul>
                @else
                  @endauth
                    @yield('home')
                  @yield('admin')
                  @yield('get_started')
                @endif

          </li>
            @yield('kode-pemesanan')
            @yield('jenis_besi')

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
