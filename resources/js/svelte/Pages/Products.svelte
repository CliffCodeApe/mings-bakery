<script>
    import ProductModal from "../Components/ProductModal.svelte";
    import Navbar from "../Components/Navbar.svelte";
    import Footer from "../Components/Footer.svelte";
    import ShoppingCartModal from "../Components/ShoppingCartModal.svelte";


    let cartItems = []; // Bound to App.svelte

    let selectedProduct = {
      title: "",
      price: "",
      imgSrc: "",
      description: "",
    };

    // Function to add products to the cart
    function addToCart(product, quantity = 1) {
        console.log("Adding to cart:", product, quantity);
        const existingItem = cartItems.find((item) => item.title === product.title);
        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            cartItems = [...cartItems, { ...product, quantity }]; // Update reactively
        }
        alert(`${quantity} x ${product.title} added to cart!`);
    }

    // Function to open the product modal
    function openProductModal(product) {
      selectedProduct = product;
      const modal = new bootstrap.Modal(document.getElementById("productDetailModal"));
      modal.show();
    }

    const products = [
      {
        title: "American Cheese Roll",
        price: 25500,
        imgSrc: "/asset/img/img1.jpeg",
        description: "Soft bread filled with American cheese. Perfect for any time of day.",
      },
      {
        title: "Cheese Cake Roll",
        price: 75000,
        imgSrc: "/asset/img/img2.jpg",
        description: "A Cheese Cake Roll ready to lighten the party.",
      },
      {
        title: "Roti Tawar",
        price: 20000,
        imgSrc: "/asset/img/img2.jpg",
        description: "Classic bread for your daily needs.",
      },
    ];
  </script>


<Navbar />

  <div class="container mt-5">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3">
        <div class="card primary p-3">
          <h5 class="mb-4">What We Serve</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text">All Products</a></li>
            <li><a href="#" class="text-decoration-none text">Breads</a></li>
            <li><a href="#" class="text-decoration-none text">Traditional Snacks</a></li>
            <li><a href="#" class="text-decoration-none text">Cakes</a></li>
          </ul>
        </div>
      </div>

      <!-- Product List -->
      <div class="col-md-9">
        <div class="mb-4 d-flex justify-content-between align-items-center">
          <h4 class="mb-0">Our Products</h4>
          <input type="text" id="searchInput" class="form-control w-50" placeholder="Search products..." />
        </div>
        <div class="row">
          {#each products as product}
            <div class="col-md-4 mb-4">
              <div class="card border-0 shadow">
                <button
                  class="p-0 border-0 bg-transparent"
                  style="cursor: pointer;"
                  on:click={() => openProductModal(product)}
                >
                  <img src={product.imgSrc} class="card-img-top" alt={product.title} />
                </button>
                <div class="card-body text-center">
                  <h5 class="card-title mb-1">{product.title}</h5>
                  <p class="text-muted small mb-0">Rp {product.price}</p>
                  <button class="btn btn-primary mt-2" on:click={() => addToCart(product)}>Add to Cart</button>
                </div>
              </div>
            </div>
          {/each}
        </div>
      </div>
    </div>
  </div>

<Footer />
<ShoppingCartModal cartItems={cartItems} />


<ProductModal
    title={selectedProduct.title}
    price={`Rp ${selectedProduct.price}`}
    imgSrc={selectedProduct.imgSrc}
    description={selectedProduct.description}
/>