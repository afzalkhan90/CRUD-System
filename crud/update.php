<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hallo Howdy, Fill this Form</title>
    <?php
     include "links.php";
     include "connect.php";
     ?>
</head>
<body>
    <?php
    $id = $_GET["id"];
    $sel = "select * from info where id='".$id."'";
    $run = mysqli_query($con, $sel);
    while($row = mysqli_fetch_assoc($run)){
    ?>
    <div class="cnt">
    <form method="post" enctype="multipart/form-data">
        <div class="container">
        <h2 class="mt-4">Information Form</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" required name="name" placeholder="Enter your name">
            </div>
            <div class="row">
            <div class="form-group col-md-6 py-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control" value="<?php echo $row['email']; ?>" required name="email" placeholder="Enter your email">
            </div>
            <div class="form-group col-md-6 py-3">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" value="<?php echo $row['phone']; ?>" required name="phone" placeholder="Enter your phone number">
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6 ">
                <label for="email">Address:</label>
                <input type="text" value="<?php echo $row['address']; ?>" class="form-control" required name="add" placeholder="Enter your address">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Select Gender:</label>
                <select name="gender"  id="" class="form-control" required>
                    <option value="" selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            </div>
            <div class="form-group py-3">
                <label for="name">Select Image:</label>
                <input type="file" name="image" class="form-control" required  accept=".jpg, .jpeg, .png">
            </div>
            <input type="submit" value="Submit" name="ubtn" class="btn btn-primary" id="openPopupButton">

            

     </div>
    </form>
    </div>
    <?php } ?>
</body>
</html>

<?php
if(isset($_POST['ubtn']))
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

       $update = "UPDATE info SET name='".$name."',email='".$email."',phone='".$phone."',address='".$address."',gender='".$gender."',image='".$folder."' where id='".$id."'";
       $upd = mysqli_query($con, $update);

       if($upd)
       {
          header("Location:select.php");
       }else{
          echo "<script>alert('Error')</script>";
          
       }
    
}
?>
