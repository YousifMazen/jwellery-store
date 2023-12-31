<?php
session_start();
require_once 'db.php';
include 'inc/logout.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Gill Sans MT';
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.html">Hani's Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            Logout
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Slider -->

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.alromaizan.com/image/upload/v1679132056/media/blog/what-makes-a-jewellery-exhibition-a-unique-experience.jpg" class="d-block w-100" style="height: 50vh;">
                <div class="carousel-caption d-none d-md-block">
                    <h2>High quality</h2>
                    <p>Best quality in class</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.lifestyleasia.com/wp-content/uploads/sites/6/2020/10/28113528/Louis-Vuitton-Stellar-Times-collier-Lune-Bleue-3-Cropped.jpg" class="d-block w-100" style="height: 50vh;">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Most affordable</h2>
                    <p>Less is more</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://therose.in/wp-content/uploads/2020/10/image@2x-8.jpg" class="d-block w-100" style="height: 50vh;">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Free maintanance</h2>
                    <p>Cleaning your jewellery to make them shine like new</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- buy  -->
    <div class="container">
        <h1 class="text-center my-4">Pick what you like</h1>
        <div class="row">
            <?php

            $query = $dbc->prepare("SELECT * FROM products");
            $query->execute();
            $results = $query->get_result();

            if ($results->num_rows > 0) {
                // Output data of each row
                while ($row = $results->fetch_assoc()) {
                    echo '<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src=" ' . $row["image"] . ' " class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> ' . $row["name"] . ' </h5>
                        <p class="card-text">
                        ' . $row["description"] . '
                        </p>
                         <form action="product_details.php" method="get">
                <input type="hidden" name="productID" value="' . $row["product_id"] . '">
                <input type="submit" name="submit" class="btn btn-primary" value="Buy Here">
            </form>
                    </div>
                </div>
            </div>';
                }
            } else {
                echo '<h1 class="text-center my-4">No products!</h1>';
            }

            ?>
            <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src="https://slimages.macysassets.com/is/image/MCY/products/0/optimized/21147590_fpx.tif?op_sharpen=1&wid=700&hei=855&fit=fit,1" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Silver ring</h5>
                        <p class="card-text">Discover elegance with our diamond solitaire ring. A timeless piece,
                            featuring a brilliant-cut diamond on a stunning
                            white gold band.</p>
                        <a href="product_details.html" class="btn btn-primary">Buy Here</a>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src="https://www.zalesoutlet.com/productimages/processed/V-20024892_1_800.jpg" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Bronze Dimond</h5>
                        <p class="card-text">Elevate your style with our enchanting sapphire and diamond ring. A
                            harmonious blend of rich color and sparkling
                            brilliance, destined to capture hearts and light up every occasion.</p>
                        <a href="product_details.html" class="btn btn-primary">Buy Here</a>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src="https://www.kingfursandfinejewelry.com/upload/product/trueromance_rm1025-1600969454.png" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gold Dimond</h5>
                        <p class="card-text">Elegance personified – our stunning ring showcases a gleaming diamond on a
                            slender band, a timeless embodiment of love
                            and refinement.</p>
                        <a href="product_details.html" class="btn btn-primary">Buy Here</a>
                    </div>
                </div>
            </div> -->
        </div>
        <hr>
        <!-- Learn -->
        <h1 class="text-center mt-2">Learn with us</h1>
        <div class="row">
            <?php

            $query = $dbc->prepare("SELECT * FROM blogs");
            $query->execute();
            $results = $query->get_result();

            if ($results->num_rows > 0) {
                // Output data of each row
                while ($row = $results->fetch_assoc()) {

                    echo '<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src=" ' . $row["image"] . ' " class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> ' . $row["title"] . ' </h5>
                        
                         <form action="learn_more.php" method="get">
                <input type="hidden" name="blogID" value="' . $row["blog_id"] . '">
                <input type="submit" name="submit" class="btn btn-primary" value="Learn More">
            </form>
                    </div>
                </div>
            </div>';
                }
            } else {
                echo '<h1 class="text-center my-4">No Blogs</h1>';
            }
            // Close the database connection
            $dbc->close();
            ?>
<!-- 
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src="https://www.zalesoutlet.com/productimages/processed/V-20024892_1_800.jpg" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Bronze Dimond</h5>
                        <p class="card-text">Elevate your style with our enchanting sapphire and diamond ring. A
                            harmonious
                            blend of rich color and sparkling
                            brilliance, destined to capture hearts and light up every occasion.</p>
                        <a href="learn_more.html" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src="https://www.kingfursandfinejewelry.com/upload/product/trueromance_rm1025-1600969454.png" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gold Dimond</h5>
                        <p class="card-text">Elegance personified – our stunning ring showcases a gleaming diamond on a
                            slender
                            band, a timeless embodiment of love
                            and refinement.</p>
                        <a href="learn_more.html" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src="https://davidmorris.com/app/uploads/2022/10/Text-1-1-768x692.png" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Blue Dimond</h5>
                        <p class="card-text">Blue diamonds: Rare and captivating, their exquisite hue and scarcity make
                            them
                            prized treasures of elegance.</p>
                        <a href="learn_more.html" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="ratio ratio-1x1">
                        <img src="https://slimages.macysassets.com/is/image/MCY/products/0/optimized/21147590_fpx.tif?op_sharpen=1&wid=700&hei=855&fit=fit,1" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Silver ring</h5>
                        <p class="card-text">Discover elegance with our diamond solitaire ring. A timeless piece,
                            featuring a
                            brilliant-cut diamond on a stunning
                            white gold band.</p>
                        <a href="learn_more.html" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Hani' s jewellery. All rights reserved.</p>
    </footer>
</body>

</html>