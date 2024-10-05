@extends("base")

@section('title', "Test")

@section('content')

<h2>{{ __('messages.welcome')}}</h2>
<h2>{{ __('messages.goodbye')}}</h2>


<form action="">
  @csrf
  <label for="name">{{ __('validation.attributes.name')}}</label>
  <input type="text" id="name">
  @error('name')
  <div>{{ __('validation.required',  ['attributes' => __('validation.attributes.name')])}}</div>
      
  @enderror
</form>



@endsection