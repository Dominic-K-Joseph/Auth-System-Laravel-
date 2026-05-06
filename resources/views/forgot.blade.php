@extends('layouts.app')

@section('content')
    <div class="w-full max-w-md">

        <x-auth-card title="Forgot Password">

            <form method="POST" action="/forgot-password">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <input name="email" type="email" placeholder="Enter your registered email" value="{{ old('email') }}"
                        class="w-full p-2 border rounded @error('email') border-red-500 @enderror">

                    @error('email')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button class="w-full bg-blue-500 text-white p-2 rounded">
                    Continue
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
