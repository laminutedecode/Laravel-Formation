@extends("base")

@section('title', "Dashboard")

@section('content')

  <div class="p-6">
    <h1 class="text-2xl font-bold uppercase">Tableau de bord</h1>

    <div class="flex items-center justify-between my-4">
      <a class="py-2 px-4 bg-green-500 hover:bg-green-700 text-white rounded-md" href="{{route('create')}}">Créer un article</a>
      <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit" class="py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded-md">Déconnexion</button>
      </form>
    </div>

    @if (session('success'))
    <div class="bg-green-100 text-green-500 p-3">
      {{session('success')}}
    </div>
    @elseif (session('update'))
    <div class="bg-blue-100 text-blue-500 p-3">
      {{session('update')}}
    </div>
    @elseif (session('delete'))
    <div class="bg-red-100 text-red-500 p-3">
      {{session('delete')}}
    </div>
    @endif




    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      @foreach ($articles as $article)
        <li class="border border-gray-300 p-2 my-2">
          <img src="{{asset($article->image)}}" alt="{{$article->title}}" class="w-full object-cover h-auto mb-4">
          <p>{{$article->title}}</p>
          <div class="flex items-center gap-2 w-full mt-6">
            <a href="{{route('article.edit', $article->id)}}" class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-1 rounded-md">Modifier</a>
            <form action="{{route('articles.destroy', $article->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-1 rounded-md">Supprimer</button>
            </form>
          </div>
        </li>
        
      @endforeach
  
    </ul>
  </div>


  



@endsection