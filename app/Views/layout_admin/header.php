<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?> | Admin Dashboard</title>
    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Apply Poppins font globally */
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar styles */
        .navbar {
            background-color: #343a40;
        }

        .navbar .navbar-brand {
            color: #fff;
            font-size: 1.8rem;
        }

        .navbar .navbar-nav .nav-link {
            color: #fff;
            font-size: 1.1rem;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: #ffc107;
        }

        /* Sidebar styles */
        .sidebar {
            background-color: #343a40;
            height: 100vh;
            padding-top: 20px;
            width: 220px;
            /* Reduced width */
            position: fixed;
            /* Keeps the sidebar fixed on the left */
        }

        .sidebar a {
            color: #fff;
            padding: 10px 15px;
            /* Reduced padding */
            font-size: 16px;
            text-decoration: none;
            display: block;
            border-radius: 4px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        /* Main content */
        .main-content {
            margin-left: 220px;
            /* Adjust for sidebar width */
            padding: 30px;
        }

        /* Card box styles */
        .card-box {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin: 15px 0;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }

        .card-box i {
            font-size: 40px;
        }

        .bg-blue {
            background-color: #007bff;
        }

        .bg-green {
            background-color: #28a745;
        }

        .bg-yellow {
            background-color: #ffc107;
        }

        .bg-red {
            background-color: #dc3545;
        }

        /* Make the sidebar and content responsive */
        @media (max-width: 767px) {
            .sidebar {
                width: 100%;
                /* Full width on small screens */
                position: relative;
            }

            .main-content {
                margin-left: 0;
                /* Adjust main content */
            }
        }
    </style>
</head>

<body>
    <?= $this->include('layout_admin/sidebar'); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('layout_admin/footer'); ?>
</body>