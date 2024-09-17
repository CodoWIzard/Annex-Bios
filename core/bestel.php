
<html>
<head>
    <title>Tickets Bestellen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: beige;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        
        .title-bar {
            background-color: #fff;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #000;
            width: 100%;
        }
        .title-bar h1 {
            margin: 0;
            color: #4596BA;
            display: inline-block;
        }

        .nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #4596BA;
        }
        .nav .nav-box {
            background-color: #fff;
            padding: 5px 10px;
            border: 1px solid #ccc;
            display: inline-block;
            margin-right: 10px;
            cursor: pointer;
            position: relative;
        }
        .content {
            width: 100%;
        }
        .sidebar {
            width: 25%;
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .sidebar img {
            width: 100%;
        }
        .step {
            margin: 20px 0;
        }
        .step h2 {
            color: #4596BA;
            border-bottom: 2px solid #4596BA;
            padding-bottom: 5px;
        }
        .step table {
            width: 100%;
            border-collapse: collapse;
        }
        .step table, .step th, .step td {
            border: 1px solid #ccc;
        }
        .step th, .step td {
            padding: 10px;
            text-align: left;
        }
        .step input[type="text"], .step input[type="number"] {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        .step select {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        .step .seats {
            text-align: center;
        }
        .step .seats div {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #4596BA;
            margin: 2px;
            cursor: pointer;
            position: relative;
            border-radius: 3px;
        }
        .step .seats .selected {
            background-color: #ffcc00;
        }
        .step .seats .reserved {
            background-color: #000;
        }
        .step .seats .handicapped::after {
            content: "\f29b";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #fff;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .step .payment-methods {
            display: flex;
            align-items: center;
        }
        .step .payment-methods img {
            width: 50px;
            margin: 5px;
        }
        .step .payment-methods button {
            margin-left: 10px;
            padding: 5px 10px;
            background-color: #4596BA;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .step .payment-methods label {
            display: flex;
            align-items: center;
        }
        .checkout {
            text-align: center;
            margin: 20px 0;
        }
        .blue-container {
            background-color: #4596BA;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;
        }
        .screen {
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
            color: #4596BA;
            width: 50%;
            margin: 0 auto;
        }
        .seat-legend {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .seat-legend div {
            display: flex;
            align-items: center;
            margin: 0 10px;
        }
        .seat-legend div span {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 5px;
            border-radius: 3px;
        }
        .seat-legend .free span {
            background-color: #4596BA;
        }
        .seat-legend .occupied span {
            background-color: #000;
        }
        .seat-legend .selected span {
            background-color: #ffcc00;
        }
        .movie-info {
            width: 100%;
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ccc;
            margin-top: 20px;
        }
        .movie-info img {
            width: 100%;
        }
        .movie-info h3 {
            margin: 10px 0;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .nav-box:hover .dropdown-content {
            display: block;
        }
        .blue-button {
            background-color: #4596BA;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        .border-blue {
            border: 2px solid #4596BA;
            padding:  25px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat');
            const saveButton = document.createElement('button');
            saveButton.textContent = 'Save Seats';
            saveButton.classList.add('blue-button');
            document.querySelector('.step').appendChild(saveButton);

            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    if (this.classList.contains('reserved')) return;
                    if (this.classList.contains('selected')) {
                        this.classList.remove('selected');
                    } else {
                        this.classList.add('selected');
                    }
                });
            });

            saveButton.addEventListener('click', function() {
                const selectedSeats = document.querySelectorAll('.seat.selected');
                const seatArray = Array.from(seats);
                let validSelection = true;

                selectedSeats.forEach(seat => {
                    const index = seatArray.indexOf(seat);
                    if (index > 0 && index < seatArray.length - 1) {
                        if (!seatArray[index - 1].classList.contains('selected') && !seatArray[index - 1].classList.contains('reserved') && !seatArray[index + 1].classList.contains('selected') && !seatArray[index + 1].classList.contains('reserved')) {
                            validSelection = false;
                        }
                    }
                });

                if (!validSelection) {
                    alert('You cannot leave a seat in between free.');
                } else {
                    alert('Seats saved successfully.');
                    updateSelectedSeats();
                }
            });

            function updateSelectedSeats() {
                const selectedSeats = document.querySelectorAll('.seat.selected');
                const seatNumbers = Array.from(selectedSeats).map(seat => Array.from(seats).indexOf(seat) + 1);
                document.getElementById('seat-numbers').textContent = seatNumbers.join(', ');
            }

            const ticketInputs = document.querySelectorAll('input[type="number"]');
            const totalPriceElement = document.createElement('p');
            totalPriceElement.textContent = 'Totale Prijs: €0.00';
            document.querySelector('.step').appendChild(totalPriceElement);

            ticketInputs.forEach(input => {
                input.addEventListener('input', calculateTotal);
            });

            function calculateTotal() {
                let total = 0;
                ticketInputs.forEach(input => {
                    const price = parseFloat(input.closest('tr').querySelector('td:nth-child(2)').textContent.replace('€', ''));
                    const quantity = parseInt(input.value);
                    total += price * quantity;
                });
                totalPriceElement.textContent = `Totale Prijs: €${total.toFixed(2)}`;
                document.getElementById('total-price').textContent = `€${total.toFixed(2)}`;
            }
        });
    </script>
</head>
<body>
    <div class="title-bar">
        <h1>TICKETS BESTELLEN</h1>
    </div>
    <div class="header-nav">
        <div class="nav-box">
            <a href="#">JURASSIC WORLD</a>
        </div>
        <div class="nav-box">
            <a href="#">DATUM</a>
            <div class="dropdown-content">
                <a href="#">12 September 2024</a>
                <a href="#">13 September 2024</a>
                <a href="#">14 September 2024</a>
            </div>
        </div>
        <div class="nav-box">
            <a href="#">TIJD STIP</a>
            <div class="dropdown-content">
                <a href="#">19:30</a>
                <a href="#">20:30</a>
                <a href="#">21:30</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <div class="main">
                <div class="step">
                    <h2>STAP 1: KIES JE TICKET</h2>
                    <table>
                        <tr>
                            <th>TYPE</th>
                            <th>PRIJS</th>
                            <th>AANTAL</th>
                        </tr>
                        <tr>
                            <td>Volwassen</td>
                            <td>€10.00</td>
                            <td><input type="number" value="0"></td>
                        </tr>
                        <tr>
                            <td>Kinderen</td>
                            <td>€7.50</td>
                            <td><input type="number" value="0"></td>
                        </tr>
                        <tr>
                            <td>65+</td>
                            <td>€8.00</td>
                            <td><input type="number" value="0"></td>
                        </tr>
                    </table>
                    <input type="text" placeholder="VOUCHER CODE">
                    <button class="blue-button">TOEPASSEN</button>
                </div>
                <div class="step">
                    <h2>STAP 2: KIES JE STOEL</h2>
                    <div class="screen">FILM DOEK</div>
                    <div class="seats">
                        <?php for ($i = 0; $i < 120; $i++): ?>
                            <?php if ($i % 10 === 0): ?>
                                <br>
                            <?php endif; ?>
                            <?php if ($i % 15 === 0): ?>
                                <div class="seat reserved"></div>
                            <?php elseif ($i % 20 === 0): ?>
                                <div class="seat handicapped"></div>
                            <?php else: ?>
                                <div class="seat"></div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <div class="seat-legend">
                        <div class="free"><span></span>Vrij</div>
                        <div class="occupied"><span></span>Bezet</div>
                        <div class="selected"><span></span>Jouw Selectie</div>
                    </div>
                </div>
                <div class="step">
                    <h2>STAP 3: CONTROLEER JE BESTELLING</h2>
                    <div class="border-blue">
                        <img src="assets/img/Jurassic-World_-Fallen-Kingdom.jpg" alt="Movie poster of Jurassic World: Fallen Kingdom" style="float: left; margin-right: 10px;" width="100" height="150">
                        <h3>JURASSIC WORLD: FALLEN KINGDOM</h3>
                        <p>Genre: Actie, Avontuur, Sci-Fi</p>
                        <p>Speelduur: 2u 8m</p>
                        <p>Leeftijd: 12+</p>
                        <p>Prijs: <span id="total-price">€10.00</span></p>
                        <p>Seats: <span id="seat-numbers">None</span></p>
                        <p>Auditorium: 1</p>
                    </div>
                </div>
                <div class="step border-blue">
                    <h2>STAP 4: VUL JE GEGEVENS IN</h2>
                    <input type="text" placeholder="Voornaam">
                    <input type="text" placeholder="Achternaam">
                    <input type="text" placeholder="E-mailadres">
                </div>
                <div class="step">
                    <h2>STAP 5: KIES JE BETAALWIJZE</h2>
                    <div class="payment-methods">
                        <label>
                            <input type="radio" name="payment" value="visa">
                            <img src="assets/img/visa.png" alt="Visa logo" width="50" height="50">
                        </label>
                        <label>
                            <input type="radio" name="payment" value="mastercard">
                            <img src="assets/img/mastercard.png" alt="Mastercard logo" width="50" height="50">
                        </label>
                        <label>
                            <input type="radio" name="payment" value="ideal">
                            <img src="assets/img/ideal.png" alt="Ideal logo" width="50" height="50">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



<?php include "footer.php"; ?>