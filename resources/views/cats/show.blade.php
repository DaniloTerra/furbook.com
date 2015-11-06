@extends('layouts.master')

@section('header')
  <a href="{{ url('/') }}">Back to the overview</a>

  <h2>
    {{ $cat->name }}
  </h2>

  <a href="{{ url('cats/'.$cat->id.'/delete') }}">
    <span class="glyphicon glyphicon-trash"></span>
    Delete
  </a>

  <p>
    Last edited: {{ $cat->updated_at->diffForHumans() }}
  </p>
@endsection

@section('content')
  <p>
    Date of Birth: {{ $cat->date_of_birth }}
  </p>
  <p>
    @if($cat->breed)
      Breed:
      {!! link_to('cats/breeds/'.$cat->breed->name, $cat->breed->name) !!}
    @endif
  </p>
@endsection
