<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/fevicon/favicon.png') ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragnance | Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            width: 100vw;
            height: 100vh;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('<?php echo base_url('assets/images/loginbg.jpg') ?>');
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 400px;
            height: 500px;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.8);

            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;

            border-radius: 20px;
            border: 3px solid rgba(255, 255, 255, 0.5);
        }

        h2 {
            color: #ffff;
            font-size: 2em;
            text-transform: uppercase;
            padding: 15px 0;
        }

        .form-group {
            position: relative;
            width: 330px;
            margin: 30px 0;
            border-bottom: 3px solid #ffff;
        }

        .form-group input {
            width: 100%;
            height: 50px;
            padding: 0 35px 0 10px;
            font-size: 1.2em;
            background-color: transparent;
            border: none;
            outline: none;
            color: #fff;
        }

        .form-group label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 1.2em;
            color: #fff;
            transition: 0.5s;
        }

        input:focus~label,
        input:valid~label {
            top: -5px;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #ffff;
            font-size: 1.2em;
        }

        p {
            text-align: center;
            color: #fff;
            margin: 10px 0;
        }

        p>a {
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }

        p>a:hover {
            text-decoration: underline;
            font-style: italic;
        }

        #btn {
            width: 100%;
            height: 50px;
            border-radius: 40px;
            border: none;
            font-size: 1.5em;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px 0;
            cursor: pointer;
            transition: all 0.5s;
        }

        #btn:hover {
            background: rgba(0, 0, 0, 0.3);
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Admin Login</h2>

        <form action="<?php echo base_url('AdminController/Loginpost') ?>" method="post">

            <div class="form-group">
                <input type="email" name="email" required>
                <label for="">Email</label>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="form-group">
                <input type="password" name="password" required>
                <label for="">Password</label>
                <i class="fa-solid fa-lock"></i>
            </div>

            <p><a href="#">Forget Password</a></p>

            <button id="btn" type="submit" name="login" value="Login">Login</button>

        </form>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
        <script>
            alert("<?php echo $this->session->flashdata('error'); ?>");
        </script>
    <?php endif; ?>


</body>

</html>