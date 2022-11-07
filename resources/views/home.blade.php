@extends('layouts.app')

@section('content')
    <h1>{{ Route::getCurrentRoute()->getActionName() }}</h1>
@endsection
