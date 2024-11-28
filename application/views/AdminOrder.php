<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400&display=swap" rel="stylesheet">
    <link href="assets/css/Orders.css" rel="stylesheet">

    <title>FragnanceAdmin | Orders</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/fevicon/favicon.png') ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/css/Style.css'; ?>">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .filter-btns {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
    </style>
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

    <!-- Orders Table -->
    <div class="main-content vh-100" id="main">
        <div class="container-fluid">
            <h2 class="text-center my-4 fw-bold">Orders</h2>

            <!-- Filter Buttons -->
            <div class="filter-btns">
                <button class="btn btn-primary me-2" onclick="filterTable('all')">All</button>
                <button class="btn btn-success me-2" onclick="filterTable('approved')">Approved</button>
                <button class="btn btn-warning me-2" onclick="filterTable('pending')">Pending</button>
                <button class="btn btn-secondary" onclick="filterTable('completed')">Completed</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Type of Service</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ordersTable">
                        <!-- Static Example Rows -->
                        <tr data-status="approved">
                            <td>John Doe</td>
                            <td>123-456-7890</td>
                            <td>2024-11-26</td>
                            <td>123 Main St</td>
                            <td>Delivery</td>
                            <td>Hello</td>
                            <td>
                                <button class="btn btn-secondary btn-sm"
                                    onclick="showCompleteModal(1)">Complete</button>
                                <button class="btn btn-danger btn-sm" onclick="showRejectModal(1)">Reject</button>
                            </td>
                        </tr>
                        <tr data-status="pending">
                            <td>Jane Smith</td>
                            <td>987-654-3210</td>
                            <td>2024-11-25</td>
                            <td>456 Oak St</td>
                            <td>Pickup</td>
                            <td>Hi there</td>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="showApproveModal(2)">Approve</button>
                                <button class="btn btn-danger btn-sm" onclick="showRejectModal(2)">Reject</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br>
        <!-- Include Footer -->

        <!-- Approve Modal -->
        <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="approveModalLabel">Approve Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to approve this order?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a id="approveBtn" class="btn btn-success">Approve</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Complete Modal -->
        <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="completeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="completeModalLabel">Complete Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to mark this order as complete?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a id="completeBtn" class="btn btn-secondary">Complete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reject Modal -->
        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModalLabel">Reject Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to reject this order?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a id="rejectBtn" class="btn btn-danger">Reject</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showApproveModal(orderId) {
            console.log('Approve order ID:', orderId);
        }

        function showCompleteModal(orderId) {
            console.log('Complete order ID:', orderId);
        }

        function showRejectModal(orderId) {
            console.log('Reject order ID:', orderId);
        }

        window.onload = function () {
            filterTable('all');
        };

        function filterTable(status) {
            const rows = document.querySelectorAll('#ordersTable tr');
            rows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                row.style.display = (status === 'all' || rowStatus === status) ? '' : 'none';
            });
        }
    </script>


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