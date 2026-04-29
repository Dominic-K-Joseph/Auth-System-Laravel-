@extends('layouts.app')

@section('content')

<div class="p-6 w-full max-w-2xl">

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-2">
            Welcome, {{ auth()->user()->name }}
        </h2>

        <p class="text-gray-600">
            You are successfully logged in.
        </p>
    </div>

</div>

@endsection