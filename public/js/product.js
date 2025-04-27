function changeQty(amount) {
    const qtyInput = document.getElementById("qty");
    let qty = parseInt(qtyInput.value) + amount;
    if (qty < 1) qty = 1;
    qtyInput.value = qty;
  }

  function openProductModal(title, price, imgSrc, description) {
    document.getElementById('productDetailLabel').innerText = title;
    document.getElementById('modalPrice').innerText = price;
    document.getElementById('modalImage').src = imgSrc;
    document.getElementById('modalDescription').innerText = description;
    document.getElementById('qty').value = 1;

    const modal = new bootstrap.Modal(document.getElementById('productDetailModal'));
    modal.show();
  }

// Search
document.getElementById('searchInput').addEventListener('input', function () {
    const keyword = this.value.toLowerCase();
    const cards = document.querySelectorAll('#productList .col-md-4');

    cards.forEach(card => {
        const title = card.querySelector('.card-title').textContent.toLowerCase();
        if (title.includes(keyword)) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
});