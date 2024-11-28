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
        <div class="container-fluid p-4 ">
            <h1 class="display-5 mb-3 fs-1 text-purple fw-bold">All Products</h1>

            <div class="container rounded-3 shadow">
                <div class="row">
                    <div class="container">
                        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
                            data-bs-target="#addProductModal">
                            Add Product
                        </button>

                        <table class="table table-bordered text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Product 1</td>
                                    <td>100</td>
                                    <td>Description 1</td>
                                    <td><img src="<?php echo base_url() . 'uploads/product1.jpg' ?>" alt="Product 1"
                                            style="width: 100px; height: 100px;"></td>
                                    <td><a href="#" class="btn btn-primary">Edit</a> <a href="#"
                                            class="btn btn-danger">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Product 2</td>
                                    <td>200</td>
                                    <td>Description 2</td>
                                    <td><img src="<?php echo base_url() . 'uploads/product2.jpg' ?>" alt="Product 2"
                                            style="width: 100px; height: 100px;"></td>
                                    <td><a href="#" class="btn btn-primary">Edit</a> <a href="#"
                                            class="btn btn-danger">Delete</a></td>
                                </tr>
                            </thead>
                        </table>
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
                    <form id="productForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Product Name -->
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" id="productName" class="form-control" required>
                                    <div class="error" id="productNameError"></div>
                                </div>

                                <!-- Price -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="mrp" class="form-label">MRP</label>
                                        <input type="number" id="mrp" class="form-control" required>
                                        <div class="error" id="mrpError"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" id="price" class="form-control" required>
                                        <div class="error" id="priceError"></div>
                                    </div>

                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" class="form-control" rows="4" required></textarea>
                                    <div class="error" id="descriptionError"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- What Makes Great -->
                                <div class="mb-3">
                                    <label class="form-label">What Makes Great</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="Long lasting Eau De Parfum" id="feature1" name="greatFeatures[]">
                                        <label class="form-check-label" for="feature1">Long lasting Eau De
                                            Parfum</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="Classic blend of Lavender, Basil & Vetiver" id="feature2"
                                            name="greatFeatures[]">
                                        <label class="form-check-label" for="feature2">Classic blend of Lavender, Basil
                                            & Vetiver</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="Elegant, sophisticated & luxurious fragrance" id="feature3"
                                            name="greatFeatures[]">
                                        <label class="form-check-label" for="feature3">Elegant, sophisticated &
                                            luxurious fragrance</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="Travel friendly & ideal for gifting purpose" id="feature4"
                                            name="greatFeatures[]">
                                        <label class="form-check-label" for="feature4">Travel friendly & ideal for
                                            gifting purpose</label>
                                    </div>
                                    <div class="error" id="greatFeaturesError"></div>
                                </div>

                                <!-- Category of Product -->
                                <div class="mb-3">
                                    <label class="form-label">Category of Product</label>
                                    <select id="category" class="form-select" required>
                                        <option value="">Choose a category</option>
                                        <option value="Luxury">Luxury</option>
                                        <option value="Natural">Natural</option>
                                        <option value="Science">Science</option>
                                        <option value="Wellness">Wellness</option>
                                    </select>
                                    <div class="error" id="categoryError"></div>
                                </div>

                                <!-- Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" id="image" class="form-control" required>
                                    <div class="error" id="imageError"></div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save the Product</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>




    <script>
        // Form Validation
        document.getElementById('productForm').addEventListener('submit', function (event) {
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