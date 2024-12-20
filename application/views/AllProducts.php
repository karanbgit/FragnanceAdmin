<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FragnanceAdmin | All Products</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/fevicon/favicon.png') ?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/css/Style.css'; ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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

        .table-container {
            overflow-x: auto;
        }

        .table-container thead th {
            position: sticky;
            top: 0;
            background-color: #212529;
            z-index: 1;
        }

        /* Fixed column widths */
        .table th:nth-child(1) {
            /* Sr. No */
            width: 80px;
            min-width: 80px;
        }

        .table th:nth-child(2) {
            /* Name */
            width: 200px;
            min-width: 200px;
        }

        .table th:nth-child(3),
        /* Price */
        .table th:nth-child(4) {
            /* MRP */
            width: 100px;
            min-width: 100px;
        }

        .table th:nth-child(5) {
            /* Description */
            width: 300px;
            min-width: 300px;
        }

        .table th:nth-child(6) {
            /* What Makes Great */
            width: 300px;
            min-width: 300px;
        }

        .table th:nth-child(7),
        /* Category */
        .table th:nth-child(8) {
            /* Sub Category */
            width: 120px;
            min-width: 120px;
        }

        .table th:nth-child(9) {
            /* Image */
            width: 150px;
            min-width: 150px;
        }

        .table th:nth-child(10) {
            /* Actions */
            width: 180px;
            min-width: 180px;
        }

        /* Table cell styles */
        .table td {
            white-space: normal;
            word-wrap: break-word;
            vertical-align: middle;
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

        /* Pagination styles */
        .pagination {
            margin-top: 20px;
            justify-content: center;
        }

        .pagination .page-item .page-link {
            color: #333;
            border: 1px solid #ddd;
            padding: 8px 16px;
        }

        .pagination .page-item.active .page-link {
            background-color: #333;
            border-color: #333;
            color: white;
        }

        .pagination .page-item .page-link:hover {
            background-color: #f8f9fa;
        }
    </style>

    <style>
        .error {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <?php $this->load->view('Include/AdminSidebar.php'); ?>

    <div class="main-content vh-100" id="main">
        <div class="container-fluid p-2 ">
            <h1 class="display-5 mb-3 fs-1 text-purple fw-bold">All Products</h1>

            <div class="container rounded-3 shadow">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="mt-2" for="recordsPerPage">Records per page:</label>
                                <select id="recordsPerPage" class="form-control mt-3" onchange="updateRecordsPerPage()">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" id="search" class="form-control m-2 mt-5" oninput="filterRecords()"
                                    placeholder="Search by name, price, mrp, category or sub category">
                            </div>
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-primary m-2 mt-5" data-bs-toggle="modal"
                                    data-bs-target="#addProductModal">
                                    Add Product
                                </button>
                            </div>

                        </div>

                        <div class="table-container">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>MRP</th>
                                        <th>Description</th>
                                        <th>What Makes Great(WMG)</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <?php
                                $items_per_page = 10;
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $start_index = ($current_page - 1) * $items_per_page;

                                // Get total number of items
                                $total_items = count($li);
                                $total_pages = ceil($total_items / $items_per_page);

                                // Get items for current page
                                $page_items = array_slice($li, $start_index, $items_per_page);

                                $count = $start_index;
                                foreach ($page_items as $data): ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo ++$count ?></td>
                                            <td><?php echo $data['Name'] ?></td>
                                            <td><?php echo '₹' . $data['Price'] ?></td>
                                            <td><?php echo '₹' . $data['MRP'] ?></td>
                                            <td><?php echo $data['Description'] ?></td>
                                            <td>
                                                <ol type="i"><?php foreach ($data['WhatMakesGreat'] as $feature): ?>

                                                        <li><?php echo $feature ?></li>

                                                    <?php endforeach; ?>
                                                </ol>
                                            </td>
                                            <td><?php echo $data['Category'] ?></td>
                                            <td><?php echo $data['SubCategory'] ?></td>
                                            <td><img class="image-fluid"
                                                    src="<?php echo base_url() . 'uploads/' . $data['Image'] ?>" alt="Image"
                                                    style="width: 100px; height: 100px;"></td>
                                            <td>
                                                <a href="<?php echo base_url() . 'AdminController/UpdateById/' ?><?php echo $data['id'] ?>"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="<?php echo base_url() . 'AdminController/DeleteById/' ?><?php echo $data['id'] ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>

                            <!-- Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php if ($current_page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $current_page - 1 ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <li class="page-item <?php echo ($i == $current_page) ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <?php if ($current_page < $total_pages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $current_page + 1 ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Product Form -->
                    <form action="<?php echo base_url() . 'AdminController/AddProduct/' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Product Name -->
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name : </label>
                                    <input type="text" id="productName" name="Name" class="form-control" required>
                                    <div class="error" id="productNameError"></div>
                                </div>

                                <!-- Price -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="mrp" class="form-label">MRP : </label>
                                        <input type="number" id="mrp" name="MRP" class="form-control" required>
                                        <div class="error" id="mrpError"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="price" class="form-label">Price : </label>
                                        <input type="number" id="price" name="Price" class="form-control" required>
                                        <div class="error" id="priceError"></div>
                                    </div>

                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description : </label>
                                    <textarea id="description" name="Description" class="form-control" rows="4"
                                        required></textarea>
                                    <div class="error" id="descriptionError"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- What Makes Great -->
                                <div class="mb-3">
                                    <label class="form-label">What Makes Great : </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="Long lasting Eau De Parfum" name="WhatMakesGreat[]" id="feature1">
                                        <label class="form-check-label" for="feature1">Long lasting Eau De
                                            Parfum</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="Classic blend of Lavender, Basil & Vetiver" name="WhatMakesGreat[]"
                                            id="feature2">
                                        <label class="form-check-label" for="feature2">Classic blend of Lavender, Basil
                                            & Vetiver</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="Elegant, sophisticated & luxurious fragrance" name="WhatMakesGreat[]"
                                            id="feature3">
                                        <label class="form-check-label" for="feature3">Elegant, sophisticated &
                                            luxurious fragrance</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="Travel friendly & ideal for gifting purpose" name="WhatMakesGreat[]"
                                            id="feature4">
                                        <label class="form-check-label" for="feature4">Travel friendly & ideal for
                                            gifting purpose</label>
                                    </div>
                                    <div class="error" id="greatFeaturesError"></div>
                                </div>

                                <!-- Category of Product -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Category of Product : </label>
                                        <select id="category" name="category" class="form-select" required>
                                            <option value="">Choose a category</option>
                                            <option value="Luxury">Luxury</option>
                                            <option value="Natural">Natural</option>
                                            <option value="Science">Science</option>
                                            <option value="Wellness">Wellness</option>
                                        </select>
                                        <div class="error" id="categoryError"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Sub Category : </label>
                                        <select id="subcategory" name="subcategory" class="form-select" required>
                                            <option value="">Choose a sub category</option>
                                            <option value="Men">Men's</option>
                                            <option value="Women">Women's</option>
                                            <option value="both">Both</option>
                                        </select>
                                        <div class="error" id="subcategoryError"></div>
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image : </label>
                                    <input type="file" name="Image" id="image" class="form-control" required>
                                    <div class="error" id="imageError"></div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save the Product</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>

    <script>
        function filterRecords() {
            const searchValue = document.getElementById('search').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const price = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const mrp = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const category = row.querySelector('td:nth-child(7)').textContent.toLowerCase();
                const subCategory = row.querySelector('td:nth-child(8)').textContent.toLowerCase();

                if (name.includes(searchValue) ||
                    price.includes(searchValue) ||
                    mrp.includes(searchValue) ||
                    category.includes(searchValue) ||
                    subCategory.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>

    <script>
        // Form Validation
        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let isValid = true;

            // Validate Product Name
            const productName = document.getElementById('productName');
            const productNameError = document.getElementById('productNameError');
            if (!productName.value.trim()) {
                productNameError.textContent = "Product Name is required.";
                isValid = false;
            } else {
                productNameError.textContent = "";
            }

            // Validate Price
            const price = document.getElementById('price');
            const priceError = document.getElementById('priceError');
            if (!price.value || price.value <= 0) {
                priceError.textContent = "Price must be a positive number.";
                isValid = false;
            } else {
                priceError.textContent = "";
            }

            // Validate MRP
            const mrp = document.getElementById('mrp');
            const mrpError = document.getElementById('mrpError');
            if (!mrp.value || mrp.value <= 0) {
                mrpError.textContent = "MRP must be a positive number.";
                isValid = false;
            } else {
                mrpError.textContent = "";
            }

            // Validate Description
            const description = document.getElementById('description');
            const descriptionError = document.getElementById('descriptionError');
            if (!description.value.trim()) {
                descriptionError.textContent = "Description is required.";
                isValid = false;
            } else {
                descriptionError.textContent = "";
            }

            // Validate What Makes Great
            const greatFeatures = document.getElementById('greatFeatures');
            const greatFeaturesError = document.getElementById('greatFeaturesError');
            if (!greatFeatures.value) {
                greatFeaturesError.textContent = "Please select a feature.";
                isValid = false;
            } else {
                greatFeaturesError.textContent = "";
            }

            // Validate Category
            const category = document.getElementById('category');
            const categoryError = document.getElementById('categoryError');
            if (!category.value) {
                categoryError.textContent = "Please select a category.";
                isValid = false;
            } else {
                categoryError.textContent = "";
            }

            // Validate Image
            const image = document.getElementById('image');
            const imageError = document.getElementById('imageError');
            if (!image.files.length) {
                imageError.textContent = "Please upload an image.";
                isValid = false;
            } else {
                imageError.textContent = "";
            }

            if (isValid) {
                alert('Form submitted successfully!');
            }
        });
    </script>

    <script>
        document.getElementById('toggleBtn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('main').classList.toggle('expanded');
        });

        // For mobile responsiveness
        if (window.innerWidth <= 768) {
            document.getElementById('sidebar').addEventListener('click', function() {
                this.classList.toggle('expanded');
            });
        }
    </script>

</body>

</html>