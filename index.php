<?php  include("./config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
</head>
<body>
    <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<?php 
    $q = "select * from imgedata";
    $query = mysqli_query($con,$q) or die('Data is not connected');
    while($row = mysqli_fetch_array($query)){
?>
<div class="mySlides fade">
  
  <img src="<?php echo $row['img1'];?>" style="width:100%">

</div>
<?php 
    }
?>


<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">

<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>
<script src="script.js"></script>
</body>
</html>