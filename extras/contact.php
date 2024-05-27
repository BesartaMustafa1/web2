<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TL - Bookstore</title>
    <link rel="stylesheet" href="home2.css">
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    /* Custom styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .address-container {
        padding-top: 100px;
    }
    .address-heading {
        color: #333;
        font-size: 28px;
        text-align: center;
        margin-bottom: 40px;
    }
    .violetline-address {
        height: 2px;
        width: 70px;
        background-color: #6e3667;
        margin: 20px auto;
    }
    .address-info {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 120px;
        border: 2px solid #6e3667;
        padding: 20px;
        border-radius: 10px;
        background-color: #f3f4f6;
    }
    .address-info p {
        margin: 5px 0;
        color: #555;
    }
    .map-container {
        text-align: center;
        margin-top: 20px;
    }
    .map-container iframe {
        border: none;
        width: 100%;
        max-width: 600px;
        height: 400px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
        margin-top: 50px;
        background-color:lightblue;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    .btn-custom:hover {
      padding-top: 10px;
        background-color: bisque;
    }
</style>
<body>
    <!-- Header -->
    <?php include '../header/header.php'; ?>

    <!-- Main content -->
    <div class="container address-container">
        <h2 class="address-heading">Visit Us</h2>
        <div class="violetline-address"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="address-info">
                    <p><i class="fas fa-map-marker-alt"></i> Bregu i Diellit, p.n. 10000 Prishtinë</p>
                    <p><i class="fas fa-envelope"></i> fiek@uni-pr.edu</p>
                    <p><i class="fas fa-phone"></i> +383 (0)38 554 896</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1467.296425333013!2d21.165863238795012!3d42.64879069279192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ec1b6ecb2c1%3A0x7f0893730efce187!2sFakulteti%20Teknik!5e0!3m2!1sen!2s!4v1704029283729!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="#" class="btn-custom">Explore Books</a>
        </div>
    </div>

    <!-- Footer -->
    <iframe src="../footer/footer.php" width=100% height="450vh"></iframe>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
</body>
</html>
