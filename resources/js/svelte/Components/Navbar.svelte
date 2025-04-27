<script>
    export let activePage = "Home"; // Pass the active page as a prop
</script>

  <nav class="navbar navbar-expand-lg navbar-light primary">
    <div class="container">
      <a class="navbar-brand text" href="/" id="logo">Ming's Bakery</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a
              class="nav-link {activePage === 'Home' ? 'active' : ''}"
              href="/"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link {activePage === 'Products' ? 'active' : ''}"
              href="/products"
              >Products</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link {activePage === 'About' ? 'active' : ''}"
              href="/about"
              >About Us</a
            >
          </li>
        </ul>

    <button
        type="button"
        class="btn btn-outline-dark ms-3"
        data-bs-toggle="modal"
        data-bs-target="#shoppingCartModal"
    >
        <i class="bi bi-cart3"></i> Cart
    </button>
        <!-- Login Button -->
        <a href="/auth/login" class="btn secondary ms-3">Login</a>
      </div>
    </div>
  </nav>