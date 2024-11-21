<div class="sidebar montserrat" id="sidebar">
        <div class="d-flex justify-content-end p-3">
            <button class="btn btn-link text-white" id="toggleBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="nav flex-column">
            <a href="<?php echo base_url() . 'Admin/AdminHome'; ?>" class="nav-link">
                <i class="fas fa-home"></i>
                <span class="nav-text">Dashboard</span>
            </a>
            <a href="<?php echo base_url() . 'Admin/Requests'; ?>" class="nav-link">
                <i class="fas fa-users"></i>
                <span class="nav-text">Requests</span>
            </a>
            <a href="<?php echo base_url() . 'Admin/AdminProfile'; ?>" class="nav-link">
                <i class="fa-solid fa-user"></i>
                <span class="nav-text">Profile</span>
            </a>
            <a href="<?php echo base_url() . 'Landing/index'; ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-text">Logout</span>
            </a>
        </div>
    </div>