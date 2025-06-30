<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIU PAUS</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: rgb(12, 120, 242);
            --accent-green: #2ecc71;
            --accent-orange: #f39c12;
            --dark-text: #2c3e50;
            --light-bg: #ecf0f1;
            --white: #ffffff;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--white);
            color: var(--dark-text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .top-bar {
            background: var(--primary-color);
            color: var(--white);
            padding: 8px 20px;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
        }

        .top-bar .left,
        .top-bar .right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* Pastikan logo dan elemen navbar terpusat */
            padding: 10px 20px;
            /* Padding lebih kecil */
            background: var(--white);
            border-bottom: 1px solid #ddd;
        }

        .logo img {
            max-width: 150px;
            max-height: 50px;
            height: auto;
        }



        header nav {
            font-size: 14px;
            /* Menyesuaikan ukuran font */
            display: flex;
            gap: 15px;
        }

        header nav a {
            font-weight: 600;
            color: var(--dark-text);
        }

        header nav a.active {
            color: var(--accent-green);
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 75vh;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border: 0;
        }

        .circle-icons {
            display: flex;
            justify-content: center;
            gap: 40px;
            padding: 50px 20px 30px;
            flex-wrap: wrap;
        }

        .circle-icons div {
            text-align: center;
        }

        .circle-icons img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .circle-icons img:hover {
            transform: scale(1.1);
        }

        .section-title {
            text-align: center;
            font-size: 30px;
            font-weight: 700;
            padding: 30px 20px;
            color: var(--primary-color);
        }


        .card {
            width: 100%;
            /* Gunakan penuh dari col-md-6 */
            max-width: 100%;
            background: var(--white);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
            height: 100%;
            /* Supaya semua kartu setara tinggi */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }


        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            margin: 0 0 10px;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 20px;
            border: 1px solid var(--dark-text);
            font-size: 14px;
            color: var(--dark-text);
            text-transform: uppercase;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn.black {
            background-color: var(--accent-orange);
            color: var(--white);
            border: none;
        }

        .btn:hover {
            background-color: var(--accent-green);
            color: var(--white);
        }

        .center-btn {
            text-align: center;
            margin: 20px 0 50px;
        }

        footer {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 50px 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        footer .column {
            flex: 1;
            min-width: 200px;
            margin-bottom: 30px;
        }

        footer h3 {
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            padding-bottom: 10px;
        }

        footer a {
            color: var(--white);
            display: block;
            margin: 5px 0;
        }

        footer {
            background-color: var(--primary-color);
            /* Warna dasar footer */
            color: var(--white);
            padding: 50px 30px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            flex-wrap: wrap;
        }

        .footer-column {
            flex: 1;
            min-width: 250px;
            margin-bottom: 30px;
        }

        .footer-logo {
            max-width: 120px;
            /* Ukuran logo di footer */
            height: auto;
            margin-bottom: 20px;
        }

        footer h3 {
            border-bottom: 2px solid var(--white);
            padding-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        footer a {
            color: var(--white);
            display: block;
            margin: 5px 0;
            text-decoration: none;
        }

        footer a:hover {
            color: var(--accent-green);
            text-decoration: underline;
        }

        .social-icons a {
            color: var(--white);
            margin-right: 15px;
            font-size: 20px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: var(--accent-green);
        }

        /* custom card */
        .custom-card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            padding: 0 15px;
        }

        .custom-card {
            width: 250px;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .custom-card:hover {
            transform: translateY(-5px);
        }

        .custom-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .custom-card .card-body {
            padding: 15px;
            text-align: center;
        }

        .custom-card .card-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .custom-card .card-text {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 15px;
        }

        .custom-card .btn {
            margin-top: auto;
            align-self: center;
            padding: 8px 16px;
        }
    </style>
</head>

<body>
    <?= $this->include('layout_user/navbar'); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('layout_user/footer'); ?>
</body>