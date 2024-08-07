<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hallo Howdy, Fill this Form</title>
    <?php include "links.php"; ?>
</head>
<body>
    <div class="cnt">
    <form method="post" enctype="multipart/form-data">
        <div class="container">
        <h2 class="mt-4">Information Form</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name"  required>
            </div>
            <div class="row">
            <div class="form-group col-md-6 py-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group col-md-6 py-3">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6 ">
                <label for="email">Address:</label>
                <input type="text" class="form-control" name="add" placeholder="Enter your address" required>
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Select Gender:</label>
                <select name="gender" id="" class="form-control" required>
                    <option value="" selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            </div>
            <div class="form-group py-3">
                <label for="name">Select Image:</label>
                <input type="file" name="image" class="form-control"  accept=".jpg, .jpeg, .png, .jfif" required>
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-primary" id="openPopupButton">

            

   
     </div>
    </form>
    </div>
</body>
</html>

<?php
include 'connect.php';

if(isset($_POST['submit']))
{
       $name = $_POST["name"];
       $email = $_POST["email"];
       $phone = $_POST["phone"];
       $address = $_POST["add"];
       $gender = $_POST["gender"];
       $imagename = $_FILES['image']['name']; 
       $tmp_name = $_FILES['image']['tmp_name'];
       $rand = rand(1111,9999) .  "." . $imagename;
       $folder = $rand;
       $image = move_uploaded_file($tmp_name, "images/".$folder);

       $ins = "insert into info (name, email, phone, address, gender, image) values
       ('".$name."','".$email."','".$phone."','".$address."','".$gender."', '".$folder."')";

       $insert = mysqli_query($con, $ins);

       if($insert)
       {
          header("Location:select.php");
       }else{
          echo "<script>alert('Error')</script>";
          
       }
    
}


?>
