<?php 
session_start();
    $fp = "data/user.txt";
  
    if (isset($_SESSION["role"])) {
        header("Location: index.php");
    }

    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";    

    if($username != "" && $email != "" && $password != "") {   
        $user =array(
            "role"=>"user",
            "username"=>$username,
            "email"=>$email,    
            "password"=>$password,
        ); 
        $alluser = file_get_contents($fp);
        $decodeUser = json_decode($alluser,true);
        
        array_push($decodeUser,$user);

        $data = json_encode($decodeUser);
        file_put_contents($fp,$data,LOCK_EX);
        $_SESSION["role"]="user";
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email; 
        header("Location: index.php");
    }
   

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-danger">Registration Page</h1>
        <form action="" method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Enter Your Username" required>                
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Your Email" required>                
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Your Password" required>
                <input type="checkbox" class="mt-2 me-2" onclick="myFunction()">Show Password
            </div>

            <button type="submit" class="btn btn-success">Submit</button>

        </form>

        <p class="mt-3">Don't have an account? <a href="login.php">Log In</a></p>
    </div>

<script>
    function myFunction() {
    var x = document.getElementById("exampleInputPassword1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>
</body>
</html>