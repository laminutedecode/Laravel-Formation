

<ul class="max-w-[1000px] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($articles as $article)
      <li class="border border-gray-300 p-2 my-2">
        <img src="{{asset($article->image)}}" alt="{{$article->title}}" class="w-full object-cover h-auto mb-4">
        <p class="mb-3">{{$article->title}}</p>
        <a href="{{route('article.show', $article->id)}}" class="text-white bg-blue-500 hover:bg-blue-800 px-4 py-1 rounded-md">Lire article</a>
        
      </li>
      
    @endforeach
  
  </ul>