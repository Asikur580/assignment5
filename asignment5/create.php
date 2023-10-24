<?php
session_start();
$fp = "data/user.txt";

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
}
    $errorMessage ="";  
    
    $role = $_POST["role"] ?? "";
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    
    if($username != "" && $email != "" && $role != "") { 
        $user =array(
            "role"=>$role,
            "username"=>$username,
            "email"=>$email,    
            "password"=>$password,
        ); 
        $alluser = file_get_contents($fp);
        $decodeUser = json_decode($alluser,true);
        
        array_push($decodeUser,$user);

        $data = json_encode($decodeUser);
        file_put_contents($fp,$data,LOCK_EX);
       
        header("Location: role_management.php");
        
    }else{
        $errorMessage = "Wrong information";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="text-center text-danger">Edit Page</h1>
        <form action="" method="POST">

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
           
            <select class="form-select" name="role" aria-label="Default select example">    
                <option value="">Enter your role</option>            
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
            </select>
                            
        </div>

        <div class="mb-3">
            <label for="userrname" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username"  required>                
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"  required>                
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required>
            <input type="checkbox" class="mt-2 me-2" onclick="myFunction()">Show Password
        </div>
        
        <p class="mt-3 text-danger"><?php if($errorMessage){echo $errorMessage;} ?></p>

        <button type="submit" class="btn btn-success">Submit</button>

        </form>

        <div class="text-center">
            <a class="btn btn-dark mt-3" href="role_management.php">Back</a>
        </div>
    </div>



    <script>
    function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>
</body>
</html>