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
        <div class="grid grid-cols-3">
            <div class="col-span-3 text-3xl text-green-500 font-bold font-shadows py-4">
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
