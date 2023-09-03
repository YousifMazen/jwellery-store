<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: 'Gill Sans MT';
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email@gmail.com" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                            </div>
                            <div class="d-grid gap-2 text-center">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                                <!-- <a href="home.html" class="btn btn-primary btn-block">Login</a> -->
                                <a href="signup.html">Don't have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        try {
            $query = $dbc->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $query->bind_param('ss', $email, $password);
            $query->execute();
            $results = $query->get_result();

            if ($row = $results->fetch_assoc()) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['accoutn_type'] = $row['accoutn_type'];
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