<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
<link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "aa01026516106";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
 $errors=0;
 $usererror="";
 $passworderror="";
 $roleerror="";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit']))
{
    if(empty($_POST['username']) )
    {
        $usererror="please enter username";
        $errors=1;
        
       
    }
    if(empty($_POST['password']) )
    {
        $passworderror="please enter password";
        $errors=1;
    }
    elseif(empty($_POST['role']) ) {
        $roleerror="please enter role";
        $errors=1;
    }
    


else if
($_SERVER["REQUEST_METHOD"] == "POST"&&$errors==0) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash the password
    $role = $_POST['role'];
    
    

    if(isset($_FILES['fileToUpload']))
    {
        $errors=array();
        $file_name = $_FILES['fileToUpload']['name'];
        //var_dump($file_name);
        $file_size =$_FILES['fileToUpload']['size'];
        $file_tmp=$_FILES['fileToUpload']['tmp_name'];
        $file_type=$_FILES['fileToUpload']['type'];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        $extensions= array("jpeg","jpg","png");
        if(in_array($ext,$extensions)=== false){
           // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
    
        if($file_size > 2097152){

            $errors[]='File size must be excately 2 MB';
        }
        if(empty($errors)==true)
        {
            move_uploaded_file($file_tmp,"upload/".$file_name);
            
        }
        else{
            print_r($errors);
        }
    
    }
    else {
        
        echo"dont found file input";}
   
    
    
    

    
    $sql = "INSERT INTO users (user_name, password,id_r_fk,profile) VALUES ('$username', '$password', '$role','$file_name')";

    $messagesql="";
    if ($conn->query($sql) === TRUE) {
        $messagesql= "New record created successfully";
        header("refresh:6;URL=login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
}
?>

<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg border-0" style="max-width: 400px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Sign Up</h1>
                <form method="post"enctype="multipart/form-data">
                    <div class="mb-3">
                       
                        <label for="username" class="form-label">User Name:</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter your user name ">
                        <span style="color:red"> <?php
                        if(isset($usererror)){echo $usererror;}
                        
                            ?></span>
                    </div>
                 
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="Password" placeholder="Enter your password">
                        <span style="color:red"> 
                        <?php
                        if(isset($passworderror)){echo $passworderror;}
                        
                            ?></span>
                    <div class="mb-3">
                        <label for="role" class="form-label" >Role</label>
                        <select class="form-select" id="role" name="role">
                            <option selected>Choose...</option>
                            <option value="1">doctor</option>
                            <option value="2">patient</option>
                        </select>
                        <?php

                        if(isset($roleerror)){echo $roleerror;}
                        
                            ?></span>
                        
                    </div>
                    <div class="mb-3">
                    Select :
                     <input type="file" name="fileToUpload" id="fileToUpload">

                    </div>
                    <div class="d-grid">
                        <button type="submit" name="submit" value="register" class="btn btn-primary btn-lg">Sign Up</button>
                    </div>
                </form>
                <p class="text-center mt-3">Already have an account? <a href="login.php">Log In</a></p>
                <span style="color:green;background-color:white;font-weight:bold"><?php if(isset($messagesql)){ echo  $messagesql;}?></span>
            </div>
        </div>
    </div>
</body>

</html>