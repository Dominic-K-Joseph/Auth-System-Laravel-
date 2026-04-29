<!DOCTYPE html>
<html>

<head>
    <title>Auth System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

     {{-- Navbar  --}}
    <div class="w-full bg-white shadow px-6 py-3 flex justify-between items-center">

         {{-- Logo (Left) --}}
        <div class="flex items-center gap-2">
            <div class="bg-blue-500 text-white px-3 py-1 rounded-lg font-bold">
                A
            </div>
            <span class="text-lg font-semibold text-gray-700">
                AuthApp
            </span>
        </div>

        {{-- Right Buttons --}}
        <div>
            @if (auth()->check())
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline">
                        Logout
                    </button>
                </form>
            @elseif(request()->is('login'))
                <a href="/register" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded">
                    Register
                </a>
            @elseif(request()->is('register'))
                <a href="/login" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-1 rounded">
                    Login
                </a>
            @endif
        </div>

    </div>

    {{-- Center Content --}}
    <div class="min-h-[90vh] flex items-center justify-center">
        @yield('content')
    </div>

</body>

</html>
