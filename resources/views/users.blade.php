@extends('layouts.default')

@section('title', 'User Titulo')
    
@section('content')
    

@foreach($users as $user)
  {{ $user->name }} <br>
@endforeach
{{-- // TODO intro #11 min 10:00 --}}
@endsection

