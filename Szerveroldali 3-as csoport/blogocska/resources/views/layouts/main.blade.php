<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogocska - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-3 text-4xl text-cyan-600 py-4 font-custom">
                Blogocska
            </div>
            <div class="col-span-2">
                @yield('content')
            </div>
            <div class="col-span-1">
                Sidebar.
            </div>
        </div>
    </div>
</body>
</html>
