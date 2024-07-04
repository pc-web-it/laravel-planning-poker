<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Scrum Poker - Name Entry</title>

    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
        }

        html {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            width: 100%;
            height: 100%;
            font-family: 'Open Sans', sans-serif;
            background-image: url('/assets/name.jpg');
            background-size: cover;
        }

        .nameField {
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -110px 0 0 -150px;
            width: 300px;
            height: 250px;
        }

        .nameField h1 {
            color: #fff;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
            text-align: center;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            background: rgba(0, 0, 0, 0.3);
            border: none;
            outline: none;
            padding: 10px;
            font-size: 13px;
            color: #fff;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2), 0 1px 1px rgba(255, 255, 255, 0.2);
            -webkit-transition: box-shadow .5s ease;
            -moz-transition: box-shadow .5s ease;
            -o-transition: box-shadow .5s ease;
            -ms-transition: box-shadow .5s ease;
            transition: box-shadow .5s ease;
        }

        input:focus {
            box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.4), 0 1px 1px rgba(255, 255, 255, 0.2);
        }

        .nameBg {
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -150px 0 0 -150px;
            width: 400px;
            height: 250px;
            background-color: rgb(0, 75, 63, 70%);
            border-radius: 10px;
        }

        .heading {

            font-size: 2rem;
            font-weight: bold;
            margin-top: 5%;
            margin-bottom: 7%;

        }


        .btn {
            background: rgb(75, 220, 235);
            background: linear-gradient(180deg, rgba(75, 220, 235, 1) 0%, rgba(35, 82, 231, 1) 100%);
            padding: 2% 35% 2% 35%;
            margin-top: 5%;
        }

        .btn:hover {
            background: rgb(75, 220, 235);
            background: linear-gradient(0deg, rgba(75, 220, 235, 1) 0%, rgba(35, 82, 231, 1) 100%);
        }
    </style>

</head>

<body>

    <div class="nameBg">
        <div class="nameField">
            <h1 class="heading">Enter your name</h1>
            <form method="POST" action="{{ route('join') }}">
                @csrf
                <input type="text" name="name" placeholder="Name" required>
                <input type="hidden" name="code" value="{{ $link }}">
                <button type="submit" class="btn border border-cyan-800  rounded-lg text-xl text-white">Let me in</button>
            </form>
        </div>
    </div>


</body>

</html>