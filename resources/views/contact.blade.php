@extends("base")

@section('title', "Contact")

@section('content')

<div class="max-w-lg mx-auto p-4">

  @if (session('success'))
  <div class="bg-green-100 text-green-500 p-3">
    <p>Message envoyé</p>
    <p>{{session('success')}}</p>
  </div>
  @endif


  <form action="{{route('contact.send')}}" method="POST" class="mt-4">
    @csrf
    <div class="mb-4">
      <label for="name" class="block text-sm font-medium text-gray-700">Nom:</label>
      <input type="text" id="name" name="name" value="{{old('name')}}" class="w-full block mt-1 p-3 border border-gray-300 rounded-md shadow-md">
      @error('name')
      <p class="bg-red-100 text-red-500 text-sm p-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
      <input type="email" id="email" name="email" value="{{old('email')}}" class="w-full block mt-1 p-3 border border-gray-300 rounded-md shadow-md">
      @error('email')
      <p class="bg-red-100 text-red-500 text-sm p-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label for="message" class="block text-sm font-medium text-gray-700">Message:</label>
      <textarea id="message" name="message" value="{{old('message')}}" class="w-full block mt-1 p-3 border border-gray-300 rounded-md shadow-md"></textarea>
      @error('message')
      <p class="bg-red-100 text-red-500 text-sm p-2">{{$message}}</p>
      @enderror
    </div>
    <button type="submit" class="w-full py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-800">Envoyer</button>
  </form>
</div>



@endsection