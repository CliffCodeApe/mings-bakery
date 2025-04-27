<script>
    export let cartItems = []; // Array of items in the cart

    // Function to update the quantity of an item
    function updateQuantity(index, amount) {
      cartItems[index].quantity = Math.max(1, cartItems[index].quantity + amount);
    }

    // Function to remove an item from the cart
    function removeItem(index) {
      cartItems.splice(index, 1);
    }

    // Calculate the total price of the cart
    $: totalPrice = cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
  </script>

  <div class="modal fade" id="shoppingCartModal" tabindex="-1" aria-labelledby="shoppingCartLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="shoppingCartLabel">Shopping Cart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {#if cartItems.length > 0}
            <ul class="list-group">
              {#each cartItems as item, index}
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-1">{item.title}</h6>
                    <p class="mb-0 text-muted">Price: Rp {item.price}</p>
                  </div>
                  <div class="d-flex align-items-center">
                    <button class="btn btn-outline-secondary btn-sm" on:click={() => updateQuantity(index, -1)}>−</button>
                    <input
                      type="text"
                      class="form-control mx-2 text-center"
                      value={item.quantity}
                      style="width: 50px;"
                      readonly
                    />
                    <button class="btn btn-outline-secondary btn-sm" on:click={() => updateQuantity(index, 1)}>+</button>
                    <button class="btn btn-danger btn-sm ms-3" on:click={() => removeItem(index)}>Remove</button>
                  </div>
                </li>
              {/each}
            </ul>
            <div class="mt-4 text-end">
              <h5>Total: Rp {totalPrice}</h5>
              <button class="btn btn-primary">Checkout</button>
            </div>
          {:else}
            <p class="text-center">Your cart is empty.</p>
          {/if}
        </div>
      </div>
    </div>
  </div>