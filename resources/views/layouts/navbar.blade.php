<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Happy Shopping</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('cart*') ? 'active' : '' }}" href="/cart">Cart {{ Cart::getTotalQuantity()}}</a>
        </li>
        @role('user')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('cekouts*') ? 'active' : '' }}" aria-current="page" href="/cekouts">Cekouts</a>
        </li>
        @endrole
      </ul>


      @role('admin|user')
        <li class="nav-item">
          <a class="btn btn-outline-success " href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
    
      @else
        @if (Route::has('login'))
          <li class="nav-item">
            <a class="btn btn-outline-success" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
        @endif    
      @endrole
      
    </div>
  </div>
</nav>