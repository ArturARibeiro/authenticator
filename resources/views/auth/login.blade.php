<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - Authorization</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <style>
        html, body {
            display: flex;
            flex-direction: column;
            font-family: Roboto, sans-serif;
            height: 100%;
            margin: 0;
        }

        .main {
            flex: 1;
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .authorization {
            background: #fff;
            border: solid 1px #e0e0e0;
            border-radius: .5rem;
            width: clamp(300px, 25vw, 420px);
        }

        .authorization > :first-child {
            border-radius: .5rem .5rem 0 0;
        }

        .authorization > :last-child {
            border-radius: 0 0 .5rem .5rem;
        }

        .authorization__header {
            padding: .75rem 1rem;
            border-bottom: solid 1px #eee;
            display: flex;
            justify-content: center;
        }

        .authorization__body {
            padding: 1rem;
            background: #f8f8f8;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }

        .authorization__label {
            font-size: .75rem;
            display: flex;
            flex-direction: column;
            gap: .125rem;
        }

        .authorization__input {
            border: solid 1px #eee;
            background: #fff;
            padding: .75rem 1rem;
            border-radius: .5rem;
        }

        .authorization__footer {
            border-top: solid 1px #eee;
            padding: .5rem;
            display: flex;
            gap: .5rem;
        }

        .authorization__button {
            border: solid 1px #eee;
            background: #fff;
            padding: .5rem 1rem;
            border-radius: .5rem;
            cursor: pointer;
            flex: 1;
        }

        .authorization__button--primary {
            background: slategray;
            color: white;
        }
    </style>
</head>
<body>
<main class="main">
    <form method="POST" action="/attempt" class="authorization">
        <div class="authorization__header">
            Authenticator Login
        </div>
        <div class="authorization__body">
            @csrf
            <label for="email" class="authorization__label">
                E-mail
                <input type="email" name="email" class="authorization__input" placeholder="example@domain.com" required/>
            </label>
            <label for="email" class="authorization__label">
                Password
                <input type="email" name="email" class="authorization__input" placeholder="example@domain.com" required/>
            </label>
        </div>
        <div class="authorization__footer">
            <button type="submit" class="authorization__button authorization__button--primary">Access</button>
        </div>
    </form>
</main>
</body>
</html>
