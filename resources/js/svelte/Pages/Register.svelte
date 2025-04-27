<div class="container mt-5">
    <div class="row primary">
        <div class="col-md-6">
            <a href="/" class="nav-link">
                <h1 class="text-center" id="logo">Ming's Bakery</h1>
            </a>
            <h2 class="text-center">Register</h2>
            <form>
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input name="firstName" type="text" class="form-control" id="firstName" required>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input name="lastName" type="text" class="form-control" id="lastName" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input name="phone" type="tel" class="form-control" id="phone" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" required>
                </div>
                <button type="submit" class="btn secondary w-100">Register</button>
            </form>
            <p class="text-center mt-3">If you already have an account, <a href="/auth/login">log in here</a>.</p>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="../../../../asset/img/bg.png" alt="Ming's Bakery" class="img-fluid">
        </div>
    </div>
</div>

<style>
    @import "../../../../public/css/main.css";
</style>