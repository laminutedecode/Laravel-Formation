@extends("base")

@section('title', "Single")

@section('content')

<div class="p-4">

  <h1 class="mt-6 font-bold text-6xl uppercase mb-6">{{$article->title}}</h1>
  <img src="{{asset($article->image)}}" alt="{{$article->title}}" class="w-full object-cover h-auto mb-4">
  <p>{{$article->description}}</p>
  <p class="italic">Ecrit par: {{$article->author->name}}</p>

 
</div>

@endsection