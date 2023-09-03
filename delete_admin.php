<?php
session_start();
require_once 'db.php';
include 'inc/logout.php';
if (isset($_GET['submit'])) {
    $userID = $_GET['userID'];

    try {
        $query = $dbc->prepare("DELETE FROM users WHERE user_id = ?");
        $query->bind_param('i', $userID);
        $query->execute();

        if ($query->execute()) {
            mysqli_close($dbc);
            header('Location: dashboard.php');
            exit();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Element</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<style>
    main {
        padding: 20px;
    }

    body {
        font-family: 'Gill Sans MT';
    }
</style>

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
                        <a class="nav-link active" aria-current="page" href="delete_admin.php">Delete admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="new_product.php">New product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="new_blog.php">New blog</a>
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
    <main class="bg-light p-4">
        <h2>User Management</h2>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php

            $query = $dbc->prepare("SELECT * FROM users WHERE account_type= 'admin'");
            $query->execute();
            $results = $query->get_result();

            if ($results->num_rows > 0) {
                // Output data of each row
                while ($row = $results->fetch_assoc()) {
                    echo '<tr class="align-middle">';
                    echo '
                        <td>' . $row["name"] . '</td>
                    ';
                    echo '
                        <td>' . $row["email"] . '</td>
                    ';
                    echo '
                        <td>
                            <form action="" method="get">
                                <input type="hidden" name="userID" value="' . $row["user_id"] . '">
                                <input class="btn btn-primary mt-2" type="submit" name="submit" value="Delete">
                            </form>
                        </td>
                    ';
                    echo '</tr>';
                }
            } else {
                echo '<h1 class="text-center my-4">No Admins</h1>';
            }
            ?>
        </table>
    </main>

</body>

</html>

<?php


?>