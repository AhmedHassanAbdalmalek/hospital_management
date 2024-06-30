<?php


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
$errors=0;
$usererror='';
if(isset($_POST['submit']))
{
     
    if(empty($_POST['patientname']) )
    {
        $usererror="please enter name";
        $errors=1;
        
       
    }
    if(empty($_POST['age']) )
    {
        $usererror="please enter password";
        $errors=1;
        
    }
   
     if(empty($_POST['address']) ) {
        $usererror="please enter role";
        $errors=1;
       
    }
    


else {
    
    if
($errors==0) {
    
    


$name = $_POST['patientname'];
$age = $_POST['age'];
$address = $_POST['address'];
$diagnosis = $_POST['diagnosis'];
//$id_doctor = $_SESSION['id'];
$sql = "INSERT INTO patient (name,diagnosis1, age, address) VALUES ('$name', '$diagnosis','$age', '$address')";


if ($conn->query($sql) === TRUE) {
    $recordsuccess= "New record created successfully";
   // header('location:doctor.php');
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

   
}}
}//end of submit
$sql1="SELECT * from patient";
$result1 = $conn->query($sql1);

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insertpatient</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
      
<div class="container">
           <!--   insert patient  -->
       <h1>Insert Patient</h1>
          <form method="POST" style="border: 1px solid black; padding: 20px;"action="insertpatient.php"method="POST">
    <div class="col-sm-7">
    <label for="patientname" class="form-label">Patient Name</label>
    <input type="text" class="form-control" name="patientname" id="patientname" aria-describedby="emailHelp">
    
  </div>
  <div class=" col-sm-7">
    <label for="Address" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="Address">
  </div>
  <div class=" col-sm-7">
    <label for="diagnosis" class="form-label">diagnosis</label>
    <input type="text" class="form-control" name="diagnosis" id="diagnosis">
  </div>
  <div class=" col-sm-7">
    <label for="age" class="form-label">Age</label>
    <input type="number" class="form-control" name="age" id="age">
  </div>
 
  <div class=" form-check">
    <div style="color:red;"><?php if(isset( $usererror)){echo $usererror;} ?></div>
    <div style="color:green;"><?php if(isset(  $recordsuccess)){echo  $recordsuccess;} ?></div>
  <button type="submit" name="submit" class="btn btn-dark color mt-3">Submit</button></div>
  </div>
  
  

    </div>
</form> 
<!-- end insert table -->
  <!-- tables of patient -->
    <div class="container">
        
          <table class="table">
  <thead>
    
  </thead>
  <tbody>
    <h1>All patient </h1>
    <?php 
    if ($result1->num_rows > 0)
    { echo '
      <tr class="bg-dark text-light " >
      <th scope="col">patient Name</th>
      
      <th scope="col">address</th>
      <th scope="col">age</th>
    </tr>';
      while($row1 = $result1->fetch_assoc()) {
        echo "<tr><td>". $row1['name'].
        "</td><td>". $row1['address'].
         "</td><td>".  $row1['age'] ."</td></tr>";
     
    }
    }else
     {
      echo "<h1 style='color:red'>no patient<h1>";
     }
    
     ?>
   
   
   
    </tr>
  </tbody>
</table>
   <!-- end of tables of patient -->
</body>
</html>