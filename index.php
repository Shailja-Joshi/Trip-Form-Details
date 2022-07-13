<?php
$insert = false;
if(isset($_POST['name'])){
   //Set connection variables
   $server="localhost";
   $username="root";
   $password="";

   //Create a connection
   $con=mysqli_connect($server,$username,$password);

   //Check for connection success
   if(!$con){
    die("connection to db failed due to" . mysqli_connect_error());
   }

  // echo "Successfully connected to db";


  //Collect post variables
  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $age=$_POST['age'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $desc=$_POST['desc'];

  //`trip`.`trip` is databasename . tablename
  $sql ="INSERT INTO `trip`.`trip` ( `Name`, `Age`, `Gender`,
  `Email`, `Phone`, `Other`, `Date of submission`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
  //echo $sql;


  //execute the query
  if($con-> query($sql)==true){    //-> object operator
   echo "Successfully inserted";

     //flag for successful insertion i.e insert goes true if query is successfully run otherwise it has been set false in beginning
      $insert=true;
  } 
  else{
   echo "ERROR : $sql <br> $con->error";   //error key of con is being accessed
  }

  $con->close();  //connection closed
} 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <img src="bg1.webp" alt="image bg" style="width: 100%; position: absolute; z-index: -1; opacity: 0.5; ">
    <div class="container">
        <h1>Welcome to trip form for Ladakh</h1>
        <p>Hi Everyone</p>
        <p>Enter your details and submit your form</p> 
        <?php
        if($insert==true){
        echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
      }
     
       ?>
        <form action="index.php" method="post">
           <input type="text" name="name" id="name" placeholder="Enter your name">
           <input type="text" name="age" id="age" placeholder="Enter your age">
           <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email ">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.">
        
        <textarea name="desc" cols="20" rows="10" placeholder="any other information..."></textarea>
        <button class="btn">Submit</button>
        
    </form>
    </div>
    <script src="index.js"></script>
  
</body>
</html>