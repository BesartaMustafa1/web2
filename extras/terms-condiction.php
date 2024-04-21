<?php 
include 'terms-condition.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>TL</title>
    <link rel="stylesheet" href="home2.css">
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/htmlincludejs"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .wrap {
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-sizing: border-box;
            height: 100vh;
            padding: 2rem;
            background-color: #eee;
        }

        .container {
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            padding: 1rem;
            background-color: #fff;
            width: 768px;
            height: 100%;
            border-radius: 0.25rem;
            box-shadow: 0rem 1rem 2rem -0.25rem rgba(0, 0, 0, 0.25);
        }

        .container__heading {
            padding: 1rem 0;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .container__heading h2 {
            font-size: 1.75rem;
            line-height: 1.75rem;
            margin: 0;
        }

        .container__content {
            flex-grow: 1;
            overflow-y: scroll;
        }

        .container__nav {
            border-top: 1px solid #ccc;
            text-align: right;
            padding: 2rem 0 1rem;
        }

        .container__nav .button {
            background-color: #444499;
            box-shadow: 0rem 0.5rem 1rem -0.125rem rgba(0, 0, 0, 0.25);
            padding: 0.8rem 2rem;
            border-radius: 0.5rem;
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .container__nav .button:hover {
            box-shadow: 0rem 0rem 1rem -0.125rem rgba(0, 0, 0, 0.25);
            transform: translateY(-0.5rem);
        }

        .container__nav small {
            color: #777;
            margin-right: 1rem;
        }
    </style>
</head>
<body>
    <main class="wrap">
        <section class="container">
            <div class="container__heading">
                <h2>Terms & Conditions</h2>
            </div>
            <div class="container__content">
                <?php include 'terms.php'; ?>
            </div>
            <div class="container__nav">
                <small>By clicking 'Accept' you are agreeing to our terms and conditions.</small>
                <a class="button" href="#">Accept</a>
            </div>
        </section>
    </main>
</body>
</html>
