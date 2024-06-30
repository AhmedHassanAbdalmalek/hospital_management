<?php
session_start();
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


$id=$_SESSION['id'];
$patient_name= $_SESSION['username'];
$patient_id=$_SESSION['id'];
$sql = "SELECT * FROM hospital.patient_doctor pd inner join doctor d  on d.id_doctor=pd.id_doctor
join patient p on p.id_p =pd.id_patient
where p.id_p=$id and pd.id_patient=$id";

$result = $conn->query($sql);



?>


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
    <title>patient</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">patient</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
        </li>
       
        <li class="nav-item">
        <a href="logout.php" class="nav-link" >Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
       
      </ul>
      <span style="transform: translateX(940px);font-size: 25px">Hi :<?php echo $patient_name ?></span>
    </div>
  </div>
</nav>
<div class="container "style="margin-top: 100px !important;">
    <!-- tables of patient -->
    <div class="container">
            <h1> Details of -<?php echo $patient_name;?></h1>
          <table class="table">
  <thead>
    
  </thead>
  <tbody>
    <?php 
   
    if ($result->num_rows > 0)
    { echo  '
      <tr>
      <th scope="col">patient Name</th>
      <th scope="col">diagnosis</th>
      <th scope="col">address</th>
      <th scope="col">age</th>
    </tr>';
      while($row1 = $result->fetch_assoc()) {
        echo "<tr><td>". $row1['name'].
        "</td><td>". $row1['diagnosis'].
        "</td><td>". $row1['address'].
         "</td><td>".  $row1['age'] ."</td></tr>";
        
     
    }
    }else
     {
      echo "<h1 style='color:red'>no patient<h1>";
     }

     ///insert message
     $errors=0;
$usererror='';
if(isset($_POST['submit']))
{
     
    if(empty($_POST['message']) )
    {
        $usererror="please enter message";
        $errors=1;
        
       
    }
    
    


else {
    
    if
($errors==0) {
    
    

    $id=$_SESSION['id'];
$msg = $_POST['message'];

$sql = "update patient_doctor set message='$msg' where id_patient=' $id'";
if ($conn->query($sql) === TRUE) {
    $recordsuccess= "message sent successfully";
   // header('location:doctor.php');
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

   
}}
}//end of submit
    
     ?>
   
   
   
    </tr>
  </tbody>
</table>
   <!-- end of tables of patient -->
   <h1>send message to your doctor </h1>
   <div class="container">
           <!--   insert message  -->
       
          <form method="POST" style="border: 1px solid black; padding: 20px;"action="patient.php"method="POST">
    <div class="col-sm-7">
    <label for="message" class="form-label">Write your message :</label>
    <input type="text" class="form-control" name="message" id="message" aria-describedby="emailHelp">
    
  </div>
 
  <div class=" form-check">
    <div style="color:red;"><?php if(isset( $usererror)){echo $usererror;} ?></div>
    <div style="color:green;"><?php if(isset(  $recordsuccess)){echo  $recordsuccess;} ?></div>
  <button type="submit" name="submit" class="btn btn-dark color mt-3">Send Message</button></div>
  </div>
  
  

    </div>
</form> 
      
</body>
</html>