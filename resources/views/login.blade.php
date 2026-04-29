@extends('layouts.app')

@section('content')
    <div class="w-full max-w-md">

        <x-auth-card title="Login">

            <form method="POST" action="/login">
                @csrf

                {{-- Email  --}}
                <div class="mb-3">
                    <input name="email" type="email" placeholder="Email" value="{{ old('email') }}"
                        class="w-full p-2 border rounded @error('email') border-red-500 @enderror">

                    @error('email')
                        <p class="text-red-500 text-sm mt-0">{{ $message }}</p>
                    @enderror
                </div>

                 {{-- Password --}}
                <div class="mb-3">
                    <input name="password" type="password" placeholder="Password"
                        class="w-full p-2 border rounded @error('password') border-red-500 @enderror">

                    @error('password')
                        <p class="text-red-500 text-sm mt-0">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Login error (invalid credentials)  --}}
                @if (session('error'))
                    <p class="text-red-500 text-sm mb-3">
                        {{ session('error') }}
                    </p>
                @endif

                <button class="w-full bg-green-500 text-white p-2 rounded">
                    Login
                </button>

            </form>

        </x-auth-card>

    </div>
@endsection
