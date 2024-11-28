<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FragnanceAdmin | All Users</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/fevicon/favicon.png') ?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/css/Style.css'; ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Fonts CDN Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #333;
            transition: 0.3s;
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .main-content {
            margin-left: 250px;
            transition: 0.3s;
            padding: 20px;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        .nav-link {
            color: white;
            padding: 15px;
        }

        .nav-link:hover {
            background-color: var(--darkGray) !important;
            color: #fff;
        }

        .nav-link i {
            margin-right: 10px;
        }

        .nav-text {
            display: inline;
        }

        .collapsed .nav-text {
            display: none;
        }

        .btn-check:focus+.btn,
        .btn:focus {
            outline: 0;
            box-shadow: none !important;
        }

        .btn-link {
            font-size: 1.4rem !important;
        }


        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .main-content {
                margin-left: 70px;
            }

            .nav-text {
                display: none;
            }

            .sidebar.expanded {
                width: 250px;
            }

            .sidebar.expanded .nav-text {
                display: inline;
            }
        }
    </style>
</head>

<body>
    <?php $this->load->view('Include/AdminSidebar.php'); ?>

    <div class="main-content vh-100" id="main">


        <div class="container mt-5">
            <h2 class="text-center mb-4 fw-bold">Customer Management Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Registration Date</th>
                            <th>Order History</th>
                            <th>Last Activity Date</th>
                            <th>Account Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>C001</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>123-456-7890</td>
                            <td>2024-01-10</td>
                            <td>5 orders</td>
                            <td>2024-11-25</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>C002</td>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>987-654-3210</td>
                            <td>2024-02-15</td>
                            <td>3 orders</td>
                            <td>2024-11-20</td>
                            <td><span class="badge bg-warning text-dark">Suspended</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>C003</td>
                            <td>Alice Johnson</td>
                            <td>alice.j@example.com</td>
                            <td>555-666-7777</td>
                            <td>2024-03-20</td>
                            <td>8 orders</td>
                            <td>2024-11-27</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <script>
        document.getElementById('toggleBtn').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('main').classList.toggle('expanded');
        });

        // For mobile responsiveness
        if (window.innerWidth <= 768) {
            document.getElementById('sidebar').addEventListener('click', function () {
                this.classList.toggle('expanded');
            });
        }
    </script>

</body>

</html>