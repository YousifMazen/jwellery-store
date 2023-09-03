<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
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
            <a class="navbar-brand" href="home.html">Hani's Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.html">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="contact_us.html">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5" style="flex: 1;">
        <div class="row">
            <div class="col-md-4">
                <img src="https://static.vecteezy.com/system/resources/previews/017/779/366/original/cartoon-avatar-of-young-male-businessman-wearing-suit-and-tie-free-vector.jpg"
                    alt="Profile Image" class='img-fluid mb-3' style='object-fit: cover;'>
            </div>
            <div class="col-md-8">
                <h2>My information</h2>
                <p>John Doe</p>
                <p>48 years old</p>
                <p>Male</p>
                <h2>Contact Information</h2>
                <p>Email: john@gmail.com</p>
                <p>Phone: 07512845768</p>
                <a href="edit_profile.html" class="btn btn-primary my-3">Edit Profile</a>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Hani's jewellery. All rights reserved.</p>
    </footer>
</body>

</html>