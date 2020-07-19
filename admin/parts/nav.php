<ul class="nav">
    <li class="<?php if($page == "home"){echo 'active'; }?>">
    <a href="/admin">
        <i class="tim-icons icon-chart-pie-36"></i>
        <p>Home</p>
    </a>
    </li >
    <li class=<?php if($page == "user") {echo "active "; }?>>
    <a href="/admin/users.php">
        <i class="tim-icons icon-single-02"></i>
        <p>Users</p>
    </a>
    </li >
    <li class=<?php if($page == "orders") {echo "active "; }?>>
    <a href="/admin/orders.php">
        <i class="tim-icons icon-bag-16"></i>
        <p>Orders</p>
    </a>
    </li >
    <li class=<?php if($page == "products") {echo "active "; }?>>
    <a href="/admin/products.php">
        <i class="tim-icons icon-app"></i>
        <p>Products</p>
    </a>
    </li >
    <li class=<?php if($page == "categories") {echo "active "; }?>>
    <a href="/admin/categories.php">
        <i class="tim-icons icon-bullet-list-67"></i>
        <p>Categories</p>
    </a>
    </li >
    <li class=<?php if($page == "logout") {echo "active "; }?>>
    <a href="http://voila.local/index.php">
        <i class="tim-icons icon-key-25"></i>
        <p>Log out</p>
    </a>
    </li>
</ul>