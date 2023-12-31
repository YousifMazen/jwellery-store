<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <style>
        body {
            font-family: 'Gill Sans MT';
        }

        .mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.55);
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="bg-primary text-white text-center d-flex flex-column justify-content-center py-4"
        style="background-image: url('https://cdn.gobankingrates.com/wp-content/uploads/2023/03/sapphire-ring-iStock-1357417259.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; height: 60vh; position: relative;">
        <div class="mask"></div>
        <div style="position: relative; z-index: 1;">
            <h1 class="fs-1 text-uppercase">Welcome to Hani's jewellery store</h1>
            <h2 class="fs-5 text-uppercase mb-4">Best place for buying an awesome jewellery</h2>
            <div class="d-flex justify-content-center">
                <a href="login.php" class="m-2 btn btn-primary btn-lg">Login</a>
                <a href="signup.php" class="m-2 btn btn-primary btn-lg">Sign up</a>
            </div>
        </div>
    </header>

    <!-- Content Section -->
    <section class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h1>Hani's jewellery store</h1>
                <p class="fs-4">Elegance personified, our jewelry store is a haven for those seeking timeless beauty and
                    exquisite craftsmanship. With a
                    curated collection of finely crafted pieces, each adorned with sparkling gems and precious metals,
                    our store offers a
                    journey through the artistry of jewelry making. From delicate necklaces that grace the neckline to
                    intricate rings that
                    symbolize eternal love, every creation tells a unique story. Whether it's a celebration of life's
                    milestones or a
                    reflection of individual style, our jewelry store is a place where dreams are realized, and memories
                    are etched in the
                    brilliance of gemstones.</p>
            </div>
            <div class="col-lg-4 mb-4">
                <img class="img-fluid rounded"
                    src="https://sukkhi.com/cdn/shop/products/SKR104705_2000x.jpg?v=1660291183" alt="">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Hani's jewellery. All rights reserved.</p>
    </footer>

</body>

</html>