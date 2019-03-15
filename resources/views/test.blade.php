@extends('layouts.layout')

@section('content')
<h1>Hi {{ $user->first()->name }}</h1>
@endsection