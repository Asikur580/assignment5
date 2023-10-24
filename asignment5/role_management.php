<?php
session_start();
$fp = "data/user.txt";

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
}

$alluser = file_get_contents($fp);
$decodeUser = json_decode($alluser,true);
$count = sizeof($decodeUser);
$i=0;
$j=0;
$k=0;
$l=0;
$si0=0;
$si1=0;
$si2=0;
$si3= 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-danger">Role management Page</h1>
        <div class="mt-3 ">
            <h1 class="text-primary">All User</h1>
            <table class='table text-center'>
                <thead>
                    <tr>
                        <th scope='col'>SI</th>
                        <th scope='col'>Role</th>
                        <th scope='col'>Username</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
                while($j<$count){ ?>                  

                    <?php if($decodeUser){ ?>

                    <tr>
                        <th scope='row'><?php echo $si0+=1 ?> </th>
                        <td><?php echo trim($decodeUser[$j]['role'])?> </td>
                        <td><?php echo trim($decodeUser[$j]['username'])?></td>
                        <td><?php echo trim($decodeUser[$j]['email'])?></td>
                        <td>
                            <a class="btn btn-info me-3" href="edit.php?id=<?php echo $j?>">Edit</a>
                            <a class="btn btn-danger me-3" onclick="return confirm('Are you sure you want to delete this item?');" href="delete.php?id=<?php echo $j?>">Delete</a>
                        </td>
                    </tr>    

                    <?php }?>
                    <?php $j++ ?> 
                    <?php }  ?>     
           
            </tbody>
            </table>
            
        </div>

        <div class="mt-3 ">
            <h1 class="text-primary">Admin</h1>
            <table class='table text-center'>
                <thead>
                    <tr>
                        <th scope='col'>SI</th>
                        <th scope='col'>Role</th>
                        <th scope='col'>Username</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
                while($i<$count){ ?>    
                
                <?php if(trim($decodeUser[$i]['role'] == "admin")){ ?>

                    <tr>
                        <th scope='row'><?php echo $si1+=1 ?> </th>
                        <td><?php echo trim($decodeUser[$i]['role'])?></td>
                        <td><?php echo trim($decodeUser[$i]['username'])?></td>
                        <td><?php echo trim($decodeUser[$i]['email'])?></td>
                        <td>
                            <a class="btn btn-info me-3" href="edit.php?id=<?php echo $i?>">Edit</a>
                            <a class="btn btn-danger me-3" onclick="return confirm('Are you sure you want to delete this item?');" href="delete.php?id=<?php echo $i?>">Delete</a>
                        </td>
                    </tr>                      
                    <?php }?>
                    <?php $i++ ?> 
                    <?php }  ?>     
           
            </tbody>
            </table>
            
        </div>

        <div class="mt-3 ">
            <h1 class="text-primary">User</h1>
            <table class='table text-center'>
                <thead>
                    <tr>
                        <th scope='col'>SI</th>
                        <th scope='col'>Role</th>
                        <th scope='col'>Username</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
                while($l<$count){ ?>    
                
                <?php if(trim($decodeUser[$l]['role'] == "user")){ ?>

                    <tr>
                        <th scope='row'><?php echo $si3+=1 ?> </th>
                        <td><?php echo trim($decodeUser[$l]['role'])?></td>
                        <td><?php echo trim($decodeUser[$l]['username'])?></td>
                        <td><?php echo trim($decodeUser[$l]['email'])?></td>
                        <td>
                            <a class="btn btn-info me-3" href="edit.php?id=<?php echo $l?>">Edit</a>
                            <a class="btn btn-danger me-3" onclick="return confirm('Are you sure you want to delete this item?');" href="delete.php?id=<?php echo $l?>">Delete</a>
                        </td>
                    </tr>                      
                    <?php }?>
                    <?php $l++ ?> 
                    <?php }  ?>     
           
            </tbody>
            </table>
            
        </div>

        <div class="mt-3 ">
            <h1 class="text-primary">Manager</h1>
            <table class='table text-center'>
                <thead>
                    <tr>
                        <th scope='col'>SI</th>
                        <th scope='col'>Role</th>
                        <th scope='col'>Username</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
                while($k<$count){ ?>    
                
                <?php if(trim($decodeUser[$k]['role'] == "manager")){ ?>

                    <tr>
                        <th scope='row'><?php echo $si2+=1 ?> </th>
                        <td><?php echo trim($decodeUser[$k]['role'])?></td>
                        <td><?php echo trim($decodeUser[$k]['username'])?></td>
                        <td><?php echo trim($decodeUser[$k]['email'])?></td>
                        <td>
                            <a class="btn btn-info me-3" href="edit.php?id=<?php echo $k?>">Edit</a>
                            <a class="btn btn-danger me-3" onclick="return confirm('Are you sure you want to delete this item?');" href="delete.php?id=<?php echo $k?>">Delete</a>
                        </td>
                    </tr>                      
                    <?php }?>
                    <?php $k++ ?> 
                    <?php }  ?>     
           
            </tbody>
            </table>
            
        </div>

        <div class="text-center">
        <a class="btn btn-primary mt-3" href="create.php">Create</a>
            <a class="btn btn-dark mt-3" href="admin_home.php">Back</a>
        </div>
        
    </div>
    
</body>
</html>