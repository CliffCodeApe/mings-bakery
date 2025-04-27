<script>
    export let activePage = ""; // The active page to highlight in the sidebar
</script>

  <div class="sidebar position-fixed p-3" style="width: 250px;">
    <h4 class="mb-4">Ming's Bakery</h4>
    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a href="/dashboard" class="nav-link {activePage === 'dashboard' ? 'active' : ''}">
          <i class="bi bi-house-door me-2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="/dashboard/product-orders" class="nav-link {activePage === 'product-orders' ? 'active' : ''}">
          <i class="bi bi-clipboard-check me-2"></i> Manajemen Pesanan
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="/dashboard/product-management" class="nav-link {activePage === 'product-management' ? 'active' : ''}">
          <i class="bi bi-box-seam me-2"></i> Manajemen Produk
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="/" class="nav-link">
          <i class="bi bi-box-arrow-left me-2"></i> Logout
        </a>
      </li>
    </ul>
  </div>

<style>
    @import "../../../../public/admin/css/main.css";
</style>