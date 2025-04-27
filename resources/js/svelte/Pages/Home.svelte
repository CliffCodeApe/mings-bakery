<script>
    import Navbar from "../Components/Navbar.svelte";
    import Footer from "../Components/Footer.svelte";
    import ShoppingCartModal from "../Components/ShoppingCartModal.svelte";

    let cartItems = [];
</script>

<Navbar />
<!-- Hero Section -->
  <div class="container-fluid p-0 position-relative">
    <img src="/asset/img/homeBG.jpg" alt="Ming's Bakery" class="img-fluid w-100" />
    <div
      class="position-absolute top-50 start-50 translate-middle text-center accent rounded"
    >
      <h1 class="text-white display-4">
        Ring in Spring With Our Limited-Time Treats!
      </h1>
      <p class="text-white mt-3">
        Now available for the start of the new season! Order in advance for pick
        up or stop by any of our bakeries.
      </p>
    </div>
  </div>

  <!-- Promo Carousel -->
  <div
    id="promoCarousel"
    class="carousel slide my-5 container"
    data-bs-ride="carousel"
  >
    <div
      class="carousel-inner rounded shadow"
      style="max-height: 300px; overflow: hidden"
    >
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <img
          src="/asset/img/img1.jpeg"
          class="d-block w-100 object-fit-cover"
          alt="Promo 1"
          style="height: 300px"
        />
        <div
          class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded"
        >
          <h5 class="text-white">Buy 1 Get 1 Free</h5>
          <p>Every Friday on selected pastries!</p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <img
          src="/asset/img/img2.jpg"
          class="d-block w-100 object-fit-cover"
          alt="Promo 2"
          style="height: 300px"
        />
        <div
          class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded"
        >
          <h5 class="text-white">Spring Specials</h5>
          <p>Try our new matcha & cherry blossom cake rolls.</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <img
          src="/asset/img/img3.jpeg"
          class="d-block w-100 object-fit-cover"
          alt="Promo 3"
          style="height: 300px"
        />
        <div
          class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded"
        >
          <h5 class="text-white">Loyalty Program</h5>
          <p>Earn points every time you order in-store or online!</p>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#promoCarousel"
      data-bs-slide="prev"
    >
      <span
        class="carousel-control-prev-icon bg-dark rounded-circle p-2"
        aria-hidden="true"
      ></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#promoCarousel"
      data-bs-slide="next"
    >
      <span
        class="carousel-control-next-icon bg-dark rounded-circle p-2"
        aria-hidden="true"
      ></span>
      <span class="visually-hidden">Next</span>
    </button>

    <!-- Indicators -->
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#promoCarousel"
        data-bs-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"
      ></button>
      <button
        type="button"
        data-bs-target="#promoCarousel"
        data-bs-slide-to="1"
        aria-label="Slide 2"
      ></button>
      <button
        type="button"
        data-bs-target="#promoCarousel"
        data-bs-slide-to="2"
        aria-label="Slide 3"
      ></button>
    </div>
  </div>

<Footer />
<ShoppingCartModal cartItems={cartItems} />
