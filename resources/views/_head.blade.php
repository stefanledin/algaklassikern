<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="shortcut icon" href="/favicon.png" type="image/png">  

    <meta property="og:title" content="{{ env('APP_NAME') }}">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:description" content="Skidåkning · Cykling · Simning · Löpning">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/img/share.png">
</head>