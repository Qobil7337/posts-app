<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Post App</title>
</head>
<body class="bg-stone-200">
    <nav class="p-6 bg-white flex justify-between mb-2">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">Post</a>
            </li>
        </ul>
        <ul class="flex items-center">
{{--            @if(auth()->user())--}}
{{--                <li>--}}
{{--                    <a href="" class="p-3">Kobil Ashurov</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="" class="p-3">Logout</a>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li>--}}
{{--                    <a href="" class="p-3">Login</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    --}}{{--       same <a href="/register" class="p-3">Register</a>--}}
{{--                    <a href="{{ route('register')  }}" class="p-3">Register</a>--}}
{{--                </li>--}}
{{--            @endif--}}

{{--            Better way--}}
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register')  }}" class="p-3">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>
