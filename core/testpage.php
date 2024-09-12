<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Info</title>
    <link rel="stylesheet" href="styles.css">
</head>
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
                    <img src="./asstes/img/BryceDallas.jpg" alt="Bryce Dallas Howard">
                    <p>Bryce Dallas Howard</p>
                </div>
                <div class="actor">
                    <img src="./asstes/img/Chris_Pratt.jpg" alt="Chris Pratt">
                    <p>Chris Pratt</p>
                </div>
                <div class="actor">
                    <img src="./asstes/img/rafe_spall.jpg" alt="Rafe Spall">
                    <p>Rafe Spall</p>
                </div>
                <div class="actor">
                    <img src="./asstes/img/Tonyn_Jones.jpg" alt="Toby Jones">
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
    border-radius: 50%;
    height: auto;
}

.actor p {
    margin-top: 8px;
    font-size: 14px;
}


</style>