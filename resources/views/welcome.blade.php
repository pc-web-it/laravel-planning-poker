<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')

    <title>Scrum Poker</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>


        body {
            background-image: url('/assets/table.jpg');
            background-size: cover;
            
        }

        .heading{
            text-shadow: 0 0 3px #3054ee, 0 0 5px #0000FF;

        }

        .btn{
            background: rgb(75,220,235);
background: linear-gradient(180deg, rgba(75,220,235,1) 0%, rgba(35,82,231,1) 100%);
        }

        .btn:hover{
            background: rgb(75,220,235);
background: linear-gradient(0deg, rgba(75,220,235,1) 0%, rgba(35,82,231,1) 100%);
        }


    </style>

</head>

<body>

<div class="flex flex-col items-center justify-center h-screen">
        <h1 class="heading text-5xl text-white font-bold mt-20">Welcome to Scrum Poker</h1>
        <div class="flex flex-row">
            <a href="{{ route('new-game') }}" class="btn mr-12 border border-cyan-700  rounded-lg  text-xl mt-12 p-3 text-white">Start New Game</a>
            <a href="{{ route('join-existing-game') }}" class="btn border border-cyan-700  rounded-lg text-xl mt-12 p-3 text-white">Join Existing Game</a>
        </div>
    </div>


</body>

</html>