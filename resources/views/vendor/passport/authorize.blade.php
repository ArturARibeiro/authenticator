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
            padding: .5rem 1rem;
            border-bottom: solid 1px #eee;
            display: flex;
            justify-content: center;
        }

        .authorization__body {
            padding: 1rem;
            background: #f8f8f8;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .authorization__application {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #828282;
            position: relative;
            margin-top: -3rem;
            gap: 1rem;
        }

        .authorization__avatar {
            width: 6.5rem;
            height: 6.5rem;
            border-radius: .5rem;
            border: solid 1px #e0e0e0;
            background: #e8e8e8;
        }

        .authorization__message {
            line-height: 1.4;
            color: #404040;
        }

        .authorization__scopes {

        }

        .authorization__footer {
            border-top: solid 1px #eee;
            padding: .5rem;
            display: flex;
            gap: .5rem;
        }

        .authorization__form {
            display: flex;
            flex: 1;
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
        <div class="authorization">
            <div class="authorization__body">
                <div class="authorization__application">
                    <div class="authorization__avatar"></div>
                    ....
                    <div class="authorization__avatar"></div>
                </div>

                <div class="authorization__message">
                    The external application <strong>{{ $client->name }}</strong> wants to access your profile data, authorize it to provide access.
                </div>

                @if (count($scopes) > 0)
                    <div class="authorization__scopes">
                        <p><strong>This application will be able to:</strong></p>

                        <ul>
                            @foreach ($scopes as $scope)
                                <li>{{ $scope->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="authorization__footer">
                <form method="post" action="{{ route('passport.authorizations.deny') }}" class="authorization__form">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="state" value="{{ $request->state }}">
                    <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
                    <input type="hidden" name="auth_token" value="{{ $authToken }}">
                    <button type="submit" class="authorization__button">Cancel</button>
                </form>

                <form method="post" action="{{ route('passport.authorizations.approve') }}" class="authorization__form">
                    @csrf

                    <input type="hidden" name="state" value="{{ $request->state }}">
                    <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
                    <input type="hidden" name="auth_token" value="{{ $authToken }}">
                    <button type="submit" class="authorization__button authorization__button--primary">Authorize</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
