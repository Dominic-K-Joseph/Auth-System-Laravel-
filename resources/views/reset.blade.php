@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">
            {{ session('error') }}
        </div>
    @endif
    <div class="w-full max-w-md">

        <x-auth-card title="Reset Password">

            <form method="POST" action="/reset-password">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <input name="email" type="email" placeholder="Enter your email" value="{{ old('email') }}"
                        class="w-full p-2 border rounded @error('email') border-red-500 @enderror">

                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- New Password --}}
                <div class="mb-3">
                    <input name="password" type="password" placeholder="New Password"
                        class="w-full p-2 border rounded @error('password') border-red-500 @enderror">

                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <input name="password_confirmation" type="password" placeholder="Confirm Password"
                        class="w-full p-2 border rounded">
                </div>

                <button class="w-full bg-green-500 text-white p-2 rounded">
                    Reset Password
                </button>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-blue-500">
                        ← Back to Login
                    </a>
                </div>
            </form>

        </x-auth-card>

    </div>
@endsection
