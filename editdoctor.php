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

$id_doctor = $_GET['id'];
$sql="select * from doctor where id_doctor=$id_doctor";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(isset($_POST['submit']))
{
    $errors=0;
$usererror='';
     
    if(empty($_POST['doctorname']) )
    {
        $usererror="please enter name";
        $errors=1;
        
       
    }
    if(empty($_POST['qualification']) )
    {
        $usererror="please enter qualification";
        $errors=1;
        
    }
   
     if(empty($_POST['department']) ) {
        $usererror="please enter department";
        $errors=1;
       
    }
    


else {
    
    if
($errors==0&&isset($_POST['submit'])) {
    
    


$name = $_POST['doctorname'];
$qualification = $_POST['qualification'];
$department= $_POST['department'];
//$diagnosis = $_POST['diagnosis'];


$sql="update doctor set name='$name',qualification='$qualification',id_d_fk='$department' where id_doctor=$id_doctor";
$result = $conn->query($sql);
if ($result === TRUE) {
    $recordsuccess="Record updated successfully";
    header("location:insertdoctor.php");
} else {
    $recordsuccess ="Error updating record: " . $conn->error;
}

   
}}
$conn->close();

}//end of submit
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
           <!--   update doctor  -->
       <h1>Insert doctor</h1>
          <form method="POST" style="border: 1px solid black; padding: 20px;" action="editdoctor.php?id=<?php echo $row['id_doctor']; ?>" method="POST">
    <div class="col-sm-7">
    <label for="doctorname" class="form-label">doctor Name</label>
    <input type="text" class="form-control" name="doctorname" id="doctorname" aria-describedby="emailHelp" value="<?php echo $row['name']; ?>">
    
  </div>
  <div class=" col-sm-7">
    <label for="qualification" class="form-label">qualification</label>
    <input type="text" class="form-control" name="qualification" id="qualification" value="<?php echo $row['qualification']; ?>">
  </div>
  <div class="col-sm-7">
                        <label for="department" class="form-label" >department</label>
                        <select class="form-select" id="department" name="department">
                            <option selected>Choose...</option>
                            <option value="1">bone</option>
                            <option value="2">mouth</option>
                        </select>
                      </span>
                        
  <div class=" form-check">
    <div style="color:red;"><?php if(isset( $usererror)){echo $usererror;} ?></div>
    <div style="color:green;"><?php if(isset(  $recordsuccess)){echo  $recordsuccess;} ?></div>
  <button type="submit" name="submit" class="btn btn-dark color mt-3"> Update</button></div>
  </div>
      
</body>
</html>