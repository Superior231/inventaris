<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @include('components.style')
</head>
<body>
    @include('components.navbar')
    <h1>Home</h1>
    {{ Auth::user()->name }}
    {{ Auth::user()->roles }}

    @include('components.script')
</body>
</html>