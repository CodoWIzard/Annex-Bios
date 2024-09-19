<?php include "header.php"; ?>

  <title>Film Agenda</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>


  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: black; /*url('./assets/img/header_afbeelding.jpg');*/ 
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
      background-color: #4596BA; 
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
      justify-content: flex-start; /* Align movies to the left */
    }
    .movie-card {
      background-color: white;
      border: 1px solid #ddd;
      width: calc(16.66% - 20px); /* Adjusted for 6 cards per row */
      box-sizing: border-box;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px; /* Added margin for spacing between rows */
    }
    .movie-card img {
      width: 100%;
      height: auto; /* Ensure images maintain aspect ratio */
      display: block; /* Prevents whitespace issues */
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
      background-color: #4596BA;
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

    <div class="movie-grid" id="movie-grid"></div>


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
    // Access array in data field
    const movies = data.data;

    // Dynamics
    const movieGrid = document.getElementById('movie-grid');

    movies.forEach(movie => {
    const movieCard = document.createElement('div');
    movieCard.classList.add('movie-card');

    movieCard.innerHTML = `
        <img alt="${movie.title}" height="300" src="${movie.image}" width="200" />
        <div class="details">
            <h3>${movie.title}</h3>
            <p>Release: ${movie.release_date}</p>
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
  </div>
</body>
</html>

<?php include "footer.php"; ?>
