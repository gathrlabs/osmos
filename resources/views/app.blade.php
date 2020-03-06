<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>osmos - Discover unique educational experiences</title>
        <link href="/css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">


    </head>
    <body style="background-color: rgb(255, 253, 250)">
        <div class="font-sans text-lg" id="app">
            <navigation></navigation>
            <main>
                <div class="mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="px-4 py-6 sm:px-0">
                        <router-view></router-view>
                    </div>
                </div>
            </main>
        </div>

        <script src="/js/app.js"></script>
        <script>

        </script>
    </body>
</html>
