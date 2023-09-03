<?php
session_start();
require_once 'db.php';
include 'inc/logout.php';

if (isset($_POST['submit'])) {
    $password = $_POST['password'];

    $userID = $_SESSION['user_id'];
    if (!empty($password)) {
        try {
            $query = $dbc->prepare("UPDATE users SET password=? WHERE user_id = ? ");
            $query->bind_param('si', $password, $userID);
            $query->execute();

            if ($query->execute()) {
                mysqli_close($dbc);
                header('Location: home.php');
                exit();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo 'empty';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            <div class="col-md-6 offset-md-3">
                <h1>Edit Profile</h1>
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="password">New password</label>
                        <input type="text" name="password" class="form-control" id="Password">
                    </div>
                    <div class="d-flex gap-3">
                        <input type="submit" name="submit" class="btn btn-primary mb-3" value="Save Changes">
                        <a href="profile.php" class="btn btn-outline-primary mb-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Hani's jewellery. All rights reserved.</p>
    </footer>
</body>

</html>