
<?php
    include "header.php";
    include "moviearray.php";
?>


<body>
    <div class="container2">
        <div class="poster2">
            <img src="./assets/img/Jurassic-World_-Fallen-Kingdom.jpg" alt="Jurassic World Poster">
        </div>
        <div class="info2">
            <h2>Jurassic World: Fallen Kingdom</h2>
            <p><strong>Release:</strong> 7-06-2018</p>
            <div class="rating2">
                <span>Rating:</span>
                <!-- Example of stars using Unicode characters -->
                ⭐⭐⭐⭐☆
            </div>
            <p>In het 3D actie-spektakel Jurassic World: Fallen Kingdom keren favoriete...</p>
            <ul>
                <li><strong>Genre:</strong> Actie</li>
                <li><strong>Filmlengte:</strong> 128 minutes</li>
                <li><strong>Land:</strong> USA</li>
                <li><strong>Imdb score:</strong> 8.3/10</li>
                <li><strong>Regisseur:</strong> Juan Antonio Bayona</li>
            </ul>
            <div class="actors">
                <h3>Acteurs:</h3>
                <div class="actor">
                    <img src="./assets/img/BryceDallas.jpg" alt="Bryce Dallas Howard">
                    <p>Bryce Dallas Howard</p>
                </div>
                <div class="actor">
                    <img src="./assets/img/Chris_Pratt.jpg" alt="Chris Pratt">
                    <p>Chris Pratt</p>
                </div>
                <div class="actor">
                    <img src="./assets/img/rafe_spall.jpg" alt="Rafe Spall">
                    <p>Rafe Spall</p>
                </div>
                <div class="actor">
                    <img src="./assets/img/Toby_Jones.jpg" alt="Toby Jones">
                    <p>Toby Jones</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

.container2 {
    display: flex;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.poster2 img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.poster2 {
    flex: 1;
}

.info2 {
    flex: 2;
    padding: 20px;
}

.info2 h2 {
    font-size: 28px;
    margin-bottom: 10px;
}

.rating2 {
    margin: 10px 0;
    font-size: 20px;
}

.info2 p, .info ul {
    margin-bottom: 10px;
}

ul {
    list-style: none;
}

.actors {
    display: flex;
    gap: 15px;
}

.actor {
    text-align: center;
    width: 100px;
}

.actor img {
    width: 100%;
    border-radius: 0%;
    height: auto;
}

.actor p {
    margin-top: 8px;
    font-size: 14px;
}


</style>














<!-- code die we later gebruiken om database data toe te voegen aan de huidige code dat nu hardcoded is -->
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
<!--eind-->




<?php include "footer.php";?>