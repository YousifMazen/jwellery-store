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
    <title>Profile</title>
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
                        <a class="nav-link active" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="contact_us.php">Contact us</a>
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
        <div class="row">
            <div class="col-md-4">
                <img src="https://static.vecteezy.com/system/resources/previews/017/779/366/original/cartoon-avatar-of-young-male-businessman-wearing-suit-and-tie-free-vector.jpg" alt="Profile Image" class='img-fluid mb-3' style='object-fit: cover;'>
            </div>
            <?php
            $userID = $_SESSION['user_id'];
            $query = $dbc->prepare("SELECT * FROM users WHERE user_id = ?");
            $query->bind_param('i', $userID);
            $query->execute();
            $results = $query->get_result();

            if ($results->num_rows > 0) {
                // Output data of each row
                while ($row = $results->fetch_assoc()) {
                    echo '
                    <div class="col-md-8">
                        <h2>My information</h2>
                        <p>' . $row["name"] . '</p>
                        <h2>Contact Information</h2>
                        <p>Email: ' . $row["email"] . '</p>
                        <a href="edit_profile.php" class="btn btn-primary my-3">Change password</a>
                    </div>';
                }
            } else {
                echo '<h1 class="text-center my-4">Error!</h1>';
            }
            mysqli_close($dbc);
            ?>

        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Hani's jewellery. All rights reserved.</p>
    </footer>
</body>

</html>