<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Your Data</title>
    <?php include "links.php"; ?>
</head>
<body>
    <div class="container mt-4">
<table class="table">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
    <?php
     include "connect.php";
     $sql = "SELECT * FROM info";
     $sel = mysqli_query($con , $sql);
     $i = 1;
     while($row = mysqli_fetch_assoc($sel))
     {

         echo "<tr>";
         echo "<td>".$i."</td>
               <td><img src='images/".$row['image']."' class='img' /></td>
               <td>".$row['name']."</td>
               <td>".$row['email']."</td>
               <td>".$row['phone']."</td>
               <td>".$row['address']."</td>
               <td>".$row['gender']."</td>
               <td>";
         echo      '<a class="btn1" href="update.php?id='.$row["id"].'" >Update</a>
                    <a class="btn2" href="delete.php?id='.$row["id"].'" >Delete</a>';
         echo "</td>";
         echo "</tr>";
            $i++;
     }
    ?>
</table>

    <?php
    echo '<a href="index.php" class="back" >Back</a>';
    ?>
  

    </div>
</body>
</html>

