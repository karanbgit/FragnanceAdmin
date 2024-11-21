<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragnance | Admin Dashboard</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <style>
        .montserrat {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

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

        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
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

    <div class="main-content vh-100 montserrat" id="main">
        <div class="container-fluid p-4 ">
            <h1 class="display-5 mb-4 text-purple fw-bold">Welcome to Admin Dashboard</h1>

            <div class="container my-5 rounded-3 shadow-lg" style="background-color: var(--lightPurple);">
                <div class="row my-4">
                    <div class="col-12">
                        <h2 class="fw-bold text-center p-4 rounded-3 text-purple"
                            style="background-color: rgba(255,255,255,0.7);">
                            <i class="fas fa-chart-line me-2"></i>Statistics Overview
                        </h2>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center pb-5 px-4">
                    <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mb-4">
                        <div class="card shadow  d-flex justify-content-center align-items-center p-4"
                            style="width: 250px; height: 220px; border: none; background-color: var(--lightGray); transition: all 0.3s ease;">
                            <div class="circle-icon mb-3 d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 80px; height: 80px; background-color: var(--lightPurple);">
                                <i class="fas fa-user-tie fa-2x" style="color: var(--purple);"></i>
                            </div>
                            <h4 class="text-center fw-bold text-purple">Total Vendors</h4>
                            <p id="totalTailor" class="fs-2 text-center mb-0 fw-bold" style="color: var(--purple);">50
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mb-4">
                        <div class="card shadow  d-flex justify-content-center align-items-center p-4"
                            style="width: 250px; height: 220px; border: none; background-color: var(--lightGray); transition: all 0.3s ease;">
                            <div class="circle-icon mb-3 d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 80px; height: 80px; background-color: var(--lightPurple);">
                                <i class="fas fa-users fa-2x" style="color: var(--purple);"></i>
                            </div>
                            <h4 class="text-center fw-bold text-purple">Total Users</h4>
                            <p id="totalUser" class="fs-2 text-center mb-0 fw-bold" style="color: var(--purple);">40</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mb-4">
                        <div class="card shadow  d-flex justify-content-center align-items-center p-4"
                            style="width: 250px; height: 220px; border: none; background-color: var(--lightGray); transition: all 0.3s ease;">
                            <div class="circle-icon mb-3 d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 80px; height: 80px; ">
                                <i class="fas fa-clock fa-2x" "></i>
                            </div>
                            <h4 class=" text-center fw-bold text-purple">Pending Requests</h4>
                                    <p id="requestPending" class="fs-2 text-center mb-0 fw-bold" s">10</p>
                            </div>
                        </div>

                    </div>
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