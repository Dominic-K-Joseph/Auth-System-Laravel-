@extends('layouts.app')

@section('content')
    <div class="w-full max-w-md">

        <x-auth-card title="Register">

            <form method="POST" action="/register">
                @csrf

                 {{-- Name  --}}
                <div class="mb-3">
                    <input name="name" placeholder="Name" value="{{ old('name') }}"
                        class="w-full p-2 border rounded @error('name') border-red-500 @enderror">

                    @error('name')
                        <p class="text-red-500 text-sm mt-0">{{ $message }}</p>
                    @enderror
                </div>

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

                <button class="w-full bg-blue-500 text-white p-2 rounded mt-2">
                    Register
                </button>

            </form>

        </x-auth-card>

    </div>
@endsection
