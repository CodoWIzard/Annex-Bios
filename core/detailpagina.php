<?php
    include "header.php";
    include "moviearray.php";
?>
<body>

<div class="container">
            <div class="header">
                <h1>WELKOM BIJ ANNEXBIOS 5</h1>
            </div>

            <?php
  $count = 0; // counter
  foreach ($movies as $movie) {
    if ($count >= 1) {
      break;
    }
?>
    <div class="movie-card">
      <img alt="<?php echo $movie['title']; ?>" height="600" src="<?php echo $movie['image']; ?>" width="800"/>
      
    </div>

    <div class="details">
        <h3><?php echo $movie['title']; ?></h3>
        <p>Release: <?php echo $movie['release']; ?></p>
        <p class="rating">
          <?php
            for ($i = 0; $i < floor($movie['rating']); $i++) {
              echo '<i class="fas fa-star"></i>';
            }
            if ($movie['rating'] - floor($movie['rating']) > 0) {
              echo '<i class="fas fa-star-half-alt"></i>';
            }
          ?>
        </p>
      </div>
<?php
    $count++; // verhoog counter
  }
?>





    
</body>
</html>
<?php include "footer.php";?>