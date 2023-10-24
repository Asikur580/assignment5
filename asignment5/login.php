<?php
session_start();
$fp = "data/user.txt";

if (isset($_SESSION["role"])) {
    header("Location: index.php");
}


$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? ""; 

$roles = array();
$usernames = array();
$emails = array();
$passwords = array();
$errorMessage = "";

if($email != "" && $password != "") {   
    
    $alluser = file_get_contents($fp);
    $decodeUser = json_decode($alluser,true);
    $count = sizeof($decodeUser);
    $i=0;
    while($i<$count){
        
        array_push($roles, trim($decodeUser[$i]['role']));
        array_push($usernames, trim($decodeUser[$i]['username']));
        array_push($emails, trim($decodeUser[$i]['email']));
        array_push($passwords, trim($decodeUser[$i]['password']));

        $i++;
    }
   
    for ($j = 0; $j < count($roles); $j++) {
        if ($email == $emails[$j] && $password == $passwords[$j]) {
            $_SESSION["role"] = $roles[$j];
            $_SESSION["username"] = $usernames[$j];
            $_SESSION["email"] = $emails[$j];         
            header("Location: index.php");
        }
        else {
            $errorMessage = "Wrong email or password";
        }
    }
    
    
    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-danger">Login Page</h1>
        <form action="" method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Your Email" required>                
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Your Password" required>
                <input type="checkbox" class="mt-2 me-2" onclick="myFunction()">Show Password
            </div>

            <p class="mt-3 text-danger"><?php if($errorMessage){echo $errorMessage;} ?></p>

            <button type="submit" class="btn btn-success">Submit</button>

        </form>

        <p class="mt-3">Don't have an account? <a href="registration.php">Sign up</a></p>
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