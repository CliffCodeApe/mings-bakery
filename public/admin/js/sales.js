const ctx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
    datasets: [{
      label: 'Penjualan (Rp)',
      data: [500000, 700000, 300000, 900000, 600000, 400000, 800000],
      backgroundColor: 'rgba(182, 141, 64, 0.2)',
      borderColor: '#B68D40',
      borderWidth: 2,
      tension: 0.4,
      fill: true,
      pointBackgroundColor: '#B68D40'
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});