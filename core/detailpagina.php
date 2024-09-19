<?php include "header.php"; ?>

<?php
// Get movie ID from the URL
$movie_id = isset($_GET['id']) ? $_GET['id'] : null;

// Check if movie ID is present
if (!$movie_id) {
    echo "No movie selected.";
    exit;
}

// API URL to fetch movie details based on movie_id
$api_url = "https://annexbios.nickvz.nl/api/v1/movieData/$movie_id";
$token = "0be8d9266c188d1e2e2550f41b7ba5f965c8daa4046c3a62f996e5547ac834b7";

// Initialize a cURL session to fetch data from the API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $token"
));

// Execute the cURL session and get the response
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response into a PHP array
$movieData = json_decode($response, true);

// Check if movie data was fetched successfully
if (!$movieData || isset($movieData['error'])) {
    echo "Error fetching movie data.";
    exit;
}

// Extract movie details from the API response
$movieTitle = $movieData['data']['title'];
$releaseDate = $movieData['data']['release_date'];
$genre = implode(", ", $movieData['data']['genres']);  // Assuming genres are returned as an array
$duration = $movieData['data']['duration'];
$cast = $movieData['data']['cast'];  // Assuming this is an array of actors
$trailerUrl = $movieData['data']['trailer_link'];  // Trailer URL
$rating = $movieData['data']['rating'];
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $movieTitle; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Your existing styles here */
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
                <img alt="<?php echo $movieTitle; ?> movie poster" src="<?php echo $movieData['data']['image']; ?>"/>
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
                    <div class="icons">
                        <img alt="Ages 12 and up logo" height="30" src="assets/img/kijkwijzer-12.png" title="Ages 12 and up" width="30"/>
                        <img alt="Fear logo" height="30" src="assets/img/kijkwijzer-eng.png" title="Fear" width="30"/>
                        <img alt="Violence logo" height="30" src="assets/img/kijkwijzer-geweld.png" title="Violence" width="30"/>
                    </div>
                    <h2>
                        Release: <?php echo $releaseDate; ?>
                    </h2>
                    <p style="font-size: 27px;">
                        <?php echo $movieData['data']['description']; ?>  <!-- Assuming the API returns a movie description -->
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
                        <?php echo $duration; ?> minutes
                    </p>
                    <p>
                        <strong>
                            Cast:
                        </strong>
                    </p>
                    <div class="cast">
                        <?php foreach ($cast as $actor) { ?>
                            <img alt="<?php echo $actor['name']; ?>" height="50" src="<?php echo $actor['image']; ?>" width="50"/>
                            <p><?php echo $actor['name']; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="buy-tickets">
            <a href="bestel.php">KOOP JE TICKETS</a>  
        </div>
        <div class="trailer">
            <iframe allowfullscreen="" frameborder="0" src="<?php echo $trailerUrl; ?>"></iframe>
        </div>
    </div>
</body>
</html>

<?php include "footer.php"; ?>
