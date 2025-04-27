<script>
    import Sidebar from "../../Components/Sidebar.svelte";

    let products = [
      { id: 1, name: "American Cheese Roll", stock: 20, price: 25500 },
      { id: 2, name: "Cheese Cake Roll", stock: 15, price: 75000 },
      { id: 3, name: "Roti Tawar", stock: 30, price: 20000 },
    ];

    function deleteProduct(id) {
      products = products.filter((product) => product.id !== id);
      alert("Product deleted successfully!");
    }

    function editProduct(id) {
      alert(`Edit product with ID: ${id}`);
    }
  </script>
  <Sidebar activePage="product-management" />

  <div class="container mt-5">
    <h2 class="mb-4">Manajemen Produk</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Produk</th>
          <th>Stok</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        {#each products as product}
          <tr>
            <td>{product.id}</td>
            <td>{product.name}</td>
            <td>{product.stock}</td>
            <td>Rp {product.price}</td>
            <td>
              <button class="btn btn-warning btn-sm me-2" on:click={() => editProduct(product.id)}>Edit</button>
              <button class="btn btn-danger btn-sm" on:click={() => deleteProduct(product.id)}>Hapus</button>
            </td>
          </tr>
        {/each}
      </tbody>
    </table>
  </div>

  <style>
    @import "../../../../../public/admin/css/product.css";
    @import "../../../../../public/admin/css/main.css";
  </style>