@extends('layouts.default')

@section('title', 'User Titulo')
    
@section('content')
    

@foreach($users as $user)
  {{ $user->name }} <br>
@endforeach
@endsection

