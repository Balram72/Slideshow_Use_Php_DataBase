<?php  include("./config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Uplode Image</title>
    <?php
        if(isset($_POST['submit'])){
             $file = $_FILES['img1']['name'];   // Create variable
             $directory = 'Image/'.$file;              // Create Folder
             $q = "insert into imgedata values('','$directory')"; // Insert Query
             $data = mysqli_query($con, $q) or die('query is not Select');  
             if ($data){ 
                 move_uploaded_file($_FILES['img1']['tmp_name'],"$directory");   // uplode the inside Folder Image
               }
        }
    ?>
</head>
<body>
<div class="container" style="margin:20px;margin-left:500px">
    <form class="row gx-3 gy-2 align-items-center" method="POST" action="" enctype="multipart/form-data">
      <div class="col-sm-3">
        <div class="input-group">
          <input type="file" class="form-control" id="specificSizeInputGroupUsername" name="img1"  multiple required >
        </div>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary" name="submit">UPLOAD</button>
      </div>
    </form>
</div>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">srno</th>
        <th scope="col">image pic</th>
        <th>Image Path</th>
        <th scope="col">Delete Image</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $q = "select * from imgedata";  
          $query =mysqli_query($con,$q) or die('data is not Found');
          while($row = mysqli_fetch_array($query)){
      ?>
      <tr>
        <th scope="row"><?php echo $row['srno1'];?></th>
        <td><img src="<?php echo $row['img1'];?>" alt="No Image" width="100px"></td>
        <td><?php echo $row['img1'];?></td>
        <td>
          <button type="button" class="btn btn-info">
            <a href="deleteimg.php?srno1=<?php echo $row['srno1']; ?>" class="link-dark" style="text-decoration:none;">Delete</a>
          </button>
      </td>
      </tr>
      <?php
        }                      
      ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>