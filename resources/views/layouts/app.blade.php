<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <script src="https://cdn.tailwindcss.com/%22%3E"></script>
    <title>Posty</title>
</head>
<body class="bg-slate-900">
    <nav class="p-6  flex justify-between mb-4">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3 font-semibold text-zinc-400">Home</a>
            </li>
            @auth
            <li>
                <a href="{{route('dashboard')}}" class="p-3 font-semibold text-zinc-400">Dashboard</a>
            </li>
            <li>
                <a href="{{route('posts')}}" class="p-3 font-semibold text-zinc-400">Post</a>
            </li>
            @endauth
        </ul>

        <ul class="flex items-center">
           @auth 
            <li>
                <a href="" class="p-3">{{auth()->user()->name}}</a>
            </li>
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                <button type="submit" class="p-3 text-zinc-400">Logout</button>
                </form>
            </li>
           @endauth
           @guest
               
            <li>
                <a href="{{route('login')}}" class="px-4 py-3 rounded-lg text-white font-semibold bg-blue-500 ">Login</a>
            </li>
            <li>
                <a href="{{route('register')}}" class="py-3 px-4 rounded-lg text-white font-semibold bg-green-400 ml-2">Register</a>
            </li>
            @endguest
        </ul>
    </nav>
     @yield('content')
</body>
</html>