<?php include "header.php"; ?>
<script>
    fetch('https://u231195.gluwebsite.nl/api/v1/movieData', {
    headers: {
      'Authorization': 'Bearer 0be8d9266c188d1e2e2550f41b7ba5f965c8daa4046c3a62f996e5547ac834b7',
    }
  })
    .then(response => {
    
      const contentType = response.headers.get("content-type");
      
      if (!response.ok) {
        throw new Error('Network response was not ok ' + response.statusText);
      }
      
      if (contentType && contentType.includes("application/json")) {
        return response.json();
      } else {
        return response.text(); 
      }
    })
    .then(data => {
      console.log(data);
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
  
</script>
<?php

$movieTitle = "Jurassic World: Fallen Kingdom";
$releaseDate = "7-06-2018";
$genre = "Action, Adventure, Science Fiction";
$duration = "128 minutes";
$cast = array(
    array("name" => "Bryce Dallas Howard", "image" => "assets/img/BryceDallas.jpg"),
    array("name" => "Chris Pratt", "image" => "assets/img/Chris_Pratt.jpg"),
    array("name" => "Toby Jones", "image" => "assets/img/Toby_Jones.jpg"),
    array("name" => "Rafe Spall", "image" => "assets/img/rafe_spall.jpg")
);
$trailerUrl = "https://www.youtube.com/embed/CkAf_qzHNwo";


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $movieTitle; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #000;
        }
        .movie-title-container {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 20px;
        }
        .movie-title {
            text-align: center;
            font-size: 50px;
            color: #0074b7;
            margin: 0;
            font-weight: bold;
        }
        .content {
            display: flex;
            align-items: stretch;
        }
        .poster {
            flex: 1;
            margin-right: 20px;
        }
        .poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .details-container {
            flex: 2;
            padding: 20px;
            background-color: #fff;
            color: #000;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .details h2 {
            margin-top: 0;
            font-weight: normal;
        }
        .rating {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .rating i {
            color: #0074b7;
            margin-right: 5px;
        }
        .icons {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .icons img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        .buy-tickets {
            text-align: center;
            background-color: #0074b7;
            padding: 10px;
            margin: 20px 0;
            font-size: 40px;
        }
        .trailer {
            text-align: center;
            border: 5px solid #0074b7;
            padding: 10px;
        }
        .trailer iframe {
            width: 100%;
            height: 400px;
        }
        .cast {
            display: flex;
            margin-top: 10px;
        }
        .cast img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="movie-title-container">
            <div class="movie-title">
                <?php echo $movieTitle; ?>
            </div>
        </div>
        <div class="content">
            <div class="poster">
                <img alt="<?php echo $movieTitle; ?> movie poster" src="assets/img/Jurassic-World_-Fallen-Kingdom.jpg"/>
            </div>
            <div class="details-container">
                <div>
                    <div class="rating">
                        <?php for ($i = 0; $i < 4; $i++) { ?>
                            <i class="fas fa-star"></i>
                        <?php } ?>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="icons">
                        <img alt="Ages 12 and up logo" height="30" src="assets/img/kijkwijzer-12.png" title="Ages 12 and up" width="30"/>
                        <img alt="Fear logo" height="30" src="assets/img/kijkwijzer-eng.png" title="Fear" width="30"/>
                        <img alt="Violence logo" height="30" src="assets/img/kijkwijzer-geweld.png" title="Violence" width="30"/>
                    </div>
                    <h2>
                        Release: <?php echo $releaseDate; ?>
                    </h2>
                    <p style="font-size: 27px;">
                        In JURASSIC WORLD: FALLEN KINGDOM, four years have passed since the theme park and luxury resort Jurassic World was destroyed by dinosaurs out of containment. 
                        Isla Nublar is now abandoned by humans while the surviving dinosaurs fend for themselves in the jungles. When the island's dormant volcano begins roaring to life, 
                        Owen (Chris Pratt) and Claire (Bryce Dallas Howard) mount a campaign to rescue the remaining dinosaurs from this extinction-level event. Owen is driven to find Blue, 
                        his lead raptor who's still missing in the wild, and Claire has grown a respect for these creatures she now makes her mission. Arriving on the unstable island as lava begins raining down, 
                        their expedition uncovers a conspiracy that could return our entire planet to a perilous order not seen since prehistoric times.
                    </p>
                    <p>
                        <strong>
                            Genre:
                        </strong>
                        <?php echo $genre; ?>
                    </p>
                    <p>
                        <strong>
                            Duration:
                        </strong>
                        <?php echo $duration; ?>
                    </p>
                    <p>
                        <strong>
                            Cast:
                        </strong>
                    </p>
                    <div class="cast">
                        <?php for ($i = 0; $i < count($cast); $i++) { ?>
                            <img alt="<?php echo $cast[$i]['name']; ?>" height="50" src="<?php echo $cast[$i]['image']; ?>" width="50"/>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="buy-tickets">
        <a href="bestel.php"> KOOP JE TICKETS</a>  
        </div>
        <div class="trailer">
            <iframe allowfullscreen="" frameborder="0" src="<?php echo $trailerUrl; ?>">
            </iframe>
        </div>
    </div>
</body>
</html>
<?php include "footer.php"; ?>