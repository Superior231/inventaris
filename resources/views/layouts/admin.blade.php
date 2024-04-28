<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @include('components.style')
    @stack('style')
</head>

<body class="bg-soft-blue">

    @include('components.navbar')

    <main class="py-4">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    @include('components.script')
    @stack('script')
    
</body>

</html>