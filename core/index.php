<?php include "header.php"; ?>



<div class="main">
    <div class="header-image">
        <div class="background-image"></div>
        <div class="black-background"></div>
    </div>
   
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #800000;
            font-family: sans-serif;
        }

        .welcome-container {
            background-color: #4682B4;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .welcome-title {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .welcome-text {
            font-size: 1.2em;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .welcome-button {
            background-color: #fff;
            color: #4682B4;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
        }
    </style>
<body>
    <div class="welcome-container">
        <h1 class="welcome-title">WELKOM BIJ ANNEXBIOS 5</h1>
        <p class="welcome-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</p>
        <button class="welcome-button">BEKIJK DE DRAAIENDE FILMS</button>
    </div>

    

    <style>
        .header-image {
            position: relative;
            background-size: cover;
            height: 300px;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #f0f0f0;
            background: url('');
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

    
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('./assets/img/header_afbeelding.jpg');
            filter: brightness(50%);
            background-size: cover;
        }

        .black-background {
            position: flex;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            display: none;
        }

        .header p {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .content {
            display: flex;
            gap: 20px;
            justify-content: space-between;
            flex-direction: row;
        }

        .info {
            width: 40%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .info h2 {
            margin: 0;
        }

        .info p {
            margin: 10px 0;
        }

        .map {
            width: 50%;
            border-radius: 10px;
        }

        .image {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
        }

        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }

            .info,
            .map {
                width: 100%;
            }
        }
    </style>

    <body>



</div>
</body>

</html>

</div>

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
                    <img alt="<?php echo $movie['title']; ?>" height="300" src="<?php echo $movie['image']; ?>" width="200" />
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
                        <a class="btn" href="detailpagina.php">LEES MEER & TICKETS</a> <!-- hier komt detailpagina link -->
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <a class="btn" href="filmagenda.php">LEES MEER</a>	
    <?php include "footer.php"; ?>

    <script>
        window.addEventListener('scroll', function() {
            if (window.scrollY > 0) {
                document.querySelector('.black-background').style.display = 'block';
                document.querySelector('.background-image').style.display = 'none';
            } else {
                document.querySelector('.black-background').style.display = 'none';
                document.querySelector('.background-image').style.display = 'block';
            }
        });
        </script>