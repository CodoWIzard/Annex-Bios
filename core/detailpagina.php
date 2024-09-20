<?php include "header.php"; ?>
<?php
$movieId = $_GET['id'];

$apiUrl = 'https://annexbios.nickvz.nl/api/v1/movieData';
$apiKey = '0be8d9266c188d1e2e2550f41b7ba5f965c8daa4046c3a62f996e5547ac834b7';

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $apiKey
));

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

$movies = $data['data'];

$movie = null;
foreach ($movies as $m) {
    if ($m['api_id'] == $movieId) {
        $movie = $m;
        break;
    }
}

if ($movie) {
    $movieTitle = $movie['title'];
    $releaseDate = $movie['release_date'];
    $genre = [];
    $length = $movie['length'];
    $trailer_link = $movie['trailer_link'];
    $rating = $movie['rating'];
    $image = $movie['image'];
    $description = $movie['description'];
} else {
    // Handle the case where the movie is not found
    $movieTitle = 'Movie not found';
    $releaseDate = '';
    $genre = '';
    $duration = '';
    $cast = array();
    $rating = 0;
    $image = '';
    $description = '';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $movieTitle; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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
                <img alt="<?php echo $movieTitle; ?> movie poster" src="<?php echo $image; ?>" />
            </div>
            <div class="details-container">
                <div>
                    <div class="rating">
                        <?php for ($i = 0; $i < floor($rating); $i++) { ?>
                            <i class="fas fa-star"></i>
                        <?php } ?>
                        <?php if ($rating - floor($rating) > 0) { ?>
                            <i class="fas fa-star-half-alt"></i>
                        <?php } ?>
                    </div>
                    <h2>
                        Release: <?php echo $releaseDate; ?>
                    </h2>
                    <p>
                        <?php echo $description; ?>
                    </p>

                    <p>
                        Duration: <?php echo $length; ?>
                    </p>
                    <p>
                        Cast:
                    </p>
                    <div class="cast">


                    </div>
                </div>
            </div>
        </div>
        <div class="buy-tickets">
            <a href="bestel.php?id=<?php echo $movieId; ?>">KOOP JE TICKETS</a>
        </div>
        <div class="trailer">
        <iframe crossorigin="anonymous" allowfullscreen="" frameborder="0" src="<?php echo $trailer_link; ?>"></iframe>
        </div>
    </div>
</body>


</html>
<?php include "footer.php"; ?>