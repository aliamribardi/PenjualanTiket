<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('home*') ? 'active' : '' }}" aria-current="page" href="/home">
              <span data-feather="home"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('tiket*') ? 'active' : '' }}" href="/tiket">
              <span data-feather="file"></span>
              Tiket
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('category*') ? 'active' : '' }}" href="/category">
              <span data-feather="layers"></span>
              Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('cekout*') ? 'active' : '' }}" href="/cekout">
              <span data-feather="shopping-cart"></span>
              Cekout
            </a>
          </li>
        </ul>

      </div>
    </nav>