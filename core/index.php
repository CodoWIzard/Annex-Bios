<?php include "header.php"; ?>

<script>
fetch('https://annexbios.nickvz.nl/api/v1/movieData', {
    headers: {
        'Authorization': 'Bearer 0be8d9266c188d1e2e2550f41b7ba5f965c8daa4046c3a62f996e5547ac834b7', // Replace 'token' with your actual token
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
    // Access the array in the `data` field
    const movies = data.data;

    // Dynamically create movie cards
    const movieGrid = document.getElementById('movie-grid');

    movies.forEach(movie => {
        const movieCard = document.createElement('div');
        movieCard.classList.add('movie-card');

        // Assuming the movie has a title and image fields
        movieCard.innerHTML = `
            <img alt="${movie.title}" height="300" src="path/to/image" width="200" />
            <div class="details">
                <h3>${movie.title}</h3>
                <p>Release: ${movie.release}</p>
                <p class="rating">
                    ${generateStars(movie.rating)}
                </p>
                <a class="btn" href="detailpagina.php?id=${movie.api_id}">LEES MEER & TICKETS</a>
            </div>
        `;

        movieGrid.appendChild(movieCard);
    });
})
.catch(error => {
    console.error('There was a problem with the fetch operation:', error);
});

// Helper function to generate star ratings
function generateStars(rating) {
    let starsHtml = '';
    for (let i = 0; i < Math.floor(rating); i++) {
        starsHtml += '<i class="fas fa-star"></i>';
    }
    if (rating - Math.floor(rating) > 0) {
        starsHtml += '<i class="fas fa-star-half-alt"></i>';
    }
    return starsHtml;
}

</script>

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

        <div class="movie-grid" id="movie-grid">
    <!-- Movie cards will be injected here by JavaScript -->
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