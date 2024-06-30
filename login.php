<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
<link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<?php

session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['id']))
{echo "you are already logged in";}
else{

$servername = "localhost";
$username = "root";
$password = "aa01026516106";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$sql = "SELECT * FROM users";

//$myresult = $conn->query($sql);
//var_dump(mysqli_fetch_assoc( $myresult) );
	
 // output data of each row
        // while($row = $myresult->fetch_assoc()) {
        //   echo "user name: " . $row["user_name"]. " - password: " . $row["password"]. "roleid: " . $row["id_r_fk"]. " profile path:" . $row["profile"].  "<br>";
        
        // }
        $loginerreo="";
        if(isset($_POST['submit'])){
          
          $username=$_POST['username'];
        $password=md5($_POST['password']);

        
        $sql = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        $row=mysqli_fetch_array($result);
       // var_dump($row);
       
        
          if($row['id_r_fk']==1&&$row['password']==$password&&$row['user_name']==$username){
            $_SESSION['username']=$row['user_name'];
            $_SESSION['id']=$row['id_u'];
            $_SESSION['img']=$row['profile'];
            $_SESSION['id_r_fk']=$row['id_r_fk'];
            header('location:doctor.php');
            
          }
          else if($row['id_r_fk']==2&&$row['password']==$password&&$row['user_name']==$username){
            $_SESSION['username']=$row['user_name'];
            $_SESSION['img']=$row['profile'];
            $_SESSION['id']=$row['id_u'];
            $_SESSION['id_r_fk']=$row['id_r_fk'];
            header('location:patient.php');
          }
          
         
          else{
           $loginerreo="not allowed access";
          }
            
        }
       
 
        
$conn->close();	


?>
<body>
<form method="POST">
<div class="container pt-5 align-items-center ">
    <h1>Login to your account</h1>
    <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  
   
    if you dont have account make it :<a href="register.php"style="text-decoration:none;" class="btn btn-primary color">Register</a>
   <div style="margin-top:20px;"><button type="submit" name="submit" class="btn btn-dark color">LOGIN</button></div> 
  
  </div>
  
  <span style="color:red;"> <?php echo  $loginerreo ?></span">

    </div>
</form>
  
</body>
<?php

}

?>

</html>