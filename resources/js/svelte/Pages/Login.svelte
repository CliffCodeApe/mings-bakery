<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row primary rounded shadow" style="max-width: 1200px;">
        <div class="col-md-6 p-4">
            <a href="/" class="nav-link">
                <h1 class="text-center" id="logo">Ming's Bakery</h1>
            </a>
            <h2 class="text-center">Login</h2>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn secondary w-100">Sign In</button>
            </form>
            <p class="text-center mt-3">
                <a href="/auth/register">Or Create an account</a>
            </p>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center p-0">
            <img src="../../../asset/img/bg.png" alt="Ming's Bakery" class="img-fluid rounded-end">
        </div>
    </div>
</div>

<style>
    @import "../../../../public/css/main.css";
</style>