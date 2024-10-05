@extends("base")

@section('title', "Blog")

@section('content')

<div class="p-4">
 <x-article-component  :articles="$articles" />
</div>

@endsection