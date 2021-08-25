 <!-- Navigation bar -->
 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Web Wisata Karo</a>
      </div>
      <nav role="navigation" class="collapse navbar-collapse navbar-right">
        <ul class="navbar-nav nav">
          <li><a href="/">Home</a></li>
          <li><a href="/destinasi">Destinasi</a></li>
          <li><a href="/pakettour">Paket Tour</a></li>

          @guest
                <li><a href="/about">About</a></li>
                <li class="dropdown">
                  <a data-toggle="dropdown" href="#" class="dropdown-toggle">Login <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="active"><a href="/login">Login</a></li>
                    <li><a href="/register">Daftar</a></li>
              </ul>

          @else
              <li><a href="/user/bookingall/{{ Auth::user()->name }}">Booking</a></li>
              <li><a href="/about">About</a></li>
              <li class="dropdown">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">Halo {{ Auth::user()->name }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                  <form id="logout-form" action="{{ url('logout') }}" method="POST">
                              {{ csrf_field() }}
                      <button type="submit">Logout</button>
                  </form>
                </li>

            </ul>
          @endguest


      </nav>
    </div>
  </div><!-- End Navigation bar -->
