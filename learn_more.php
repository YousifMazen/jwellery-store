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
    <title>Learn more</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Gill Sans MT';
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">Hani's Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="home.php">Home</a>
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

    <div class="container mt-5" style="flex: 1;">
        <div class="card">
            <?php
            if (isset($_GET['submit'])) {
                $blogID = $_GET['blogID'];

                $query = $dbc->prepare("SELECT * FROM blogs WHERE blog_id = ?");
                $query->bind_param('i', $blogID);
                $query->execute();
                $results = $query->get_result();

                if ($results->num_rows > 0) {
                    // Output data of each row
                    while ($row = $results->fetch_assoc()) {

                        echo '
                        <img src="' . $row["image"] . '" class="card-img-top image-fluid" height="600" alt="Blog Image">
                        ';

                        echo '<div class="card-body">';
                        echo '<h2 class="card-title">' . $row["title"] . '</h2>';
                        echo '
                        <p class="card-text">
                        ' . $row["content"] . '
                        </p>';
                        echo '
                        <div class=" text-center">
                            <a class="btn btn-lg btn-primary" href="home.php">Go back</a>
                        </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<h1 class="text-center my-4">Blog not found</h1>';
                }
            }
            // Close the database connection
            $dbc->close();
            ?>

            <!-- <img src="https://davidmorris.com/app/uploads/2022/10/Text-1-1-768x692.png" class="card-img-top" height="600" alt="Blog Image"> -->
            <!-- < div class="card-body">
                <h2 class="card-title">Blue Dimond !</h2>
                <p class="card-text">
                    Blue diamonds, those mesmerizing gemstones with a hue that evokes the depths of the ocean and the
                    vastness of the sky,
                    are among the rarest and most coveted treasures nature has to offer. Their exquisite beauty and
                    scarcity have captured
                    the imagination of gem enthusiasts and collectors worldwide. Let's delve into the world of blue
                    diamonds, exploring
                    their origin, unique characteristics, and the allure that makes them so extraordinary.
                </p>

                <h4>he Origins of Blue Diamonds: A Touch of Boron Magic</h4>
                <p class="card-text">
                    Unlike their colorless counterparts, the enchanting blue color of these diamonds doesn't come from
                    impurities or
                    structural irregularities. Instead, it's the result of the presence of the element boron during
                    their formation. Boron
                    atoms, while replacing carbon atoms in the diamond's crystal lattice, absorb red, yellow, and green
                    light, allowing only
                    blue light to be reflected. The intensity of the blue hue can range from delicate pastels to deep,
                    vivid shades, adding
                    to the mystique of each stone.
                </p>

                <h4>The Hope Diamond: A Legendary Icon</h4>
                <p class="card-text">
                    Among the most famous blue diamonds in the world, the Hope Diamond has transcended time with its
                    beauty and storied
                    history. Its deep blue color and large size have made it a coveted gem for centuries. It passed
                    through the hands of
                    nobility and collectors, accumulating tales of curses and legends that only added to its allure. The
                    Hope Diamond stands
                    as a testament to the enduring fascination that blue diamonds inspire.
                </p>

                <h4>The Rarity and Investment Value</h4>
                <p class="card-text">
                    Blue diamonds account for only a fraction of the world's total diamond production, making them
                    incredibly rare. Their
                    scarcity has led to their classification as some of the most valuable and sought-after gemstones on
                    the market.
                    Investors and collectors recognize the potential of blue diamonds as both stunning adornments and
                    profitable assets. As
                    demand continues to grow and supply remains limited, the value of these remarkable gems is expected
                    to rise.
                </p>
                <div class=" text-center">
                    <a class="btn btn-lg btn-primary" href="home.php">Go back</a>
                </div>
            </div>-->
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Hani's jewellery. All rights reserved.</p>
    </footer>
</body>

</html>