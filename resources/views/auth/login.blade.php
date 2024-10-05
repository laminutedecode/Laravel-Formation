@extends('base')

@section('title', 'Se connecter')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Errors!</strong>
            <span class="block sm:inline">{{ $errors->first()}}</span>
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST" class="mt-4">
        @csrf
   
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none focus:border-blue-300">
            @error('email') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
            <input type="password" id="password" name="password"
                   class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none focus:border-blue-300">
            @error('password') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

 

        <button type="submit" class="w-full py-2 px-4 bg-gray-800 text-white rounded-md hover:bg-gray-900">
            Se connecter
        </button>

        <p class="my-2">Pas de compte ? <a class="text-red-500" href="{{ route('register') }}">S'inscrire</a></p>

    </form>
</div>
@endsection