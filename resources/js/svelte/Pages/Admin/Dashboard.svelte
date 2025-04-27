<script>
    import Sidebar from "../../Components/Sidebar.svelte";
    import { onMount } from "svelte";
    import Chart from "chart.js/auto";

    let salesChart;

    // Initialize the sales chart
    onMount(() => {
      const ctx = document.getElementById("salesChart").getContext("2d");
      salesChart = new Chart(ctx, {
        type: "line",
        data: {
          labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
          datasets: [
            {
              label: "Sales",
              data: [120, 190, 300, 500, 200, 300, 400],
              borderColor: "rgba(75, 192, 192, 1)",
              backgroundColor: "rgba(75, 192, 192, 0.2)",
              borderWidth: 2,
            },
          ],
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: true,
            },
          },
        },
      });
    });
  </script>

  <Sidebar activePage="dashboard" />

  <div class="content" style="margin-left: 250px; padding: 30px;">
    <h2 class="mb-4">Dashboard</h2>

    <!-- Summary Cards -->
    <div class="row mb-4">
      <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <h6>Total Pesanan</h6>
            <h4>128</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <h6>Total Penjualan</h6>
            <h4>Rp 4.200.000</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <h6>Stok Produk</h6>
            <h4>43</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <h6>Pesanan Berjalan</h6>
            <h4>12</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Sales Chart -->
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title">Grafik Penjualan Mingguan</h5>
        <canvas id="salesChart" height="120"></canvas>
      </div>
    </div>
  </div>

  <style>
    @import "../../../../../public/admin/css/main.css";
  </style>