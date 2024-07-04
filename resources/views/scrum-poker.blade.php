<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <title>Scrum Poker</title>

    <style>
        body {
            background-image: url('/assets/bg.jpg');
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;

        }

        .container {
            display: grid;
            gap: 20px;
            justify-items: center;
            align-items: center;
            height: 100%;
        }

        .centered-div {
            width: 400px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .cards {
            width: 100%;
        }

        .selected-container {
            position: relative;
            top: 20px;
            left: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 800px;
        }


        .left-container {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-self: start;
            flex-direction: column;
            gap: 10px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 180px;

        }

        .room-link {
            font-size: 14px;
            color: #333;
        }

        .cardAv {
            width: 100px;
            height: 150px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s;
            border-width: 2px;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-container {
            perspective: 1000px;

        }

        .card {
            width: 80px;
            height: 110px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .card.flip {
            transform: rotateY(180deg);
        }

        .card .front,
        .card .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .card .front {
            background-color: white;
        }

        .card .back {
            background-image: url('/assets/bcard.png');
            background-size: cover;
            transform: rotateY(180deg);
        }

        .cardCont {
            width: 80%;
        }

        .cardSize {

            width: 30%;
            height: 100%;
            /* padding-left: 1.5rem;
            padding-right: 1.5rem; */
            padding-top: 2rem;
            padding-bottom: 2rem;

        }

        #participants-list {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 3%;
            margin-bottom: 3%;
        }

        .btn {
            background: rgb(75, 220, 235);
            background: linear-gradient(180deg, rgba(75, 220, 235, 1) 0%, rgba(35, 82, 231, 1) 100%);
            padding: 0.5rem;
            border-width: 2px;
            border-radius: 10px;
            color: white;
        }

        .btn:hover {
            background: rgb(75, 220, 235);
            background: linear-gradient(0deg, rgba(75, 220, 235, 1) 0%, rgba(35, 82, 231, 1) 100%);
        }

        .heading {

            font-size: 2rem;
            font-weight: bold;
            text-shadow: 0 0 3px #3054ee, 0 0 5px #0000FF;

        }

        .btnSm {
            background: rgb(0,99,36);
background: linear-gradient(0deg, rgba(0,99,36,1) 0%, rgba(62,172,89,1) 100%);
            padding: 0.5rem;
            border-width: 2px;
            border-radius: 10px;
            color: white;
        }

        .btnSm:hover {
            background: rgb(0,99,36);
background: linear-gradient(180deg, rgba(0,99,36,1) 0%, rgba(62,172,89,1) 100%);
        }

    </style>
</head>

<body>

    <div class="left-container">
        <a href="{{ route('new-game') }}" class="btn border border-cyan-600  rounded-lg text-md text-white">Start New Game</a>
        <p class="flex justify-center mt-3">Room Link:</p>
        <p class="room-link flex justify-center ">
            <button onclick="showGameLink()" class="btnSm border border-emerald-700">Copy Game Link</button>
        </p>
    </div>

    <div class="container">
        <!-- AVERAGE -->
        <!-- <div class="centered-div flex flex-col">
        <p class="mb-4">Average:</p>
        <p id="averageCard" class="cardAv front text-2xl border rounded-xl">#</p>
    </div> -->



        <!-- SELECTED CARDS -->

        <div class="selected-container">

            <p class=" text-2xl font-bold flex justify-center ">Participants:</p>
            <ul id="participants-list">
                @foreach ($participants as $participant)
                <li class="ml-3 mr-3 ">
                    <span class="flex justify-center text-lg">{{ $participant['name'] }}</span>
                    <div class="card-container ">
                        <div class="card flip" id="card-{{ $participant['name'] }}">
                            <div class="front ">
                                @if (isset($participant['selectedCard']))
                                @if ($participant['selectedCard'] === 'Coffee')
                                <img src="/assets/coffee.png" alt="coffee" width="60">
                                @elseif ($participant['selectedCard'] === '?')
                                <span>{{ $participant['selectedCard'] }}</span>
                                @else
                                <span>{{ $participant['selectedCard'] }}</span>
                                @endif
                                @else
                                <span class="ml-2">No card selected</span>
                                @endif
                            </div>
                            <div class="back"></div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>



        <!-- CARDS LIST -->
        <div class="cards flex flex-col justify-center items-center h-full">
            <p class="heading mb-8 text-white">Choose your card</p>
            <ul class="cardCont flex flex-row justify-center items-center mb-4">
                @foreach ([0, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, '?', 'Coffee'] as $card)
                <li class="cardSize text-xl border rounded-md m-2 bg-white flex justify-center">
                    <button onclick="selectCard('{{ $card }}')">
                        @if ($card === 'Coffee')
                        <img src="/assets/coffee.png" alt="coffee" width="60">
                        @elseif ($card === '?')
                        <span>{{ $card }}</span>
                        @else
                        <span>{{ $card }}</span>
                        @endif
                    </button>
                </li>
                @endforeach
            </ul>
            <button onclick="revealCards()" class="btn border border-cyan-700  rounded-lg text-2xl mt-5 text-white">Reveal Cards</button>
        </div>


    </div>

    <script>
        function selectCard(card) {
            const code = "{{ $code }}";
            const participantName = "{{ session('participantName') }}";

            fetch('/select-card', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        code: code,
                        name: participantName,
                        card: card
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const participantsList = document.getElementById('participants-list');
                        participantsList.innerHTML = '';

                        let total = 0;
                        let count = 0;
                        let selectedCards = [];
                        let coffeeCount = 0;
                        let questionMarkCount = 0;

                        data.participants.forEach(participant => {
                            const li = document.createElement('li');
                            li.innerHTML = `
                        <span class="flex justify-center text-lg">${participant.name}:</span>
                        <div class="card-container ml-3 mr-3">
                            <div class="card flip" id="card-${participant.name}">
                                <div class="front">
                                    ${participant.selectedCard ? (participant.selectedCard === 'Coffee' ? '<img src="/assets/coffee.png" alt="coffee" width="60">' : (participant.selectedCard === '?' ? '<span>?</span>' : `<span>${participant.selectedCard}</span>`)) : '<span>No card selected</span>'}
                                </div>
                                <div class="back"></div>
                            </div>
                        </div>
                    `;
                            participantsList.appendChild(li);

                            // Sammeln der ausgewählten Karten und Zählen von Coffee und Fragezeichen
                            if (participant.selectedCard) {
                                selectedCards.push(parseFloat(participant.selectedCard));
                                if (participant.selectedCard === 'Coffee') {
                                    coffeeCount++;
                                } else if (participant.selectedCard === '?') {
                                    questionMarkCount++;
                                } else {
                                    total += parseFloat(participant.selectedCard);
                                    count++;
                                }
                            }
                        });

                        // Bestimmung des Mittelwerts oder Anzeige von Coffee oder Question Mark
                        let averageOrCoffee = '';
                        if (coffeeCount >= data.participants.length / 2) {
                            averageOrCoffee = 'Coffee';
                        } else if (questionMarkCount >= data.participants.length / 2) {
                            averageOrCoffee = '?';
                        } else {
                            // Berechnung des Durchschnitts
                            let average = 0;
                            if (count > 0) {
                                average = total / count;
                            }

                            // Mögliche Kartenwerte
                            const cardValues = [0, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89];

                            // Nächstgelegener Wert zum Durchschnitt
                            let closestValue = '';
                            let smallestDifference = Number.MAX_VALUE;

                            cardValues.forEach(value => {
                                const difference = Math.abs(value - average);
                                if (difference < smallestDifference) {
                                    smallestDifference = difference;
                                    closestValue = value;
                                }
                            });

                            averageOrCoffee = closestValue;
                        }

                        document.getElementById('averageCard').innerHTML = averageOrCoffee === 'Coffee' ? '<img src="/assets/coffee.png" alt="coffee" width="60">' : (averageOrCoffee === '?' ? '<span>?</span>' : averageOrCoffee);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function revealCards() {
            document.querySelectorAll('.card').forEach(card => {
                card.classList.remove('flip');
            });
        }

        function showGameLink() {
            var gameLink = "{{ route('join-existing-game', ['code' => $code]) }}";
            Swal.fire({
                title: 'Game Link',
                imageUrl: "/assets/link.png",
                imageWidth: 200,
                imageHeight: 320,
                imageAlt: "Custom image",
                html: `<p>Click the button below to copy the game link:</p><input type="text" id="gameLinkInput" value="${gameLink}" readonly>`,
                showCancelButton: true,
                confirmButtonText: 'Copy Link',
                cancelButtonText: 'Close',
                preConfirm: () => {
                    const gameLinkInput = document.getElementById('gameLinkInput');
                    gameLinkInput.select();
                    document.execCommand('copy');
                    Swal.fire('Copied!', 'The game link has been copied to your clipboard.', 'success');
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


</body>

</html>