<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/blog.css') }}" />
    <link rel="stylesheet" href="resources/assets/fonts/style.css">
</head>
<body class="blog-container">
@include('partials.head')
<main class="main">
    @include('partials.detailPost')
    @include('partials.sidebar')
</main>
</body>
</html>

