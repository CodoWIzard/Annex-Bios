<?php include "header.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Film Agenda</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('./assets/img/header_afbeelding.jpg'); 
      background-size: cover;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 90%;
      margin: 0 auto;
      background-color: rgba(255, 255, 255, );
      padding: 20px;
    }
    .agenda-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
    }
    .agenda-header h1 {
      margin: 0;
    }
    .agenda-header select {
      padding: 5px;
      margin-left: 10px;
    }
    .movie-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .movie-card {
      background-color: white;
      border: 1px solid #ddd;
      width: 200px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .movie-card img {
      width: 100%;
    }
    .movie-card .details {
      padding: 10px;
    }
    .movie-card .details h3 {
      margin: 0;
      font-size: 16px;
    }
    .movie-card .details p {
      margin: 5px 0;
      font-size: 14px;
    }
    .movie-card .details .rating {
      color: #f39c12;
    }
    .movie-card .details .btn {
      display: block;
      text-align: center;
      background-color: #007bff;
      color: white;
      padding: 10px;
      text-decoration: none;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="agenda-header">
      <h1>FILM AGENDA</h1>
      <div>
        <select>
          <option>FILMS</option>
        </select>
        <select>
          <option>DEZE WEEK</option>
        </select>
        <select>
          <option>VANDAAG</option>
        </select>
        <select>
          <option>CATEGORIE</option>
        </select>
      </div>
    </div>
    <div class="movie-grid">
      <?php
        include "moviearray.php";

        foreach ($movies as $movie) {
      ?>
        <div class="movie-card">
          <img alt="<?php echo $movie['title']; ?>" height="300" src="<?php echo $movie['image']; ?>" width="200"/>
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
            <a class="btn" href="#">LEES MEER & TICKETS</a>
          </div>
        </div>
      <?php
        }
      ?>
    </div>
  </div>
</body>
</html>

<?php include "footer.php";?>