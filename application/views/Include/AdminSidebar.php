<div class="sidebar montserrat" id="sidebar">
    <div class="d-flex justify-content-end p-3">
        <button class="btn btn-link text-white" id="toggleBtn">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="nav flex-column">
        <a href="<?php echo base_url() . 'AdminHome'; ?>" class="nav-link">
            <i class="fa-solid fa-house"></i>
            <span class="nav-text">Dashboard</span>
        </a>
        <a href="<?php echo base_url() . 'AdminOrders'; ?>" class="nav-link">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="nav-text">Orders</span>
        </a>
        <a href="<?php echo base_url() . 'AdminUsers'; ?>" class="nav-link">
            <i class="fa-solid fa-users"></i>
            <span class="nav-text">Users</span>
        </a>
        <a href="<?php echo base_url() . 'AdminReports'; ?>" class="nav-link">
            <i class="fa-solid fa-chart-line"></i>
            <span class="nav-text">Reports</span>
        </a>
        <a href="<?php echo base_url() . 'AdminProducts'; ?>" class="nav-link">
            <i class="fa-solid fa-box"></i>
            <span class="nav-text">Products</span>
        </a>
        <a href="<?php echo base_url() . 'AdminSettings'; ?>" class="nav-link">
            <i class="fa-solid fa-gear"></i>
            <span class="nav-text">Settings</span>
        </a>
        <a href="<?php echo base_url() . 'Login'; ?>" class="nav-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="nav-text">Logout</span>
        </a>
    </div>
</div>