<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/jpeg" href="{{ asset('image/image_bar.jpeg') }}">
    <title>RIP MEME!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-white min-h-screen">
    <nav class="bg-gray-900 px-6 py-4 flex justify-center items-center">
        <a href="/memes" class="flex items-center gap-2 text-2xl font-bold">
            <img src="{{ asset('image/image_bar.jpeg') }}" class="w-20 h-20">RIP MEME</a>
    </nav>
    <div class="bg-gray-700 px-6 py-2 text-sm text-gray-300 text-center">
        Dengan melihat list meme ini, kamu sudah membuang waktumu sebanyak 
        <span id="timer" class="font-bold">00:00:00</span>
    </div>
    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <script>
        if (!sessionStorage.getItem('startTime')) {
            sessionStorage.setItem('startTime', Date.now())
        }

        function Timer() {
            const start = parseInt(sessionStorage.getItem('startTime'));
            const seconds = Math.floor((Date.now() - start) / 1000)
            const h = String(Math.floor(seconds / 3600)).padStart(2, '0');
            const m = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
            const s = String(seconds % 60).padStart(2, '0');
            document.getElementById('timer').textContent = `${h}:${m}:${s}`;
        };

        Timer();
        setInterval(Timer, 1000);
    </script>
</body>
</html>