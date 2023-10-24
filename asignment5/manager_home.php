<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "manager") {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-danger">Manager Home Page</h1>

        <div class="mt-3 w-50">
            <h1 class="text-center text-primary">Manager details</h1>
            <p class="fs-3">Role : <?php if($_SESSION['role']){echo $_SESSION['role'];}?></p>
            <p class="fs-3">Username : <?php if($_SESSION['username']){echo $_SESSION['username'];}?></p>
            <p class="fs-3">Email : <?php if($_SESSION['email']){echo $_SESSION['email'];}?></p>
        </div>
        
        <div class="text-center">
            <a class="btn btn-danger mt-3" href="logout.php">Logout</a>
        </div>
        
    </div>

</body>
</html>