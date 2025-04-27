<script>
    import Navbar from "../Components/Navbar.svelte";
    import Footer from "../Components/Footer.svelte";
    import ShoppingCartModal from "../Components/ShoppingCartModal.svelte";

    let cartItems = []
</script>

<Navbar />

<div class="container mt-5">
    <h1 class="text-center" id="logo">Ming's Bakery</h1>

    <!-- Image Section -->
    <div class="row justify-content-center mt-4">
      <div class="col-md-8">
        <img src="/asset/img/aboutBG.jpg" alt="Ming's Bakery" class="img-fluid rounded" />
      </div>
    </div>

    <!-- About Us Text -->
    <div class="row primary rounded shadow mt-4">
      <div class="col-12 p-4">
        <h2 class="text-center">About Us</h2>
        <p class="mt-4 text-center">
          Since 1966, Ming's Bakery has been a cherished part of the community, crafting timeless desserts and baked goods that bring joy to every occasion. What began as a small neighborhood bakery has grown into a beloved destination for those seeking the perfect blend of tradition and innovation. From our signature cakes to our artisanal breads, every bite tells a story of passion, quality, and dedication. Join us as we continue our journey, one sweet creation at a time.
        </p>
      </div>
    </div>
  </div>

  <Footer />
<ShoppingCartModal cartItems={cartItems} />
