<?php include "header.php";?>



<div class="main">

<div class="header-image">
        <img alt="Header image" src="/assets/img/header_afbeelding.jpg" width="100%">
    </div>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
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

            .info, .map {
                width: 100%;
            }
        }
    </style>
<body>
    <div class="container">
        <div class="header">
            <h1>WELKOM BIJ ANNEXBIOS 5</h1>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient </p>
            <button>BEKIJK DE DRAAIENDE FILMS</button>
        </div>

        <div class="content">
            <div class="info">
                <h2>Contact Informatie</h2>
                <p>Rijksstraatweg 42</p>
                <p>3223 KA Hellevoetsluis</p>
                <p>020-12345678</p>
            </div>

            <div class="map">
                <img src="../assets/img/screenshot 2024-09-04 131211.png" alt="Map" class="image">
            </div>
        </div>

        <div class="image">
            <img src="../assets/img/gebouw.png" alt="Cinema" class="image">
        </div>
    </div>
</body>
</html>

</div>

<?php include "filmagenda.php";?>

<?php include "footer.php";?>