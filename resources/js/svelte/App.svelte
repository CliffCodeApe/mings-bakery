<script>
    import { Router, Route } from "svelte-routing";

    // Pages
    const Register = () => import("./Pages/Register.svelte");
    const Login = () => import("./Pages/Login.svelte");

    const Home = () => import("./Pages/Home.svelte");
    const Products = () => import("./Pages/Products.svelte");
    const About = () => import("./Pages/About.svelte");

    const Dashboard = () => import("./Pages/Admin/Dashboard.svelte");
    const ProductManagement = () => import("./Pages/Admin/ProductManagement.svelte");
    const ProductOrders = () => import("./Pages/Admin/ProductOrders.svelte");
  </script>


<Router>
    <Route path="/auth/register" component={Register} />
    <Route path="/auth/login" component={Login} />

    <Route path="/" component={Home} />
    <Route path="/products" component={Products} />
    <Route path="/about" component={About} />

    <Route path="/dashboard" component={Dashboard} />
    <Route path="/dashboard/product-management" component={ProductManagement} />
    <Route path="/dashboard/product-orders" component={ProductOrders} />


</Router>