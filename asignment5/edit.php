<?php
session_start();
$fp = "data/user.txt";

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
}
    $id = $_GET["id"];
    $alluser = file_get_contents($fp);
    $decodeUser = json_decode($alluser,true);

    $user = array();
    $role = $_POST["role"] ?? "";
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    
    if($username != "" && $email != "" && $role != "") { 
        $decodeUser[$id]["username"] = $username;
        $decodeUser[$id]["email"] = $email;
        $decodeUser[$id]["role"] = $role;
        print_r($decodeUser);
        $data = json_encode($decodeUser);
        array_push($user,file_put_contents($fp, $data, LOCK_EX));
        header("Location: role_management.php");
        
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
           
            <select class="form-select text-capitalize" name="role" aria-label="Default select example">   
                <option value="<?php echo $decodeUser[$id]["role"]?>"><?php echo $decodeUser[$id]["role"]?></option>             
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
            </select>
                            
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputEmail1" value="<?php echo $decodeUser[$id]["username"]?>"  required>                
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="<?php echo $decodeUser[$id]["email"]?>" required>                
        </div>        

        <button type="submit" class="btn btn-success">Submit</button>

        </form>

        <div class="text-center">
            <a class="btn btn-dark mt-3" href="role_management.php">Back</a>
        </div>
    </div>
</body>
</html>