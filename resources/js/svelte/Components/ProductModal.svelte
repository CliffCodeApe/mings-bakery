<script>
    export let title = "Product Title";
    export let price = "Rp 0";
    export let imgSrc = "";
    export let description = "Product description goes here...";
    export let qty = 1;

    function changeQty(amount) {
      qty = Math.max(1, qty + amount); // Ensure quantity is at least 1
    }

    function addToCart() {
      alert(`${qty} x ${title} added to cart!`);
    }
</script>

<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="productDetailLabel">{title}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <img id="modalImage" src={imgSrc} class="img-fluid rounded shadow" alt="Product Image" />
                    </div>
                    <div class="col-md-6">
                        <p class="mt-3" id="modalDescription">{description}</p>
                        <h4 id="modalPrice">{price}</h4>
                        <div class="d-flex align-items-center mb-3">
                        <button class="btn btn-outline-secondary" on:click={() => changeQty(-1)}>−</button>
                        <input type="text" id="qty" class="form-control mx-2 text-center" value={qty} style="width: 60px;" readonly />
                        <button class="btn btn-outline-secondary" on:click={() => changeQty(1)}>+</button>
                        </div>
                        <button class="btn btn-primary w-100 py-2" on:click={addToCart}>Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>