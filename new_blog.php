<?php
session_start();
require_once 'db.php';
include 'inc/logout.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    if (!empty($title) && !empty($content) && !empty($image)) {
        try {
            $input = $dbc->prepare("INSERT INTO blogs (title, content, image) VALUES (?, ?, ?)");
            $input->bind_param("sss", $title, $content, $image);
            if ($input->execute()) {
                header('Location: dashboard.php');
                mysqli_close($dbc);
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
    <title>Add Element</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Gill Sans MT';
        }
    </style>
</head>

<body>
    <nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Hani's Store - Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="delete_admin.php">Delete admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="add_admin.php">Add admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="new_product.php">New product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="new_blog.php">New blog</a>
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Add new blog</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="content">Content</label>
                                <input type="text" class="form-control" id="content" name="content" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">image</label>
                                <input type="text" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="d-grid gap-2 text-center">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Publish</button>
                                <a href="dashboard.php">Go back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>