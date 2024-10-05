@extends("base")

@section('title', "Update")

@section('content')

<div class="max-w-lg mx-auto mt-10">
  <form action="{{route('article.update', $article->id)}}" class="p-8" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="mb-6">
      <label for="title" class="text-gray-700 block mb-2 text-sm font-medium">Titre de l'article</label>
      <input type="text" id="title" name="title" value="{{old('title', $article->title)}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-md">
    </div>
    <div class="mb-6">
      <label for="description" class="text-gray-700 block mb-2 text-sm font-medium">Description de l'article</label>
      <textarea id="description" name="description" 
        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm">{{ old('description', $article->description) }}</textarea>
    </div>
    <div class="mb-6">
      <label for="category_id" class="text-gray-700 block mb-2 text-sm font-medium">Categorie de l'article</label>
      <select name="category_id" id="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-md">
        @foreach ($categories as $category)
        <option value="{{$category->id}}" {{$article->category_id == $category->id ? "selected" : ""}}>
          {{$category->name}}
        </option>
          
        @endforeach

      </select>
    
    </div>
    <img src="{{asset($article->image)}}" alt="{{$article->title}}" class="w-full h-autro mb-4 object-cover">

    <div class="mb-6">
      <label for="image" class="text-gray-700 block mb-2 text-sm font-medium">Image</label>
      <input type="file" id="image" name="image" class="w-full px-3 py-2 ">
    </div>
    <div class="mb-6">
      <button type="submit" class="w-full py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-800"> Modifier un article</button>
    </div>
  
  </form>

</div>



@endsection