<script>
    import Sidebar from "../../Components/Sidebar.svelte";

    let orders = [
      { id: 1, customer: "John Doe", total: 150000, status: "Pending" },
      { id: 2, customer: "Jane Smith", total: 200000, status: "Completed" },
      { id: 3, customer: "Alice Johnson", total: 100000, status: "Pending" },
    ];

    function updateStatus(id, status) {
      const order = orders.find((order) => order.id === id);
      if (order) {
        order.status = status;
        alert(`Order status updated to: ${status}`);
      }
    }
  </script>
  <Sidebar activePage="product-orders" />

  <div class="container mt-5">
    <h2 class="mb-4">Manajemen Pesanan</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Pelanggan</th>
          <th>Total</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        {#each orders as order}
          <tr>
            <td>{order.id}</td>
            <td>{order.customer}</td>
            <td>Rp {order.total}</td>
            <td>{order.status}</td>
            <td>
              <button class="btn btn-success btn-sm me-2" on:click={() => updateStatus(order.id, "Completed")}>Selesaikan</button>
              <button class="btn btn-warning btn-sm" on:click={() => updateStatus(order.id, "Pending")}>Tunda</button>
            </td>
          </tr>
        {/each}
      </tbody>
    </table>
  </div>

  <style>
    @import "../../../../../public/admin/css/orders.css";
    @import "../../../../../public/admin/css/main.css";
  </style>